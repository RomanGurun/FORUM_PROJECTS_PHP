<!-- QUERY SADHAI SERVER REQUEST METHOD BY DEFAULT GET HUNXA HO.......... -->

<!-- URL ma ? use garea category id add garinxa -->
<!-- we import row of table in php by using row variable and idvariable as well in below... -->
<!-- <php $_SERVER['REQUEST_URI'] > we use this to action to submit on same page and sent
    categorry id as well on website...-->
<!-- Hence request uri sent a full url that we have written and we have written ?phpcatid as well -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    #ques {
        /* min-height: 733px; */
    }
    </style>


</head>

<body>
<!-- get catid rewite same primary key several times how how... -->
<!-- i think its not a primary key beacuse category id is not a primary key..... -->
    <?php
  include 'partials/_header.php';
  ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
$id=$_GET['catid'];
$sql="SELECT * FROM `categories`WHERE category_id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){

$catname =$row['category_name'];
$catdesc=$row['category_description'];

}
?>
    <?php
    $showAlert=false;
$method=$_SERVER['REQUEST_METHOD'];
echo $method;
if($method=='POST'){
// Insert into thread into db
// POST KO ANDAR[] we write a form tag element name value......

// Thread_id is not primary key but it takes value of a id=categoryid
$showAlert=true;

$th_title=$_POST['title'];
$th_desc=$_POST['desc'];
$sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp());";

$result=mysqli_query($conn,$sql);
if($showAlert){

  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

// After we insert into thread table then immediately a question or thread is printed on a website.

}
?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;?>forums</h1>
            <p class="lead"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>This is a perr to peer.
                No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.

            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
<!-- I am a form who gives post action ma data -->
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php

// This php mainly focus on threads table.here fetching of threads table 
// is done.........
// also when click to thread browse questions anchor table is helping to move in a thread.php



$id=$_GET['catid'];
$sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
$result=mysqli_query($conn,$sql);
$noResult=true;
while($row=mysqli_fetch_assoc($result)){
$id=$row['thread_id'];
$noResult=false;
// thread id is 11111 only lai focus xa so browse question is of foreign key only.......
$title =$row['thread_title'];
$desc=$row['thread_desc'];
// comment of h5 inside echo.....
// ============================== Important Comments ===============================================
// here html threadid = dollar id xa. when we uses get[thread_id] then we will get a dollar id value of thread table.
echo'<div class="media my-3">
  <img class="mr-3" src="./partials/download.jpg" width="54px" alt="Generic placeholder image">
  <div class="media-body">

    <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
    '.$desc.'
  </div>
</div>';

}

// echo noResult is typed to show a boolean value to show true or false conditions.
// echo var_dump($noResult);
if($noResult){

echo '<div class="jumbotron jumbotron-fluid">
<div class="container">
  <h1 class="display-4">No Threads Found</h1>
  <p class="lead">Be the first person to ask a question.</p>
</div>
</div>';
}


?>


        <!-- Remove later putting this just to check html alignments for now -->

        <!-- <div class="media my-3">
  <img class="mr-3" src="./partials/download.jpg" width="54px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Unable to install pyaudio error in Windows</h5>
    Cras  sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>  
</div> -->





        <?php
include 'partials/_footer.php';
?>

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script> -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>

</body>

</html>