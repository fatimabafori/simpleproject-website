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
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $hire_date = $_POST['hire_date'];
    $academic_qualification = $_POST['academic_qualification'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $birth_date = $_POST['birth_date'];
    $degree = $_POST['degree'];

    // إضافة السجل إلى قاعدة البيانات
    $sql = "INSERT INTO libraryemoloyee (empno,name, appointmentdate, academicqulification , address, phone, birthday, degree) 
            VALUES ('$employee_id', '$employee_name', '$hire_date', '$academic_qualification', '$address', '$phone', '$birth_date', '$degree')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>تم إضافة الموظف بنجاح!</p>";
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
    <title>نموذج الموظفين</title>
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
        input[type="text"], input[type="date"] {
            width: 100%; /* جعل الحقول تأخذ عرض كامل */
            padding: 8px; /* إضافة مساحة داخل الحقول */
            border: 1px solid #ccc; /* حدود خفيفة حول الحقول */
            border-radius: 4px; /* زوايا دائرية */
            box-sizing: border-box; /* تضمين الحدود في العرض */
        }
        input[type="submit"], input[type="button"] {
            background-color: #4CAF50; /* لون خلفية الزر */
            color: white; /* لون النص */
            padding: 10px 15px; /* مساحة داخل الزر */
            border: none; /* إزالة الحدود */
            border-radius: 4px; /* زوايا دائرية */
            cursor: pointer; /* تغيير شكل المؤشر عند المرور فوق الزر */
            font-size: 16px; /* حجم خط النص في الزر */
            transition: background-color 0.3s; /* تأثير انتقال عند تغيير اللون */
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049; /* تغيير لون الزر عند المرور عليه */
        }
    </style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الموظف</td>
      <td><input type="text" name="employee_id" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">اسم الموظف</td>
      <td><input type="text" name="employee_name" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تاريخ التعيين</td>
      <td><input type="date" name="hire_date" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">المؤهل الأكاديمي</td>
      <td><input type="text" name="academic_qualification" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">العنوان</td>
      <td><input type="text" name="address" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الهاتف</td>
      <td><input type="text" name="phone" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تاريخ الميلاد</td>
      <td><input type="date" name="birth_date" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الدرجة العلمية</td>
      <td><input type="text" name="degree" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="إضافة موظف" /></td>
    </tr>
    <!-- زر العودة -->
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="button" value="العودة" onclick="window.location.href='admainmain.php';" /></td>
    </tr>
  </table>
</form>

</body>
</html>
