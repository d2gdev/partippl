<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include 'lib/Database.php';

    class Delete_Query{
        public function __construct(){
            $this->db = new Database();
        }

        
    }
?>