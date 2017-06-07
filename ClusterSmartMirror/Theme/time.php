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
                                    echo "mijn id is " . $id . "en mijn tijdzone is " .$selectedtimezone;
                                }
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Time</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p>
                            <?php
                            $settimezone = mysqli_query($connection, "SELECT time_zone FROM time_zones INNER JOIN time ON time_zones.ID = time.Timezone_ID WHERE time.User_ID = " . $id);
                            while($row = mysqli_fetch_array($settimezone)) {

	                      echo "Your time zone is <b>" .$row['time_zone'] . "</b><br />";

                            }
                            ?>
                            </p></br>
                            <h4><b>Change timezone</b></h4>
                            <p><form method="POST" action="time.php">
                                <input type="text" name="searchtimezone"><br /><br />
                                <input type="submit" name="submitsearch" value="Search timezones"><br /><br /></form>
                            </p>
                            <p>
                                <?php
                                    if (isset($_POST['submitsearch']))
                                    {
                                ?>
                            <form method="POST" action="time.php">
                                <select name="timezonesresult">
                                     <?php
                                        
                                    $timezone = mysqli_query($connection, "select * from time_zones where time_zone LIKE '%" . $_POST['searchtimezone'] . "%'" );
    
                                    while($row = mysqli_fetch_array($timezone)) {

                                        echo "<option value='". $row['ID'] ."'>". $row['time_zone'] ."</option>";
                                    
                                    }
                                    
                                    ?>
                                </select>
                                <input type="submit" name="updatetimezone" value="Change timezone"></form>
                                <?php
                                    }
                                ?>
                            </p>
                              
                        <p><img src="assets/img/timezones.jpg" alt="timezones" style="width:100%;height:25%;"></p>
</html>
        
<?php

    include ('footer.php');
}
?>
