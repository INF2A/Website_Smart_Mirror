<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "radio";
    include ('layout.php');
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Radio</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <form class="form-login" method="POST" action="radio.php">
                                <select>
                                    <option value="Radio538">Radio 538</option>
                                    <option value="SlamFM">Slam Fm</option>
                                    <option value="Veronica">Veronica</option>
                                    <option value="QMusic">QMusic</option>
                                    <option value="SkyRadio">Skyradio</option>
                                    <option value="Radio2">Radio 2</option>
                                </select>
          		<p>Place your content here.</p>
</html>
        
<?php

    include ('footer.php');
}
?>
