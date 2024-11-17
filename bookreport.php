<?php 
// الاتصال بقاعدة البيانات باستخدام MySQLi
$host = 'localhost'; // اسم الخادم
$username = 'root'; // اسم المستخدم
$password = ''; // كلمة المرور
$dbname = 'lib'; // اسم قاعدة البيانات

// إنشاء الاتصال
$go = mysqli_connect($host, $username, $password, $dbname);

// التحقق من الاتصال
if (!$go) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// تعيين الترميز UTF-8 للاتصال
mysqli_set_charset($go, 'utf8');

// وظيفة لتحصين البيانات
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        // إخفاء المحارف الخاصة في المدخلات
        $theValue = mysqli_real_escape_string($GLOBALS['go'], $theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

// استعلام لجلب كافة البيانات من جدول الكتب
$query_Recordset1 = "SELECT * FROM booksinfo";
$Recordset1 = mysqli_query($go, $query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

// التحقق من وجود بيانات بناءً على البحث
$searchQuery = "";
if (isset($_POST['search_by_deptno'])) {
    $deptno = isset($_POST['deptno']) ? $_POST['deptno'] : '';
    
    // بناء استعلام البحث بناءً على رقم القسم
    if (!empty($deptno)) {
        $searchQuery = "WHERE deptno = " . GetSQLValueString($deptno, "int");
    }

    // استعلام مع التصفية بناءً على البحث
    $query_Recordset1 = "SELECT * FROM booksinfo " . $searchQuery;
    $Recordset1 = mysqli_query($go, $query_Recordset1);
    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
    $totalRows_Recordset1 = mysqli_num_rows($Recordset1);
}

// التحقق من وجود بيانات بناءً على البحث باستخدام رقم القيد
if (isset($_POST['search_by_registeringno'])) {
    $registeringno = isset($_POST['registeringno']) ? $_POST['registeringno'] : '';
    
    // بناء استعلام البحث بناءً على رقم القيد
    if (!empty($registeringno)) {
        $searchQuery = "WHERE registeringno = " . GetSQLValueString($registeringno, "int");
    }

    // استعلام مع التصفية بناءً على البحث
    $query_Recordset1 = "SELECT * FROM booksinfo " . $searchQuery;
    $Recordset1 = mysqli_query($go, $query_Recordset1);
    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
    $totalRows_Recordset1 = mysqli_num_rows($Recordset1);
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الكتب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            direction: rtl;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            padding: 10px;
            text-align: right;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="submit"], .return-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: inline-block;
        }

        input[type="submit"]:hover, .return-btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .return-btn {
            background-color: #28a745;
            margin-top: 20px;
        }

        .return-btn:hover {
            background-color: #218838;
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"], .search-form input[type="submit"] {
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="form-title">إدارة الكتب في المكتبة</h2>

    <!-- نموذج البحث حسب رقم القسم -->
    <form method="post" class="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="deptno">رقم القسم:</label>
        <input type="text" id="deptno" name="deptno" value="<?php echo isset($_POST['deptno']) ? $_POST['deptno'] : ''; ?>" />
        <input type="submit" name="search_by_deptno" value="بحث حسب رقم القسم" />
    </form>

    <!-- نموذج البحث حسب رقم القيد -->
    <form method="post" class="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="registeringno">رقم القيد:</label>
        <input type="text" id="registeringno" name="registeringno" value="<?php echo isset($_POST['registeringno']) ? $_POST['registeringno'] : ''; ?>" />
        <input type="submit" name="search_by_registeringno" value="بحث حسب رقم القيد" />
    </form>

    <!-- زر عرض الكتب -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="show_books" value="عرض الكتب" />
    </form>

    <?php 
    // إذا تم الضغط على زر عرض الكتب أو البحث
    if (isset($_POST['show_books']) || isset($_POST['search_by_deptno']) || isset($_POST['search_by_registeringno'])) {
        // التحقق من وجود بيانات في الجدول
        if ($totalRows_Recordset1 > 0) {
            echo "<table>";
            echo "<thead><tr><th>رقم القيد</th><th>رقم التصنيف</th><th>عنوان الكتاب</th><th>المؤلف</th><th>الطبعة</th><th>مكان النشر</th><th>دار النشر</th><th>تاريخ النشر</th><th>حجم الكتاب</th><th>عدد الصفحات</th><th>رقم القسم</th></tr></thead><tbody>";

            // عرض البيانات في الجدول
            do {
                echo "<tr>";
                echo "<td>" . $row_Recordset1['registeringno'] . "</td>";
                echo "<td>" . $row_Recordset1['classficationno'] . "</td>";
                echo "<td>" . $row_Recordset1['bookadress'] . "</td>";
                echo "<td>" . $row_Recordset1['author'] . "</td>";
                echo "<td>" . $row_Recordset1['edition'] . "</td>";
                echo "<td>" . $row_Recordset1['publicationaddress'] . "</td>";
                echo "<td>" . $row_Recordset1['publisher'] . "</td>";
                echo "<td>" . $row_Recordset1['publishingdate'] . "</td>";
                echo "<td>" . $row_Recordset1['size'] . "</td>";
                echo "<td>" . $row_Recordset1['pagesnumbers'] . "</td>";
                echo "<td>" . $row_Recordset1['deptno'] . "</td>";
                echo "</tr>";
            } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
            
            echo "</tbody></table>";
        } else {
            echo "<p style='text-align: center; color: red;'>لا توجد بيانات لعرضها.</p>";
        }
    }
    ?>
    
    <!-- زر العودة -->
    <a href="admainmain.php">
        <button class="return-btn">العودة للصفحة الرئيسية</button>
    </a>
</div>

</body>
</html>

<?php
// تحرير النتيجة بعد الانتهاء
mysqli_free_result($Recordset1);
mysqli_close($go);
?>
