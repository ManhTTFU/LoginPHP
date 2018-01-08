
    <?php require('partials/head.php'); ?>

    <div class="container">
      <form action="/login" method="POST">
      <div class="form-group">
        <label for="exampleInputText1">UserName</label>
        <input type="text" class="form-control" name="txtusername" placeholder="UserName">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="txtpassword" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <?php require('partials/footer.php'); ?>