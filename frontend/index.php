<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E&L</title>
    <link rel="icon"  href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body class="home  h-100">
    
    <section class="p-3">
      <div class="container-sm rounded-4" id="loginContenedor">
        <div class="d-flex justify-content-center">
            
            <div class="w-75 p-2 p-sm-4 justify-content-center">
              <h1 class="text-center fs-2 fw-bold" style="color: #F24C3D;">E&L</h1>
              <form method="post" action="rd_usuario.php">
                <div class="mb-3">
                  <input type="text" class="form-control" name ="usuario" id="usuario" placeholder="Usuario">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name ="contrasena" id="contrasena" placeholder="Contraseña">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn w-100 rounded-1" id="submitLogin">Ingresar</button>
                </div>
                
                
              </form>
            </div>
        </div>
      </div>
    </section>

      <footer class="p-1">
        <div class="py-2 px-4 d-flex flex-wrap gap-4 justify-content-center">
            <div class="fs-1 fw-bold" style="color: #F24C3D;">E&L</div>
        <div class="d-flex flex-column gap-2 fs-5">
            <div class="d-flex gap-2 align-items-center">
                <div>Esnaider David Ortega Rodriguez</div>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <div>Leonardo Pastrana Rosario</div>
            </div>
        </div>
        </div>
            <div class="py-1 text-center">----- 2024 -----</div>
    </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c7e1fdae8a.js" crossorigin="anonymous"></script>
  </body>
</html>