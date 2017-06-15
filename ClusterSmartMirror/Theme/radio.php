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
   
    if (isset($_POST['updateradio'])) 
    {
        $selectedradio = $_POST['channels'];
        $updatefavorite = mysqli_query($connection, "UPDATE radio_fav c set User_ID = ". $id. ", Channel_ID = ". $selectedradio);
    }
    
?>

<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1><i class="fa fa-angle-right"></i> Radio</h1>
                <p>
                    <?php
                         
                    $favoriteradio = mysqli_query($connection, "SELECT Name FROM channel INNER JOIN radio_fav ON channel.ID = radio_fav.Channel_ID WHERE radio_fav.User_ID =" . $id);
                    while($row = mysqli_fetch_array($favoriteradio))
                    {
                        echo "<p>Your favorite radio station is <b>" .$row['Name'] . "</b></p>";
                    }
                     
                    ?>
                </p>           
          	<div class="row mt">
          		<div class="col-lg-12"> 
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Change favorite radio station </h4>                         
          		<p><form method="POST" action="radio.php">
                                <select class="form-control" name="channels">
                                    
                                    <?php 
                                        
                                    $channels = mysqli_query($connection, "select * from channel");
    
                                    while($row = mysqli_fetch_array($channels))
                                    {
                                        echo "<option value='". $row['ID'] ."'>". $row['Name'] ."</option>";
                                    }
                                    
                                    ?>
                                    
                                </select><br /><br />
                                <input class="btn btn-theme" type="submit" name="updateradio" value="Change favorite">
                        </p>
                        </div>
</html>
        
<?php

    include ('footer.php');
    
}

