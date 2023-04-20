<?php
      include "conecta.php";
        if (isset($_POST['submit'])) {
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $q = " INSERT INTO `registros` (`NOME`, `EMAIL`, `TELEFONE`) VALUES ('$name','$email','$telefone')";

            $query = mysqli_query($conn,$q);
        }

      ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP WM | DEV</title>
    <!-- <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/729/PNG/96/google_icon-icons.com_62736.png" type="image/x-icon"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">CRUD PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add New Client
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Client</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <form method = "post">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome"  class="form-control"  placeholder="Digite seu nome..." >
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"  placeholder="Digite seu email..." >
    </div>
    <div class="mb-3">
        <label  class="form-label">Telefone </label>
        <input type="text"  name="telefone" class="form-control"   placeholder="Digite seu telefone...">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>

      </div>
    </div>
  </div>
</div>

<!-- Tabela -->
<div class="container my-4">
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOME</th>
      <th>EMAIL</th>
      <th>TELEFONE</th>
      <th>REGISTRADO</th>
      <th>AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "conecta.php";
    $sql="select * from registros";
    $result= $conn->query($sql);

    if(!$result){
        die("Invalid query!");
    }
    while ($row=$result->fetch_assoc()){
        echo"
        <tr>
           <th>$row[ID]</th>
           <td>$row[NOME]</td>
           <td>$row[EMAIL]</td>
           <td>$row[TELEFONE]</td>
           <td>$row[DATA_INC]</td>
            <td> 
                    <a class='btn btn-primary' href='edit.php?id=$row[ID]'> Editar</a>
                    <a class='btn btn-danger' href='delete.php?id=$row[ID]'> Excluir</a>
            </td>
        </tr>
        ";
    }
?>
  </tbody>
</table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  

</body>
</html>