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
    <div class="card shadow"> <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Inventario de la Tiendita</h3>
        </div>

        <div class="card-body">
            
            @if ($errors->any()) <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('mensaje')) <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif

            <form action="/agregar-producto" method="POST" class="row g-3 mb-4 p-3 bg-white border rounded">
                @csrf <div class="col-md-4">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ej. Coca Cola" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" placeholder="0.00" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" placeholder="Cantidad" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Agregar</button>
                </div>
            </form>

            <table class="table table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Acciones</th>
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
                        <td>
                            <a href="/editar-producto/{{ $prod->id }}" class="btn btn-warning btn-sm d-block mb-1">
                                 Editar
                             </a>
                            <form action="/eliminar-producto/{{ $prod->id }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrarlo?')">
                                @csrf
                                @method('DELETE') <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div> </div> </div> </body>
</html>