<?php
// $showError=false;///value should be in a string
$showError="false";

// string value set in a 2 line

if($_SERVER["REQUEST_METHOD"]=="POST"){

    
include '_dbconnect.php';
$user_email=$_POST['signupEmail'];
$pass=$_POST['signupPassword'];
$cpass=$_POST['signupcPassword'];


// check whether this email exists
$existSql="select * from `users` where user_email='$user_email'";
$result=mysqli_query($conn,$existSql);
$numRows=mysqli_num_rows($result);
// check this 12 line code in chrome
if($numRows>0){
    // I think it signify that if same row value is more than 1.It checks duplicate rows
$showError="Email is already in use";

echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Error!</strong> Email is alrady in use.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
exit();



}else{
    if($pass==$cpass){
// hashing concepts reused

        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_email`,`user_pass`,`timestamp`) VALUES('$user_email','$hash',current_timestamp())";
$result=mysqli_query($conn,$sql);
// argument rakhda khayal gara
// echo $result;

if($result){
$showAlert=true;
header("Location: /forum/index.php?signupsuccess=true");
// ? paxi message in url ho in php can be written in html as well 

exit();
// break jastai ho

}

    }else{
        $showError="Passwords donot match";
    //password match ngare redirect gareko ramro ho  
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong>'.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
exit();

    }



}
header("Location: /forum/index.php?signupsuccess=false&error=$showError"); 
// $showError value should be in string to shpw in a url
// header("Location: /forum/index.php?milenajaaauboldina");


}

?>