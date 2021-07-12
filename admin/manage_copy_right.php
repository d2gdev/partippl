<?php
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <a href="manage.php">Manage Job</a>
        <a href="manage_copy_right.php">Manage Page Copyright</a>
    </div>

    <div class="content">
        <h2>Welcome to the Admin Dashboard</h2>
    </div>

    <?php
        $data = $mn->select_copy_right()->fetch_assoc();
    ?>

    <form action="copy_rights_code.php" method="post" class="copy_right">
        <input type="text" name="text_name" id="" value="<?php echo $data['copy_text_name'] ?>" placeholder="Copyright Text Here" class="text-field" required>
        <input type="submit" value="Update Now" class="btn">
    </form>
</body>
</html>
