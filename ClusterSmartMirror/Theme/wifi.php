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
          	<h1><i class="fa fa-angle-right"></i> WiFi settings</h1>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <div class="form-panel">
                                <h4><i class="fa fa-angle-right"></i> Change WIFI settings </h4><br>
                            <p>
                            <form method="POST" action="wifi.php">
                                
                            <?php
                                    
                            $getwifisettings = mysqli_query($connection, "SELECT * FROM wifi_settings WHERE User_ID = " . $id);
                            while($row = mysqli_fetch_array($getwifisettings))
                            {
                                echo "<p><div class='form-group'>
                                            <label class='col-sm-2 col-sm-2 control-label'>SSID</label>
                                            <div class='col-sm-10'>
                                                <input type='text' name='ssid' class='form-control' value='" .$row['ssid'] . "'></p>
                                            </div>";
                                echo "<p><div class='form-group'>
                                            <label class='col-sm-2 col-sm-2 control-label'>Password</label>
                                            <div class='col-sm-10'>
                                                <input type='text'  name='ssidpassword' class='form-control' value='" .$row['password'] . "'></p>
                                            </div>";
                            }
                                
                            ?>
                                
                                <p><input class="btn btn-theme" type="submit" name="changewifi" value="Safe changes"></p>
                            </form>
                            </p>
                            </div>
</html>
        
<?php

    include ('footer.php');
}

?>
