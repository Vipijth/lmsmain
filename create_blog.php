<?php

include 'connection.php';
$title = $_POST['title'];

$author= $_POST['author'];
$desc= $_POST['authordesc'];
$about =$conn-> real_escape_string($_POST['about']);
$about1=substr($about,0,1500);

$about2=substr($about,1500,3000);

$aid=$_POST['aid'];
$rand=rand(10000,90000);
$target_dir = "admin/uploads/Blogs/".$title.'/images/'.$rand;
$target_file = $target_dir . basename($_FILES["coverImage"]["name"]);
$imagename=$rand.basename($_FILES["coverImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('admin/uploads/Blogs/'.$title.'/images')) {
mkdir('admin/uploads/Blogs/'.$title.'/images', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_file)) {
      


  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




$rand1=rand(10000,90000);
$target_dir1 = "admin/uploads/Blogs/".$title.'/images/'.$rand1;
$target_file1 = $target_dir1 . basename($_FILES["Image1"]["name"]);
$imagename1=$rand1.basename($_FILES["Image1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
if (!file_exists('admin/uploads/Blogs/'.$title.'/images')) {
mkdir('admin/uploads/Blogs/'.$title.'/images', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["Image1"]["tmp_name"], $target_file1)) {
      


  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




$rand2=rand(10000,90000);
$target_dir2 = "admin/uploads/Blogs/".$title.'/images/'.$rand2;
$target_file2 = $target_dir2 . basename($_FILES["Image2"]["name"]);
$imagename2=$rand2.basename($_FILES["Image2"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
if (!file_exists('admin/uploads/Blogs/'.$title.'/images')) {
mkdir('admin/uploads/Blogs/'.$title.'/images', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["Image2"]["tmp_name"], $target_file2)) {
      


  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}






$rand3=rand(10000,90000);
$target_dir3 = "admin/uploads/Blogs/".$title.'/images/'.$rand3;
$target_file3 = $target_dir3 . basename($_FILES["authorImage"]["name"]);
$imagename3=$rand3.basename($_FILES["authorImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
if (!file_exists('admin/uploads/Blogs/'.$title.'/images')) {
mkdir('admin/uploads/Blogs/'.$title.'/images', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["authorImage"]["tmp_name"], $target_file3)) {
      


  } else {
    echo "Sorry, there was an error uploading your files.";
  }
}



$sql = 'INSERT INTO blogs(title, cover,image1, image2,about1,about2,author,authordetails,authorimage,authorid,publish,view ) VALUES 
("'.$title.'","'.$imagename.'","'.$imagename1.'","'.$imagename2.'","'.$about1.'","'.$about2.'","'.$author.'","'.$desc.'","'.$imagename3.'","'.$aid.'","0","1")';

if ($conn->query($sql) === TRUE) {

  $last_id = $conn->insert_id;
       echo " <script>alert(' Your Blog Successfully Updated'); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'dashblog.php';
         }, 1000);
      </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}