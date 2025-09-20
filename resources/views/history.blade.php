<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Transaction History</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/history.css">
    <style>

    </style>
</head>

<body>
    <x-navigation></x-navigation>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Transaction History</h1>

        @if ($transactions->isEmpty())
            <div class="custom-alert text-center">
                No Transaction found.
            </div>
        @else
            @foreach ($transactions as $transaction)
                <div class="card">
                    <div class="card-header">
                        <p><strong>Customer:</strong> {{ $transaction->customer->email ?? 'N/A' }}</p>
                        <p><strong>Date:</strong>
                            {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</p>
                        <p><strong>Branch:</strong> {{ $transaction->branch->address ?? 'N/A' }}</p>
                        <p><strong>Payment Method:</strong> {{ $transaction->payment->payment_method }} -
                            {{ $transaction->payment->bank->company ?? 'None' }}</p>
                    </div>
                    <div class="card-body">
                        <h6>Items:</h6>
                        <ul class="list-group">
                            @php
                                $totalPrice = 0; // Initialize total price
                            @endphp
                            @foreach ($transaction->details as $detail)
                                @php
                                    // Base price per item
                                    $basePrice = $detail->price;

                                    // Apply promo if it exists
                                    if ($detail->promo) {
                                        $discountPercentage = $detail->promo->discount ?? 0;
                                        $effectivePrice = $basePrice - ($basePrice * ($discountPercentage / 100));
                                    } else {
                                        $effectivePrice = $basePrice; // No promo, use the base price
                                    }

                                    // Calculate subtotal as effective price multiplied by quantity
                                    $subtotal = $effectivePrice * $detail->quantity;

                                    // Update total price
                                    $totalPrice += $subtotal;
                                @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $detail->package->package_name ?? $detail->product->product_name }}</strong><br>
                                        <small>Quantity: {{ $detail->quantity }}</small><br>
                                        <small>Price per unit: Rp. {{ number_format($basePrice, 2) }}</small><br>
                                        @if ($detail->promo)
                                            <small>Promo: {{ $discountPercentage }}%</small>
                                        @endif
                                        <br>
                                    </div>
                                    <span>Rp. {{ number_format($subtotal, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <p class="total-price">Total Price: Rp. {{ number_format($totalPrice, 2) }}</p>
                    </div>
                </div>
            @endforeach

            <!-- Pagination Links -->
            <div class="mt-4 d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        {{-- Previous Button --}}
                        @if ($transactions->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <<
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $transactions->previousPageUrl() }}">
                                    <<
                            </li>
                        @endif

                        {{-- Next Button --}}
                        @if ($transactions->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $transactions->nextPageUrl() }}">>></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">>></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
