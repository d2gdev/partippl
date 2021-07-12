<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include_once 'lib/Database.php';

    //$date = date("Y-m-d");
    //$date_time =  date('Y-m-d h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Update_Query{
        public function __construct(){
            $this->db = new Database();
        }

        
        //update job
        public function update_job($j_title, $j_location, $j_type, $j_date, $j_payment, $j_work_hour, $j_descripton, $j_id){
            $sql = "UPDATE `tbl_job_post` SET `j_title`='$j_title',`j_booking_location`='$j_location',`j_type`='$j_type',`j_booking_date`='$j_date',`j_payment`='$j_payment',`j_work_hour`='$j_work_hour',`j_description`='$j_descripton' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
            
            if($result){
                header("Location: edit_profile.php");
            }
        }

        
        //update job applicant status
        public function update_job_applicant_status($apply_status, $apply_id){
            $sql = "UPDATE tbl_apply SET a_status = '$apply_status' WHERE a_id = '$apply_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                header("Location: job_application.php");
            }
        }
    }
?>