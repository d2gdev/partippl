<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Update_Query.php';

    $u_que = new Update_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $j_title = $_POST['j_title'];
        $j_location = $_POST['j_location'];
        $j_type = $_POST['j_type'];
        $j_date = $_POST['j_date'];
        $j_payment = $_POST['j_payment'];
        $j_work_hour = $_POST['j_work_hour'];
        $j_descripton = $_POST['j_description'];
        $j_id = $_POST['j_id'];
        
        Functions::data_validation($j_title, 'j_title', 'text', '10', '20');
        Functions::data_validation($j_location, 'j_location', 'select', '20', '30');
        Functions::data_validation($j_type, 'j_type', 'select', '20', '30');
        Functions::data_validation($j_payment, 'j_payment', 'number', '3', '4');
        Functions::data_validation($j_work_hour, 'j_work_hour', 'number', '1', '2');
        Functions::data_validation($j_descripton, 'j_description', 'text', '200', '400');

        if (Functions::$ok_alert == "ok") {
            $u_que->update_job($j_title, $j_location, $j_type, $j_date, $j_payment, $j_work_hour, $j_descripton, $j_id);
        }else {
            header("Location: edit_profile.php");
        }
    }
?>