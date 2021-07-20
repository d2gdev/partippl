<?php
    include_once 'lib/Select_Query.php';

    error_reporting(0);

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
        <link rel="stylesheet" href="css/edit_profile.css">
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
                    <div class="logo">Logo Here</div>
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
                <a href="browse_job_seeker.php">Browse Job Seekers</a>
                <a href="new_job.php">Post a New Job</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>

        <?php
            $j_id = $_GET['j_id'];
            $s_que->select_update_job($j_id);
            $s_que->check_employe_profile();
            
            $data = $s_que->select_job_details($j_id)->fetch_assoc();
        ?>

        <?php if (Session::show_value("employe_check") == "ok") { ?>
            <div class="edit-profile">
                <div class="edit-profile-container">
                    <form action="update_job_code.php" method="POST" class="new-job-content">
                        <div class="job-block">
                            <input type="hidden" name="j_id" value="<?php echo $j_id ?>">
                            <input type="text" name="j_title" value="<?php echo $data['j_title'] ?>" placeholder="Job Title" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_title") != "") {?>
                            <span><?php echo Session::show_value("j_title"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <select name="j_location" id="" class="text-field">
                                <option value="NONE">--Booking Location--</option>
                                <?php if(Session::show_value("employe_check") == "ok"){ ?>
                                    <option value="<?php echo $data['j_booking_location'] ?>" selected><?php echo $data['j_booking_location'] ?></option>
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
                                <option value="Toldedo">Toldedo</option>
                            </select>
                        </div>

                        <?php if (Session::show_value("j_location") != "") {?>
                            <span><?php echo Session::show_value("j_location"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <select name="j_type" id="" class="text-field">
                                <option value="NONE">--Select Job Type--</option>
                                <?php if(Session::show_value("employe_check") == "ok"){ ?>
                                    <option value="<?php echo $data['j_type'] ?>" selected><?php echo $data['j_type'] ?></option>
                                <?php } ?>
                                <option value="Female Bartender">Female Bartender</option>
                                <option value="Female Entertainers">Female Entertainers</option>
                                <option value="Female Promotions">Female Promotions</option>
                                <option value="Male Bartender">Male Bartender</option>
                                <option value="Male Entertainers">Male Entertainers</option>
                                <option value="Male Promotions">Male Promotions</option>
                                <option value="Waiter">Waiter</option>
                                <option value="Waitress">Waitress</option>
                            </select>
                        </div>

                        <?php if (Session::show_value("j_type") != "") {?>
                            <span><?php echo Session::show_value("j_type"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="date" name="j_date" value="<?php echo $data['j_booking_date'] ?>" placeholder="Booking Date" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_date") != "") {?>
                            <span><?php echo Session::show_value("j_date"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="text" name="j_payment" value="<?php echo $data['j_payment'] ?>" placeholder="Total Payment" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_payment") != "") {?>
                            <span><?php echo Session::show_value("j_payment"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="text" name="j_work_hour" value="<?php echo $data['j_work_hour'] ?>" placeholder="Cumulative Work Hours" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_work_hour") != "") {?>
                            <span><?php echo Session::show_value("j_work_hour"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <textarea name="j_description" id="" cols="10" rows="5" placeholder="Job Descriptions" class="text-field"><?php echo $data['j_description'] ?></textarea>
                        </div>

                        <?php if (Session::show_value("j_description") != "") {?>
                            <span><?php echo Session::show_value("j_description"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="submit" value="Update Job" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        <?php }else { ?>
            <div style="text-align: center">
                <h2 style="text-align: center">First You need to set up your Profile</h2>
                <a href="set_up_profile.php" style="text-align: center" class="btn">Click Here</a>
            </div>
        <?php } ?>

        <script src="js/main.js"></script>
    </body>
    </html>

    <?php
        Session::remove_value("job_message");
        Session::remove_value("j_title");
        Session::remove_value("j_location");
        Session::remove_value("j_type");
        Session::remove_value("j_date");
        Session::remove_value("j_hour");
        Session::remove_value("j_payment");
        Session::remove_value("j_work_hour");
        Session::remove_value("j_description");
    ?>
<?php } ?>


