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
    $memberno = $_POST['memberno'];
    $membername = $_POST['membername'];
    $collage = $_POST['collage'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];

    // إضافة السجل إلى قاعدة البيانات
    $sql = "INSERT INTO member (memberno, membername, collage, phone, address, degree) 
            VALUES ('$memberno', '$membername', '$collage', '$phone', '$address', '$degree')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>تم إضافة العضو بنجاح!</p>";
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
    <title>نموذج الأعضاء</title>
    <style>
        body {
            direction: rtl; /* اتجاه النص من اليمين إلى اليسار */
            font-family: Arial, sans-serif; /* اختيار خط مريح للقراءة */
        }
        table {
            width: 100%; /* جعل الجدول يأخذ العرض الكامل */
            max-width: 600px; /* تحديد عرض أقصى للجدول */
            margin: auto; /* توسيط الجدول */
            border-collapse: collapse; /* دمج الحدود */
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
            background-color: #007BFF; /* لون خلفية الزر الأزرق */
            color: white; /* لون النص */
            padding: 10px 15px; /* مساحة داخل الزر */
            border: none; /* إزالة الحدود */
            border-radius: 4px; /* زوايا دائرية */
            cursor: pointer; /* تغيير شكل المؤشر عند المرور فوق الزر */
            font-size: 16px; /* حجم خط النص في الزر */
            transition: background-color 0.3s, transform 0.3s; /* تأثير انتقال عند تغيير اللون والتحريك */
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* تغيير لون الزر عند المرور عليه */
            transform: scale(1.1); /* تكبير الزر عند المرور */
        }
        .return-btn {
            background-color: #007BFF; /* تغيير اللون إلى الأزرق */
            color: white; /* لون النص */
            padding: 10px 15px; /* نفس الحجم مثل الزر "إضافة سجل" */
            border: none; /* إزالة الحدود */
            border-radius: 4px; /* زوايا دائرية */
            font-size: 16px; /* نفس حجم الخط مثل الزر "إضافة سجل" */
            cursor: pointer; /* تغيير شكل المؤشر عند المرور فوق الزر */
            display: inline-block; /* عرض الزر كعنصر داخلي */
            margin: 20px 0 20px 0; /* مساحة من الأعلى والأسفل */
            text-align: center; /* محاذاة النص داخل الزر */
            transition: background-color 0.3s, transform 0.3s; /* تأثير انتقال عند تغيير اللون والتحريك */
        }
        .return-btn:hover {
            background-color: #0056b3; /* تغيير اللون عند المرور عليه */
            transform: scale(1.1); /* تكبير الزر عند المرور */
        }
    </style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم العضو</td>
      <td><input type="text" name="memberno" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الاسم</td>
      <td><input type="text" name="membername" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الكلية</td>
      <td><input type="text" name="collage" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الهاتف</td>
      <td><input type="text" name="phone" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">العنوان</td>
      <td><input type="text" name="address" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الدرجة العلمية</td>
      <td><input type="text" name="degree" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="إضافة سجل" /></td>
    </tr>
  </table>
</form>

<!-- زر العودة للصفحة الرئيسية -->
<a href="admainmain.php" class="return-btn">العودة الى الصفحة الرئيسية</a>

</body>
</html>
