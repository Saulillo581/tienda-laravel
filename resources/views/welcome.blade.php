<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - La Tiendita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Inventario de la Tiendita</h3>
        </div>
        <div class="card-body">
            <form action="/agregar-producto" method="POST" class="row g-3 mb-4 p-3 bg-white border rounded">
            @csrf
            <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required>
            </div>
            <div class="col-md-3">
            <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio (ej. 15.50)" required>
            </div>
            <div class="col-md-3">
            <input type="number" name="stock" class="form-control" placeholder="Cantidad" required>
            </div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Agregar</button>
            </div>
            </form>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td><strong>{{ $prod->nombre }}</strong></td>
                        <td>${{ number_format($prod->precio, 2) }}</td>
                        <td>{{ $prod->stock }} pzs</td>
                        <td>
                            @if($prod->stock > 10)
                                <span class="badge bg-success">Suficiente</span>
                            @else
                                <span class="badge bg-danger">Poco Stock</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>