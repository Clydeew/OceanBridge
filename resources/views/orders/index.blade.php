<h1>My Orders</h1>

@foreach($orders as $order)

    <div>

        <h3>
            Order #{{ $order->id }}
        </h3>

        <p>
            Status:
            {{ $order->status }}
        </p>

        <p>
            Total:
            Rp {{ $order->total_price }}
        </p>

        <a href="{{ route('orders.show', $order) }}">
            Detail
        </a>

    </div>

@endforeach