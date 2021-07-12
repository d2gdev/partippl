<?php
    include_once 'lib/Select_Query.php';
    error_reporting(0);

    $s_que = new Select_Query();

    if (Session::show_value("u_name") == null || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == null || Session::show_value("user_type") == "") {
        header("Location: login.php");
    }
?>

<?php if (Session::show_value("user_type") == "employe") {?>
    <!DOCTYPE html>
    <html lang="en">

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

        <?php
            $s_que->check_employe_profile();
        ?>

        <?php if (Session::show_value("employe_check") == "ok") { ?>
            <div class="new-job">
                <div class="new-job-container">
                    <div class="new-job-header">
                        <h1>Submit a New Job!</h1>

                        <p>
                            If you are looking to hire for a position, posting a job advert is the fastest way to get results!
                        </p>
                    </div>

                    <?php if (Session::show_value("job_message") != "") {?>
                        <h1><?php echo Session::show_value("job_message"); ?></h1>
                    <?php }?>

                    <form action="new_job_code.php" method="POST" class="new-job-content">
                        <div class="job-block">
                            <input type="text" name="j_title" placeholder="Job Title" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_title") != "") {?>
                            <span><?php echo Session::show_value("j_title"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <select name="j_location" id="" class="text-field">
                                <option value="NONE">--Booking Location--</option>
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

                        <?php if (Session::show_value("j_location") != "") {?>
                            <span><?php echo Session::show_value("j_location"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <select name="j_type" id="" class="text-field">
                                <option value="NONE">--Select Job Type--</option>
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
                            <input type="date" name="j_date" placeholder="Booking Date" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_date") != "") {?>
                            <span><?php echo Session::show_value("j_date"); ?></span>
                        <?php }?>

                        <div class="job-block" id="job-block">
                            <select name="j_hour" id="" class="text-field">
                                <option value="NONE">--Select Booking Hour-</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>

                            <?php if (Session::show_value("j_hour") != "") {?>
                                <span><?php echo Session::show_value("j_hour"); ?></span>
                            <?php }?>

                            <select name="j_minute" id="" class="text-field">
                                <option value="NONE">--Select Booking Minute--</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="33">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                            </select>

                            <?php if (Session::show_value("j_minute") != "") {?>
                                <span><?php echo Session::show_value("j_minute"); ?></span>
                            <?php }?>

                            <select name="j_am" id="" class="text-field">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>

                        <div class="job-block">
                            <input type="text" name="j_payment" placeholder="Total Payment" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_payment") != "") {?>
                            <span><?php echo Session::show_value("j_payment"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="text" name="j_work_hour" placeholder="Cumulative Work Hours" id="" class="text-field">
                        </div>

                        <?php if (Session::show_value("j_work_hour") != "") {?>
                            <span><?php echo Session::show_value("j_work_hour"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <textarea name="j_description" id="" cols="10" rows="5" placeholder="Job Descriptions" class="text-field"></textarea>
                        </div>

                        <?php if (Session::show_value("j_description") != "") {?>
                            <span><?php echo Session::show_value("j_description"); ?></span>
                        <?php }?>

                        <div class="job-block">
                            <input type="submit" value="Submit" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        <?php }else { ?>
            <h2 style="text-align: center">You need to setup your profile to use that feature.</h2>
        <?php } ?>
    </body>
    </html>
<?php }?>

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
        <html lang="en">
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
                    $data = $s_que->display_all_job();
                    if ($data != false) {
                ?>
                    <div class="job-seeker">
                        <div class="job-seeker-container">
                            <?php foreach($data as $result){ ?>
                                <div class="job-seeker-block">
                                    <div class="job-seeker-text">
                                        <a href="job_details.php?j_id=<?php echo $result['j_id']; ?>" class="name"><?php echo $result['j_title'] ?></a>
                                        <div class="age">Booking Location: <b><?php echo $result['j_booking_location'] ?></b></div>
                                        <div class="city">Posted By: <b><?php echo $result['j_post_by'] ?></b></div>
                                        <div class="skill">Apply Deadline: <b><?php echo $result['j_booking_date'] ?></b></div>
                                        <div>Total Payment: <b><?php echo $result['j_payment'] ?></b></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <h2 style="text-align: center">No jobs available, please wait for one to be approved.</h2>
                <?php } ?>

            <?php }else{ ?>
                <h2 style="text-align: center">You need to setup your profile in order to use that feature.</h2>
            <?php } ?>

        </body>
        </html>
    </body>
    </html>
<?php }?>

<?php
    Session::remove_value("job_message");
    Session::remove_value("j_title");
    Session::remove_value("j_location");
    Session::remove_value("j_type");
    Session::remove_value("j_date");
    Session::remove_value("j_hour");
    Session::remove_value("j_payment");
    Session::remove_value("j_work_hour");
    Session::remove_value("j_minute");
    Session::remove_value("j_description");
?>
