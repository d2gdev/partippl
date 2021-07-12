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
    <html lang="en-ca">

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

        <?php if (Session::show_value("employe_check") == "ok") { ?>
            <?php  $data = $s_que->display_employee_data()->fetch_assoc(); ?>

            <div class="edit-profile">
                <div class="edit-profile-container">
                    <div class="edit-profile-left">
                        <div class="edit-profile-left-img">
                            <img src="employe_img/<?php echo $data['e_img'] ?>" width="100%" height="100%" style="border: 1px solid black;" alt="">
                        </div>

                        <div class="edit-profile-left-text">
                            <h1 class="name"><?php echo $data['e_name'] ?></h1>
                            <div class="age">Age: <b><?php echo $data['e_age'] ?></b></div>
                            <div class="nationality">Nationality: <b><?php echo $data['e_nationality'] ?></b></div>
                            <div class="city">Location: <b><?php echo $data['e_location'] ?></b></div>
                            <div class="male">Gender: <b><?php echo $data['e_gender'] ?></b></div>
                        </div>
                    </div>

                    <div class="edit-profile-right">
                        <div class="edit-profile-right-text">

                            <div class="edit-profile-right-text-block-header">
                                <div class="edit-profile-right-text-block-header-block" onclick="show_tab('details')" id="details2"><?php echo $data['e_name'] ?> Details</div>
                                <div class="edit-profile-right-text-block-header-block" onclick="show_tab('job_post')"><?php echo $data['e_name'] ?> Job Postings</div>
                            </div>

                            <div class="edit-profile-right-text-block" id="details">
                                <h1><?php echo $data['e_title'] ?></h1>

                                <h2>About <?php echo $data['e_name'] ?></h2>

                                <p>
                                    <?php echo $data['e_description'] ?>
                                </p>

                                <h3>Employer Type: <?php echo $data['e_type'] ?></h3>

                                <a href="set_up_profile.php" class="btn">Edit Profile</a>

                                <br><br><br>

                                <?php
                                    $employe_review_data = $s_que->select_review_for_employe();
                                    if ($employe_review_data != false) {
                                    foreach($employe_review_data as $data){
                                ?>
                                        <div class="job-rating-block">
                                            <p>Received <b><?php echo $data['r_rating'] ?></b> Star Out of 5 From <b><?php echo $data['r_from'] ?></b></p>
                                            <div><?php echo $data['r_comment'] ?></div>
                                            <br>
                                            <hr>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="edit-profile-right-text-block" id="job_post">
                                <div class="job-post-header">
                                    <div class="job-post-block">Job Title</div>
                                    <div class="job-post-block">Date of Posting</div>
                                    <div class="job-post-block">Apply Last Date</div>
                                </div>

                                <?php
                                    $data = $s_que->show_job_list_by_employe();
                                    if ($data != false) {
                                ?>
                                    <?php foreach($data as $result){  ?>

                                        <div class="job-post-content">
                                            <a href="update_job.php?j_id=<?php echo $result['j_id'] ?>" class="job-post-block"><?php echo $result['j_title'] ?></a>
                                            <div class="job-post-block"><?php echo $result['j_date'] ?></div>
                                            <div class="job-post-block"><?php echo $result['j_booking_date'] ?></div>
                                        </div>

                                    <?php } ?>
                                <?php }else{ ?>
                                    <h4>Post new job or Wait for Approval.</h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else { ?>
            <div style="text-align: center">
                <h2 style="text-align: center">You need to setup your profile before you can use that feature.</h2>
                <a href="set_up_profile.php" style="text-align: center" class="btn">Click Here</a>
            </div>
        <?php } ?>

        <script src="js/main.js"></script>
    </body>
    </html>
<?php } ?>

<?php if (Session::show_value("user_type") == "job_seeker") { ?>
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
                $job_seeker_data = $s_que->display_job_seeker_data();
                if ($job_seeker_data != false) {
                    $data = $job_seeker_data->fetch_assoc();
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
                            </div>
                        </div>

                        <div class="job-seeker-right">
                            <div class="job-seeker-right-text">
                                <h1>Skills: <?php echo $data['j_skill'] ?></h1>

                                <div class="job-seeker-right-text-header">
                                    <?php echo $data['j_description'] ?>
                                </div>

                                <div class="job-seeker-right-text-footer">
                                    <?php echo $data['j_name'] ?> Looking Work As: <b><?php echo $data['j_interest'] ?></b>
                                </div>

                                <a href="set_up_profile.php" class="btn">Edit Profile</a>
                            </div>
                            <br><br><br>

                            <?php
                                $reveiew = $s_que->select_job_seeker_rating();
                                if($reveiew != false){
                                    foreach($reveiew as $data){
                                    $j_id = $data['j_id'];
                                    $r_from = $data['r_from'];
                                    $r_publish_date = $data['r_publish_date'];

                                    $job_seeker_review_check = $s_que->check_job_seeker_review($j_id, $r_from);
                                    if($job_seeker_review_check !=  false){
                                ?>
                                        <div class="job-rating-block">
                                            <p>Received <b><?php echo $data['r_rating'] ?></b> Star Out of 5 From <b><?php echo $data['r_from'] ?></b></p>
                                            <div><?php echo $data['r_comment'] ?></div>
                                            <br>
                                            <hr>
                                        </div>
                                    <?php }else{ ?>
                                        <?php
                                            $date = date('Y-m-d');
                                            if($date == $r_publish_date){
                                        ?>
                                            <div class="job-rating-block">
                                                <p>Received <b><?php echo $data['r_rating'] ?></b> Star Out of 5 From <b><?php echo $data['r_from'] ?></b></p>
                                                <div><?php echo $data['r_comment'] ?></div>
                                                <br>
                                                <hr>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php }else{ ?>
            <div style="text-align: center">
                <h2 style="text-align: center">You need to setup your profile before you can use that feature.</h2>
                <a href="set_up_profile.php" style="text-align: center" class="btn">Set Up Profile</a>
            </div>
        <?php } ?>
    </body>
    </html>
<?php }?>
