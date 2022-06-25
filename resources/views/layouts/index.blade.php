
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet"href="/css/style.css">
    <style>
      .mb-3{
        font-family:  "Quicksand", sans-serif;
       
      }
     .navbar
     .container
     .nav-item
     .navbar-brand
     .d-grid gap-2
     .btn btn btn btn-outline-primary
     
     {
      font-family:  "Quicksand", sans-serif;
     }
     .col h5,.col h6{
      font-family:  "Quicksand", sans-serif;
      text-shadow: 2px 2px 4px #000000;
     }
     .btn-sm
     {
      color:black;
      font-family:  "Quicksand", sans-serif;
      text-align: left;
      margin-top: 5px ;
      margin-bottom: 5px !important;

     }
     .judul{
      text-align: center;
     }
     .modal-title {
      text-align: center;
     }
     .btn-sn{
      font-family:  "Quicksand", sans-serif;
     }
   
    
     
   
      </style>
  </head>

  <body >
    @include ('layouts.menu')


    @yield('content') 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
 
</html>

