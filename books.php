<?php
// الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$dbname = "lib"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// تعيين الترميز إلى utf8mb4 لتخزين البيانات بالعربية
$conn->set_charset("utf8mb4");

// إضافة كتاب
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    // جمع البيانات المدخلة في النموذج
    $registeringno = $_POST['registeringno'];
    $classficationno = $_POST['classficationno'];
    $bookadress = $_POST['bookadress'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publicationaddress = $_POST['publicationaddress'];
    $publisher = $_POST['publisher'];
    $publishingdate = $_POST['publishingdate'];
    $size = $_POST['size'];
    $pagesnumbers = $_POST['pagesnumbers'];
    $deptno = $_POST['deptno'];

    // استعلام SQL لإدراج البيانات في جدول booksinfo
    $sql = "INSERT INTO booksinfo (registeringno, classficationno, bookadress, author, edition, publicationaddress, publisher, publishingdate, `size`, pagesnumbers, deptno) 
            VALUES ('$registeringno', '$classficationno', '$bookadress', '$author', '$edition', '$publicationaddress', '$publisher', '$publishingdate', '$size', '$pagesnumbers', '$deptno')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>تم إضافة الكتاب بنجاح!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>خطأ: " . $conn->error . "</p>";
    }
}

// حذف كتاب
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    // جمع رقم القيد لحذف الكتاب
    $registeringno_to_delete = $_POST['registeringno_to_delete'];

    // استعلام SQL لحذف الكتاب
    $sql_delete = "DELETE FROM booksinfo WHERE registeringno = '$registeringno_to_delete'";

    if ($conn->query($sql_delete) === TRUE) {
        echo "<p style='color: green; text-align: center;'>تم حذف الكتاب بنجاح!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>خطأ: " . $conn->error . "</p>";
    }
}

// إغلاق الاتصال بعد الانتهاء
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة / حذف كتاب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            direction: rtl;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        td, th {
            text-align: right;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
            text-align: center;
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
    </style>
</head>
<body>

<div class="container">
    <h2 class="form-title">إضافة / حذف كتاب إلى المكتبة</h2>

    <!-- نموذج إضافة كتاب -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
      <input type="hidden" name="action" value="add">
      <table align="center">
        <tr valign="baseline">
            <td nowrap="nowrap">رقم القيد</td>
            <td><input type="text" name="registeringno" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">رقم التصنيف</td>
            <td><input type="text" name="classficationno" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">عنوان الكتاب</td>
            <td><input type="text" name="bookadress" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">المؤلف</td>
            <td><input type="text" name="author" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">الطبعة</td>
            <td><input type="text" name="edition" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">مكان النشر</td>
            <td><input type="text" name="publicationaddress" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">دار النشر</td>
            <td><input type="text" name="publisher" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">تاريخ النشر</td>
            <td><input type="text" name="publishingdate" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">حجم الكتاب</td>
            <td><input type="text" name="size" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">عدد الصفحات</td>
            <td><input type="text" name="pagesnumbers" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">رقم القسم</td>
            <td><input type="text" name="deptno" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
            <td nowrap="nowrap">&nbsp;</td>
            <td><input type="submit" value="إضافة كتاب" /></td>
        </tr>
      </table>
    </form>

    <!-- نموذج حذف كتاب -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form2" id="form2">
      <input type="hidden" name="action" value="delete">
      <table align="center">
        <tr valign="baseline">
            <td nowrap="nowrap">رقم القيد لحذف الكتاب</td>
            <td><input type="text" name="registeringno_to_delete" value="" size="32" /></td>
        </tr
