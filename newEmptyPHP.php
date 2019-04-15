<?php  
$host = "kunet.kingston.ac.uk";
$user = "k1555253";
$pass = "phpproject";
$dbname = "db_k1555253";
//set connection details

    $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");  
//connect 
    if(isset($_FILES['uploaded'])){
      if(!isset($_POST['role'])) 
          // checks a Role Category was selected
{
echo "You forgot to select your Role Category";
}  

 else { 
if(isset($_POST['Share'])){
    //$share is checked and value = 1
    $Share = $_POST['Share'];
}
else{
    //$shareis not checked and value=0
    $Share=0;
}     
        $rolecategoryid = $_POST['role'];
        
    $temp = explode('.', $_FILES['uploaded']['name']);
        $extn = strtolower(end($temp));
     if(($extn == "doc") || ($extn == "docx") || ($extn == "pdf")) {
            // Filetype is correct. Check size
if($_FILES['uploaded']['size'] < 5632000) {
                // Filesize is below maximum permitted. Add to the DB.
               $target = "/home/k1555253/www/uploads/";  
$target = $target . basename( $_FILES['uploaded']['name']) ;  
$ok=1; 

if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
{   
  $uploadfile =$target. \basename($_FILES['uploaded']['name']);
  $FileType = pathinfo($uploadfile,PATHINFO_EXTENSION) ;
echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded"; 

$insert_query="INSERT INTO Files(file,type,roleCategoryId,Permission) VALUES('$uploadfile','$FileType','$rolecategoryid',$Share)";

$stmt = $conn->prepare($insert_query);
$stmt->execute();

}  
else { 
echo "Sorry, there was a problem uploading your file."; 
} 
            } else {
                // Filesize is over our limit. Send error message
                echo  "Your file is too large. Please read the instructions about file type and size, above.";
            }
             } else {
            echo "Your file was the incorrect type. Please read the instructions about file type and size, above.";
        }
    }
    }
    else
    {
        echo "no file";
    }
                ?>
