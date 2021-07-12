<?php 
    include_once 'lib/Session.php';
    Session::session_start();
    class Functions{
        public static $ok_alert = "ok";
        public $empty_err_msg = "";

        public static function image_validation($data, $p_location, $size, $tmp_name){
            $target_dir = "images/";
            $target_file = $target_dir . basename($data);
            $ok = "ok";
            $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



            if ($ok == "ok") {
                if (empty($data)) {
                    $err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($p_location, $err_msg);
                    $ok = "not ok";
                    self::$ok_alert = "not ok";
                }
            }

                
            if ($ok == "ok") {
                if (file_exists($target_file)) {
                    $err_msg = "File already exits";
                    Session::set_value($p_location, $err_msg);
                    $ok = "not ok";
                    self::$ok_alert = "not ok";
                }
            }


            if ($ok == "ok") {
                if ($size > 500000) {
                    $err_msg = "Image size should be less than 1 MB";
                    Session::set_value($p_location, $err_msg);
                    $ok = "not ok";
                    self::$ok_alert = "not ok";
                }
            }

            
            if ($ok == "ok") {
                if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
                && $file_type != "gif" ) {
                    $err_msg = "only JPG, JPEG, PNG & GIF files are allowed";
                    Session::set_value($p_location, $err_msg);
                    $ok = "not ok";
                    self::$ok_alert = "not ok";
                }
            }

            if ($ok == "ok") {
                move_uploaded_file($tmp_name, $target_file);
            }
        }

        public static function data_validation($data, $name, $type, $min_len, $max_len){
            if ($type == "text") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "text") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "text") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "email") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }
            
            if ($type == "pass") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "date") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "date") {
                $cur_date = date('Y-m-d');

                if ($data <= $cur_date) {
                    $empty_err_msg = "<b>Error!</b> Enter valid date";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "select") {
                if ($data == "NONE") {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            self::filter_data($data);
            self::other_validation($data, $name, $type);
        }

        public static function filter_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public static function other_validation($data, $name, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Letters and White space Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "pass") {
                if (!preg_match("/^[a-zA-Z0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number and Letters Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number Not Allowed Please combine Number and Letter these";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            
            if ($type == "pass") {
                if ((preg_match("/^[a-zA-Z]*$/",$data))) {
                    $empty_err_msg = "<b>Error!</b> Only Letters Not Allowed Please combine Number and Letters";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }
        }

        public static function email_validation($data, $name){
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);

            if (!$data) {
                $empty_err_msg = "<b>Error!</b> invalid email address";
                Session::set_value($name, $empty_err_msg);
                self::$ok_alert = "not ok";
            }
        }
    }
?>