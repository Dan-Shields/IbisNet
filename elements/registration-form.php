<form action="php/register-user.php" method="POST" id='user-registration'>
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">
      <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
    <input type="text" id='email' name='email' class="form-control" placeholder="Email" aria-describedby="basic-addon1">
  </div>
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon2">
      <i class="fa fa-user" aria-hidden="true"></i></span>
    <input type="text" id='alias' name='alias' class="form-control" placeholder="Username" aria-describedby="basic-addon2">
  </div>
  <div class="text-center">
      <input type="submit" class="btn btn-success btn-submit" value="Register">
  </div>
</form>

<!--
<form id='user-registration' action='php/register-user.php' method='post'>

    First Name:   <input type='text' id='first_name' name='first_name'><br/>
    Last Name:    <input type='text' id='last_name' name='last_name'><br/>
    E-mail:     <input type='text' id='email' name='email'><br/>
    Desired Alias:  <input type='text' id='alias' name='alias'><br/>

  <input type='submit'>
</form>

->>