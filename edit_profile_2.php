<?php
    include_once 'lib/Main_Query.php';
    error_reporting(0);

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
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/job_seeker_details.css">
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

        <?php
            $mn = new Main_Query();
            $u_id = $_GET['u_id'];

            $data = $mn->display_job_seeker_data_by_name($u_id)->fetch_assoc();
        ?>

        <div class="job-seeker-details">
            <div class="job-seeker-details-container">
                <div class="job-seeker-left">
                    <div class="job-seeker-left-img">
                        <img src="job_seeker_img/<?php echo $data['j_img'] ?>" width="100%" height="100%" alt="">
                    </div>

                    <div class="job-seeker-left-text">
                        <div class="name"><?php echo $data['j_name'] ?></div>
                        <div class="age">Age: <b><?php echo $data['j_age'] ?></b></div>
                        <div class="city">City: <b><?php echo $data['j_location'] ?></b></div>
                        <div class="city">Gender: <b><?php echo $data['j_gender'] ?></b></div>
                        <div class="btn">Send Message</div>
                    </div>
                </div>

                <div class="job-seeker-right">
                    <div class="job-seeker-right-text">
                        <h1>Skills: <?php echo $data['j_skill'] ?></h1>

                        <div class="job-seeker-right-text-header">
                            <?php echo $data['j_description'] ?>
                        </div>

                        <div class="job-seeker-right-text-footer">
                            Sarah is Looking Work As: <b><?php echo $data['j_interest'] ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>
