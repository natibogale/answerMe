<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in to Continue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./login.php" method="POST" id="">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" value="<?php if (isset($_COOKIE["username"])) {
                                        echo $_COOKIE["username"];
                                      } ?>" required class="form-control" id="login_username" name="login_username" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="<?php if (isset($_COOKIE["password"])) {
                                            echo $_COOKIE["password"];
                                          } ?>" required class="form-control" name="login_password" id="login_password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" <?php if (isset($_COOKIE["username"])) {

                                                            ?> checked <?php

                                                            }

                            ?> id="rememberMe" name="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <button type="submit" name="login" class="btn btn-primary">Log in</button>

        </form>

      </div>

    </div>
  </div>
</div>