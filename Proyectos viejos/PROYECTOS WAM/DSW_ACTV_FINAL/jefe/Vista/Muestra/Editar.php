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
        
      <h1 >Editar Muestra</h1><br>

      <form action="index.php?c=muestra&a=guardar" method="POST" autocomplete="off" name="forAgregar" id="forAgregar" class="col-6 offset-3 border border-secondary rounded p-3 mb-2 bg-light  text-dark">
          <input type="hidden" name="id" value="<?= $auxi['Muestra']['id_muestra'] ?>">
        <div class="form-group col-6 offset-3">
          <label for="nombre">Codigo Muestra</label>
          <input type="number" class="form-control" name="codigo_Muestra" placeholder="Ingrese El Codigo" value="<?= $auxi['Muestra']['cod_muestra'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="user">Id Jefe Lab</label>
            <input type="text" class="form-control" name="id_Jefe_Lab" placeholder="Ingrese La Fecha" value="<?= $auxi['Muestra']['id_jefe_lab_fk'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="user">Id Lote</label>
            <input type="text" class="form-control" name="id_Lote" placeholder="Ingrese El Id Del Lote" value="<?= $auxi['Muestra']['id_lote_fk'] ?>" required>
        </div>
        <div class="form-group">
          <button id="guardar" name="guardar" type="submit" class="btn btn-outline-secondary">Editar</button>
          <a href="index.php?c=muestra" class="btn btn-outline-secondary">Regresar</a>
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