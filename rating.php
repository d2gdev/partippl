<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Select_Query.php';

    $i_que = new Insert_Query();
    $s_que = new Select_Query();

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
                    <a href="browse_job_seeker.php">Browse All Job Seekers</a>
                    <a href="new_job.php">Post a New Job</a>
                    <a href="change_password.php">Reset Password</a>
                    <a href="edit_profile.php">Edit My Profile</a>
                    <a href="mail.php">Mailbox <sup>(02)</sup></a>
                </div>
            </div>

            <?php
                $j_id = $_GET['rating_id'];
                $r_to = $_GET['received_by'];
                $s_que->job_applicant_by_id($r_to, $j_id);
            ?>

                <form action="rating_code.php" method="POST" class="rating-block">
                    <input type="hidden" name="j_id" value="<?php echo $j_id ?>">
                    <input type="hidden" name="r_to" value="<?php echo $r_to ?>">

                    <select name="rating" id="" class="text-field">
                        <option value="NONE">How Would you rate this Employer?/option>
                        <option value="1">01-Terrible, I wish I Could Rate Less than 1!</option>
                        <option value="2">02-I Was Not At All Pleased!</option>
                        <option value="3">03-Could Have Been Better</option>
                        <option value="4">04-Was Almost Perfect</option>
                        <option value="5">05-Exceeded Expectations</option>
                    </select>

                    <?php if (Session::show_value("rating") != "") {?>
                        <span><?php echo Session::show_value("rating"); ?></span>
                    <?php }?>

                    <textarea name="rating_text" id="" cols="30" rows="5" class="text-field" placeholder="Tell Us About Your Experience"></textarea>

                    <?php if (Session::show_value("rating_text") != "") {?>
                        <span><?php echo Session::show_value("rating_text"); ?></span>
                    <?php }?>

                    <input type="submit" value="Send Rating" class="btn" name="employe">
                </form>
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
                    <a href="browse_job_seeker.php">Browse All Job Seekers</a>
                    <a href="new_job.php">Browse All Jobs</a>
                    <a href="change_password.php">Reset Password</a>
                    <a href="edit_profile.php">Edit My Profile</a>
                    <a href="mail.php">Mailbox <sup>(02)</sup></a>
                </div>
            </div>

            <?php
                $j_id = $_GET['rating_id'];
                $r_to = $_GET['received_by'];
                $s_que->job_emploeye_by_id($r_to, $j_id);
            ?>

            <form action="rating_code.php" method="post" class="rating-block">

                <input type="hidden" name="j_id" value="<?php echo $j_id ?>">
                <input type="hidden" name="r_to" value="<?php echo $r_to ?>">

                <select name="rating" id="" class="text-field">
                    <option value="NONE">Rating Job Seeker</option>
                    <option value="1">01-Terrible, I wish I Could Rate Less than 1!</option>
                    <option value="2">02-I Was Not At All Pleased!</option>
                    <option value="3">03-Could Have Been Better</option>
                    <option value="4">04-Was Almost Perfect</option>
                    <option value="5">05-Exceeded Expectations</option>
                </select>

                <?php if (Session::show_value("rating") != "") {?>
                    <span><?php echo Session::show_value("rating"); ?></span>
                <?php }?>

                <textarea name="rating_text" id="" cols="30" rows="5" class="text-field" placeholder="Tell Us About Your Experience"></textarea>

                <?php if (Session::show_value("rating_text") != "") {?>
                    <span><?php echo Session::show_value("rating_text"); ?></span>
                <?php }?>

                <input type="submit" value="Send Rating" class="btn" name="job_seeker">
            </form>
        <?php } ?>
    </body>
    </html>
</body>
</html>

<?php
    Session::remove_value("rating");
    Session::remove_value("rating_text");
?>
