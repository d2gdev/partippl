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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php if(Session::show_value("user_type") == "employe"){ ?>
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
                    <a href="browse_job_seeker.php">Browse All Job Seekers</a>
                    <a href="new_job.php">Post a New Job</a>
                    <a href="change_password.php">Reset Password</a>
                    <a href="edit_profile.php">Edit My Profile</a>
                    <a href="mail.php">Mailbox <sup>(02)</sup></a>
                </div>
            </div>

            <div class="hero">
                <div class="hero-container">
                    <div class="hero-left">
                        <a href="job_posting.php">Your Job Postings</a>
                        <a href="job_application.php">Job Applications</a>
                        <a href="job_history.php">Job History</a>
                    </div>

                    <div class="hero-right">
                        <div class="hero-right-header">Welcome to PartiPpl!</div>
                        <div class="hero-right-text">Posted Application</div>

                        <div class="job-block">
                            <div class="job-post-header">
                                <div class="job-post-block">Job Title</div>
                                <div class="job-post-block">Date of Posting</div>
                                <div class="job-post-block">Job Location</div>
                                <div class="job-post-block">Payment</div>
                                <div class="job-post-block">Booking Time</div>
                            </div>

                            <?php
                                $data = $s_que->show_job_by_user();
                                if ($data != false) {
                                foreach($data as $result){
                            ?>

                                <div class="job-post-content">
                                    <a href="update_job.php?j_id=<?php echo $result['j_id'] ?>" class="job-post-block"><?php echo $result['j_title'] ?></a>
                                    <div class="job-post-block"><?php echo $result['j_date'] ?></div>
                                    <div class="job-post-block"><?php echo $result['j_booking_location'] ?></div>
                                    <div class="job-post-block"><?php echo $result['j_payment'] ?></div>
                                    <div class="job-post-block"><?php echo $result['j_booking_date'] ?>, <?php echo $result['j_booking_time'] ?></div>
                                </div>

                                <?php } ?>
                            <?php }else{ ?>
                                <h2>Post New Job or Wait for Approval.</h2>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
    </html>
</body>
</html>
