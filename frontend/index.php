


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E&l</title>
  <link rel="icon" href="favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>
  <body class="home  h-100">
    
    <section class="p-3">
      <div class="container-sm rounded-4" id="loginContenedor">
        <div class="d-flex justify-content-center">
            
            <div class="w-75 p-2 p-sm-4 justify-content-center">
              <h1 class="text-center fs-2 fw-bold" style="color: #F24C3D;">E&L</h1>
              <form method="post" action="../backend/api/login.php">
                <div class="mb-3">
                  <input type="text" class="form-control" name ="usuario" id="usuario" placeholder="Usuario">
                </div>
                <div class="mb-3">
                <input type="password" class="form-control" name ="contra" id="contra" placeholder="Contraseña">
                </div>

                
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?php echo $row['telefono'] ?></h5>
                </div>

                
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?php echo $row['email'] ?></h5>
                </div>

                

            </div>
          </div>
          </a>
        </div>


    <?php ?>



     
      </div>

</section>

<section class="overflow-hidden py-5">
    <h1 class="text-center fs-1"  style="color: #F24C3D;">----- M&A -----</h1>
  </section>


<div style="overflow: hidden;">
<svg
  preserveAspectRatio="none"
  viewBox="0 0 1200 120"
  xmlns="http://www.w3.org/2000/svg"
  style="fill: #F24C3D; width: 143%; height: 360px; transform: rotate(180deg);"
>
  <path
  d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
  opacity=".25"
/>
  <path
    d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
    opacity=".5"
  />
  <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
</svg>
</div>


  <footer class="p-1">
    <div class="py-2 px-4 d-flex flex-wrap gap-4 justify-content-center">
        <div class="fs-1 fw-bold" style="color: #F24C3D;">M&A</div>
    <div class="d-flex flex-column gap-2 fs-5">
        <div class="d-flex gap-2 align-items-center">
            <div>Esnaider David Ortega Rodriguez</div>
            <a href="" style="background-color: transparent; color: #F24C3D;"><i class="fa-brands fa-github" style="background-color: transparent;"></i></a>
            <a href="" style="background-color: transparent; color: #F24C3D;"><i class="fa-brands fa-linkedin" style="background-color: transparent;" ></i></a>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <div>Fabian Andres Roman Garnica</div>
            <a href="" style="background-color: transparent; color: #F24C3D;"><i class="fa-brands fa-github" style="background-color: transparent;"></i></a>
            <a href="" style="background-color: transparent; color: #F24C3D;"><i class="fa-brands fa-linkedin" style="background-color: transparent;" ></i></a>
        </div>
    </div>
    </div>
        <div class="py-1 text-center">----- 2023 -----</div>
</footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c7e1fdae8a.js" crossorigin="anonymous"></script>
</body>

</html>