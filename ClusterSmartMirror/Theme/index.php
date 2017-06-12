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
          	<h1><i class="fa fa-angle-right"></i> Welcome </h1>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p></p>
                        <?php              
                                                        
                            $selectedtimezone = mysqli_query($connection, "SELECT time_zone FROM time_zones INNER JOIN time ON time_zones.ID = time.Timezone_ID WHERE time.User_ID = " . $id);
                            while($row = mysqli_fetch_array($selectedtimezone)) {

	                      echo "<p>Your time zone is <b>" .$row['time_zone'] . "</b></p>";

                            }
                            
                            $selectedmetric = mysqli_query($connection, "SELECT Name FROM weather_pref INNER JOIN weather ON weather_pref.ID = weather.Weather_pref_ID WHERE weather.User_ID =" . $id);
                            while($row = mysqli_fetch_array($selectedmetric)) {

	                      echo "<p>Your prefered system for measuring temperature is <b>" .$row['Name'] . "</b>";

                            }
                            
                            $selectedlocation = mysqli_query($connection, "SELECT location FROM weather WHERE User_ID =" .$id);
                            while($row = mysqli_fetch_array($selectedlocation)) {

	                      echo " and your location is <b>" .$row['location'] . "</b></p>";

                            }
                            
                            $selectednews = mysqli_query($connection, "SELECT Name FROM news_pref_item INNER JOIN news_pref ON news_pref_item.ID = news_pref.News_pref_item_ID WHERE news_pref.User_ID =" . $id);
                            while($row = mysqli_fetch_array($selectednews)) {

	                      echo "<p>Your prefered news source is <b>" .$row['Name'] . "</b></p>";

                            }
                            
                            $selectedradio = mysqli_query($connection, "SELECT Name FROM channel INNER JOIN radio_fav ON channel.ID = radio_fav.Channel_ID WHERE radio_fav.User_ID =" . $id);
                            while($row = mysqli_fetch_array($selectedradio)) {

	                      echo "<p>Your favorite radio station is <b>" .$row['Name'] . "</b></p>";

                            }
                            
                            $selectedwifi = mysqli_query($connection, "SELECT * FROM wifi_settings WHERE User_ID =" . $id);
                            while($row = mysqli_fetch_array($selectedwifi)) {

	                      echo "<p>Your SSID is <b>" .$row['ssid'] . "</b> and your Password is <b>" .$row['password'] ."</b></p>";

                            }
                            
                        
                        
                        ?>
</html>
        
<?php

    include ('footer.php');
}
?>
