<?php
    include_once 'lib/Session.php';
    Session::session_start();

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
    <html lang="en">
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
        <?php if(Session::show_value("user_type") == "employe"){ ?>
            <div class="header">
                <div class="header-container">
                    <div class="header-left">
                        <div class="logo"><a href="dashboard.php"><img src="img/ppl-Logo.png"></a></a></div>
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
                        <a href="job_posting.php">All Job Postings</a>
                        <a href="job_application.php">Job Applications</a>
                        <a href="job_history.php">Job History</a>
                    </div>

                    <div class="hero-right">
                        <div class="hero-right-header">Welcome to PartiPpl!</div>
                        <div class="hero-right-text">You are Logged in as an <b>Employer</b></div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if(Session::show_value("user_type") == "job_seeker"){ ?>
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
                        <div class="hero-right-text">You are Logged in as a <b>Job Seeker</b></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
    </html>
</body>
</html>
