<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Invertir cadena de texto</title>
  </head>
  <body>
    <div class="container col-md-4">
      <header class="text-center">
        <h1>
          Invertir cadena
        </h1>
      </header>
  <form action="invertircadena.php" method="post">
    <div class="">
      <div class="form-group">
        <label for="texto">Ingresa una cadena de texto</label>
        <input type="text" class="form-control" id="texto" name="texto">
      </div>
      <div class="form-group">
        <label for="resultado">Texto invertido</label>
        <input type="txt" class="form-control" value ="<?php session_start(); if(isset($_SESSION['cadenaInvertida'])){ echo $_SESSION['cadenaInvertida']; unset($_SESSION['cadenaInvertida']);}?>" id="resultado" name="resultado">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Invertir</button>
  </form>      














    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>