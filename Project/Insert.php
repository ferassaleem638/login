<!DOCTYPE html>
<html>
    <head>
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body style="text-align:center;">
        <div class="container">
            <form method="POST" action="">
                <input style="font-size: 25px" type="text" name="username" placeholder="اسم المستخدم">
                <br>
                <br>
                <input style="font-size: 25px" type="password" name="password" placeholder="كلمة المرور">
                <br>
                <br>
                <input style="font-size: 25px" type="submit" name="add" value="إضافة">
            </form>
        </div>
    </body>
</html>

<?php
    if (isset($_POST['add'])) 
    {
        // استخراج قيم المدخلات من حقول النص
        $username = $_POST['username'];
        $password = $_POST['password'];

        // الاتصال بقاعدة البيانات وإجراء العملية المطلوبة
        $host = 'localhost'; // اسم المضيف
        $db = 'login'; // اسم قاعدة البيانات
        $user = 'root'; // اسم المستخدم
        $pass = ''; // كلمة المرور

        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) 
        {
            die("فشل الاتصال: " . mysqli_connect_error());
        }

        // استعلام قاعدة البيانات لإضافة المستخدم وكلمة المرور
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($conn, $sql)) 
        {
            echo "تمت إضافة المستخدم وكلمة المرور بنجاح";
        } 
        else 
        {
            echo "حدث خطأ أثناء إضافة المستخدم وكلمة المرور: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
