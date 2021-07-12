<?php
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();

    if (Session::show_value("u_name") == NULL || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == NULL || Session::show_value("user_type") == "" ) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en-ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Party Empleyee</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="header-container">
                <div class="header-left">
                    <div class="logo"><a href="dashboard.php"><img src="img/ppl-Logo.png"></a></div>
                </div>

                <div class="header-right">
                    <p>Welcome <?php echo Session::show_value("u_name"); ?></p>
                    <a href="logout.php"><span class="fa fa-sign-out"></span></a>
                    <a href="notice.php" id="notice">
                        <span class="fa fa-bell"></span> <sup>02</sup>

                        <div class="notice-content">
                            <span>New Message from MR K K</span>
                            <span>New Converstaion is Now Waiting</span>
                            <span>Applicant want to chat with You</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="menu">
            <div class="menu-container">
                <a href="browse_job_seeker.php">Browse All Employers</a>
                <a href="new_job.php">Browse All Jobs</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>

        <div class="hero">
            <div class="hero-container">
                <div class="hero-left">
                    <a href="job_application_job_seeker.php">All Job Applications</a>
                    <a href="job_history.php">Job History</a>
                </div>

                <div class="hero-right">
                    <div class="hero-right-header">Welcome to Our PartiPpl!</div>
                    <div class="hero-right-text">You are logged in as a <b>Job Seeker</b></div>


                    <div class="job-block">
                        <div class="job-post-header">
                            <div class="job-post-block">Job Name</div>
                            <div class="job-post-block">Application Status</div>
                            <div class="job-post-block">Rating</div>
                            <div class="job-post-block">Action</div>
                        </div>

                        <?php
                            $data = $s_que->select_job_for_job_seeker();
                            if($data != false){
                            foreach($data as $result){
                            $job_name = $result['j_id'];
                            $select_job_name = $s_que->job_name_select($job_name)->fetch_assoc();
                        ?>

                                <form method="post" action="job_applicant_update_code.php" class="job-post-content">
                                    <a href="job_details.php?j_id=<?php echo $select_job_name['j_id'] ?>" class="job-post-block"><?php echo $select_job_name['j_title']; ?></a>
                                    <div class="job-post-block"><?php echo $result['a_status'] ?></div>
                                    <?php if($result['a_status'] == "Selected"){ ?>
                                        <?php
                                            $j_id = $select_job_name['j_id'];
                                            $rating_data = $s_que->select_employe_rating($j_id);
                                            if ($rating_data !=  false) {
                                                $job_seeker_rating_data = $s_que->select_job_seeker_rating_data($j_id);
                                                if ($job_seeker_rating_data !=  false) {
                                                    $rate_data = $job_seeker_rating_data->fetch_assoc();
                                        ?>
                                                    <div class="job-post-block"><?php echo $rate_data['r_rating'] ?></div>
                                                    <div class="job-post-block">Job Complete</div>
                                                <?php }else{ ?>
                                                    <div class="job-post-block">Not Rated Yet</div>
                                                    <div class="job-post-block"><a href="rating.php?rating_id=<?php echo $j_id ?>&&received_by=<?php echo $select_job_name['j_post_by'] ?>">Rate Now</a></div>
                                                <?php } ?>
                                        <?php }else{ ?>
                                            <div class="job-post-block">Not Rated Yet</div>
                                            <div class="job-post-block">Waiting for Rating</div>
                                        <?php } ?>
                                    <?php }else{ ?>

                                        <div class="job-post-block">No Rated Yet</div>
                                        <div class="job-post-block">No Action Needed</div>

                                        <?php
                                            //$rate = $result['u_name'];
                                            //$rate_number = $mn->select_rating2($rate);
                                            //if ($rate_number !=  false) {
                                            //$data = $rate_number->fetch_assoc();
                                        ?>

                                        <?php //}else{ ?>
                                        <?php //} ?>
                                    <?php } ?>
                                </form>
                            <?php } ?>
                        <?php }else{ ?>
                            <h2 style="text-align: center">Apply For More Jobs!</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
</body>
</html>
