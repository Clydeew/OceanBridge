<h1>My Cart</h1>

@if($cart && $cart->items->count())

    @foreach($cart->items as $item)

        <div>

            <h3>
                {{ $item->product->name }}
            </h3>

            <p>
                Quantity:
                {{ $item->quantity }}
            </p>

            <p>
                Price:
                Rp {{ $item->product->price }}
            </p>

            <form action="{{ route('cart.update', $item) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <input type="number"
                       name="quantity"
                       value="{{ $item->quantity }}"
                       min="1">

                <button type="submit">
                    Update
                </button>

            </form>

            <form action="{{ route('cart.remove', $item) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Remove
                </button>

            </form>

        </div>

    @endforeach

@else

    <p>Cart is empty</p>

@endif
<a href="{{ route('checkout.index') }}">
    Proceed To Checkout
</a>