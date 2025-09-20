<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Menu Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <x-navigation></x-navigation>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('menu') }}" method="GET">
                    <div class="input-group">
                        <input type="search" id="form1" name="query" class="form-control" placeholder="Search"
                            aria-label="Search" />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="main-section">
        <h3>Package</h3>
        <div class="sub-section">
            @foreach ($packages as $package)
                <div class="product-card">
                    <img src="{{ asset($package->package_image) }}" alt="{{ $package->package_name }}" />
                    <h4>{{ $package->package_name }}</h4>
                    <h5 class="red">Rp. {{ number_format($package->package_price, 0, ',', '.') }}</h5>
                    <form action="{{ route('add.cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <div class="quantity-container">
                            <label for="quantity_{{ $package->id }}">Qty:</label>
                            <input type="number" name="quantity" class="quantity-input" value="1" min="1">
                        </div>

                        <button type="submit">Add To Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
        <h3>Product</h3>
        <div class="sub-section">

            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" />
                    <h6>{{ $product->product_name }}</h6>
                    <label class="red">Rp. {{ number_format($product->product_price, 0, ',', '.') }}</label>

                    <form action="{{ route('add.cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="quantity-container">
                            <label for="quantity_{{ $product->id }}">Qty:</label>
                            <input type="number" name="quantity" class="quantity-input" value="1" min="1">
                        </div>
                        <button type="submit">Add To Cart</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        @if (session('success'))
            alert("{{ session('success') }}");
        @elseif (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
</body>

</html>
