<?php
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    $data = $mn->display_all_job();
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <a href="manage.php">Manage Job</a>
        <a href="manage_copy_right.php">Manage Copyright</a>
    </div>

    <div class="job-content">
        <div class="job-content-block">Job Name</div>
        <div class="job-content-block">Apply Last Date</div>
        <div class="job-content-block">Posted By</div>
        <div class="job-content-block">Action</div>
    </div>

    <?php if($data != false){ ?>
        <?php foreach($data as $result){ ?>
            <div class="job-content">
                <div class="job-content-block"><?php echo $result['j_title']; ?></div>
                <div class="job-content-block"><?php echo $result['j_booking_date']; ?></div>
                <div class="job-content-block"><?php echo $result['j_post_by']; ?></div>
                <a href="approved_job.php?j_id=<?php echo $result['j_id'] ?>" class="job-content-block">View More</a>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <h2 style="text-align: center">No Jobs Available Approval</h2>
    <?php } ?>
    <br><br>

</body>
</html>
