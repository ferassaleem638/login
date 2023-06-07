<!DOCTYPE html>
<html>
    <style>
        .container 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
    <body style="text-align:center;" background="https://www.cairo24.com/Upload/libfiles/79/7/735.jpg" >
        <div class="container">
            <form method="POST" action="">
                <input style="font-size: 25px" type="text" name="searchValue">
                <input style="font-size: 25px" type="submit" name="search" value="Search">
                <br>
                <br>
                <label style="font-size: 25px" for="UserName :"> User Name: </label><br>
                <input style="font-size: 25px" type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>"><br><br>
                <label style="font-size: 25px" for="Password :"> Password: </label><br>
                <input style="font-size: 25px" type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>"><br><br>

                <input style="font-size: 25px" type="submit" name="Add" value="Add">
                <input style="font-size: 25px" type="submit" name="Update" value="Update">
                <input style="font-size: 25px" type="submit" name="Delete" value="Delete">

                <br>
                <br>
                <?php
                    if (isset($_POST['search'])) 
                    {
                        // استخراج قيمة البحث من حقل الإدخال
                        $searchValue = $_POST['searchValue'];

                        // الاتصال بقاعدة البيانات
                        $host = 'localhost'; // اسم المضيف
                        $db = 'login'; // اسم قاعدة البيانات
                        $user = 'root'; // اسم المستخدم
                        $pass = ''; // كلمة المرور

                        $conn = mysqli_connect($host, $user, $pass, $db);

                        if (!$conn) 
                        {
                            die("فشل الاتصال: " . mysqli_connect_error());
                        }

                        // استعلام قاعدة البيانات للبحث عن القيمة المدخلة
                        $sql = "SELECT * FROM user WHERE username = '$searchValue'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) 
                        {
                            $row = mysqli_fetch_assoc($result);
                            $username = $row['username'];
                            $password = $row['password'];
                            echo "اسم المستخدم موجود";
                        } 
                        else 
                        {
                            echo "اسم المستخدم غير موجود";
                            $username = '';
                            $password = '';
                        }
                        mysqli_close($conn);
                    }
                ?>
                <?php
                    if (isset($_POST['Add'])) 
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
                <?php
                    if (isset($_POST['Update'])) 
                    {
                        // استخراج قيم المدخلات من حقول النص
                        //$searchValue = $_POST['searchValue'];
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

                        // استعلام قاعدة البيانات لتحديث قيمة المستخدم وكلمة المرور
                        $sql = "UPDATE user SET username = '$username', password = '$password' ";

                        if (mysqli_query($conn, $sql)) 
                        {
                            echo "تم تحديث قيمة المستخدم وكلمة المرور بنجاح";
                        } 
                        else 
                        {
                            echo "حدث خطأ أثناء تحديث قيمة المستخدم وكلمة المرور: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                    }
                ?>
                <?php
                    if (isset($_POST['Delete'])) {
                        // استخراج قيمة البحث من حقل الإدخال
                        $username = $_POST['username'];

                        // الاتصال بقاعدة البيانات وإجراء العملية المطلوبة
                        $host = 'localhost'; // اسم المضيف
                        $db = 'login'; // اسم قاعدة البيانات
                        $user = 'root'; // اسم المستخدم
                        $pass = ''; // كلمة المرور

                        $conn = mysqli_connect($host, $user, $pass, $db);

                        if (!$conn) {
                            die("فشل الاتصال: " . mysqli_connect_error());
                        }

                        // استعلام قاعدة البيانات لحذف المستخدم
                        $sql = "DELETE FROM user WHERE username = '$username'";

                        if (mysqli_query($conn, $sql)) {
                            echo "تم حذف المستخدم بنجاح";
                        } else {
                            echo "حدث خطأ أثناء حذف المستخدم: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                    }
                ?>

            </form>
        </div>
    </body>
</html>
