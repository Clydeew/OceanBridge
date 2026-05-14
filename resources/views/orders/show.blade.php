<h1>Order Detail</h1>

<p>Status: {{ $order->status }}</p>

<p>Payment: {{ $order->payment->payment_status }}</p>

@foreach($order->items as $item)

    <div>

        <h3>
            {{ $item->product->name }}
        </h3>

        <p>
            Qty: {{ $item->quantity }}
        </p>

        <p>
            Price: Rp {{ $item->price }}
        </p>

    </div>

@endforeach