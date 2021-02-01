<?php
        require('database.php');
    $username = $_SESSION['username'];
        $query = "SELECT * FROM questions WHERE author = '$username' ORDER BY id DESC";
        $num = 1;
        $result = $mysqli->query($query);
        while($row = $result->fetch_array())
        {

        
        
        $unique_id = $row["unique_id"];
        $question_id = $row["id"];
        $question = $row["question"];
        $author = $row["author"];
        $date = $row["date"];
        $anonymous = $row["anonymous"];
        $category = $row['category'];

        ?>


            <tr>
              <th scope="row"><?php echo $num ?> </th>
              <td> <a style="text-decoration:none;" href="./question-detail.php?$question_id=<?php echo $question_id ?> " >    <?php echo $question ?> </a></td>
              <td><?php echo $date ?></td>
              <td>

              <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="btn btn-warning btn-sm">
<span class="fa fa-edit">
</span> Edit</a>&nbsp;

<a href="backend/delete-question.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm">
<span class="fa fa-trash">
</span> Delete</a>


<?php include('./modals/edit-question-modal.php'); ?>



              </td>
            </tr>







            <?php 
            
            $num++;
            
            }
        ?>
        
        
        


        

