<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور لقاعدة البيانات
$dbname = "lib"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بالقاعدة: " . $conn->connect_error);
}

// تعيين الترميز utf8mb4 للتأكد من دعم اللغة العربية
$conn->set_charset("utf8mb4");

// التحقق إذا كان هناك بيانات تم إرسالها عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = $_POST['name'];
    $collage = $_POST['collage'];
    $dept = $_POST['dept'];
    $borrowdate = $_POST['borrowdate'];
    $returndate = $_POST['returndate'];
    $libsybol = $_POST['libsybol'];
    $signature = $_POST['signature'];
    $bookadress = $_POST['bookadress'];
    $cardno = $_POST['cardno'];

    // إضافة السجل إلى قاعدة البيانات
    $sql = "INSERT INTO metaphor (name, collage, dept, borrowdate, returndate, libsybol, signature, bookadress, cardno) 
            VALUES ('$name', '$collage', '$dept', '$borrowdate', '$returndate', '$libsybol', '$signature', '$bookadress', '$cardno')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>تم إضافة الاستعارة بنجاح!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>خطأ: " . $conn->error . "</p>";
    }
}

// إغلاق الاتصال بعد إضافة السجل
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج الاستعارة</title>
    <style>
        body {
            direction: rtl; /* اتجاه النص من اليمين إلى اليسار */
            font-family: Arial, sans-serif; /* اختيار خط مريح للقراءة */
            background-color: #f9f9f9; /* لون خلفية خفيف */
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%; /* جعل الجدول يأخذ العرض الكامل */
            max-width: 600px; /* تحديد عرض أقصى للجدول */
            margin: auto; /* توسيط الجدول */
            border-collapse: collapse; /* دمج الحدود */
            background-color: #fff; /* خلفية الجدول بيضاء */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* ظل خفيف حول الجدول */
        }
        th, td {
            padding: 12px; /* إضافة مساحة داخل الخلايا */
            border-bottom: 1px solid #ddd; /* خط أسفل الخلايا */
            text-align: right; /* محاذاة النص إلى اليمين */
        }
        th {
            background-color: #f2f2f2; /* لون خلفية رأس الجدول */
        }
        input[type="text"] {
            width: 100%; /* جعل الحقول تأخذ عرض كامل */
            padding: 8px; /* إضافة مساحة داخل الحقول */
            border: 1px solid #ccc; /* حدود خفيفة حول الحقول */
            border-radius: 4px; /* زوايا دائرية */
            box-sizing: border-box; /* تضمين الحدود في العرض */
        }
        input[type="submit"] {
            background-color: #4CAF50; /* لون خلفية الزر */
            color: white; /* لون النص */
            padding: 10px 15px; /* مساحة داخل الزر */
            border: none; /* إزالة الحدود */
            border-radius: 4px; /* زوايا دائرية */
            cursor: pointer; /* تغيير شكل المؤشر عند المرور فوق الزر */
            font-size: 16px; /* حجم خط النص في الزر */
            transition: background-color 0.3s, transform 0.3s; /* تأثيرات الانتقال */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* تغيير لون الزر عند المرور عليه */
            transform: scale(1.1); /* تكبير الزر عند المرور عليه */
        }

        /* زر العودة */
        .return-btn {
            background-color: #007BFF; /* لون خلفية زر العودة */
            color: white; /* لون النص */
            padding: 10px 15px; /* مساحة داخل الزر */
            border: none; /* إزالة الحدود */
            border-radius: 4px; /* زوايا دائرية */
            cursor: pointer; /* تغيير شكل المؤشر عند المرور فوق الزر */
            font-size: 16px; /* حجم خط النص في الزر */
            margin-top: 20px; /* إضافة مسافة من الأعلى */
            display: block; /* عرض الزر ككتلة */
            margin-left: auto; /* توسيط الزر */
            margin-right: auto; /* توسيط الزر */
            transition: background-color 0.3s, transform 0.3s; /* تأثيرات الانتقال */
        }

        .return-btn:hover {
            background-color: #0056b3; /* تغيير لون الزر عند المرور عليه */
            transform: scale(1.1); /* تكبير الزر عند المرور عليه */
        }
    </style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الاسم</td>
      <td><input type="text" name="name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الكلية</td>
      <td><input type="text" name="collage" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">القسم</td>
      <td><input type="text" name="dept" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تاريخ الاستعارة</td>
      <td><input type="text" name="borrowdate" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تاريخ الاسترجاع</td>
      <td><input type="text" name="returndate" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رمز المكتبة</td>
      <td><input type="text" name="libsybol" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">التوقيع</td>
      <td><input type="text" name="signature" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">عنوان الكتاب</td>
      <td><input type="text" name="bookadress" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم البطاقة</td>
      <td><input type="text" name="cardno" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap">&nbsp;</td>
      <td><input type="submit" value="إضافة استعارة" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>

<!-- زر العودة -->
<a href="admainmain.php">
    <button class="return-btn">العودة للصفحة الرئيسية</button>
</a>

</body>
</html>
