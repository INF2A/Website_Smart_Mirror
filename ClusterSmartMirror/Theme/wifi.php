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
    include ('database.php');
    
    if(isset($_POST['changewifi']))
    {
        $ssid = $_POST['ssid'];
        $ssidpassword = $_POST['ssidpassword'];
        $updatewifi = mysqli_query($connection, "UPDATE wifi_settings set User_ID = ". $id. ", ssid = '". $ssid. "', password = '".$ssidpassword."'");
    }
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> WiFi settings</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <h4><b>Change WIFI settings</b></h4>
                            <p>
                            <form method="POST" action="wifi.php">
                                <?php
                                    
                                    $getwifisettings = mysqli_query($connection, "SELECT * FROM wifi_settings WHERE User_ID = " . $id);
                                    while($row = mysqli_fetch_array($getwifisettings)) {

                                         echo "<p>SSID:<input type='text' name='ssid' value='" .$row['ssid'] . "'></p>";
                                         echo "<p>Password: <input type='text' name='ssidpassword' value='" .$row['password'] . "'></p>";

                                    }
                                
                                ?>
                                <p><input type="submit" name="changewifi" value="Safe changes"></p>
                            </form>
                            </p>
</html>
        
<?php

    include ('footer.php');
}
?>
