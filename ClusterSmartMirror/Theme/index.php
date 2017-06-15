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
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Your settings</h4>
                            <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> Api</th>
                                        <th><i class="fa fa-question-circle"></i> Settings</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="time.php">Time</a></td>
                                        <td>
                                        
                                            <?php
                                      
                                            $selectedtimezone = mysqli_query($connection, "SELECT time_zone FROM time_zones INNER JOIN time ON time_zones.ID = time.Timezone_ID WHERE time.User_ID = " . $id);
                                            while($row = mysqli_fetch_array($selectedtimezone))
                                            {
                                                echo $row['time_zone'];
                                            }
                                      
                                            ?>
                                      
                                        </td>
                                        <td>
                                            <a href="time.php"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="weather.php">Weather</a></td>
                                        <td>
                                            
                                            <?php
                                      
                                            $selectedmetric = mysqli_query($connection, "SELECT Name FROM weather_pref INNER JOIN weather ON weather_pref.ID = weather.Weather_pref_ID WHERE weather.User_ID =" . $id);
                                            while($row = mysqli_fetch_array($selectedmetric))
                                            {
                                                echo "System: ".$row['Name'];
                                            }
                            
                                            $selectedlocation = mysqli_query($connection, "SELECT location FROM weather WHERE User_ID =" .$id);
                                            while($row = mysqli_fetch_array($selectedlocation))
                                            {
                                                echo "<br>Location: ".$row['location'];
                                            }
                                      
                                            ?>
                                      
                                        </td>
                                        <td>
                                            <a href="weather.php"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="news.php">News</a></td>
                                        <td>
                                            
                                            <?php
                                      
                                                $selectednews = mysqli_query($connection, "SELECT Name FROM news_pref_item INNER JOIN news_pref ON news_pref_item.ID = news_pref.News_pref_item_ID WHERE news_pref.User_ID =" . $id);
                                                while($row = mysqli_fetch_array($selectednews))
                                                {
                                                    echo $row['Name'] ."<br>";
                                                }
                                      
                                            ?>
                                      
                                        </td>
                                        <td>
                                            <a href="news.php"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="radio.php">Radio</a></td>
                                        <td>
                                        
                                            <?php
                                      
                                            $selectedradio = mysqli_query($connection, "SELECT Name FROM channel INNER JOIN radio_fav ON channel.ID = radio_fav.Channel_ID WHERE radio_fav.User_ID =" . $id);
                                            while($row = mysqli_fetch_array($selectedradio))
                                            {
                        	                echo $row['Name'];
                                            }
                                      
                                            ?>
                                      
                                        </td>
                                        <td>
                                            <a href="radio.php.php"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="wifi.php">Wifi</a></td>
                                        <td>
                                            
                                            <?php
                                      
                                            $selectedwifi = mysqli_query($connection, "SELECT * FROM wifi_settings WHERE User_ID =" . $id);
                                            while($row = mysqli_fetch_array($selectedwifi))
                                            {
                                                echo "SSID: <b>".$row['ssid'] . "</b><br> Password: <b>" .$row['password']."</b>";
                                            }
                                      
                                            ?>
                                      
                                        </td>
                                        <td>
                                            <a href="wifi.php"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
</html>
        
<?php

include ('footer.php');
    
}

?>
