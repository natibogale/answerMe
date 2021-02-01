
<?php ?>

<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="questionModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./post-question.php" method="POST">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="anonymous" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                Stay Anonymous
              </label>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Question</label>
              <textarea class="form-control" required name="question" id="message-text"></textarea>
            </div>
            <h4>Categories</h4>
            <select required name="category" class="custom-select">
              <option value="" selected>Select Your questions category</option>
              <option value="Technology">Technology</option>
              <option value="Health and Sciences">Health and Sciences</option>
              <option value="Sports and Life style">Sports and Life style</option>
              <option value="Curiosity">Curiosity</option>
              <option value="Society">Society</option>
              <option value="RelationShip">RelationShip</option>
              <option value="Other">Other</option>


            </select>



            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="post_question" class="btn btn-primary">Post question</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>