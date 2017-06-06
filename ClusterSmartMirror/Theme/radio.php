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
    include ('database.php');
   
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Radio</h3>
          	<div class="row mt">
          		<div class="col-lg-12">                            
          		<p><form method="POST" action="radio.php">
                                <select>
                                    <?php 
                                        
                                    $query = mysqli_query($connection, "select * from channel");
    
                                    while($row = mysqli_fetch_array($query)) {

                                        echo "<option value='". $row['ID'] ."'>". $row['Name'] ."</option>";
                                    
                                    }
                                    ?>
                                </select></p>
</html>
        
<?php

    include ('footer.php');
}

