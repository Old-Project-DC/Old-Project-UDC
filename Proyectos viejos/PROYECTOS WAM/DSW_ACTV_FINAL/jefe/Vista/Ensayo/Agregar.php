<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
    		
      <h1 >Agregar Ensayo</h1><br>

      <form action="index.php?c=ensayo&a=guardar" method="POST" autocomplete="off" name="forAgregar" id="forAgregar" class="col-6 offset-3 border border-secondary rounded p-3 mb-2 bg-light  text-dark">
        <div class="form-group col-6 offset-3">
          <label for="nombre">Tipo Ensayo</label>
          <input type="text" class="form-control" name="tipo_Ensayo" placeholder="Ingrese el tipo de ensayo" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="user">Medidas</label>
            <input type="text" class="form-control" name="medidas" placeholder="Ingrese el dato" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="user">Id Muestra</label>
            <input type="text" class="form-control" name="id_Muestra" placeholder="Ingrese id muestra" required>
        </div>
        <div class="form-group">
          <button id="guardar" name="guardar" type="submit" class="btn btn-outline-secondary">Guardar</button>
          <a href="index.php?c=ensayo" class="btn btn-outline-secondary">Regresar</a>
        </div>
      </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>