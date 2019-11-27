<?php include('inc/header.php'); ?>

<div class="card my-3 my-md-5 mx-auto">
  <div class="card-body p-md-5">
    <div id="error" class="text-danger mb-3"></div>
    <form action="process.php" method="POST" id="contactform">
      <div class="row">
        <div class="col-md my-3 my-md-2">
          <input type="text" name="name" class="form-control" placeholder="Name">
          <span class="error" class="text-danger"></span>
        </div>
        <div class="col-md my-3 my-md-2">
          <input type="text" name="company" class="form-control" placeholder="Company">
          <span class="error" class="text-danger"></span>
        </div>
  </div>
  <div class="row">
    <div class="col-md my-3 my-md-2">
      <input type="email" name="email" class="form-control" placeholder="E-mail">
      <span class="error" class="text-danger"></span>
    </div>
    <div class="col-md my-3 my-md-2">
      <input type="text" class="form-control" name="phone" placeholder="Phone">
      <span class="error" class="text-danger"></span>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-md my-3 my-md-2">
        <textarea class="form-control" name="content" id="" cols="30" rows="5" placeholder="What're you looking for?"></textarea>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-md my-3 my-md-2">
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
    </div>
  </div>
  <div class="row my-3">
    <div class="col-md my-3 my-md-2">
        <div class="g-recaptcha" data-sitekey="6Ld0_8QUAAAAAJLKBOdfRlP-RbG5w6Cjkkt7uRJc"></div>
    </div>
  </div>
  <div class="row my-5">
    <div class="col-md my-3 my-md-2">
        <input id="submit" name="submit" type="submit" class="rounded text-light btn btn-info btn-lg w-100" value="Submit"></input>
    </div>
  </div>
</form>
  </div>
</div>

