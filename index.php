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
<style>
body{
    background:url('https://us.123rf.com/450wm/aldanna/aldanna1502/aldanna150200028/36427424-mobile-apps-pattern-with-music-chat-gallery-speaking-bubble-email-magnifying-glass-shopping-search-n.jpg?ver=6');
  
    background-position: center top;
    background-attachment: fixed;
}
</style>
    <?php
    if (isset($_POST['logout'])) {
        $chat->logout();
    }
    ?>
    <div class="d-flex justify-content-between fixed-top" style="background-color: #128c7e;">
        <h1 class="text-light px-3 py-1">Let's Chat</h1>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
        ?>
            <p class="text-light my-3 mx-3"> Welcome <strong><?php echo $_SESSION['username']; ?></strong> </p>
            <form method="POST">
                <input type="submit" name="logout" value="Logout" class="btn btn-outline-light my-2 mx-3">
            </form>
        <?php } else {  ?>
            <div>
                <a href="login.php"><input type="submit" value="Login" class="btn btn-outline-light my-2 mx-3"></a>
                <a href="signup.php"><input type="submit" value="Signup" class="btn btn-outline-light my-2 mx-3"></a>
            </div>


        <?php
        }
        ?>

    </div>
    <div style="height:200px;"></div>

    <div class="container overflow-auto" style="min-height: 600px;">
        <?php

        if (isset($_POST['send'])) {
            $msg = $_POST['message'];
            $sn = $_POST['sn'];
            $chat->insert($msg,$sn);
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
            $chat->showMessage();
        } else {
        }

        ?>

    </div>
<div style="height: 200px;"></div>
<div style="margin-top: 10px;padding:5px;" class="fixed-bottom">
<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
        echo '<div class="container">
         <form method="POST" class="d-flex">
             <textarea name="message" id="message" cols="7" rows="2" placeholder="Write your message" class="form-control border border-dark m-3 w-100"></textarea>
             <div><button class="btn text-light mt-5" name="send" style="background-color:#10c02d;">SEND</button></div>
             <input type="hidden" name="sn" value="'.$_SESSION["id"].'">
         </form>
 
     </div>';
    } else {
        echo '<h1 class="text-center">Please <a href="login.php">Login</a> to chat</h1>';
    }
    ?>
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