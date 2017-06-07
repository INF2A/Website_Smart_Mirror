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
          	<h3><i class="fa fa-angle-right"></i> Radio</h3>
          	<div class="row mt">
          		<div class="col-lg-12"> 
                        <p><?php
                            $favoriteradio = mysqli_query($connection, "SELECT Name FROM channel INNER JOIN radio_fav ON channel.ID = radio_fav.Channel_ID WHERE radio_fav.User_ID =" . $id);
                            while($row = mysqli_fetch_array($favoriteradio)) {

	                      echo "Your favorite radio station is <b>" .$row['Name'] . "</b><br />";

                            }
                        ?>
                        </p>
          		<p><form method="POST" action="radio.php">
                                <select name="channels">
                                    <?php 
                                        
                                    $channels = mysqli_query($connection, "select * from channel");
    
                                    while($row = mysqli_fetch_array($channels)) {

                                        echo "<option value='". $row['ID'] ."'>". $row['Name'] ."</option>";
                                    
                                    }
                                    ?>
                                </select><br /><br />
                                <input type="submit" name="updateradio" value="Change favorite">
                        </p>
</html>
        
<?php

    include ('footer.php');
}

