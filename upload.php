<?php
  if(isset($_POST['submit'])){
      $file = $_FILES['file'];
      print_r($file);
      $fileName = $_FILES['file']['name'];

      print_r($_POST['submit']);


      $fileNameNew = uniqid('',true).".".$fileActualExt;
      $fileDestination = 'uploads/'.$fileNameNew;
      move_uploaded_file($fileTmpName,$fileDestination);
      header("Location: index.php?uploadsucess");
    }
