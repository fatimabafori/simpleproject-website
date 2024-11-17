<?php
// الاتصال بقاعدة البيانات باستخدام MySQLi
$servername = "localhost";  // اسم الخادم
$username = "root";         // اسم المستخدم لقاعدة البيانات
$password = "";             // كلمة المرور لقاعدة البيانات (إن وجدت)
$dbname = "lib";            // اسم قاعدة البيانات

// الاتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من الاتصال
if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// تعيين الترميز لقاعدة البيانات لضمان دعم اللغة العربية
mysqli_set_charset($conn, "utf8");

// استعلام SQL لجلب بيانات الأعضاء من جدول member
$query_Recordset1 = "SELECT * FROM member";
$result_Recordset1 = mysqli_query($conn, $query_Recordset1);

// التحقق من وجود بيانات
if (!$result_Recordset1) {
    die("خطأ في الاستعلام: " . mysqli_error($conn));
}

// الحصول على عدد الأعضاء
$totalRows_Recordset1 = mysqli_num_rows($result_Recordset1);

// البحث عن عضو حسب رقم العضو
$memberSearchResult = null;
if (isset($_POST['searchMember'])) {
    $memberno = $_POST['memberno']; // رقم العضو المدخل
    if (!empty($memberno)) {
        // استعلام SQL للبحث عن العضو باستخدام رقم العضو
        $query_search = "SELECT * FROM member WHERE memberno = '$memberno'";
        $searchResult = mysqli_query($conn, $query_search);
        $memberSearchResult = mysqli_fetch_assoc($searchResult);
    } else {
        $memberSearchResult = 'يرجى إدخال رقم العضو للبحث';
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير الأعضاء</title>
    <style>
        /* تنسيق عام للصفحة */
        body {
            font-family: 'Arial', sans-serif, 'Tahoma', 'Segoe UI', 'Helvetica Neue', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            direction: rtl; /* النصوص من اليمين لليسار */
        }

        /* تنسيق للنموذج */
        .container {
            background-color: #fff;
            width: 70%;
            max-width: 1000px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        /* تنسيق العنوان */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* تنسيق الأزرار */
        .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-container {
            margin-bottom: 30px;
        }

        /* تنسيق الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 1rem;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* تنسيق الرسائل */
        .message {
            color: #d9534f;
            text-align: center;
            font-size: 1.1rem;
            margin-top: 20px;
        }

        /* زر العودة للصفحة الرئيسية (أسفل النموذج) */
        .back-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 150px;
            margin-top: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            position: relative;
            bottom: 0;
            animation: slide-up 0.3s ease-in-out;
        }

        .back-btn:hover {
            background-color: #0056b3;
            animation: slide-up 0.3s ease-in-out, hover-animation 0.3s forwards;
        }

        @keyframes slide-up {
            0% {
                transform: translateY(10px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes hover-animation {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.1);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>تقرير الأعضاء</h1>

        <!-- نموذج بحث عن عضو (أعلى النموذج) -->
        <form method="POST" action="" class="btn-container">
            <input type="number" name="memberno" class="btn" placeholder="أدخل رقم العضو" required />
            <input type="submit" name="searchMember" class="btn" value="بحث عن عضو" />
        </form>

        <!-- نموذج زر "عرض الأعضاء" -->
        <form method="POST" action="">
            <input type="submit" name="showMembers" class="btn" value="عرض الأعضاء" />
        </form>

        <?php
        // إذا تم الضغط على زر "عرض الأعضاء"
        if (isset($_POST['showMembers'])) {
            // عرض البيانات
            if ($totalRows_Recordset1 > 0) {
                echo '<table border="1">';
                echo '<tr><th>رقم العضو</th><th>اسم العضو</th><th>الكليات</th><th>الهاتف</th><th>العنوان</th><th>الدرجة</th></tr>';
                while ($row = mysqli_fetch_assoc($result_Recordset1)) {
                    echo '<tr>';
                    echo '<td>' . $row['memberno'] . '</td>';
                    echo '<td>' . $row['membername'] . '</td>';
                    echo '<td>' . $row['collage'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['degree'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>لا توجد بيانات لعرضها.</p>';
            }
        }

        // إذا تم البحث عن عضو حسب رقم العضو
        if ($memberSearchResult) {
            if (is_array($memberSearchResult)) {
                // عرض بيانات العضو
                echo '<table border="1">';
                echo '<tr><th>رقم العضو</th><th>اسم العضو</th><th>الكليات</th><th>الهاتف</th><th>العنوان</th><th>الدرجة</th></tr>';
                echo '<tr>';
                echo '<td>' . $memberSearchResult['memberno'] . '</td>';
                echo '<td>' . $memberSearchResult['membername'] . '</td>';
                echo '<td>' . $memberSearchResult['collage'] . '</td>';
                echo '<td>' . $memberSearchResult['phone'] . '</td>';
                echo '<td>' . $memberSearchResult['address'] . '</td>';
                echo '<td>' . $memberSearchResult['degree'] . '</td>';
                echo '</tr>';
                echo '</table>';
            } else {
                echo '<p class="message">' . $memberSearchResult . '</p>';
            }
        }
        ?>

        <!-- زر العودة للصفحة الرئيسية -->
        <a href="admainmain.php"><button class="back-btn">العودة للصفحة الرئيسية</button></a>
    </div>
</body>
</html>

<?php
// تحرير الذاكرة بعد الاستعلام
mysqli_free_result($result_Recordset1);
?>
