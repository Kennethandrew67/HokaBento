<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>

    <x-navigation></x-navigation>

    <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imges/promo4.jpg" alt="Slide 1" />
                </div>
                <div class="carousel-item">
                    <img src="imges/promo2.png" alt="Slide 2" />
                </div>
                <div class="carousel-item">
                    <img src="imges/promo3.webp" alt="Slide 3" />
                </div>
                <div class="carousel-item">
                    <img src="imges/promo5.jpg" alt="Slide 4" />
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="main-section">
        <div class="promo-section red">
            <h2 class="bold text-center">New Products</h2>
        </div>
        <div class="sub-section">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" />
                    <h6>{{ $product->product_name }}</h6>
                </div>
            @endforeach
        </div>

        {{-- Only display promo packages if there are any --}}
        @if ($promoPackages->isNotEmpty())
            <div class="promo-section red">
                <h2 class="bold text-center">Promo Packages</h2>
            </div>
            <div class="sub-section">
                @foreach ($promoPackages as $promoPackage)
                    <div class="product-card">
                        <img src="{{ asset($promoPackage->package_image) }}" alt="{{ $promoPackage->package_name }}" />
                        <h6>{{ $promoPackage->package_name }}</h6>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
