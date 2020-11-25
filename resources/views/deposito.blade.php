<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emoney</title>

        <!-- Fonts -->
        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
<body>
     
<body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @livewire('navigation-dropdown')

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

    </div>
        @stack('modals')
    </body>
</body>
</html>