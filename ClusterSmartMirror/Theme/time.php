<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "Time";
    include ('layout.php');
    include ('database.php');
    
    if (isset($_POST['updatetimezone']))
        {
            $selectedtimezone = $_POST['timezonesresult'];
            $updatetimezone = mysqli_query($connection, "UPDATE time set User_ID = ". $id. ", Timezone_ID = ". $selectedtimezone);
        }
?>

<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1><i class="fa fa-angle-right"></i> Time</h1>
                <p>
                    <?php
                            
                            $selecttimezone = mysqli_query($connection, "SELECT time_zone FROM time_zones INNER JOIN time ON time_zones.ID = time.Timezone_ID WHERE time.User_ID = " . $id);
                            while($row = mysqli_fetch_array($selecttimezone))
                            {
                                echo "Your selected time zone is <b>" .$row['time_zone'] . "</b><br />";
                            }
                            
                    ?>
                </p>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Search your time zone </h4>
                            <p>
                                <form method="POST" action="time.php">
                                <input class="form-control" type="text" name="searchtimezone"><br />
                                <input class="btn btn-theme" type="submit" name="submitsearch" value="Search timezones"><br /><br /></form>
                            </p>
                            <p>
                                
                                <?php
                                    if (isset($_POST['submitsearch']))
                                    {
                                ?>
                            </div><br />
                            <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Select your time zone from the list below </h4><br />
                            <form method="POST" action="time.php">
                                <select class="form-control" name="timezonesresult">
                                    
                                     <?php
                                        
                                    $timezone = mysqli_query($connection, "select * from time_zones where time_zone LIKE '%" . $_POST['searchtimezone'] . "%'" );
    
                                    while($row = mysqli_fetch_array($timezone))
                                    {
                                        echo "<option value='". $row['ID'] ."'>". $row['time_zone'] ."</option>";                                  
                                    }
                                    
                                    ?>
                                    
                                </select></p><br />
                                <p><input class="btn btn-theme" type="submit" name="updatetimezone" value="Change timezone"></form></p>
                            
                                <?php
                                
                                    }
                                    
                                ?>
                            </div>
</html>
        
<?php

    include ('footer.php');
}
?>
