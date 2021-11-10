<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  </head>
  <body>
    <main class="container">
        <section class="row">
            <div class="col-md-4 my-5">
                <div class="mt-3" id="eliminada">

                </div>
                <div class="mt-3" id="tarea">
                  
                </div>
            </div>
            <div class="col-md-8 my-5">
                <div class="card animate__animated animate__fadeIn">
                    <div class="card-header">
                        Tarea
                    </div>
                    <div class="card-body">
                        <form id="formulario">
                    
                            <div class = "form-group">
                                <label for="nombre">Nombre de la tarea</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                            </div>
        
                            <div class = "form-group">
                              <label for="descripcion">descripcion de la tarea</label>
                              <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion">
                            </div>
        
                            <br>
                            <button type="submit" class="btn btn-primary">Crear</button>
        
                        </form>
                        <div class="mt-3" id="respuesta">

                        </div>
                    </div>
                </div>
                
            </div>

        </section>
    </main>  
    <script src="./app.js"></script>
  </body>
</html>