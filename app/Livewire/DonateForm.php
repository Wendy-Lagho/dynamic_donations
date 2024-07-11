<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Need;
use App\Models\Donation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
// use Illuminate\Support\Facades\Validator;

class DonateForm extends Component
{
    public $selectedNeed;
    public $donation_date;
    public $quantity;
    public $unit;
    public $comments;

    public function mount(Need $need)
    {
        $this->selectedNeed = $need;
    }

    public function submitDonation()
    {
        // Validate donation form fields
        $validatedData = $this->validate([
            'donation_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string|max:50',
            'comments' => 'nullable|string',
        ]);

        // Save donation to database
        Donation::create([
            'need_id' => $this->selectedNeed->id,
            'donation_date' => $validatedData['donation_date'],
            'quantity' => $validatedData['quantity'],
            'unit' => $validatedData['unit'],
            'comments' => $validatedData['comments'],
        ]);

        session()->flash('message', 'Donation submitted successfully!');

        // Clear form fields for next donation
        $this->reset(['donation_date', 'quantity', 'unit', 'comments']);
    }

    public function donateAnotherItem()
    {
        // Redirect back to the needs page
        return redirect()->route('needs');
    }



    //PAYPAL PAYMENT GATEWAY INTERGRATION
    public function paypal()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                    //  "value" => $request->amount
                        "value" => "100"
                    ]
                ]
            ]
        ]);
    
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    
        session()->flash('error', 'Something went wrong.');
        return redirect()->route('donate-form');
    }

    public function success(Request $request)
{
    //Handle success logic
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->setCurrency('USD');
    $paypalToken = $provider->getAccessToken();
    $provider->setAccessToken($paypalToken);

    $orderId = $request->query('token');
    $response = $provider->capturePaymentOrder($orderId);

    if (isset($response['status']) && $response['status'] == 'COMPLETED') {

        //insert data into database
        $data = [
            'user_id' => Auth::id(),
            'payment_id' => $response['id'],
            'payment_amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            'payment_currency' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
            'payer_id' => $response['payer']['payer_id'],
            'payer_name' => $response['payer']['name']['given_name'],
            'payer_surname' => $response['payer']['name']['surname'],
            'payer_email' => $response['payer']['email_address'],
            'payment_status' => $response['status'],
            
        ];
        Payment::create($data);
        // Update your donation record as completed
        session()->flash('message', 'Transaction completed successfully!');
    } else {
        session()->flash('error', 'Transaction failed.');
    }

    return redirect()->route('donate-form');
}

    public function cancel()
    {
        // Handle cancel logic 
        session()->flash('error', 'You have canceled the transaction.');
        return redirect()->route('donate-form');
    }

    public function render()
    {
        return view('livewire.donate-form');
    }
}
