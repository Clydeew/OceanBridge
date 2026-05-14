<h1>Products</h1>

<a href="{{ route('products.create') }}">
    Add Product
</a>

@foreach($products as $product)

    <div>
        <h3>{{ $product->name }}</h3>

        <p>{{ $product->price }}</p>

        <a href="{{ route('products.show', $product) }}">
            View
        </a>

        <a href="{{ route('products.edit', $product) }}">
            Edit
        </a>

        <form action="{{ route('products.destroy', $product) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>
        <form action="{{ route('cart.add', $product->id) }}"
            method="POST">

            @csrf

            <button type="submit">
                Add To Cart
            </button>

        </form>
    </div>

@endforeach