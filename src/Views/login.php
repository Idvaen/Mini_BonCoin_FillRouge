<?php $this->titre = "Login"; ?>

<form action="index.php?action=profil" method="post">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="userHelp">
    <small id="userHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="login_check">
    <label class="form-check-label" for="login_check">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>