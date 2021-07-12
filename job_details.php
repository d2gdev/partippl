<?php
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();

    if (Session::show_value("u_name") == null || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == null || Session::show_value("user_type") == "") {
        header("Location: login.php");
    }
?>

<?php if (Session::show_value("user_type") == "job_seeker") {?>
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
        <html lang="en-ca">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Dashboard</title>
            <link rel="stylesheet" href="css/dashboard.css">
            <link rel="stylesheet" href="css/job_seeker.css">
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
                    <a href="browse_job_seeker.php">Browse Employe</a>
                    <a href="new_job.php">Browse All Job</a>
                    <a href="change_password.php">Reset Password</a>
                    <a href="edit_profile.php">Edit My Profile</a>
                    <a href="mail.php">Mailbox <sup>(02)</sup></a>
                </div>
            </div>

            <?php
                $j_id = $_GET['j_id'];
                $s_que->check_job_seeker_profile();
                $s_que->select_single_job_by_id($j_id);

                $data = $s_que->single_job_details($j_id)->fetch_assoc();
                $apply2 = $s_que->apply_status($j_id);
                if ($apply2 != false) {
                    $apply = $apply2->fetch_assoc();
                }
            ?>

            <?php if(Session::show_value("job_seeker_check") == "ok"){ ?>
                <div class="job-seeker">
                    <div class="job-seeker-container"><div class="signle-job-block"><b>Name:</b> <?php echo $data['j_title'] ?></div>
                        <div class="signle-job-block"><b>Booking Location:</b> <?php echo $data['j_booking_location'] ?></div>
                        <div class="signle-job-block"><b>Job Type:</b> <?php echo $data['j_type'] ?></div>
                        <div class="signle-job-block"><b>Join Date & Time:</b> <?php echo $data['j_booking_date'] ?> <?php $data['j_booking_time'] ?> </div>
                        <div class="signle-job-block"><b>Total Payment:</b> <?php echo $data['j_payment'] ?></div>
                        <div class="signle-job-block"><b>Work Hour:</b> <?php echo $data['j_work_hour'] ?></div>
                        <div class="signle-job-block"><b>Job Description:</b> <?php echo $data['j_description'] ?></div>
                        <div class="signle-job-block"><b>Posted By:</b> <?php echo $data['j_post_by'] ?></div>
                        <div class="signle-job-block"><b>Posted on:</b> <?php echo $data['j_date'] ?></div>
                        <div class="signle-job-block"><b>Join Date & Time:</b> <?php echo $data['j_booking_date'].$data['j_booking_date'] ?></div>

                    </div>
                </div>

                <?php
                    $date = date('Y-m-d');

                    if ($data['j_booking_date'] == $date) {
                ?>

                    <h2 style="text-align: center">Apply Date Expired</h2>

                <?php }else{ ?>

                    <?php if(Session::show_value("apply_status") == "apply"){ ?>
                        <h3 style="text-align: center">Apply Status <?php echo $apply['a_status'] ?> </h3>
                    <?php }else{ ?>
                        <form action="apply_code.php" method="post" style="text-align: center">
                            <input type="hidden" name="posted_by" value="<?php echo $data['j_post_by'] ?>">
                            <input type="hidden" name="job_id" value="<?php echo $j_id ?>">
                            <input type="submit" value="Apply Job" class="apply-btn">
                        </form>
                    <?php } ?>

                <?php } ?>
            <?php }else{ ?>
                <h2 style="text-align: center">First You Need to Set up Profile</h2>
            <?php } ?>

        </body>
        </html>
    </body>
    </html>
<?php }?>
