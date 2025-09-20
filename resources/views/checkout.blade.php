<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Checkout Page</title>
    <style>
        /* Hokben Theme Styling */
        body {
            background-color: #fff5e1;
            font-family: Arial, sans-serif;
        }

        .checkout-title {
            font-weight: bold;
            color: #e60012;
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1000px;
            background: #ffdd00;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background-color: #e60012;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 6px;
        }

        .btn-secondary:hover {
            background-color: #cc0010;
        }

        .item-list {
            margin-top: 30px;
            padding-top: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .item-info h5 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 5px;
        }

        .item-info p {
            margin: 2px 0;
            color: #666;
            font-size: 1rem;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .promo-select {
            background-color: #fff5e1;
            color: #333;
            border: 2px solid #e60012;
            font-size: 0.95rem;
            border-radius: 6px;
            padding: 8px;
            width: 100%;
        }

        .total-price h5 {
            font-size: 1.8rem;
            color: #e60012;
            font-weight: bold;
            text-align: center;
            margin-top: 30px;
        }

        .checkout-button {
            background-color: #e60012;
            color: #fff;
            font-size: 1.3rem;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            transition: background 0.3s ease;
            width: 100%;
        }

        .checkout-button:hover {
            background-color: #cc0010;
        }

        .custom-alert {
            color: #e60012;
            font-weight: bold;
            padding: 15px;
            background: #ffe5e5;
            border-radius: 8px;
            border: 1px solid #e60012;
            text-align: center;
        }

        .subtotal p {
            color: #333;
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="checkout-title">Checkout</h1>

        <!-- Back Button -->
        <a href="/cart" class="btn btn-secondary mb-4">Back to Cart</a>

        <!-- Checkout Form -->
        <form action="{{ route('transaction.create') }}" method="POST">
            @csrf

            <!-- Branch Selection -->
            <div class="form-group">
                <label for="branchSelect">Select Branch</label>
                <select id="branchSelect" name="branch_id" class="form-control" required>
                    <option value="" disabled selected>Select a branch</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->address }}</option>
                    @endforeach
                </select>
                @error('branch_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="item-list">
                @if (!$items || count($items) === 0)
                    <div class="custom-alert">
                        No items in checkout.
                    </div>
                @else
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($items as $item)
                        <div class="item">
                            <div class="item-info">
                                <img src="{{ asset($item->imagePath) }}" alt="{{ $item->name }}">
                                <div>
                                    <h5>{{ $item->name }}</h5>
                                    <p>Quantity: {{ $item->quantity }}</p>
                                    <p>Price: Rp. {{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>

                            <!-- Promo Selection for Each Item -->
                            @if ($item->promos && count($item->promos) > 0)
                                <div class="form-group mt-3">
                                    <label for="promoSelect-{{ $item->item_id }}">Select Promo</label>
                                    <select id="promoSelect-{{ $item->item_id }}" name="promo[{{ $item->item_id }}]" class="form-control promo-select" data-item-id="{{ $item->item_id }}" data-base-price="{{ $item->price }}" onchange="updateSubtotal(this)">
                                        <option value="">No Promo</option>
                                        @foreach($item->promos as $promo)
                                            <option value="{{ $promo->id }}" data-discount="{{ $promo->discount }}">
                                                {{ $promo->discount }}% discount (Valid until {{ $promo->end_date }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <!-- Subtotal Calculation -->
                            @php
                                $subtotal = $item->price * $item->quantity;
                            @endphp
                            <div class="subtotal" id="subtotal-{{ $item->item_id }}">
                                <p>Subtotal: Rp. <strong>{{ number_format($subtotal, 2) }}</strong></p>
                            </div>
                        </div>
                        @php
                            $totalPrice += $subtotal;
                        @endphp
                    @endforeach

                    <!-- Payment Method Selection -->
                    <div class="form-group">
                        <label for="paymentSelect">Select Payment Method</label>
                        <select id="paymentSelect" name="payment_id" class="form-control" required>
                            <option value="" disabled selected>Select a payment method</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">
                                    {{ $payment->payment_method }} - {{ $payment->bank->company ?? 'None' }}
                                </option>
                            @endforeach
                        </select>
                        @error('payment_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Display Total Price -->
                    <div class="total-price mt-4">
                        <h5>Total Price: Rp. <span id="totalPrice">{{ number_format($totalPrice, 2) }}</span></h5>
                    </div>
                @endif
            </div>

            <!-- Checkout Button -->
            <button type="submit" class="btn btn-warning mt-4 checkout-button">Checkout</button>
        </form>
    </div>

    <script>
        function updateSubtotal(selectElement) {
            const itemId = selectElement.dataset.itemId;
            const basePrice = parseFloat(selectElement.dataset.basePrice);
            const quantity = parseInt(selectElement.closest('.item').querySelector('.item-info p:nth-child(2)').innerText.split(': ')[1]);
            const discount = selectElement.options[selectElement.selectedIndex].dataset.discount || 0;

            const subtotal = basePrice * quantity * ((100 - discount) / 100);
            document.getElementById(`subtotal-${itemId}`).querySelector("strong").innerText = subtotal.toLocaleString('en-US', { minimumFractionDigits: 2 });
            updateTotalPrice();
        }

        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('.subtotal strong').forEach(subtotalElement => {
                total += parseFloat(subtotalElement.innerText.replace(/,/g, ''));
            });
            document.getElementById('totalPrice').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2 });
        }
    </script>
</body>
</html>
