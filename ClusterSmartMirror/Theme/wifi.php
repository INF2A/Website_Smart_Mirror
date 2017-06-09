<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "wifi";
    include ('layout.php');
    include ('database.php')
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> WiFi settings</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p>
                            <form method="POST" action="wifi.php">
                                <?php
                                    
                                    $getwifisettings = mysqli_query($connection, "SELECT * FROM wifi_settings WHERE User_ID = " . $id);
                                    while($row = mysqli_fetch_array($getwifisettings)) {

                                         echo "SSID:<input type='text' name='ssid' value='" .$row['ssid'] . "'><br /><br />";
                                         echo "Password: <input type='text' name='password' value='" .$row['password'] . "'><br />";

                                    }
                                
                                ?>
                            </form>
                            </p>
</html>
        
<?php

    include ('footer.php');
}
?>
