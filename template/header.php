<?php
  if(isset($_SESSION['loggedin'])){
    $status="Logged In";
    $class="disabled";
  }else{
    $status="Login";
    $class="";
  }
?>
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">CS 2033: Web Systems MVC Pattern with Authorization</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="controller.php?page=home">Home</a>
    <a class="p-2 text-dark" href="controller.php?page=about">About</a>
    <a class="p-2 text-dark" href="controller.php?page=list">Admin</a>
  </nav>

  <a class="btn btn-outline-primary <?php echo $class; ?>" href="controller.php?page=login"><?php echo $status; ?></a>
</header>