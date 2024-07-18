<div>
    <h2 class="text-2xl font-bold mb-4 text-secondary">Payment Dashboard</h2>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Total Payments</h3>
            <p class="text-3xl font-bold">${{ number_format($summaryData['total'], 2) }}</p>
        </div>
        <div class="p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Average Payment</h3>
            <p class="text-3xl font-bold">${{ number_format($summaryData['average'], 2) }}</p>
        </div>
        <div class="p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Highest Payment</h3>
            <p class="text-3xl font-bold">${{ number_format($summaryData['highest'], 2) }}</p>
        </div>
        <div class="p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Total Transactions</h3>
            <p class="text-3xl font-bold">{{ $summaryData['count'] }}</p>
        </div>
    </div>

    <!-- Recent Payments Table -->
    <div class="rounded-lg shadow overflow-hidden">
        <h3 class="text-lg font-semibold p-4 bg-primary text-white">Recent Payments</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($payments as $payment)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $payment->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($payment->payment_amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $payment->payer_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $payment->payment_status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>