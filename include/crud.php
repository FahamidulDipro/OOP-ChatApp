<?php
    class Chat{
        private $db;
        function __construct($db_con)
        {
            $this->db=$db_con;
        }
        public function showMessage(){
           $this->db->query("SELECT * FROM `chatpage`");
            
        }
    }
?>