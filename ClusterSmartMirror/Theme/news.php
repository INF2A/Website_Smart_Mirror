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
    include ('database.php');
    
    if (isset($_POST['selectnews']))
    {
        $selectednews = $_POST['newssubject'];
        $updatenews = mysqli_query($connection, "UPDATE news_pref set User_ID = ". $id. ", News_pref_item_ID = ". $selectednews);
    }
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> News</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <p><form method="POST" action="news.php">
                                <select name="newssource">
                                    <?php 
                                        
                                    $getnewssource = mysqli_query($connection, "SELECT DISTINCT SUBSTRING_INDEX(Name, ' ', 1) as Name FROM news_pref_item");
    
                                    while($row = mysqli_fetch_array($getnewssource)) {

                                        echo "<option value='". $row['Name'] ."'>". $row['Name'] ."</option>";
                                    
                                    }
                                    ?>
                                </select><br /><br />
                                <input type="submit" name="searchnews" value="Show subsites">
                            </p><br />
                            <?php 
                            
                                if(isset($_POST['searchnews']))
                                {
                            ?>
                            
                            <p><form method="POST" action="news.php">
                                 <select name="newssubject">
                                    <?php 
                                    $newssource = $_POST['newssource'];
                                    $getnewssubject = mysqli_query($connection, "SELECT * FROM news_pref_item WHERE Name LIKE '%" .$newssource. "%'");
    
                                    while($row = mysqli_fetch_array($getnewssubject)) {

                                        echo "<option value='". $row['ID'] ."'>". $row['Name'] ."</option>";
                                    
                                    }
                                    ?>
                                </select><br /><br />
                                <input type="submit" name="selectnews" value="Select site">
                            
                            <?php
                                }
                            
                            ?>
</html>
        
<?php

    include ('footer.php');
}
?>
