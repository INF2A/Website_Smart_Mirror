<?php
include('session.php');

if (empty($login_session))
{
    header('Location: login.php');
}
else 
{
    $page = "news";
    include ('layout.php');
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> News</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p><form method="POST" action="news.php">
                                <select name="newssources">
                                    <?php 
                                        
                                    $newssources = mysqli_query($connection, "SELECT DISTINCT SUBSTRING_INDEX(Name, ' ', 1) as Name FROM news_pref_item");
    
                                    while($row = mysqli_fetch_array($newssources)) {

                                        echo "<option value='". $row['Name'] ."'>". $row['Name'] ."</option>";
                                    
                                    }
                                    ?>
                                </select><br /><br />
                                <input type="submit" name="searchnews" value="Show subsites">
                            </p>
</html>
        
<?php

    include ('footer.php');
}
?>
