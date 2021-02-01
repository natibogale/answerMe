<?php
session_start();
if (isset($_SESSION['username'])) {

    $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $get_id = explode('=', $actual_link);
        

    
} else {
    header("Location:index.php");
}

$question_id = $get_id[1];


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    require('head.php');

    ?>
</head>

<body style="background-color:#0a192f">

    <?php include "nav.php"; ?>


    <div class="container ">



        <?php
        require('backend/database.php');

        $query = "SELECT * FROM questions WHERE id = '$question_id'";

        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();


        $unique_id = $row["unique_id"];

        $question_id = $row["id"];
        $question = $row["question"];
        $author = $row["author"];
        $date = $row["date"];
        $anonymous = $row["anonymous"];
        $category = $row['category'];

        $query = "SELECT * FROM accounts where `username` = '$author'";
        $res = $mysqli->query($query);

        if ($row2 = $res->fetch_array()) {

            $picture =  $row2["profilePicture"];
            if ($anonymous == "yes") {

                $picture = "images/avatar.png";
                $author = "Anonymous";
            }
        } else {


            $picture = "images/avatar.png";
        }

        ?>


        <div class="card mt-3" style="background-color:#fa9048;" >

            <div class="card-body ">
                <div class="card">

                    <div class="card-body">
                        <div class="media">
                            <img src="<?php echo $picture ?>" class="mr-3" style="width:50px; border-radius:50%; height:50px;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo $author ?></h5>
                                <a style="color:blue;">#<?php echo $category ?></a>

                                <br>

                                <?php echo $question ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        $quer = "SELECT * FROM answers where `unique_id` = '$unique_id' ORDER BY id DESC";
        $res2 = $mysqli->query($quer);





        while ($row3 = $res2->fetch_assoc()) {
            $comment = $row3['answer'];

            if ($comment) {


                $comment = $row3['answer'];
                $comment_id = $row3['id'];
                $once = $row3['author'];
                $picture2 = "images/avatar.png";
                $who = $row3['who'];
                if ($once == "Anonymous") {

                    $commenter = "Anonymous";
                    $picture2 = "images/avatar.png";
                } else {
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


            if ($who == $_SESSION['username']) {


        ?>


                <div class="card mt-2">
                    <div class="card-body">
                        <div class="media">
                            <img src="<?php echo $picture2 ?> " class="mr-3" style="width:50px; border-radius:50%; height:50px;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo $commenter ?></h5>
                                <?php echo $comment ?>
                            </div>
                        </div>

                    </div>

                </div>
                <a href="backend/delete-comment.php?id=<?php echo $row3['id']; ?>&q_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                    <span class="fa fa-trash">
                    </span> Delete</a>
            <?php
            } else {
            ?>

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="media">
                            <img src="<?php echo $picture2 ?> " class="mr-3" style="width:50px; border-radius:50%; height:50px;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo $commenter ?></h5>
                                <?php echo $comment ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            }

            ?>



        <?php

        }

        ?>


        <form action="post-question.php?q_id=<?php echo $row['id']; ?>" method="POST">
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1" style="color: white;"> <b>Post a comment</b> </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>

                <img src="<?php echo $_SESSION['picture'] ?>" class="mt-2 mr-1" style="width:50px; border-radius:50%; height:50px;" class="mr-3" alt="...">
                <input type="text" hidden name="unique_id" value="<?php echo $unique_id ?>">
                <input type="text" hidden name="question" value="<?php echo $question ?>">
                <div class=" btn-group mt-2 ">
                    <select id="inputState" required name="commenter" type="button" class="btn btn-danger dropdown-toggle">
                        <option value="" selected>Comment as</option>
                        <option value="<?php echo $_SESSION['username'] ?> ">My self</option>
                        <option value="Anonymous">Stay Anonymous </option>
                    </select>
                </div>
                <button type="submit" name="comment_button" class="btn btn-info mt-2 ml-6 ">Publish</button>

            </div>
        </form>


        <?php

        $mysqli->close();
        ?>





    </div>





    <?php
    require('foot.php');
    ?>






</body>

</html>