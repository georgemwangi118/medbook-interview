<?php
    include 'connect.php'
?>

<?php
// function highlightMostVisitedPatients($con) {
//     $sql = "SELECT patient.*, gender.name AS g, service.name AS s, COUNT(visits.patient_id) AS visit_count 
//             FROM patient 
//             LEFT JOIN service ON service.id = patient.service 
//             LEFT JOIN gender ON gender.id = patient.gender
//             LEFT JOIN visits ON visits.patient_id = patient.id
//             GROUP BY patient.id
//             ORDER BY visit_count DESC";
            
//     $result = mysqli_query($con, $sql);
//     if ($result) {
//         $count = 0;
//         while ($row = mysqli_fetch_assoc($result)) {
//             $id = $row['id'];
//             $firstname = $row['firstname'];
//             $lastname = $row['lastname'];
//             $dob = $row['dob'];
//             $gender = $row['g'];
//             $service = $row['s'];
//             $comment = $row['comment'];
            
//             $rowClass = ($count < 5) ? "highlight" : "";
            
//             echo '<tr class="' . $rowClass . '">
//                 <th scope="row">' . $id . '</th>
//                 <td>' . $firstname . '</td>
//                 <td>' . $lastname . '</td>
//                 <td>' . $dob . '</td>
//                 <td>' . $gender . '</td>
//                 <td>' . $service . '</td>
//                 <td>' . $comment . '</td>
//                 <td>
//                     <button class="btn btn-success"><a href="update.php?updateid=' . $id . '" class="text-light"><i class="fas fa-pencil"></i></a></button>
//                 </td>
//             </tr>';
            
//             $count++;
//         }
//     }
// }
?>

<?php
//highlightMostVisitedPatients($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Medbook System</title>
</head>
<body>
    <div class='container'>
        <h1>Health Records Management System</h1>
        <button class='btn btn-primary my-5'>
            <a href="patient.php" class='text-light'>Add Patient</a>
        </button>
        <button class='btn btn-primary my-5'>
            <a href="gender.php" class='text-light'>Add Gender</a>
        </button>
        <button class='btn btn-primary my-5'>
            <a href="service.php" class='text-light'>Add Service</a>
        </button>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>First Name</th>
                    <th scope='col'>Last Name</th>
                    <th scope='col'>Date of Birth</th>
                    <th scope='col'>Gender</th>
                    <th scope='col'>Type of Service</th>
                    <th scope='col'>General comments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    function formatDoB($date) {
                        $dateObj = new DateTime($date);
                        $formattedDate = $dateObj->format('d/m/Y');
                        return $formattedDate;
                    }
                    $sql = "select patient.*, gender.name as g, service.name as s from patient left join service on service.id = patient.service left join gender on gender.id = patient.gender";
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $dob = formatDoB($row['dob']);
                            $gender = $row['g'];
                            $service = $row['s'];
                            $comment = $row['comment'];
                            echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$firstname.'</td>
                            <td>'.$lastname.'</td>
                            <td>'.$dob.'</td>
                            <td>'.$gender.'</td>
                            <td>'.$service.'</td>
                            <td>'.$comment.'</td>
                            <td>
                                <button class="btn btn-success"><a href="update.php?updateid='.$id.'" class="text-light"><i class="fas fa-pencil"></i></a></button>
                            </td>
                        </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>