<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Clave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 card p-3">
                <h5>Pagina protegida con clave</h5>
                <form action="{{ route('verificar-clave-pagina') }}" method="POST">
                    @csrf
                    <input type="password" name="clave" id="clave" class="form-control mb-2" placeholder="Ingrese la clave" required>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <p class="mb-0">{{ $errors->first() }}</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</body>
</html>
