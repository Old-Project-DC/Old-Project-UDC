<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>DIGITA 5 COMPRAS</title>
  </head>
  <body>

    <div class="container text-center border border-primary">
      <header >
        <h1>REGISTRO DE COMPRAS</h1>
        <br>
      </header>

      <form action="procesarcompras.php" method="post">
        <div class="d-flex justify-content-center">

          <div class="form-group mx-sm-1 mb-1">
           <div class="input-group">
             <label for="numero1" class="col-sm-5 col-form-label">  Compra#1</label>
              <input type="number" class="form-control" name="numero1" placeholder="Digita la compra">
            </div>
            <div class="input-group">
              <label for="numero2" class="col-sm-5 col-form-label">  Compra#2</label>
              <input type="number" class="form-control" name="numero2" placeholder="Digita la compra">
            </div>
             <div class="input-group">
             <label for="numero3" class="col-sm-5 col-form-label">  Compra#3</label>
              <input type="number" class="form-control" name="numero3" placeholder="Digita la compra">
            </div>
              <div class="input-group">
             <label for="numero4" class="col-sm-5 col-form-label">  Compra#4</label>
              <input type="number" class="form-control" name="numero4" placeholder="Digita la compra">
            </div>
              <div class="input-group">
             <label for="numero5" class="col-sm-5 col-form-label">  Compra#5</label>
              <input type="number" class="form-control" name="numero5" placeholder="Digita la compra">
            </div>
          </div>
        </div >
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary mb-2">Enviar</button>
        </div>
      </form>
      <?php 
      session_start();
      if(isset($_SESSION['totalCompra'])){
        if(isset($_SESSION['iva'])){
          if(isset($_SESSION['descuento'])){
            if(isset($_SESSION['totalPagar'])){
              if(isset($_SESSION['compraMax'])){

        echo 'TOTAL DE LA COMPRA ES: '.$_SESSION['totalCompra']."<br>";
        unset($_SESSION['totalCompra']);
        echo 'EL IVA ES: '.$_SESSION['iva']."<br>";
        unset($_SESSION['iva']);
        echo 'EL DESCUENTO ES DE: '.$_SESSION['descuento']."<br>";
        unset($_SESSION['descuento']);
        echo 'EL TOTAL A PAGAR ES: '.$_SESSION['totalPagar']."<br>";
        unset($_SESSION['totalPagar']);
        echo 'LA COMPRA MAYOR ES: '.$_SESSION['compraMax'];
        unset($_SESSION['compraMax']);
              }
            }
          }
        }

      }


       ?>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>