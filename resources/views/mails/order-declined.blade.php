<!DOCTYPE html>
<html lang="me">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promjena statusa narudžbe</title>
</head>
<body>
<h1>Vaša narudžbina je odbijena.</h1>

<h2>Detalji Narudžbine:</h2>
<ul>
    <li><strong>Naslov Oglasa:</strong> {{ $order['ad_title'] }}</li>
    <li><strong>Cijena:</strong> {{ $order['price'] * $order['quantity']}}</li>
    @if ($order['comment'])
        <li><strong>Komentar:</strong> {{ $order['comment'] }}</li>
    @endif
    <li><strong>Email:</strong> {{ $order['email'] }}</li>
    <li><strong>Telefon:</strong> {{ $order['phone'] }}</li>
    <li><strong>Ime:</strong> {{ $order['name'] }}</li>
    <li><strong>Grad:</strong> {{ $order['city'] }}</li>
    <li><strong>Adresa:</strong> {{ $order['address'] }}</li>
</ul>

<br>
<br>
<p>AgroTrade</p>
</body>
</html>
