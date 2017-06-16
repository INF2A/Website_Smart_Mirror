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
    
    function checkCityOrCountry($country, $city)
    {
        $land = ucfirst(strtolower($country));
        $countries = file_get_contents('https://raw.githubusercontent.com/David-Haim/CountriesToCitiesJSON/master/countriesToCities.json');
        $arr = json_decode($countries, true);
        foreach ($arr[$land] as $stad) 
        {
            if (mb_strtolower($stad) === mb_strtolower($city))
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
          	<h1><i class="fa fa-angle-right"></i> Weather</h1>
                <p>
                    <?php
                    $preferedmetric = mysqli_query($connection, "SELECT Name FROM weather_pref INNER JOIN weather ON weather_pref.ID = weather.Weather_pref_ID WHERE weather.User_ID =" . $id);
                    while($row = mysqli_fetch_array($preferedmetric)) 
                    {
                        echo "<p>Your prefered metric is <b>" .$row['Name'] . "</b>";
                    }
                            
                    $selectedlocation = mysqli_query($connection, "SELECT location FROM weather WHERE User_ID =" .$id);
                    while($row = mysqli_fetch_array($selectedlocation)) 
                    {
                        echo " and your location is <b>" .$row['location'] . "</b></p>";
                    }
                    ?>
                            
                </p>
          	<div class="row mt">
          		<div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Change location and prefered system </h4>
                            <?php
                            
                            if (isset($_POST['changelocation']))
                            {
                                $locationland = $_POST['locationland'];
                                $locationcity = $_POST['locationcity'];
                                $system = $_POST['prefsystem'];
                                try
                                {
                                $check = checkCityOrCountry($locationland, $locationcity);
                                if ($check == true)
                                {
                                    echo "het werkt!";
                                    //$updatetimezone = mysqli_query($connection, "UPDATE weather SET User_ID = ". $id. ", location = '". $location. "', Weather_pref_ID = ". $system);
                                }
                                else
                                {
                                    echo "<p>Couldn't save new location, please enter an existing city</p>";
                                }
                                }
                                catch (Exception $e)
                                {
                                    echo "Country doesn't exist";
                                }
                            }
                            
                            ?>
                            <p>
                            <form method="POST" action="weathertest.php">
                                <p><input class="form-control" type="text" name="locationland"></p>
                                <p><input class="form-control" type="text" name="locationcity"></p>
                                    <p><input type="radio" name="prefsystem" value="1" checked> Metric
                                        <input type="radio" name="prefsystem" value="2"> Imperial</p>
                                    <p><input class="btn btn-theme" type="submit" name="changelocation" value="change weather location"></p>
                            </form>
                            </p>
                        </div>
</html>
        
<?php

    include ('footer.php');
}

?>
