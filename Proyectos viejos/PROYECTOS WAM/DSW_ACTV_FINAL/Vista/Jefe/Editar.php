<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>REGISTRAR JEFE LAB</title>
  </head>
  <body>
    <div class="container text-center">
      
        <h1 class="">Editar Jefe Lab</h1><br>
      <form class="col-6 offset-3 border border-secondary rounded p-3 mb-2 bg-light text-dark" method="POST" action="index.php?c=jefe&a=modificar">
        <div class="form-group col-6 offset-3">
          <label for="usernombre">NOMBRE</label>
          <input type="hidden" name="id" value="<?= $auxi['Jefe']['ID_JEFES'] ?>">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre"  value="<?= $auxi['Jefe']['NOMBRES'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="userlogin">NOMBRE DE USUARIO</label>
          <input type="text" class="form-control" id="nombre_Usuario" name="nombre_Usuario" placeholder="Ingrese su user"  value="<?= $auxi['Jefe']['USUARIOS'] ?>" required>
        </div>
          <div class="form-group col-6 offset-3">
          <label for="usertipo">TIPO LABORATORIO</label>
          <input type="text" class="form-control" id="tipo_Laboratorio" name="tipo_Laboratorio" placeholder="Ingrese tipo de laboratorio"  value="<?= $auxi['Jefe']['LABORATORIOS'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="actual">ACTUAL</label>
          <select class="form-control" id="actual" name="actual">
            <option value="1">SI</option>
            <option value="2">NO</option>
          </select>
        </div>
        <div class="form-group">
          <button id="guardar" name="editar" type="submit" class="btn btn-outline-secondary">Editar</button>
          <a href="index.php?c=jefe" class="btn btn-outline-secondary">Regresar</a>
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