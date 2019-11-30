<?php include('inc/header.php'); ?>

<div class="card my-3 my-md-5 mx-auto">

  <div class="card-body p-md-5">

    <form action="process.php" method="POST" id="contactform" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md my-3 my-md-2">
          <input type="text" name="name" class="form-control" placeholder="Name">
          <span class="error text-danger font-weight-light" id="err-name"></span>
        </div>
        <div class="col-md my-3 my-md-2">
          <input id="phone" type="text" name="phone" class="form-control" placeholder="phone">
          <span class="error text-danger font-weight-light" id="err-phone"></span>
        </div>
      </div>
<!--
      <div class="row my-3">
        <div class="col-md my-3 my-md-2">
          <input type="file" class="form-control-file" id="file" name="file">
          <span class="error text-danger font-weight-light" id="err-file"></span>
        </div>
      </div>
-->
      <div class="row my-3">
        <div class="col-md my-3 my-md-2">
          <div class="g-recaptcha" data-sitekey="6Ld0_8QUAAAAAJLKBOdfRlP-RbG5w6Cjkkt7uRJc"></div>
          <span class="error text-danger font-weight-light" id="err-captcha"></span>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md my-3 my-md-2">
          <input type="submit" name="submit" class="rounded text-light btn btn-info btn-lg w-100" value="Submit" id="submit">
        </div>
      </div>

    </form>
  
  </div>

</div>

<?php include('inc/footer.php'); ?>