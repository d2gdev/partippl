<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    if (isset($_POST["employe"])) {
        $e_name = $_POST['e_name'];
        $e_title = $_POST['e_title'];
        $e_type = $_POST['e_type'];
        $e_location = $_POST['e_location'];
        $e_img = $_FILES["e_image"]["name"];
        $e_img_size =  $_FILES["e_image"]["size"];
        $e_img_tmp_name =  $_FILES["e_image"]["tmp_name"];
        $e_nationality = $_POST['e_nationality'];
        $e_age = $_POST['e_age'];
        $e_gender = $_POST['e_gender'];
        $e_descripton = $_POST['e_description'];

        //$filename   = uniqid().time(); // 5dab1961e93a7-1571494241
        //$extension  = pathinfo( $_FILES["e_image"]["name"], PATHINFO_EXTENSION ); // jpg
        //$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

        $target_dir = "employe_img/";
        $target_file = $target_dir . basename($e_img);
        
        Functions::data_validation($e_name, 'e_name', 'text', '3', '35');
        Functions::data_validation($e_title, 'e_title', 'text', '3', '35');
        Functions::data_validation($e_type, 'e_type', 'select', '2', '35');
        Functions::data_validation($e_location, 'e_location', 'select', '2', '35');
        Functions::image_validation($e_img, 'e_image', $e_img_size, $e_img_tmp_name);
        Functions::data_validation($e_nationality, 'e_nationality', 'text', '3', '35');
        Functions::data_validation($e_age, 'e_age', 'number', '2', '3');
        Functions::data_validation($e_descripton, 'e_description', 'text', '150', '500');

        if (Functions::$ok_alert == "ok") {
            move_uploaded_file($e_img_tmp_name, $target_file);
            $mn->set_up_profile($e_name, $e_title, $e_type, $e_location, $e_img, $e_nationality, $e_age, $e_gender, $e_descripton);
        }else {
            header("Location: set_up_profile.php");
        }
    }

    if (isset($_POST["job_seeker"])) {
        $j_name = $_POST['j_name'];
        $j_title = $_POST['j_title'];
        $j_interest = $_POST['j_interest'];
        $j_location = $_POST['j_location'];
        $j_img = $_FILES["j_image"]["name"];
        $j_img_size =  $_FILES["j_image"]["size"];
        $j_img_tmp_name =  $_FILES["j_image"]["tmp_name"];
        $j_skill = $_POST['j_skill'];
        $j_nationality = $_POST['j_nationality'];
        $j_age = $_POST['j_age'];
        $j_gender = $_POST['j_gender'];
        $j_descripton = $_POST['j_description'];

        
        $target_dir = "job_seeker_img/";
        $target_file = $target_dir . basename($j_img);
        
        Functions::data_validation($j_name, 'j_name', 'text', '3', '25');
        Functions::data_validation($j_title, 'j_title', 'text', '3', '25');
        Functions::data_validation($j_interest, 'j_interest', 'select', '3', '25');
        Functions::data_validation($j_location, 'j_location', 'select', '5', '35');
        Functions::image_validation($j_img, 'j_image', $j_img_size, $j_img_tmp_name);
        Functions::data_validation($j_skill, 'j_skill', 'select', '3', '25');
        Functions::data_validation($j_nationality, 'j_nationality', 'text', '3', '25');
        Functions::data_validation($j_age, 'j_age', 'number', '2', '3');
        Functions::data_validation($j_descripton, 'j_description', 'text', '200', '500');

        if (Functions::$ok_alert == "ok") {
            $mn->set_up_profile_job_seeker($j_name, $j_title, $j_interest, $j_location, $j_img, $j_skill, $j_nationality, $j_age, $j_gender, $j_descripton);
            move_uploaded_file($j_img_tmp_name, $target_file);
        }else {
            header("Location: set_up_profile.php");
        }
    }
?>