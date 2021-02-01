<?php ?>

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">My Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?php echo $_SESSION['picture'] ?> " class="mr-3" style="width:70px; border-radius:50%; height:70px;">

          <form action="backend/update-profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Username</label>
                <input type="text" name="profile_username" value="<?php echo $_SESSION['username'] ?>" required class="form-control" id="inputEmail4">
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" required name="profile_firstName" value="<?php echo $_SESSION['firstName'] ?>" placeholder="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" required name="profile_lastName" value="<?php echo $_SESSION['lastName'] ?>" placeholder="Last name">
              </div>
            </div>

            <div class="form-row mt-3">
              <div class="col">
                <input type="password" class="form-control" value="<?php echo $_SESSION['password'] ?>" required name="old_password" placeholder="Old Password">
              </div>
              <div class="col">
                <input type="password" class="form-control" name="new_password" placeholder="New Password">
              </div>
            </div>
            <div class="form-group mt-3">

              <input placeholder="Email address" name="profile_email" type="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="input-group mb-3">

              <div class="custom-file">
                <input type="file" name="profile_picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Picture</label>
              </div>
            </div>


            <button type="submit" name="profile_update" class="btn btn-primary mt-3">Update</button>

          </form>
        </div>

      </div>
    </div>
  </div>
