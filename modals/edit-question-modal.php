<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

        <?php

include './backend/database.php';

        $q = "SELECT * FROM questions WHERE id =" . $row['id'];
        $edit = $mysqli->query($q);
        $update = $edit->fetch_assoc();
        ?>

        <form action="./backend/edit-question.php" method="POST" >
          <div class="form-check">
            <?php
            if ($update['anonymous'] == "yes") {


            ?>
              <input class="form-check-input" checked type="checkbox" name="anonymous" id="defaultCheck1">
            <?php
            } else {
            ?>
              <input class="form-check-input" type="checkbox" name="anonymous" id="defaultCheck1">

            <?php

            }
            ?>
            <label class="form-check-label" for="defaultCheck1">
              Stay Anonymous
            </label>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Question</label>
            <textarea class="form-control" value="  " required name="question" id="message-text"><?php echo $update['question'] ?> </textarea>
          </div>
          <input type="text" hidden name="id" value="<?php echo $row['id'] ?> ">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="update_question" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>