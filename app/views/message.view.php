    <!-- <?php
        session_start();
    ?> -->
    <?php require('partials/head.php'); ?>
        <?php
             if (isset($_SESSION['user_name'])) {
                echo 'Hi,' .  $_SESSION['user_name']."</br>";
                echo "You have a message";
            } else{
                echo "You haven't a message";
            }


        ?>

    <div class="container">
      <form action="/message" method="POST">
      <div class="form-group">
        <label for="exampleInputText1">UserName</label>
        <input type="text" class="form-control" name="txtusername" placeholder="UserName">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Content</label>
        <input type="text" class="form-control" name="txtcontent" placeholder="Content">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

            <?php
                foreach($_SESSION['message'] as $content){
                    echo $content['content'];
                }
            ?>


    <?php require('partials/footer.php'); ?>