<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];

        $sql = "insert into gender (name) values('$name')";
        $result = mysqli_query($con, $sql);
        if($result){
            header('location:index.php');
        }else {
            die(mysqli_error($con));
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Medbook system</title>
  </head>
  <body>
  <div class="container my-5">
    <h1 class='text-center'>Add Gender</h1>
    <form method="post">
        <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control" placeholder="enter name" name='name' autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>    
  </body>
</html>