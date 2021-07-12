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


<?php if (Session::show_value("user_type") == "employe") { ?>
    <!DOCTYPE html>
    <html lang="en">

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
                <a href="browse_job_seeker.php">Browse All Job Seekers</a>
                <a href="new_job.php">Post a New Job</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>

        <?php
            $j_id = $_GET['j_id'];
            $s_que->check_job_seeker($j_id);
            $data = $s_que->display_job_seeker_details($j_id)->fetch_assoc();
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
                        <div class="city">Nationality: <b><?php echo $data['j_nationality'] ?></b></div>
                        <div class="city">Gender: <b><?php echo $data['j_gender'] ?></b></div>
                        <a href="chat_message.php?message_id=<?php echo $data['j_from'] ?>" class="btn">Send Message</a>
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
<?php }?>

<?php if(Session::show_value("user_type") == "job_seeker"){ ?>
    <?php

        $e_id = $_GET['e_id'];

        $s_que->select_employe_by_id($e_id);
        $data = $s_que->display_employee_by_id($e_id)->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/edit_profile.css">
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

        <div class="edit-profile">
            <div class="edit-profile-container">
                <div class="edit-profile-left">
                    <div class="edit-profile-left-img">
                        <img src="employe_img/<?php echo $data['e_img'] ?>" width="100%" height="100%" alt="">
                    </div>

                    <div class="edit-profile-left-text">
                        <h1 class="name"><?php echo $data['e_name'] ?></h1>
                        <div class="age">Age: <b><?php echo $data['e_age'] ?></b></div>
                        <div class="nationality">Nationality: <b><?php echo $data['e_nationality'] ?></b></div>
                        <div class="city">Location: <b><?php echo $data['e_location'] ?></b></div>
                        <div class="male">Gender: <b><?php echo $data['e_gender'] ?></b></div>
                        <a href="chat_message.php?message_id=<?php echo $data['e_from'] ?>" class="btn">Send Message</a>
                    </div>
                </div>

                <div class="edit-profile-right">
                    <div class="edit-profile-right-text">

                        <div class="edit-profile-right-text-block-header">
                            <div class="edit-profile-right-text-block-header-block" onclick="show_tab('details')"
                                id="details2"><?php echo $data['e_name'] ?> Details</div>
                        </div>

                        <h1><?php echo $data['e_title'] ?></h1>

                        <div class="edit-profile-right-text-block" id="details">
                            <h2>About <?php echo $data['e_name'] ?></h2>

                            <p>
                                <?php echo $data['e_description'] ?>
                            </p>

                            <h3>Employer Type: <?php echo $data['e_type'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php } ?>
