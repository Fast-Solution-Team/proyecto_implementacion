<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eMoney</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Emoney</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="./">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contactanos</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cerrar Sesion
                  </a>
                  
                </li>
                
              </ul>
              
            </div>
          </nav>
        
    </header>
    <main class="container">
      <br>
      <br>
        <h1>
            Deposito
        </h1>

        

      <form action="/deposito/{{$id}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
                
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Sara Gimenez"  value="{{ $usuario }}">
                </div>
            </div>
              <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Monto del Deposito</label>
                  <div class="col-sm-10">
                      <input type="number" class="form-control" name="cantidad_dp" id="cantidad_dp" placeholder="cantidad">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Codigo de billetera</label>
                  <div class="col-sm-10">
                      <input type="text" readonly class="form-control" name="idusu" id="idusu" value="{{ $id }}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Monto Actual</label>
                  <div class="col-sm-10">
                      <input type="number" readonly class="form-control" name="montotl" id="montotl" value="{{ $saldo }}">
                  </div>
              </div>
              
              <div class="container-fluid h-100"> 
              <div class="row w-100 align-items-center">
                <div class="col text-center">
                  <input type="submit" value="Efectuar Deposito" class="btn btn-primary mb-2" >
                  </div>	
              </div>
            </div>
      </form>


        
    </main>

</body>
</html>