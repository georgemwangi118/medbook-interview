<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $service = $_POST['service'];
        $comment = $_POST['comment'];

        $sql = "insert into patient (firstname, lastname, dob, gender, service, comment) values('$firstname', '$lastname', '$dob', '$gender', '$service', '$comment')";
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
    <h1 class='text-center'>Add patient</h1>
    <form method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="enter first name" name='firstname' autocomplete="off">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="enter last name" name='lastname' autocomplete="off">
        </div>

        <div class="form-group">
            <label>Date of birth</label>
            <input type="date" class="form-control" placeholder="dob" name='dob'>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class='form-control' name='gender'>
                <?php
                    $sql = "select * from gender";
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        while($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo '<option value='.$id.'>'.$name.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Service</label>
            <select class='form-control' name='service'>
            <?php
                    $sql = "select * from service";
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        while($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo '<option value='.$id.'>'.$name.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>General comment</label>
            <textarea class="form-control" placeholder="enter comment" name='comment'></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>    
  </body>
</html>