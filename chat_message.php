<?php
    include_once 'lib/Select_Query.php';
    $s_que = new Select_Query();

    error_reporting(0);

    if (Session::show_value("u_name") == NULL || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == NULL || Session::show_value("user_type") == "" ) {
        header("Location: login.php");
    }
?>

<?php if(Session::show_value("user_type") == "employe"){ ?>
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
            $msg_id = $_GET['message_id'];

            $s_que->check_job_seeker_by_u_name($msg_id);
        ?>

        <form method="POST" action="chat_message_code.php" class="chat_message">
            <input type="hidden" name="received_by" value="<?php echo $msg_id; ?>">
            <textarea name="chat_message" id="" cols="30" rows="10" class="text-field" placeholder="Type Message Here"></textarea>
            <?php if(Session::show_value('chat_message') != ""){ ?>
                <?php echo Session::show_value('chat_message') ?>
            <?php } ?>
            <input type="submit" value="Send Message" class="btn" name="employee">
        </form>
    </body>

    </html>
<?php } ?>

<?php if(Session::show_value("user_type") == "job_seeker"){ ?>
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
            $msg_id = $_GET['message_id'];
            $s_que->check_employe_by_u_name($msg_id);
        ?>

        <form method="POST" action="chat_message_code.php" class="chat_message">
            <input type="hidden" name="received_by" value="<?php echo $msg_id; ?>">
            <textarea name="chat_message" id="" cols="30" rows="10" class="text-field" placeholder="Type Message Here"></textarea>

            <?php if(Session::show_value('chat_message') != ""){ ?>
                <?php echo Session::show_value('chat_message') ?>
            <?php } ?>

            <input type="submit" value="Send Message" class="btn" name="job_seeker">
        </form>
    </body>

    </html>
<?php } ?>

<?php
    Session::remove_value("chat_message");
?>
