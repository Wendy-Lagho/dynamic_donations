<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Need;
use App\Models\Donation;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
// use Illuminate\Support\Facades\Validator;

class DonateForm extends Component
{
    public $needs;
    public $selectedNeed;
    public $quantity;
    public $unit;
    public $donationDate;
    public $comments;

    protected $rules = [
        'selectedNeed' => 'required|exists:needs,id',
        'quantity' => 'required|integer|min:1',
        'unit' => 'required|string|max:50',
        'donationDate' => 'required|date',
        'comments' => 'nullable|string',
    ];

    protected $messages = [
        'selectedNeed.required' => 'A need must be selected.',
        'selectedNeed.exists' => 'The selected need does not exist.',
        'quantity.required' => 'The quantity is required.',
        'quantity.integer' => 'The quantity must be an integer.',
        'quantity.min' => 'The quantity must be at least 1.',
        'unit.required' => 'The unit is required.',
        'unit.string' => 'The unit must be a string.',
        'unit.max' => 'The unit must not exceed 50 characters.',
        'donationDate.required' => 'The donation date is required.',
        'donationDate.date' => 'The donation date is not a valid date.',
        'comments.string' => 'The comments must be a string.',
    ];

    public function mount()
    {
        $this->needs = Need::all();
    }

    public function submit()
    {
            $this->validate();

            Donation::create([
                'user_id' => Auth::id(),
                'need_id' => $this->selectedNeed,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'donation_date' => $this->donationDate,
                'comments' => $this->comments,
                'status' => 'pending',
                'receipt_sent' => false,
                'admin_approved' => false,
            ]);

            session()->flash('message', 'Donation submitted successfully!');
    }

    public function paypal(Request $request)
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
    //Handle succes logic
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->setCurrency('USD');
    $paypalToken = $provider->getAccessToken();
    $provider->setAccessToken($paypalToken);

    $orderId = $request->query('token');
    $response = $provider->capturePaymentOrder($orderId);

    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
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
