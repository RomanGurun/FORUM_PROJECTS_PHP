<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
  <?php
  include 'partials/_header.php';
  ?>
  <?php include 'partials/_dbconnect.php'; ?>
  <!-- slider starts here -->

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https:source.unsplash.com/2400x700/?apple,code" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https:source.unsplash.com/2400x700/?programmer,microsoft" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https:source.unsplash.com/2400x700/?coding,apple" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Category container starts here -->
<div class="container my-3">
<h2 class="text-center my-3">iDiscuss - Categories</h2>
<div class="row ms-5">
<!-- Fetch all the categories and use a  loop to iterate through categories -->

<?php 
$sql="SELECT * FROM `categories`"; 
$result=mysqli_query($conn ,$sql);

while($row=mysqli_fetch_assoc($result)){
// echo $row['category_id'];
$id=$row['category_id'];
$cat=$row['category_name'];
$desc=$row['category_description'];

echo '
<div class="col-md-4 my-2">
<div class="card my-2" style="width: 18rem;">
  <img src="https://source.unsplash.com/400x300/?'.$cat.',coding" class="card-img-top" alt="...">
  <div class="card my-2-body">
    <h5 class="card-title "><a href="threadlist.php?catid='.$id. ' ">'.$cat.'</a></h5>
    <p class="card-text">'.substr($desc,0,90).'......</p>
 <a href="threadlist.php?catid='.$id.'"class="btn btn-primary">View Threads </a>
    </div>
</div>
</div>';

}

?>





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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>