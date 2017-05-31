<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "weather";
    include ('layout.php');
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Weather</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p>Place your content here.</p>
</html>
        
<?php

    include ('footer.php');
}
?>
