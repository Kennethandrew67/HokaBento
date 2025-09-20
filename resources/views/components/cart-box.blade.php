@foreach ($items as $item)
    <div class="card mb-3 shadow-sm">
        <div class="row no-gutters align-items-center">
            <div class="col-md-2">
                <img src="{{ $item->imagePath }}" class="card-img" alt="{{ $item->name }}">
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>

                    <!-- Form to edit quantity -->
                    <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quantity</span>
                        </div>
                        <form action="{{ route('cart.editQuantity', $item->cart_id) }}" method="POST"
                            class="d-flex align-items-center">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}"
                                min="1" style="width: 80px;">
                            <button type="submit" class="btn btn-secondary ml-2">Edit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="btn-group" role="group" aria-label="Edit and Remove">
                    <form action="{{ route('cart.remove', $item->cart_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
