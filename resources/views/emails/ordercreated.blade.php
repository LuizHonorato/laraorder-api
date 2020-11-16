<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Novo pedido</title>
</head>
<body>
    <div class="container">
        <h3>Um novo pedido entrou no sistema!</h3>
        <div class="d-flex flex-column">
            <span class="mt-4"><strong>Nome do cliente:</strong> {{ $customer_name }}</span>
            <span class="mt-3"><strong>Data do pedido:</strong> {{ $order_date }} às {{ $order_hour }}</span>
        </div>
        <p><h3>Itens do pedido:</h3></p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nome do produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex flex-column">
            <span><strong><h2>Total:</h2></strong></span>
            <span><strong><h2>R$ {{ $order->total }}</h2></strong></span>
        </div>
    </div>
</body>
</html>
