<h2>Hello, {{ $oder->user->name }}</h2>
<h3>Your order details</h3>
<table border="1 "cellpadding="5" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Total</th>
        <th>Quantity</th>
    </tr>
    @foreach ($oder->details as $detail)
        <tr>
            <th>{{ $loop->index + 1 }}</th>
            <th>{{ $detail->product->name }}</th>
            <th>{{ $detail->price }}</th>
            <th>{{ number_format($detail->price * $detail->quantity) }}</th>
            <th>{{ $detail->quantity }}</th>
        </tr>
</table>
<p>
    <a href="{{ route('oder.verify', $token) }}">Click here to verify order</a>
</p>
