<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wilabelh=device-wilabelh, initial-scale=1.0">
    <title>پنل کاربری</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="template/css/header.css">
    <link rel="stylesheet" href="template/css/footer.css">
</head>
<body>
    <?php
        include('template/header.php');
    ?>
    <div id="container">
    <?php
        if (!(empty($_POST['username'])) && !(empty($_POST['password']))) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $link = mysqli_connect("localhost" , "root", "", "users");
            if (mysqli_connect_errno()) {
                $message = ("اتصال با مشکل مواجه شد: " . mysqli_connect_error());
            }
            $query = "SELECT * FROM users.user WHERE u_username='$username' AND u_password='$password'";
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                // Login
		echo"<h1>ورود موفقیت آمیز بود</h1>";
            } else {
                if (isset($_POST['repassword'])) {
                    // Sign up	
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    if ($_POST['password'] === $_POST['repassword']) {
			echo"<h1>ثبت نام موفقیت آمیز بود</h1>";
                        $query = "INSERT INTO users.user (`u_username`, `u_email`, `u_password`) VALUES ('$username','$email','$password')";
                        mysqli_query($link, $query);
                    } else {
			echo"<h1>رمز عبور با تکرار آن متفاوت است</h1>";
                    }
                } else {
			echo"<h1>لطفا ثبت نام کنید</h1>";
                }
            }
            mysqli_close($link);
        } else {
		echo"<h1>نام کاربری و رمز عبور نا معتبر است</h1>";
        } 
        ?>
        <?php
            $link = mysqli_connect("localhost" , "root", "", "users");
            if (!(empty($_POST['username'])) && !(empty($_POST['password']))) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "SELECT * FROM users.user WHERE u_username='$username' AND u_password='$password'";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<h1>اطلاعات کاربر</h1>";
                        echo "<div id='user-panel' class='user-panel'>";
                        echo "<div class='user-info'>";
                        echo "<label>نام کاربر:</label>";
                        echo "<h2>" . $row['u_username'] . "</h2>";
                        echo "<label>ایمیل:</label>";
                        echo "<h2>" . $row['u_email'] . "</h2>";
                        echo "<label>رمز عبور:</label>";
                        echo "<h2>" . $row['u_password'] . "</h2>";
                        echo "<label>تاریخ و زمان ثبت نام:</label>";
                        echo "<h2>" . $row['u_date'] . "</h2>";
                        echo "</div>";
                        echo "</div>";
                    }}
            } else {
                echo"<h1>کاربری یافت نشد</h1>";
            }
            mysqli_close($link);
        ?>
    </div>
    <?php
        include('template/footer.php');
    ?>
</body>
</html>