<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include 'lib/Database.php';

    class Main_Query{
        public function __construct(){
            $this->db = new Database();
        }

        public function display_all_job(){
            $sql = "SELECT * FROM tbl_job_post WHERE j_status  = 'Not Approved' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function display_single_job($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id  = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function approved_job($j_id){
            $sql = "UPDATE tbl_job_post SET j_status = 'Approved' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                header("Location: manage.php");
            }
        }

        public function select_copy_right(){
            $sql = "SELECT * FROM tbl_copy_rights";
            $result = $this->db->select($sql);
            return $result;
        }

        public function update_copy_right($text_name){
            $sql = "UPDATE tbl_copy_rights SET copy_text_name = '$text_name' ";
            $result = $this->db->update($sql);
            
            if ($result) {
                header("Location: manage_copy_right.php");
            }
        }

        public function login($a_name, $a_pass){
            $sql = "SELECT * FROM tbl_admin WHERE a_name = '$a_name' AND a_pass = '$a_pass' ";
            $result = $this->db->select($sql);

            if ($result) {
                Session::show_value("a_name", $a_name);
                header("Location: index.php");
            }else {
                header("Location: login.php");
            }
        }
    }
?>