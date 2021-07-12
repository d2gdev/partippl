<?php
    include_once 'lib/Insert_Query.php';
    $i_que = new Insert_Query();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
        $job_id = $_POST['job_id'];
        $posted_by = $_POST['posted_by'];

        $i_que->job_apply($job_id, $posted_by);
    }
?>