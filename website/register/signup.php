<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="../template/css/header.css">
    <link rel="stylesheet" href="../template/css/footer.css">
</head>
<body>
    <?php
        include('../template/header.php');
    ?>
    <div class="signup-container">
        <h2>ثبت نام</h2>
        <form action="../index.php" method="POST">
            <div class="form-group">
                <label for="username">نام کاربری:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">ایمیل:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">رمز عبور:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="repassword">تکرار  رمز عبور:</label>
                <input type="password" id="repassword" name="repassword" required>
            </div>
            <div class="form-group">
                <button type="submit">ثبت نام</button>
            </div>
        </form>
    </div>
    <?php
        include('../template/footer.php');
    ?>
</body>
</html>