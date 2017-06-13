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
    
    function checkCityOrCountry($name)
    {
        $countries = file_get_contents('https://api.vk.com/method/database.getCountries?need_all=1&count=1000&lang=en');
        $arr = json_decode($countries, true);
        foreach ($arr['response'] as $country) {
        if (mb_strtolower($country['title']) === mb_strtolower($name))
        {
            return true;
        }
        }
            return false;
    }
             
    
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Weather</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <h4><b>Change prefered settings</b></h4>
                            <?php
                            
                            if (isset($_POST['changelocation']))
                            {
                            $location = $_POST['weatherlocation'];
                            $system = $_POST['prefsystem'];
                            $check = checkCityOrCountry($location);
                            if ($check == true)
                            {
                                $updatetimezone = mysqli_query($connection, "UPDATE weather SET User_ID = ". $id. ", location = '". $location. "', Weather_pref_ID = ". $system);
                            }
                            else
                            {
                                echo "<p>Couldn't save new location, please enter an existing country</p>";
                            }
                            }
                            
                            $preferedmetric = mysqli_query($connection, "SELECT Name FROM weather_pref INNER JOIN weather ON weather_pref.ID = weather.Weather_pref_ID WHERE weather.User_ID =" . $id);
                            while($row = mysqli_fetch_array($preferedmetric)) {

	                      echo "<p>Your prefered metric is <b>" .$row['Name'] . "</b>";

                            }
                            
                            $selectedlocation = mysqli_query($connection, "SELECT location FROM weather WHERE User_ID =" .$id);
                            while($row = mysqli_fetch_array($selectedlocation)) {

	                      echo " and your location is <b>" .$row['location'] . "</b></p>";

                            }
                            
                            ?>
                            <p>
                            <form method="POST" action="weather.php">
                                <p><input type="text" name="weatherlocation"></p>
                                    <p><input type="radio" name="prefsystem" value="1" checked> Metric
                                        <input type="radio" name="prefsystem" value="2"> Imperial</p>
                                    <p><input type="submit" name="changelocation" value="change weather location"></p>
                            </form>
                            </p>
</html>
        
<?php

    include ('footer.php');
}
?>
