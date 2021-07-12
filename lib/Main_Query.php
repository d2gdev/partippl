<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include_once 'lib/Database.php';

    
    //$date = date("Y-m-d");
    //$date_time =  date('Y-m-d h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Main_Query{
        public function __construct(){
            $this->db = new Database();
        }

        //sign up
        public function sign_up($u_email, $u_pass){
            $sql = "SELECT email FROM tbl_sign WHERE email = '$u_email' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("sign_message", "<b>Error!</b> This Email already Exist");
                header("Location: sign.php");
            }else {
                $date_time = date('y-m-d h:i:s');
                
                $sql = "INSERT INTO `tbl_sign`(`email`, `pass`, `active_status`, `last_activity`) VALUES ('$u_email','$u_pass','Active','$date_time')";
                $result = $this->db->insert($sql);
                if ($result) {
                    Session::set_value("u_name", $u_email);
                    header("Location: home.php");
                }
            }
        }

        //login
        public function login($u_email, $u_pass){
            $sql = "SELECT email FROM tbl_sign WHERE email = '$u_email' AND pass = '$u_pass' ";
            $result = $this->db->select($sql);
            if ($result) {
                $date_time = date('y-m-d h:i:s');

                $sql = "UPDATE tbl_sign SET active_status = 'Active', last_activity = '$date_time' WHERE email = '$u_email' ";
                $result = $this->db->update($sql);
                
                Session::set_value("u_name", $u_email);
                header("Location: home.php");
            }else {
                Session::set_value("login_message", "<b>Error!</b> Email or Password Wrong");
                header("Location: login.php");
            }
        }

        //logout
        public function logout(){
            $u_name = Session::show_value("u_name");
            $date_time = date("y-m-d h:i:s");

            $sql = "UPDATE tbl_sign SET active_status = 'Deactive', last_activity = '$date_time' WHERE email = '$u_name' ";
            $result = $this->db->update($sql);
        }

        //change password
        public function change_password($old_pass, $new_pass){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT `email`, `pass` FROM `tbl_sign` WHERE email = '$u_name' AND pass = '$old_pass' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                $sql = "UPDATE `tbl_sign` SET `pass`= '$new_pass' WHERE email = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    Session::set_value("pass_message", "<b>Info: </b> Password Change Successfully");
                    header("Location: change_password.php");
                }
            }else {
                Session::set_value("pass_message", "<b>Error: </b> Old Password doesn't Match ");
                header("Location: change_password.php");
            }
        }

        //set up profile for employee
        public function set_up_profile($e_name, $e_title, $e_type, $e_location, $e_img, $e_nationality, $e_age, $e_gender, $e_descripton){
            $u_name = Session::show_value("u_name");
            $j_date =  date("Y-m-d");
            $rand_id = rand();

            $sql = "SELECT * FROM `tbl_employe` WHERE e_from = '$u_name' ";
            $result = $this->db->select($sql);

            if ($result) {
                $sql = "UPDATE `tbl_employe` SET `e_name`='$e_name',`e_title`='$e_title',`e_type`='$e_type',`e_location`='$e_location',`e_img`='$e_img',`e_nationality`='$e_nationality',`e_age`='$e_age',`e_gender`='$e_gender',`e_description`='$e_descripton',`e_date`='$j_date' WHERE e_from = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    header("Location: edit_profile.php");
                }
            }else {
                $sql = "INSERT INTO `tbl_employe`(`e_name`, `e_title`, `e_type`, `e_location`, `e_img`, `e_nationality`, `e_age`, `e_gender`, `e_description`, `e_from`, `e_date`, `e_id`) VALUES ('$e_name','$e_title','$e_type','$e_location','$e_img','$e_nationality','$e_age','$e_gender','$e_descripton','$u_name','$j_date','$rand_id')";
                $result = $this->db->insert($sql);
                
                if ($result) {
                    header("Location: edit_profile.php");
                }
            }
        }

        //set up profile for job seeker
        public function set_up_profile_job_seeker($j_name, $j_title, $j_interest, $j_location, $j_img, $j_skill, $j_nationality, $j_age, $j_gender, $j_descripton){
            $u_name = Session::show_value("u_name");
            $rand_id = rand();
            $j_date =  date("Y-m-d");

            $sql = "SELECT j_from FROM tbl_job_seeker WHERE j_from = '$u_name' ";
            $result = $this->db->select($sql);

            if ($result) {
                $sql = "UPDATE `tbl_job_seeker` SET `j_name`='$j_name',`j_title`='$j_title',`j_interest`='$j_interest',`j_location`='$j_location',`j_nationality`='$j_nationality',`j_img`='$j_img',`j_skill`='$j_skill',`j_age`='$j_age',`j_gender`='$j_gender',`j_description`='$j_descripton' WHERE j_from = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    header("Location: edit_profile.php");
                }
            }else {
                $sql = "INSERT INTO `tbl_job_seeker`(`j_name`, `j_title`, `j_interest`, `j_location`, `j_nationality`, `j_img`, `j_skill`, `j_age`, `j_gender`, `j_description`, `j_from`, `j_id`, `j_date`) VALUES ('$j_name','$j_title','$j_interest','$j_location','$j_nationality','$j_img','$j_skill','$j_age','$j_gender','$j_descripton','$u_name','$rand_id','$j_date')";
                $result = $this->db->insert($sql);
                
                if ($result) {
                    header("Location: edit_profile.php");
                }
            }
        }

        /*
        //check email
        public function check_email($u_email){
            $sql = "SELECT email FROM tbl_sign WHERE email = '$u_email' ";
            $result = $this->db->select($sql);
            if ($result > 0) {
                Session::set_value("check_mail", "ok");
            }else {
                Session::set_value("check_mail", "not ok");
                Session::set_value("forget_message", "<b>Error!</b> Doesn't Found any Account");
                header("Location: forget.php");
            }
        }

        //reset password
        public function reset_password($u_pass){
            $u_email = Session::show_value("u_name");
            $sql = "UPDATE `tbl_sign` SET `pass`= '$u_pass' WHERE email = '$u_email' ";
            $result = $this->db->update($sql);
            
            Session::set_value("u_name", $u_email);
            header("Location: index.php");
        }

        //check profile
        public function check_profile(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT u_name FROM tbl_employee WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("check_ok","ok");
            }else {
                Session::set_value("check_ok","not ok");
            }
        }

        //check profile 2
        public function check_profile_2(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT u_name FROM tbl_job_seeker WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("check_ok_2","ok");
            }else {
                Session::set_value("check_ok_2","not ok");
            }
        }

        //display employee data 
        public function display_employee_data(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_employee WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //display all job seeker
        public function display_all_job_seeker(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_job_seeker WHERE NOT u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //job seeker data by name
        public function display_job_seeker_data_by_name($u_id){
            $sql = "SELECT * FROM tbl_job_seeker WHERE u_name = '$u_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //insert_message
        public function insert_message_2($received_by, $chat_message){
            $u_name = Session::show_value("u_name");

            $sql = "INSERT INTO `tbl_chat`(`chat_message`, `sent_by`, `received_by`) VALUES ('$chat_message','$u_name','$received_by')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: dashboard.php");
            }
        }

        //select chat message
        public function select_chat_data_3($received_by){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_chat WHERE sent_by = '$received_by' AND received_by = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_chat_data_4($received_by){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_chat WHERE received_by = '$u_name' AND sent_by = '$received_by' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_rating2($rate){
            $u_name = Session::show_value('u_name');
            
            $sql = "SELECT * FROM tbl_rating WHERE sent_by = '$u_name' AND received_by = '$rate' ";
            $result = $this->db->select($sql);
            return $result;
        }

        */
    }
?>