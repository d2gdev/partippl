<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include_once 'lib/Database.php';

    //$date = date("Y-m-d");
    //$date_time =  date('Y-m-d h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Insert_Query{
        public function __construct(){
            $this->db = new Database();
        }

        //post a job
        public function post_job($j_title, $j_location, $j_type, $j_date, $j_hour, $j_miute, $j_am, $j_payment, $j_work_hour, $j_descripton){
            $u_name = Session::show_value("u_name");
            $j_time = $j_hour.":".$j_miute.":".$j_am;
            $rand_id = rand();
            $j_post_date =  date("Y-m-d");

            $sql = "INSERT INTO `tbl_job_post`(`j_title`, `j_booking_location`, `j_type`, `j_booking_date`, `j_booking_time`, `j_payment`, `j_work_hour`, `j_description`, `j_post_by`, `j_id`, `j_date`, `j_status`) VALUES ('$j_title','$j_location','$j_type','$j_date','$j_time','$j_payment','$j_work_hour','$j_descripton','$u_name','$rand_id','$j_post_date','Not Approved')";
            $result = $this->db->insert($sql);
            if ($result) {
                Session::set_value("job_message", "Job Post Store Successfully");
                header("Location: new_job.php");
            }
        }
        
        //collect email
        public function collect_email_code($c_email){
            $c_date = date("Y-m-d");

            $sql = "SELECT c_email FROM tbl_collect_email WHERE c_email = '$c_email' ";
            $result = $this->db->select($sql);
            if ($result > 0) {
                Session::set_value("c_mail_message","Email already Exist");
                header("Location: home.php");
            }else {
                $sql = "SELECT j_from FROM tbl_job_seeker WHERE j_from = '$c_email' ";
                $result = $this->db->select($sql);
                if ($result > 0) {
                    Session::set_value("c_mail_message","Email already Exist");
                    header("Location: home.php");
                }else {
                    $sql = "INSERT INTO `tbl_collect_email`(`c_email`,`c_date_time`) VALUES ('$c_email','$c_date')";
                    $result = $this->db->insert($sql);
                    if ($result) {
                        Session::set_value("c_mail_message","Email Register Successfully");
                        header("Location: home.php");
                    }
                }
            }
        }
        
        //job apply
        public function job_apply($job_id, $posted_by){
            $u_name = Session::show_value("u_name");
            $rand_id = rand();
            $a_date = date('Y-m-d');

            $sql = "INSERT INTO `tbl_apply`(`j_id`, `a_from`, `a_status`, `a_to`, `a_id`, `a_date`) VALUES ('$job_id','$u_name','Submitted','$posted_by','$rand_id','$a_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: new_job.php");
            }
        }

        //insert employe rating
        public function insert_rating($j_id,$r_to,$rating_text,$rating){
            $u_name = Session::show_value('u_name');
            $r_date = date('Y-m-d');
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_rating`(`r_comment`, `r_from`, `r_to`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`) VALUES ('$rating_text','$u_name','$r_to','$rating','$rand_id','$r_date','$j_id','$r_publish_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: job_application.php");
            }
        }

        //insert employe rating
        public function insert_rating2($j_id,$r_to,$rating_text,$rating){
            $u_name = Session::show_value('u_name');
            $r_date = date('Y-m-d');
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_rating`(`r_comment`, `r_from`, `r_to`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`) VALUES ('$rating_text','$u_name','$r_to','$rating','$rand_id','$r_date','$j_id','$r_publish_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: job_application_job_seeker.php");
            }
        }

        //insert_message
        public function insert_message($received_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: dashboard.php");
            }
        }
        
        //insert chat message for employe
        public function insert_chat_message_2($sent_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$sent_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details2.php?chat_id=".$sent_by);
            }
        }
        
        //insert chat_message
        public function insert_chat_message($chat_message, $received_by){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details.php?chat_id=".$received_by);
            }
        }

        //insert chat_message from outbox
        public function insert_chat_message_from_outbox($chat_message, $received_by){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details2.php?chat_id=".$received_by);
            }
        }
    }
?>