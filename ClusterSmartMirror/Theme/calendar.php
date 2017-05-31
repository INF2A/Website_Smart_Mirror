<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "calendar";
    include ('layout.php');
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Calendar</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p><iframe src="https://calendar.google.com/calendar/embed?src=eba68j19su3eqrpphoueg07j0c%40group.calendar.google.com&ctz=Europe/Amsterdam" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe></p>
</html>
        
<?php

    include ('footer.php');
}
?>
