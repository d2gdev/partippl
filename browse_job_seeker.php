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
        <title>Party Empleyee</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/job_seeker.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php if (Session::show_value("user_type") == "employe") { ?>
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
                $s_que->check_employe_profile();
            ?>

            <?php if(Session::show_value("employe_check") == "ok"){ ?>
                <?php
                    $data = $s_que->select_all_job_seeker();
                    if ($data != false) {
                ?>
                    <div class="job-seeker">
                        <div class="job-seeker-container">
                            <?php foreach($data as $result){ ?>
                                <div class="job-seeker-block">
                                    <div class="job-seeker-img">
                                        <img src="job_seeker_img/<?php echo $result['j_img'] ?>" width="100%" height="100%" alt="">
                                    </div>

                                    <div class="job-seeker-text">
                                        <a href="job_seeker_details.php?j_id=<?php echo $result['j_id'] ?>" class="name"><?php echo $result['j_name'] ?></a>
                                        <div class="age"><b>Age: </b><?php echo $result['j_age'] ?></div>
                                        <div class="city"><b>City: </b><?php echo $result['j_location'] ?></div>
                                        <div class="skill"><b>Skills: </b><?php echo $result['j_skill'] ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <a href="#" class="load-btn">Load More</a>
                <?php }else{ ?>
                    <h2 style="text-align: center">No jobseekers are available at the moment.</h2>
                <?php } ?>
            <?php }else{ ?>
                <h2 style="text-align: center">You need to setup your profile before you can use that feature.</h2>
            <?php } ?>
        <?php } ?>

        <?php if (Session::show_value("user_type") == "job_seeker") { ?>
            <div class="header">
                <div class="header-container">
                    <div class="header-left">
                        <div class="logo"><a href="dashboard.php"><img src="img/ppl-Logo"></a></div>
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
                $s_que->check_job_seeker_profile();
            ?>

            <?php if(Session::show_value("job_seeker_check") == "ok"){ ?>
                <?php
                    $data = $s_que->display_all_employee();
                    if ($data != false) {
                ?>
                    <div class="job-seeker">
                        <div class="job-seeker-container">
                            <?php foreach($data as $result){ ?>
                                <div class="job-seeker-block">
                                    <div class="job-seeker-img">
                                        <img src="employe_img/<?php echo $result['e_img'] ?>" style="border: 1px solid black" width="100%" height="100%" alt="">
                                    </div>

                                    <div class="job-seeker-text">
                                        <a href="job_seeker_details.php?e_id=<?php echo $result['e_id'] ?>" class="name"><?php echo $result['e_name'] ?></a>
                                        <div class="age"><b>Age: </b> <?php echo $result['e_age'] ?></div>
                                        <div class="city">Nationality: <b><?php echo $result['e_nationality'] ?></b></div>
                                        <div class="skill">Gender <b><?php echo $result['e_gender'] ?></b></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <a href="#" class="load-btn">Load More</a>
                <?php }else{ ?>
                    <h2 style="text-align: center">No employers are currently available.</h2>
                <?php } ?>
            <?php }else{ ?>
                <h2 style="text-align: center">You need to setup your profile before you can use that feature.</h2>
            <?php } ?>
        <?php } ?>
    </body>
    </html>
</body>
</html>
