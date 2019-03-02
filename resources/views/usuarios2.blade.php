<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>formulario Pago</title>
</head>
<body>

<div class="contenedor">
    <h1>Formulario de Información</h1>
        <form method="get" action="{{$processUrl}}">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre" name="nombre" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Apellido" name="apellido" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Dirección</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="direccion" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Correo</label>
                  <input type="email" class="form-control" id="inputAddress2" placeholder="Email" name="correo" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputCity">Ciudad</label>
                    <input type="text" class="form-control" id="inputCity" name="ciudad" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputZip">Pais</label>
                    <input type="text" class="form-control" id="inputZip" name="pais" required>
                  </div>
                </div>
               
                <button type="submit" class="btn btn-primary" name="boton">Enviar</button>

            {{ csrf_field() }}    
            </form>
</div>



    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>