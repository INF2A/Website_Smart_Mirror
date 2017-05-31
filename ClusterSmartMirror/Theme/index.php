<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "index";
    include ('layout.php');
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1><i class="fa fa-angle-right"></i> Welkom <?php echo $login_session; ?></h1>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p></p>
</html>
        
<?php

    include ('footer.php');
}
?>
