<?php ?>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Create an Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./backend/signup.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Username</label>
                <input type="text" name="sign_up_username" required class="form-control" id="inputEmail4">
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" required name="sign_up_firstName" placeholder="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" required name="sign_up_lastName" placeholder="Last name">
              </div>
            </div>

            <div class="form-row mt-3">
              <div class="col">
                <input type="password" class="form-control" required name="sign_up_password" placeholder="Password">
              </div>
              <div class="col">
                <input type="password" class="form-control" required name="sign_up_confirm_password" placeholder="Confirm Password">
              </div>
            </div>
            <div class="form-group mt-3">

              <input placeholder="Email address" name="sign_up_email" type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="input-group mb-3">

              <div class="custom-file">
                <input type="file" name="sign_up_picture" required class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Picture</label>
              </div>
            </div>


            <button type="submit" name="sign_up" class="btn btn-primary mt-3">Sign Up</button>

          </form>
        </div>

      </div>
    </div>
  </div>
