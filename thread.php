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
    .bold{
        font-weight:bold;
    }

    </style>


</head>

<body>
    <?php
  include 'partials/_header.php';
  ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
// this php says i will get threadid 
// i will seect thread_id=clicked thread id

// get threadid little bit confuse xu.....

$id=$_GET['threadid'];
$sql="SELECT * FROM `threads`WHERE thread_id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){

$title =$row['thread_title'];
$desc=$row['thread_desc'];

}
?>

<?php
    $showAlert=false;
$method=$_SERVER['REQUEST_METHOD'];
// echo $method;
if($method=='POST'){
// Insert into commnt db
// POST KO ANDAR[] we write a form tag element name value......

// Thread_id is not primary key but it takes value of a id=categoryid
$showAlert=true;

$th_title=$_POST['comment'];
// $th_desc=$_POST['desc']; 
// $id has a threadid we push it on value as a sql command
$sql="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$th_title', '$id', '0',current_timestamp());";
$result=mysqli_query($conn,$sql);
if($showAlert){

  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Comment has been added!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}


// After we insert into thread table then immediately a question or thread is printed on a website.

}
?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc ?></p>
            <hr class="my-4">
            <p>This is a perr to peer.
                No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.

            </p>
            <p>Posted by : <b>Harry </b></p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <!-- I am a form who gives post action ma data -->
        <!-- same uri ma request pathaunxa -->
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
              
                <label for="exampleFormControlTextarea1">Type your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>


    </div>
    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
         <?php
        //  get ma threadid url get hunxa...........................
$id=$_GET['threadid'];
// ===================================IMPORTANT NOTE=======================================
// it means if thread id = category id then fetch all the row of comments table

$sql="SELECT * FROM `comments` WHERE thread_id=$id";
$result=mysqli_query($conn,$sql);
$noResult=true;
while($row=mysqli_fetch_assoc($result)){
$noResult=false;
  $id=$row['comment_id'];
$content =$row['comment_content'];
$comment_time=$row['comment_time'];

echo'<div class="media my-3">
  <img class="mr-3" src="./partials/download.jpg" width="54px" alt="Generic placeholder image">
  <div class="media-body">

   <p class="font-weight-bold bold">Anonymous Users at '.$comment_time.'</p>
    '.$content.'
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