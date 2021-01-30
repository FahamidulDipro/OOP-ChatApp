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
}
?>
