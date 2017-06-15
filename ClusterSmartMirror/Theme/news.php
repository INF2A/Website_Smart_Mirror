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
    
    if(isset($_POST['safenews']))
        {
            $news = $_POST['news'];
            $deletesettings = mysqli_query($connection, "DELETE FROM `news_pref` WHERE `User_ID`= ". $id);
            foreach ($news as $sources)
            {
                $updatetimezone = mysqli_query($connection, "INSERT INTO `news_pref`(`User_ID`, `News_pref_item_ID`) VALUES (". $id .", ". $sources.")");
            }
        }
?>
<html>
    <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1><i class="fa fa-angle-right"></i> News</h1><br />
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i> Your favorite news sources </h4>
                <p>
                    <select multiple class="form-control">
                    <?php
                            
                        $selectednews = mysqli_query($connection, "SELECT Name FROM news_pref_item INNER JOIN news_pref ON news_pref_item.ID = news_pref.News_pref_item_ID WHERE news_pref.User_ID =" . $id);
                        while($row = mysqli_fetch_array($selectednews)) 
                        {
                            echo "<option>" .$row['Name'] . "</option>";
                        }
                         
                    ?>
                    </select>    
                </p>
                </div>
          	<div class="row mt">
          		<div class="col-lg-12">
                            <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Select your favorite news sources </h4>
                            <p>                               
                            <form method="POST" action="news.php">
                                
                                <?php 
                                                                                                             
                                $getnewssource = mysqli_query($connection, "SELECT * FROM news_pref_item");
                                $counter = 1;
                                while($row = mysqli_fetch_array($getnewssource)) 
                                {
                                    echo " <input type='checkbox' name='news[]' value='".$counter. "'>&nbsp". $row['Name']. "<br>";
                                    $counter ++;
                                }
                                ?>
                                
                            <br><input class="btn btn-theme" type="submit" name="safenews" value="Safe preferences">
                            </p>
                            </div>
</html>
        
<?php
                                
    include ('footer.php');
}
?>
