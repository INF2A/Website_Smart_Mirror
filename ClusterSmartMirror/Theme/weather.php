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
        $countries = file_get_contents('https://api.vk.com/method/database.getCountries?need_all=1&count=1000&lang=en');
        $countryarr = json_decode($countries, true);
        foreach ($countryarr['response'] as $country) 
        {
            if (mb_strtolower($country['title']) === mb_strtolower($land))
            {
                $cities = file_get_contents('https://raw.githubusercontent.com/David-Haim/CountriesToCitiesJSON/master/countriesToCities.json');
                $cityarr = json_decode($cities, true);

                foreach ($cityarr[$land] as $stad) 
                {   
                    if (mb_strtolower($stad) === mb_strtolower($city))
                    {
                        return true;
                    }
                }
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
                    
                    if (isset($_POST['changelocation']))
                    {
                        $locationland = $_POST['locationland'];
                        $locationcountry = $_POST['locationcity'];
                        $system = $_POST['prefsystem'];
                        $check = checkCityOrCountry($locationland, $locationcountry);
                        if ($check == true)
                        {
                            echo "Your changes have been saved";
                            $updatetimezone = mysqli_query($connection, "UPDATE weather SET User_ID = ". $id. ", location = '". $locationcountry. "', Weather_pref_ID = ". $system);
                        }
                        else
                        {
                            echo "<p style ='font-size:18px;'><b>The country or City you entered doesn't exist in our API</b></p>";
                        }
                    }
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
                            <h4><i class="fa fa-angle-right"></i> Change location and prefered system </h4><br />
                            <p>
                            <form method="POST" action="weathertest.php">
                                <p> <div class='form-group'>
                                        <label class='col-sm-2 col-sm-2 control-label'>Country: </label>
                                        <div class='col-sm-10'>
                                            <input class="form-control" type="text" name="locationland"></p>
                                        </div>
                                    </div>    
                                <p>
                                <p> <div class='form-group'>
                                        <label class='col-sm-2 col-sm-2 control-label'>City: </label>
                                        <div class='col-sm-10'>
                                            <input class="form-control" type="text" name="locationcity"></p>
                                        </div>
                                    </div>    
                                <p>
                                        <input type="radio" name="prefsystem" value="1" checked> Metric
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
