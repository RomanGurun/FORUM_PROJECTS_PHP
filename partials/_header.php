


<?php

echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>

        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </li>

        <li class="nav-item">
        <a class="nav-link" href="contact.php" >Contact</a>
        </li>
    </ul>
  
<form class="form-inline  my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>
        
    </form>

</div>
</div>
</nav>';


include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

// ============================================signupsuccess inside get request is a parameter =======================================================
// buit little confuse lagyoooooo
// =================================yesto rayxa url of header function ko as a parameter ============================================
//================================= get lya catch garxa rayxa =============================================================================

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){

    // echo"yes";

   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You can now login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>