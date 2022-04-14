<?php
 require 'config.php';
 if(!empty($_SESSION["id"])){
 $id = $_SESSION["id"];
 $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
 $row = mysqli_fetch_assoc($result);
 $subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE year='".$row["year"]."' and branch='".$row["branch"]."' ");
}
 else{
 header("Location: login.php");
 }
 $subject_code = $_GET['subject_code'];
?>

<!DOCTYPE html>

<html>

<head>

    <title>Capturing Student Image</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <style type="text/css">

        #results { padding:20px; border:1px solid; background:#ccc; }

    </style>

</head>

<body>


  <!-- ======= Sidebar ======= -->
  

<div class="container">

    <h1 class="text-center">Capturing Student Face</h1> 

    <form method="POST" action="storeImage.php?data=<?php echo ($subject_code); ?>">
        <select name="sub">
        <?php
            while ($subject_row = mysqli_fetch_array($subjects)) { 
                ?>
                <option val=<?php echo $subject_row['subject_code'];?>><?php echo $subject_row['subject_name'];?></option>
        <?php    }
        ?>
        
    </select>
        <select name="section"><option val="">Section</option>
          <?php for ($i=1; $i<6; $i++) { echo '<option val="CSE'.$i.'">CSE'.$i.'</option>';}?> </select>
        <select name="Period"><option val="">Period</option><option val="P1">P1</option></select>
        <div class="row">

            <div class="col-md-6">
                <div id="my_camera"></div> <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">

            </div>

            <div class="col-md-6">

                <div id="results">Your captured image will appear here...</div>

            </div>

            <div class="col-md-12 text-center">

                <br/>

                <button class="btn btn-success">Submit</button>

            </div>

        </div>

    </form>

</div>

  

<!-- Configure a few settings and attach camera -->

<script language="JavaScript">

    Webcam.set({

        width: 490,

        height: 390,

        image_format: 'jpeg',

        jpeg_quality: 90

    });

  

    Webcam.attach( '#my_camera' );

  

    function take_snapshot() {

        Webcam.snap( function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }

</script>

 

</body>

</html>