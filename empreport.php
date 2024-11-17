<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم (عادةً localhost)
$username = "root";       // اسم المستخدم لقاعدة البيانات
$password = "";           // كلمة المرور (اتركها فارغة إذا لم تكن لديك كلمة مرور)
$dbname = "lib";          // اسم قاعدة البيانات

// إنشاء الاتصال باستخدام MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من وجود أي أخطاء في الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// تعيين الترميز ليتم عرض البيانات باللغة العربية
$conn->set_charset("utf8");

// استعلام SQL لجلب جميع الموظفين من جدول libraryemoloyee
$sql = "SELECT empno, name, appointmentdate, academicqulification, address, phone, birthday, degree FROM libraryemoloyee";
$result = $conn->query($sql);

// التحقق إذا كانت هناك نتائج
if ($result->num_rows > 0) {
    $table = "<table>
                <tr>
                    <th>الرقم الوظيفي</th>
                    <th>الاسم</th>
                    <th>تاريخ التعيين</th>
                    <th>المؤهل الأكاديمي</th>
                    <th>العنوان</th>
                    <th>الهاتف</th>
                    <th>تاريخ الميلاد</th>
                    <th>الدرجة</th>
                </tr>";
    // عرض البيانات
    while ($row = $result->fetch_assoc()) {
        $table .= "<tr>
                    <td>" . htmlspecialchars($row["empno"]) . "</td>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["appointmentdate"]) . "</td>
                    <td>" . htmlspecialchars($row["academicqulification"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                    <td>" . htmlspecialchars($row["birthday"]) . "</td>
                    <td>" . htmlspecialchars($row["degree"]) . "</td>
                  </tr>";
    }
    $table .= "</table>";
} else {
    $table = "لا توجد بيانات لعرضها.";
}

// إذا تم الضغط على زر "بحث حسب رقم الموظف"
if (isset($_POST['searchEmployee'])) {
    $empno = $_POST['empno']; // رقم الموظف المدخل
    if (!empty($empno)) {
        // استعلام SQL للبحث عن الموظف باستخدام رقم الموظف
        $sql_search = "SELECT empno, name, appointmentdate, academicqulification, address, phone, birthday, degree FROM libraryemoloyee WHERE empno = ?";
        $stmt = $conn->prepare($sql_search);
        $stmt->bind_param("i", $empno); // ربط رقم الموظف مع الاستعلام
        $stmt->execute();
        $result_search = $stmt->get_result();

        // التحقق إذا كانت هناك نتائج
        if ($result_search->num_rows > 0) {
            $table_search = "<h2>تقرير الموظف رقم: " . htmlspecialchars($empno) . "</h2>";
            $table_search .= "<table>
                                <tr>
                                    <th>الرقم الوظيفي</th>
                                    <th>الاسم</th>
                                    <th>تاريخ التعيين</th>
                                    <th>المؤهل الأكاديمي</th>
                                    <th>العنوان</th>
                                    <th>الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>الدرجة</th>
                                </tr>";
            // عرض بيانات الموظف
            while ($row = $result_search->fetch_assoc()) {
                $table_search .= "<tr>
                                    <td>" . htmlspecialchars($row["empno"]) . "</td>
                                    <td>" . htmlspecialchars($row["name"]) . "</td>
                                    <td>" . htmlspecialchars($row["appointmentdate"]) . "</td>
                                    <td>" . htmlspecialchars($row["academicqulification"]) . "</td>
                                    <td>" . htmlspecialchars($row["address"]) . "</td>
                                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                                    <td>" . htmlspecialchars($row["birthday"]) . "</td>
                                    <td>" . htmlspecialchars($row["degree"]) . "</td>
                                  </tr>";
            }
            $table_search .= "</table>";
            $table = $table_search; // استبدال التقرير العام بتقرير الموظف المحدد
        } else {
            $table = "لا يوجد موظف برقم الوظيفة المدخل.";
        }
        $stmt->close(); // إغلاق الاستعلام
    } else {
        $table = "يرجى إدخال رقم الموظف.";
    }
}

