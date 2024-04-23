<!DOCTYPE html>
<html lang="me">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Narudžbina</title>
</head>
<body>
<h1>Nova Narudžbina</h1>
<p>Čestitamo, ostvarili ste novu narudžbinu!</p>

<h2>Detalji Narudžbine:</h2>
<ul>
    <li><strong>ID oglasa:</strong> {{ $order['ad_id'] }}</li>
    <li><strong>Naslov Oglasa:</strong> {{ $order['ad_title'] }}</li>
    <li><strong>Cijena:</strong> {{ $order['price'] }}</li>
    @if ($order['comment'])
        <li><strong>Komentar:</strong> {{ $order['comment'] }}</li>
    @endif
    <li><strong>Email:</strong> {{ $order['email'] }}</li>
    <li><strong>Telefon:</strong> {{ $order['phone'] }}</li>
    <li><strong>Ime:</strong> {{ $order['name'] }}</li>
    <li><strong>Grad:</strong> {{ $order['city'] }}</li>
    <li><strong>Adresa:</strong> {{ $order['address'] }}</li>
    <li><strong>Poštanski Broj:</strong> {{ $order['postal_code'] }}</li>
</ul>

<h3>Više detalja možete pronaći na našoj aplikaciji.</h3>

<br>
<br>
<p>AgroTrade</p>
</body>
</html>
