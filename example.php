<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   

<!-- while($row=mysqli_fetch_assoc($result)){
// echo $row['category_id'];
$id=$row['category_id'];
$cat=$row['category_name'];
$desc=$row['category_description'];
 -->

<?php
$servername="localhost";
$username="root";
$password="";
$database="demo";
$conn=mysqli_connect($servername,$username,$password,$database);
$sql="SELECT * FROM `score`";
$result=mysqli_query($conn,$sql);

$secondsql="INSERT INTO `score` (`sn`, `name`, `score`) VALUES (NULL, 'santosh', '90');";
$batch=mysqli_query($conn,$secondsql);
if($result){  
while($row=mysqli_fetch_assoc($result)){
$id=$row['sn'];
$name=$row['name'];
echo"The sn value is $id<br>";


}
}else{
    echo"Not good";
}



if($conn){
echo"Database connected successfully";
}else{
    echo"Database not connected successfully.";
}


?>




</body>
</html>