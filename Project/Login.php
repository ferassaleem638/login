<?php
    $host = 'localhost'; // اسم المضيف
    $db = 'login'; // اسم قاعدة البيانات
    $user = 'root'; // اسم المستخدم
    $pass = ''; // كلمة المرور

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) 
    {
        die('فشل الاتصال بقاعدة البيانات: ' . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>صفحة تسجيل الدخول</title>
    </head>

    <body background="https://www.cairo24.com/Upload/libfiles/79/7/735.jpg" >
        <h1 style= "text-align : center; color:Blue; font-size:40px"> Login </h1>
        <form style= "text-align : center; color:Blue; " method="post" action="login.php">
            <label style = "font-size: 25px;" for="UserName :"> User Name: </label><br>
            <input style = "font-size: 25px;" type="text" name="username"><br><br>
            <label style = "font-size: 25px;" for="Password :"> Password: </label><br>
            <input style = "font-size: 25px;" type="password" name="password"><br><br>
            <input style = "font-size: 25px;" type="submit" value="Login">
        </form>
    </body>
</html>
<?php 
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // استعلام SQL للتحقق من صحة اسم المستخدم وكلمة المرور
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) 
        {
            echo 'complete';
            // تم العثور على سجل واحد متطابق
            $_SESSION['username'] = $username;
            header('Location: page2.php'); //توجيه المستخدم إلى صفحة التالية
            exit();       
        } 
        else 
        {
            // اسم المستخدم أو كلمة المرور غير صحيحة
            echo  'اسم المستخدم أو كلمة المرور غير صحيحة.';
        }
    }
    mysqli_close($conn);
?>