<?php $this->titre = "Login"; ?>

<form action="index.php?action=profil" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="userHelp">
    <small id="userHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="login_check">
    <label class="form-check-label" for="login_check">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>