<h4>Thank you for your order!</h4>

<h6>Hello {{ $order->first_name }} we are now preparing your order.</h6>

<h5><strong>Your order details:</strong></h5>

<p>
    <strong>Order number:</strong> {{ $order->id }}<br>
    <strong>Your phone number</strong> {{ $order->phone_number }}


</p>

<h6><strong>Order date:</strong> {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}} </h6>

<h4>We hope you will order gain!</h4>