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
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Time</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p><form method="POST" action="time.php">
                                <input type="text" name="searchtimezone"><br />
                                <input type="submit" name="submitsearch" value="Search timezones"><br />
                            </p>
                            <p>
                                <?php
                                    if (isset($_POST['submitsearch']))
                                    {
                                ?>
                                <select name="timezonesresult">
                                     <?php
                                        
                                    $timezones = mysqli_query($connection, "select * from time_zones where time_zone LIKE '%" . $_POST['searchtimezone'] . "%'" );
    
                                    while($row = mysqli_fetch_array($timezones)) {

                                        echo "<option value='". $row['ID'] ."'>". $row['time_zone'] ."</option>";
                                    
                                    }
                                    }
                                    ?>
                                </select>
                            </p>
                                
                              
                        <p><img src="assets/img/timezones.jpg" alt="timezones" style="width:100%;height:25%;"></p>
</html>
        
<?php

    include ('footer.php');
}
?>
