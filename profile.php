<?php
session_start();
?>
<head>
<title>Login with Facebook in PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>     
<?php if($_SESSION['fb_id']) {?>
<div class = "container">

<div class="row">

<div class="col-xl-12">
<h1>Hello <?php echo $_SESSION['fb_name']; ?></h1>
</div>

<div class="col-xl-4">
<div class="card">
 <?php echo $_SESSION['fb_pic']?>
  <div class="card-body">
    <h4 class="card-title"><?php echo $_SESSION['fb_name']; ?></h4>
    <p class="card-text"><?php echo  $_SESSION['fb_id']; ?></p>
	    <p class="card-text"><?php echo $_SESSION['fb_email']; ?></p>
    <a href="logout.php" class="btn btn-primary">Logout</a>
  </div>
</div>
</div>
</div>




<?php } ?>



</body>
</html>