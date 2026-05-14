<h1>Checkout</h1>

<h3>Total: Rp {{ $total }}</h3>

<form action="{{ route('checkout.process') }}"
      method="POST">

    @csrf

    <select name="payment_method">

        <option value="bank_transfer">
            Bank Transfer
        </option>

        <option value="ewallet">
            E-Wallet
        </option>

        <option value="cod">
            COD
        </option>

    </select>

    <button type="submit">
        Checkout
    </button>

</form>