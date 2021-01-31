<?php
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
            echo $row['message'] . '<br>';
            echo $row['time'] . '<br>';
        }
    }

    public function insert($m){
        $stmt = $this->db->query("INSERT INTO `chatpage`(`message`, `time`) VALUES ('$m',CURRENT_TIMESTAMP())");
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
}
?>
