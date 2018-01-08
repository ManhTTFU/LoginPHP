
    <?php require('partials/head.php'); ?>
    
        <div class="container">
          <form action="/register" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Gmail</label>
            <input type="gmail" class="form-control" name="gmail" placeholder="Gmail">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">FullName</label>
            <input type="text" class="form-control" name="fullname" placeholder="FullName">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <?php require('partials/footer.php'); ?>