<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include_once 'lib/Database.php';

    //$date = date("Y-m-d");
    //$date_time =  date('Y-m-d h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Select_Query{
        public function __construct(){
            $this->db = new Database();
        }

        //check employe profile
        public function check_employe_profile(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_employe WHERE e_from = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("employe_check", "ok");
            }else {
                Session::set_value("employe_check", "not ok");
            }
        }

        //select all job seeker
        public function select_all_job_seeker(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_job_seeker WHERE NOT j_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //display employee data 
        public function display_employee_data(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_employe WHERE e_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //collect email
        public function select_email(){
            $sql = "SELECT * FROM tbl_collect_email";
            $result = $this->db->select($sql);
            return $result;
        }

        //collect email
        public function select_email_2(){
            $sql = "SELECT DISTINCT(j_from) FROM tbl_job_seeker";
            $result = $this->db->select($sql);
            return $result;
        }

        //show job by user
        public function show_job_list_by_user(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_apply WHERE a_to = '$u_name' AND (a_status = 'Selected' OR a_status = 'Rejected') ";
            $result = $this->db->select($sql);
            return $result;
        }

        //show job list by employe
        public function show_job_list_by_employe(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_job_post WHERE j_post_by = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function show_job_by_user(){

            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_job_post WHERE j_post_by  = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //check job seeker profile
        public function check_job_seeker_profile(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_job_seeker WHERE j_from = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("job_seeker_check", "ok");
            }else {
                Session::set_value("job_seeker_check", "not ok");
            }
        }
        
        //display employee data 
        public function display_all_employee(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_employe WHERE NOT e_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //display approved job
        public function display_all_job(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM `tbl_job_post` WHERE j_status = 'Approved' AND NOT j_post_by = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //display job seeker data
        public function display_job_seeker_data(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_job_seeker WHERE j_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select employe by id
        public function select_employe_by_id($e_id){
            $sql = "SELECT * FROM tbl_employe WHERE e_id = '$e_id' ";
            $result = $this->db->select($sql);

            if ($result) {
                # code...
            }else {
                header("Location: 404.php");
            }
        }
        
        //display single employe 
        public function display_employee_by_id($e_id){
            $sql = "SELECT * FROM tbl_employe WHERE e_id = '$e_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select slick job seeker data
        public function select_slick_job_seeker(){
            $sql = "SELECT * FROM tbl_job_seeker WHERE j_gender = 'Female' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select copy data
        public function select_copy_data(){
            $sql = "SELECT * FROM tbl_copy_rights";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select single job by id
        public function select_single_job_by_id($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);

            if ($result) {
                # code...
            }else {
                header("Location: 404.php");
            }
        }
        
        //single job post
        public function single_job_details($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id  = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //apply status
        public function apply_status($j_id){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT a_status FROM tbl_apply WHERE j_id = '$j_id' AND a_from = '$u_name' ";
            $result = $this->db->select($sql);

            if ($result) {
                Session::set_value("apply_status","apply");
            }else {
                Session::set_value("apply_status","not apply");
            }

            return $result;
        }
        
        //select job post for job_seeker
        public function select_job_for_job_seeker(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_apply WHERE a_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select job seeker id
        public function select_job_seeker_id($name){
            $sql = "SELECT * FROM tbl_job_seeker WHERE j_from = '$name' ";
            $result = $this->db->select($sql);
            return $result; 
        }

        //select job post for job_seeker
        public function select_job_for_job_seeker2(){
            $u_name = Session::show_value('u_name');

            $sql = "SELECT * FROM tbl_apply WHERE a_from = '$u_name' AND a_status = 'Selected' OR a_status = 'Rejected' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select job name
        public function job_name_select($job_name){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id = '$job_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select update job
        public function select_update_job($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);

            if ($result) {
                
            }else {
                header("Location: 404.php");
            }
        }

        //show job details by user and job id
        public function select_job_details($j_id){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_job_post WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //show job applicant
        public function show_applicant(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_apply WHERE a_to = '$u_name' AND NOT a_status = 'Rejected' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select rating for emplou
        public function select_rating($received_by){
            $u_name = Session::show_value('u_name');
            
            $sql = "SELECT * FROM tbl_rating WHERE r_from = '$u_name' AND r_to = '$received_by' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select employe rating
        public function select_employe_rating($j_id){
            $sql = "SELECT * FROM tbl_rating WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select job applicant
        public function job_applicant_by_id($r_to, $j_id){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_apply WHERE a_to = '$u_name' AND a_from = '$r_to' AND j_id = '$j_id' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("x","ok");
            }else {
                Session::set_value("x","not ok");
                header("Location: 404.php");
            }
        }

        //select rating data
        public function select_job_seeker_rating_data($j_id){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_rating WHERE j_id = '$j_id' AND r_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select employe
        public function job_emploeye_by_id($r_to, $j_id){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_apply WHERE a_to = '$r_to' AND a_from = '$u_name' AND j_id = '$j_id' ";
            $result = $this->db->select($sql);
            if ($result) {
                # code...
            }else {
                header("Location: 404.php");
            }
        }

        //select job seeker rating
        public function select_job_seeker_rating(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_rating WHERE r_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //check job seeker rating
        public function check_job_seeker_review($j_id, $r_from){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_rating WHERE r_from = '$u_name' AND r_to = '$r_from' AND j_id = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select review for employe
        public function select_review_for_employe(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_rating WHERE r_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //check job seeker
        public function check_job_seeker($j_id){
            $sql = "SELECT * FROM tbl_job_seeker WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);
            
            if ($result) {

            }else {
                header("Location: 404.php");
            }
        }
        
        //display job seeker details
        public function display_job_seeker_details($j_id){
            $sql = "SELECT * FROM tbl_job_seeker WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //check job seeker by name
        public function check_job_seeker_by_u_name($msg_id){
            $sql = "SELECT * FROM tbl_job_seeker WHERE j_from = '$msg_id' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                
            }else {
                header("Location: 404.php");
            }
        }
        
        //select employe by u_name
        public function check_employe_by_u_name($msg_id){
            $sql = "SELECT * FROM tbl_employe WHERE e_from = '$msg_id' ";
            $result = $this->db->select($sql);

            if ($result) {
                # code...
            }else {
                header("Location: 404.php");
            }
        }

        //select chat message count for employe
        public function select_chat_message_count_for_job_seeker(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT DISTINCT(c_from) FROM tbl_chat WHERE c_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select chat message 2
        public function select_chat_message_2(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT DISTINCT(c_from) FROM tbl_chat WHERE c_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select chat message 2 for job seeker
        public function select_chat_message_2_for_job_seeker(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT DISTINCT(c_to) FROM tbl_chat WHERE c_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select chat details
        public function select_specific_chat_details($received_by){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_chat WHERE c_from = '$received_by' AND c_to = '$u_name' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                
            }else {
                header("Location: 404.php");
            }
        }

        //select chat details
        public function select_specific_chat_details2($received_by){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT * FROM tbl_chat WHERE c_to = '$received_by' AND c_from = '$u_name' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                
            }else {
                header("Location: 404.php");
            }
        }

        //select chat message for job seeker
        public function select_chat_data_2($received_by){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_chat WHERE (c_from = '$received_by' AND c_to = '$u_name') OR  (c_to = '$received_by' AND c_from = '$u_name')";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select active status
        public function select_active_status($received_by){
            $sql = "SELECT * FROM tbl_sign WHERE email = '$received_by' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select chat message count 
        public function select_chat_message_count_for_inbox(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT DISTINCT (c_from) FROM tbl_chat WHERE c_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select chat message count outbox
        public function select_chat_message_count_for_outbox(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT DISTINCT (c_to) FROM tbl_chat WHERE c_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }
        
        //select chat message
        public function select_chat_message(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT DISTINCT(c_from) FROM tbl_chat WHERE c_to = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select chat message for outbox
        public function select_chat_message_for_outbox(){
            $u_name = Session::show_value("u_name");
            
            $sql = "SELECT DISTINCT (c_to) FROM tbl_chat WHERE c_from = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select job by job id
        public function select_job_by_job_id($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }
    }
?>