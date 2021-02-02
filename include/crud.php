<?php
include "./include/db_connect.php";
class Chat
{
    private $db;
    function __construct($db_con)
    {
        $this->db = $db_con;
    }
    public function showMessage()
    {
        $stmt = $this->db->query("SELECT * FROM `chatpage`");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sn = $row['chat_user_id'];
            $stmt2 = $this->db->query("SELECT * FROM `user_info` WHERE `id`='$sn'");
            while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                // echo $row['message'] . '<br>';
                // echo $row2['username'].'<br>';
                $time = $row['time'];
                echo '<div class="chat_container" style="width:50%;float:right;background-color:#7bdaed;margin:10px;border:3px solid black;padding:10px;border-radius:20px;"><strong>' . $row2['username'] . '</strong><br>' .$row['message'] . "<br><span style='font-size:12px;float:right;'>$time</span></div>";
            }
          
        }
    }

    public function insert($m,$sn){
        $stmt = $this->db->query("INSERT INTO `chatpage`(`message`,`chat_user_id`, `time`) VALUES ('$m','$sn',CURRENT_TIMESTAMP())");
        header('location:index.php');
    }

    public function signup($username,$email,$pass,$cpass){
        $st = $this->db->query("SELECT * FROM `user_info` WHERE `username`='$username'");
        $num = $st->rowCount();
        if($num>0){
            echo'<div class="alert alert-warning"><strong>Username already exists.</strong></div>';
        }
        else{
            if($pass == $cpass){
                
        $stmt = $this->db->query("INSERT INTO `user_info` (`username`, `email`, `password`, `cpassword`) VALUES ('$username', '$email', '$pass', '$cpass')");
     
      
        header('location:login.php');
            }
        }

    }

    public function login($username,$pass){
        $stmt = $this->db->query("SELECT * FROM `user_info` WHERE `username`='$username'");
        $num = $stmt->rowCount();
        if($num == 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($username == $row['username']){
                    if($pass == $row['password']){
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $row['id'];
                        header("location:index.php");
                    }else{
                        echo'<div class="alert alert-danger"><strong>Incorrect Password</strong></div>';
                    }
            }
            else{
                echo'<div class="alert alert-danger"><strong>Invalid Username</strong></div>';
            }
           
        }
    }

    public function logout(){
        session_destroy();
        header("location:login.php");
    }
}
?>
