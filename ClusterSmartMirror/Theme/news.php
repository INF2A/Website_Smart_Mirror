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
        $preferednews = $_POST['newssubject'];
        $updatenews = mysqli_query($connection, "UPDATE news_pref set User_ID = ". $id. ", News_pref_item_ID = ". $preferednews);
    }
    ?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> News</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <h4><b>Change news settings</b></h4>
                            <p>
                            <?php
                            
                            $selectednews = mysqli_query($connection, "SELECT Name FROM news_pref_item INNER JOIN news_pref ON news_pref_item.ID = news_pref.News_pref_item_ID WHERE news_pref.User_ID =" . $id);
                                    while($row = mysqli_fetch_array($selectednews)) {

                                        echo "<p>Your prefered news source is <b>" .$row['Name'] . "</b></p>";

                                    }

                            ?>
                            <form method="POST" action="news.php">
                                    <?php 
                                                                                                             
                                    $getnewssource = mysqli_query($connection, "SELECT * FROM news_pref_item");
                                    $counter = 1;
                                    while($row = mysqli_fetch_array($getnewssource)) {

                                        echo $row['Name'];
                                        echo " <input type='radio' name='". $counter. "' value='true'>";
                                        echo " <input type='radio' name='". $counter. "' value='false'><br>";
                                        $counter ++;
                                    
                                    }
                                    ?>
                                <input type="submit" name="safenews" value="Safe">
                            </p><br />
                            <?php 
                            
                                if(isset($_POST['safenews']))
                                {
                                    for($count = 1; $count < $counter; $count++)
                                    {
                                        $value = 1;
                                        if($_POST["{$count}"] == 'true')
                                        {
                                            echo "Het werkt<br>";
                                        }
                                        else
                                        {
                                            echo "Het werkt goed<br>";
                                        }
                                        $value ++;
                                    }
                                }
                            ?>
</html>
        
<?php

    include ('footer.php');
}
?>
