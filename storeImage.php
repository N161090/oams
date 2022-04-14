<?php

require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $subject_code = $_GET['data'];
  $s = $_POST['sub'];
  echo $s;
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE subject_code='".$subject_code."'");
  $subjects = mysqli_fetch_assoc($subjects);

  $img = $_POST['image'];
  $folderPath = "upload/";

  $image_parts = explode(";base64,", $img);
  $image_type_aux = explode("image/", $image_parts[0]);
  $image_type = $image_type_aux[1];

  $image_base64 = base64_decode($image_parts[1]);
  $fileName = $row['idno'] . '.jpg';

  $file = $folderPath . $fileName;
  file_put_contents($file, $image_base64);

  $response = shell_exec('python p.py ' . $row['idno']);
  $response = substr($response, 0, -1);

  $idno=$row['idno'];
  $year=$row['year'];
  $branch=$row['branch'];
  $subject=$subjects['subject_name'];
  $date=date("Y-m-d");
  $today_date=date("Y-m-d");
 

 

    if ($response == 'True') {

      $ismarked = mysqli_query($conn, "SELECT count(1) c FROM mark_attendance WHERE year='.$year.' and branch='.$branch.' and subject='.$subject.' and idno='.$idno-.' and date='.$today_date.'  "); 
      $ismarked = mysqli_fetch_assoc($ismarked);
      if($ismarked['c']==0){
        $mark_attendance = "INSERT INTO `mark_attendance` (`idno`, `year`, `subject`, `branch`,`date`) VALUES ('$idno', '$year', '$subject', '$branch', '$date');";
        $rs = mysqli_query($conn, $mark_attendance);
        if ($rs) {
          header("Location: tables-general.php");
        }
        else{
            echo 'Error';
        }
        echo 'yes';
        }
        else{
          echo 'already submitted';
        }
    } 
    else 
    {
        echo 'Student face not matched';
    }
 
}
else{
  header("Location: login.php");
}

   
?>