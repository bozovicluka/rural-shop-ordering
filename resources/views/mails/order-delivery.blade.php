<!DOCTYPE html>
<html lang="me">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Narudžbina</title>
</head>
<body>
<h1>Nova Narudžbina</h1>
<p>Potrebno je dostaviti novu narudžbinu!</p>

<h2>Detalji Narudžbine:</h2>

<h3>Prodavac:</h3>
<ul>
    <li><strong>Ime:</strong> {{ $order['user_name'] }}</li>
    <li><strong>Email:</strong> {{ $order['user_email'] }}</li>
    <li><strong>Telefon:</strong> {{ $order['user_phone_number'] }}</li>
    <li><strong>Grad:</strong> {{ $order['user_city'] }}</li>
    <li><strong>Adresa:</strong> {{ $order['user_address'] }}</li>
</ul>

<h3>Detalji narudžbine:</h3>
<ul>
    <li><strong>ID oglasa:</strong> {{ $order['ad_id'] }}</li>
    <li><strong>Naslov Oglasa:</strong> {{ $order['ad_title'] }}</li>
    @if ($order['comment'])
        <li><strong>Komentar kupca:</strong> {{ $order['comment'] }}</li>
    @endif
    @if($comment)
        <li><strong>Komentar prodavca:</strong> {{ $comment }}</li>
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