// إذا تم الضغط على زر "بحث حسب الدرجة العلمية"
if (isset($_POST['searchDegree'])) {
    $degree = $_POST['degree']; // الدرجة العلمية المدخلة
    if (!empty($degree)) {
        // استعلام SQL للبحث عن الموظفين باستخدام الدرجة العلمية
        $sql_degree = "SELECT empno, name, appointmentdate, academicqulification, address, phone, birthday, degree FROM libraryemoloyee WHERE degree = ?";
        $stmt = $conn->prepare($sql_degree);
        $stmt->bind_param("s", $degree); // ربط الدرجة العلمية مع الاستعلام
        $stmt->execute();
        $result_degree = $stmt->get_result();

        // التحقق إذا كانت هناك نتائج
        if ($result_degree->num_rows > 0) {
            $table_degree = "<h2>تقرير الموظفين حسب الدرجة العلمية: " . htmlspecialchars($degree) . "</h2>";
            $table_degree .= "<table>
                                <tr>
                                    <th>الرقم الوظيفي</th>
                                    <th>الاسم</th>
                                    <th>تاريخ التعيين</th>
                                    <th>المؤهل الأكاديمي</th>
                                    <th>العنوان</th>
                                    <th>الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>الدرجة</th>
                                </tr>";
            // عرض بيانات الموظفين حسب الدرجة
            while ($row = $result_degree->fetch_assoc()) {
                $table_degree .= "<tr>
                                    <td>" . htmlspecialchars($row["empno"]) . "</td>
                                    <td>" . htmlspecialchars($row["name"]) . "</td>
                                    <td>" . htmlspecialchars($row["appointmentdate"]) . "</td>
                                    <td>" . htmlspecialchars($row["academicqulification"]) . "</td>
                                    <td>" . htmlspecialchars($row["address"]) . "</td>
                                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                                    <td>" . htmlspecialchars($row["birthday"]) . "</td>
                                    <td>" . htmlspecialchars($row["degree"]) . "</td>
                                  </tr>";
            }
            $table_degree .= "</table>";
            $table = $table_degree; // استبدال التقرير العام بتقرير الموظفين حسب الدرجة العلمية
        } else {
            $table = "لا يوجد موظفين بالدرجة العلمية المدخلة.";
        }
        $stmt->close(); // إغلاق الاستعلام
    } else {
        $table = "يرجى إدخال الدرجة العلمية.";
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير الموظفين</title>
    <style>
        /* تنسيق الصفحة بشكل عام */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            direction: rtl;
        }

        /* تنسيق النموذج */
        .container {
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group input {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
            width: 100%;
        }

        .form-group button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 1rem;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>تقرير الموظفين</h1>

        <!-- زر عرض الموظفين -->
        <form method="POST">
            <div class="form-group">
                <button type="submit" name="showEmployees">عرض الموظفين</button>
            </div>
        </form>

        <!-- نموذج البحث حسب رقم الموظف -->
        <form method="POST">
            <div class="form-group">
                <label for="empno">بحث حسب رقم الموظف:</label>
                <input type="number" id="empno" name="empno" placeholder="أدخل رقم الموظف" required>
                <button type="submit" name="searchEmployee">بحث حسب رقم الموظف</button>
            </div>
        </form>

        <!-- نموذج البحث حسب الدرجة العلمية -->
        <form method="POST">
            <div class="form-group">
                <label for="degree">بحث حسب الدرجة العلمية:</label>
                <input type="text" id="degree" name="degree" placeholder="أدخل الدرجة العلمية" required>
                <button type="submit" name="searchDegree">بحث حسب الدرجة العلمية</button>
            </div>
        </form>

        <!-- عرض تقرير الموظفين هنا -->
        <div id="employeesTable">
            <?php echo $table; ?>
        </div>
    </div>

</body>
</html>
