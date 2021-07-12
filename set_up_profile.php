<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    error_reporting(0);

    $s_que = new Select_Query();
    $mn = new Main_Query();

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
        <link rel="stylesheet" href="css/new_job.css">
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

        <div class="new-job">
            <div class="new-job-container">
                <div class="new-job-header">
                    <h1>Set Up Your Profile</h1>
                </div>

                <?php

                    $s_que->check_employe_profile();

                    if(Session::show_value("employe_check") == "ok"){
                        $data = $s_que->display_employee_data()->fetch_assoc();
                    }
                ?>

                <form action="set_up_profile_code.php" enctype="multipart/form-data" method="POST" class="new-job-content">
                    <div class="job-block">
                        <input type="text" name="e_name" placeholder="Employer Name" value="<?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_name']; } ?>" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("e_name") != ""){ ?>
                        <span><?php echo Session::show_value("e_name"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="e_title" placeholder="Employer Title" value="<?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_title']; } ?>" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("e_title") != ""){ ?>
                        <span><?php echo Session::show_value("e_title"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <select name="e_type" id="" class="text-field">
                            <option value="NONE">--Employer Type--</option>
                            <?php if(Session::show_value("employe_check") == "ok"){ ?>
                                <option value="<?php echo $data['e_type']; ?>" selected><?php echo $data['e_type']; ?></option>
                            <?php } ?>
                            <option value="Company Employer">Company Employer</option>
                            <option value="Private Employer">Private Employer</option>
                        </select>
                    </div>

                    <?php if(Session::show_value("e_type") != ""){ ?>
                        <span><?php echo Session::show_value("e_type"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <select name="e_location" id="" class="text-field">
                            <option value="NONE">--Location--</option>
                            <?php if(Session::show_value("employe_check") == "ok"){ ?>
                                <option value="<?php echo $data['e_location']; ?>" selected><?php echo $data['e_location']; ?></option>
                            <?php } ?>
                            <option value="CarCar">CarCar</option>
                            <option value="Carmen">Carmen</option>
                            <option value="Cebu City">Cebu City</option>
                            <option value="Consolation">Consolation</option>
                            <option value="Compostella">Compostella</option>
                            <option value="Cordova">Cordova</option>
                            <option value="Danao">Danao</option>
                            <option value="Lapu Lapu">Lapu Lapu</option>
                            <option value="Liloan">Liloan</option>
                            <option value="Mandaue City">Mandaue City</option>
                            <option value="Minglanilla">Minglanilla</option>
                            <option value="Naga">Naga</option>
                            <option value="San Fernando">San Fernando</option>
                            <option value="Talisay">Talisay</option>
                            <option value="Toledo">Toledo</option>
                        </select>
                    </div>

                    <?php if(Session::show_value("e_location") != ""){ ?>
                        <span><?php echo Session::show_value("e_location"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="e_nationality" value="<?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_nationality']; } ?>" placeholder="Nationality" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("e_nationality") != ""){ ?>
                        <span><?php echo Session::show_value("e_nationality"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="file" name="e_image" placeholder="image" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("e_image") != ""){ ?>
                        <span><?php echo Session::show_value("e_image"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="e_age" placeholder="Age" value="<?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_age']; } ?>" id="" class="text-field">
                    </div>

                    <div class="job-block">
                        <div><input type="radio" name="e_gender" value="Male" id="male" checked> <label for="male">Male</label></div>
                        <div><input type="radio" name="e_gender" value="Female" id="female"> <label for="female">Female</label></div>
                    </div>

                    <?php if(Session::show_value("e_age") != ""){ ?>
                        <span><?php echo Session::show_value("e_age"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <textarea name="e_description" id="" cols="10" rows="5" placeholder="Employee Descriptions" class="text-field" value=" <?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_description']; } ?> "><?php if(Session::show_value("employe_check") == "ok"){ echo $data['e_description']; } ?></textarea>
                    </div>

                    <?php if(Session::show_value("e_description") != ""){ ?>
                        <span><?php echo Session::show_value("e_description"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="submit" value="Set Up Profile" name="employe" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
<?php } ?>

<?php if (Session::show_value("user_type") == "job_seeker") { ?>
    <!DOCTYPE html>
    <html lang="en-ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/new_job.css">
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

        <div class="new-job">
            <div class="new-job-container">
                <div class="new-job-header">
                    <h1>Set Up Your Profile</h1>
                </div>

                <?php
                    $s_que->check_job_seeker_profile();
                    if (Session::show_value("job_seeker_check") == "ok") {
                        $job_seeker_data = $s_que->display_job_seeker_data();
                        if ($job_seeker_data != false) {
                            $data = $job_seeker_data->fetch_assoc();
                        }
                    }
                ?>

                <?php if(Session::show_value("profile_message") != ""){ ?>
                    <h1><?php echo Session::show_value("profile_message"); ?></h1>
                <?php } ?>

                <form action="set_up_profile_code.php" enctype="multipart/form-data" method="POST" class="new-job-content">
                    <div class="job-block">
                        <input type="text" name="j_name" value="<?php echo $data['j_name'] ?>" placeholder="Job Seeker Name" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("j_name") != ""){ ?>
                        <span><?php echo Session::show_value("j_name"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="j_title" value="<?php echo $data['j_title'] ?>" placeholder="Job Seeker Title" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("j_title") != ""){ ?>
                        <span><?php echo Session::show_value("j_title"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <select name="j_interest" id="" class="text-field">
                            <option value="NONE">--Select Your Interest--</option>

                            <?php if(Session::show_value('job_seeker_check') == "ok"){ ?>
                                <option value="<?php echo $data['j_interest'] ?>" selected><?php echo $data['j_interest'] ?></option>
                            <?php } ?>

                            <option value="Female Bartender">Female Bartender</option>
                            <option value="Female Entertainer">Female Entertainer</option>
                            <option value="Female Promotions">Female Promotions</option>
                            <option value="Waitress">Waitress</option>
                            <option value="Male Bartender">Male Bartender</option>
                            <option value="Male Entertainer">Male Entertainer</option>
                            <option value="Male Promotions">Male Promotions</option>
                            <option value="Waiter">Waiter</option>
                        </select>
                    </div>

                    <?php if(Session::show_value("j_interest") != ""){ ?>
                        <span><?php echo Session::show_value("j_interest"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <select name="j_location" id="" class="text-field">
                            <option value="NONE">--Location--</option>

                            <?php if(Session::show_value('job_seeker_check') == "ok"){ ?>
                                <option value="<?php echo $data['j_location'] ?>" selected><?php echo $data['j_location'] ?></option>
                            <?php } ?>

                            <option value="CarCar">CarCar</option>
                            <option value="Carmen">Carmen</option>
                            <option value="Cebu City">Cebu City</option>
                            <option value="Consolation">Consolation</option>
                            <option value="Compostella">Compostella</option>
                            <option value="Cordova">Cordova</option>
                            <option value="Danao">Danao</option>
                            <option value="Lapu Lapu">Lapu Lapu</option>
                            <option value="Liloan">Liloan</option>
                            <option value="Mandaue City">Mandaue City</option>
                            <option value="Minglanilla">Minglanilla</option>
                            <option value="Naga">Naga</option>
                            <option value="San Fernando">San Fernando</option>
                            <option value="Talisay">Talisay</option>
                            <option value="Toledo">Toledo</option>
                        </select>
                    </div>

                    <?php if(Session::show_value("j_location") != ""){ ?>
                        <span><?php echo Session::show_value("j_location"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="j_nationality" value="<?php echo $data['j_nationality'] ?>" placeholder="Your Nationality" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("j_nationality") != ""){ ?>
                        <span><?php echo Session::show_value("j_nationality"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="file" name="j_image" placeholder="Your Photo" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("j_image") != ""){ ?>
                        <span><?php echo Session::show_value("j_image"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <select name="j_skill" id="" class="text-field">
                            <option value="NONE">--Rate Your Skills--</option>

                            <?php if(Session::show_value('job_seeker_check') == "ok"){ ?>
                                <option value="<?php echo $data['j_skill'] ?>" selected><?php echo $data['j_skill'] ?></option>
                            <?php } ?>

                            <option value="Skill 1">Level 1</option>
                            <option value="Skill 2">Level 2</option>
                            <option value="Skill 3">Level 3</option>
                            <option value="Skill 4">Level 4</option>
                        </select>
                    </div>

                    <?php if(Session::show_value("j_skill") != ""){ ?>
                        <span><?php echo Session::show_value("j_skill"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="text" name="j_age" value="<?php echo $data['j_age'] ?>" placeholder="Job Seeker's Age" id="" class="text-field">
                    </div>

                    <?php if(Session::show_value("j_age") != ""){ ?>
                        <span><?php echo Session::show_value("j_age"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        Selected Gender: <?php echo $data['j_gender'] ?>
                    </div>

                    <div class="job-block">
                        <div><input type="radio" name="j_gender" id="male" value="Male" checked> <label for="male">Male</label></div>
                        <div><input type="radio" name="j_gender" id="female" value="Female"> <label for="female">Female</label></div>
                    </div>

                    <div class="job-block">
                        <textarea name="j_description" id="" cols="10" rows="5" placeholder="Write a bit about yourself." class="text-field"><?php echo $data['j_description'] ?></textarea>
                    </div>

                    <?php if(Session::show_value("j_description") != ""){ ?>
                        <span><?php echo Session::show_value("j_description"); ?></span>
                    <?php } ?>

                    <div class="job-block">
                        <input type="submit" value="Set Up Profile" name="job_seeker" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
<?php } ?>

<?php
    Session::remove_value("profile_message");
    Session::remove_value("e_name");
    Session::remove_value("e_title");
    Session::remove_value("e_type");
    Session::remove_value("e_location");
    Session::remove_value("e_image");
    Session::remove_value("e_nationality");
    Session::remove_value("e_age");
    Session::remove_value("e_description");
?>

<?php
    Session::remove_value("profile_message");
    Session::remove_value("j_name");
    Session::remove_value("j_title");
    Session::remove_value("j_interest");
    Session::remove_value("j_location");
    Session::remove_value("j_image");
    Session::remove_value("j_nationality");
    Session::remove_value("j_skill");
    Session::remove_value("j_age");
    Session::remove_value("j_description");
?>
