<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - La Tiendita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Editar Producto</h3>
                </div>
                <div class="card-body">
                    <form action="/actualizar-producto/{{ $producto->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio ($)</label>
                            <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock Actual</label>
                            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>