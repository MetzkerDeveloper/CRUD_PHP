<?php
    include "conecta.php";
    $id="";
    $nome="";
    $email="";
    $telefone="";

    $error="";
    $success="";

    if($_SERVER["REQUEST_METHOD"]=='GET'){
        if(!isset($_GET['id'])){
            header('location: CRUD/index.php');
            exit;
        }
        $id= $_GET['id'];
        $sql= "select * from registros where id=$id";
        $result= $conn->query($sql);
        $row = $result->fetch_assoc();
        while(!$row){

            header('location: CRUD/index.php');
            exit;
        }

        $nome=$row["NOME"];
        $email=$row["EMAIL"];
        $telefone=$row["TELEFONE"];

    }
    else{
        $id=$_POST["id"];
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $telefone=$_POST["telefone"];

        $sql= " update registros set NOME='$nome' , EMAIL='$email', TELEFONE='$telefone' where ID='$id'";
        $result= $conn->query($sql);

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
        <!-- <li class="nav-item">
          <a class="nav-link" href="create.php">Add New Client</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">


<form method = "post">
    <div class="card-header ">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit  Client</h1>
    </div><br>

    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"><br>

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control"  placeholder="Digite seu nome..." >
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="<?php echo $email;?>" class="form-control"  placeholder="Digite seu email..." >
    </div>
    <div class="mb-3">
        <label  class="form-label">Telefone </label>
        <input type="text"  name="telefone" value="<?php echo $telefone;?>" class="form-control"  placeholder="Digite seu telefone..."><br>
    </div>

    
    <button class="btn btn-success" type="submit" name="submit"> Salvar </button><br>
    
     
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  

</body>
</html>