<?php
require('backend/database.php');

if(isset($_GET['category']))
{
$get = $_GET['category'];
if($get == "all")
{
    $query = "SELECT * FROM questions ORDER BY id DESC";

}
elseif($get == "technology")
{
    $where = "Technology";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "health")
{
    $where = "Health and Sciences";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "sports")
{
    $where = "Sports and Life style";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "curiosity")
{
    $where = "Curiosity";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "society")
{
    $where = "Society";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "relation")
{
    $where = "RelationShip";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
elseif($get == "other")
{
    $where = "Other";
    $query = "SELECT * FROM questions WHERE category = '$where' ORDER BY id DESC";

}
else
{
    $query = "SELECT * FROM questions ORDER BY id DESC";

}

}

else {
    $query = "SELECT * FROM questions ORDER BY id DESC";

}



$result = $mysqli->query($query);


    while ($row = $result->fetch_array()) {

        $unique_id = $row["unique_id"];
        $question_id = $row["id"];
        $question = $row["question"];
        $author = $row["author"];
        $date = $row["date"];
        $anonymous = $row["anonymous"];
        $category = $row['category'];
        $unique_id = $row['unique_id'];
        $query = "SELECT * FROM accounts where `username` = '$author'";

        if ($res = $mysqli->query($query)) {
            $row2 = $res->fetch_row();
            $picture =  $row2[6];
            if ($anonymous == "yes") {
                $picture = "images/avatar.png";
                $author = "Anonymous";
            }
        } else {
            $picture = "images/avatar.png";
        }





        
        $quer = "SELECT * FROM answers where `unique_id` = '$unique_id' ORDER BY id DESC";
        $res2 = $mysqli->query($quer);
      
        if ($row3 = $res2->fetch_assoc()) {

            
        
            $comment = $row3['answer'];
            $date2 = $row3['date'];

            $once = $row3['author'];
            $picture2 = "images/avatar.png";
            if($once == "Anonymous")

            {
                
                $commenter = "Anonymous"; 
                $picture2 = "images/avatar.png";

            }

            else{
                $q = "SELECT * FROM accounts where `username` = '$once'";
                
                if ($resu = $mysqli->query($q)) {
                   
                    $row4 = $resu->fetch_row();
                    $picture2 =  $row4[6];
            
                } else {

                    $picture2 = "images/avatar.png";
                }
                $commenter = $once; 
            }


       
        } else {


           $commenter = "No comments";
           $comment = "Be the first to comment.";
           
            $picture2 = "images/avatar.png";

        }
         

?>

<div class="card mt-3" style="background-color:#dfdfdf;">

<div class="card-body ">
    <div class="card">

        <div class="card-body">
            <div class="media">
                <img src="<?php echo $picture ?>" class="mr-3" style="width:50px; border-radius:50%; height:50px;"  >
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $author ?></h5>
                    <a style="color:blue;">#<?php echo $category ?></a>
                        
                        <br>

                        <?php echo $question ?>
                    </div>
            </div>

            
        </div>
        
    </div>

    <form action="post-question.php" method="POST">
    <div class="form-group mt-2">
        <label for="exampleFormControlTextarea1"> <b>Post a comment</b> </label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>

        <img src="<?php echo $_SESSION['picture'] ?>" class="mt-2 mr-1" style="width:50px; border-radius:50%; height:50px;" class="mr-3" alt="...">
        <input type="text" hidden name="unique_id" value="<?php echo $unique_id ?>">
        <input type="text" hidden name="question" value="<?php echo $question ?>">
        <div class=" btn-group mt-2 ">
            <select id="inputState" required name="commenter" type="button" class="btn btn-danger dropdown-toggle">
                <option value="" selected>Comment as</option>
                <option value="<?php echo $_SESSION['username'] ?>">My self</option>
                <option value="Anonymous">Stay Anonymous </option>
            </select>
        </div>
        <button type="submit" name="comment_button" class="btn btn-info mt-2 ml-6 ">Publish</button>

    </div>
</form>

    <hr>

             <div class="media">
                <img src="<?php echo $picture2 ?> " class="mr-3" style="width:50px; border-radius:50%; height:50px;" >
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $commenter ?></h5>
                    <?php echo $comment ?>                    
                </div>
            </div>

</div>
<div class="card-footer text-muted">
 <?php echo $date ?> <a href="question-detail.php?$question_id=<?php echo $question_id ?>" style="text-decoration:none;" class="ml-2" >See more</a>

</div>

</div>



<?php
    }



$mysqli->close();
?>