<?php
          include "./include/crud.php";
      
          session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Let's Chat</title>
</head>

<body>
    <?php
    if(isset($_POST['logout'])){
        $chat->logout();
    }
    ?>
    <div class="d-flex justify-content-between bg-primary">
        <h1 class="bg-primary text-light px-3 py-1">Let's Chat</h1>
        <p class="text-light my-3 mx-3"> Welcome <strong><?php echo $_SESSION['username'];?></strong> </p>
        <form method="POST">
            <input type="submit" name="logout" value="Logout" class="btn btn-outline-light my-2 mx-3">
        </form>

    </div>

    <div class="container">
        <?php
        // $sn = $_POST['sn'];
      
        ?>

        <?php

        if (isset($_POST['send'])) {
            $msg = $_POST['message'];
            $sn = $_POST['sn'];
            $chat->insert($msg,$sn);
         
        }
        $chat->showMessage();
        ?>

    </div>



    <div class="container">
        <form method="POST">
            <textarea name="message" id="message" cols="7" rows="5" placeholder="Write your message" class="form-control fixed-bottom m-3 w-50"></textarea>
            <button class="btn btn-primary text-light mt-3 fixed-bottom m-3" name="send">SEND</button>
            <input type="hidden" name="sn" value="<?php echo $_SESSION['id'];?>">
        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>