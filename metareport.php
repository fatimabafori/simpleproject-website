<?php 
// الاتصال بقاعدة البيانات
require_once('Connections/go.php'); 

// تحديد الدالة GetSQLValueString
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

// إعداد الاتصال بقاعدة البيانات
mysql_select_db($database_go, $go);

// التأكد من أن الاتصال بقاعدة البيانات يدعم UTF-8
mysql_query("SET NAMES 'utf8'", $go);

// إعداد الاستعلام للبيانات
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

// التحقق إذا كان تم إرسال رقم البطاقة لعرض الاستعارة حسب الرقم
$cardno = isset($_POST['cardno']) ? $_POST['cardno'] : '';

// إذا كان هناك رقم بطاقة يتم تطبيق الاستعلام بناءً عليه
if ($cardno) {
    $query_Recordset1 = "SELECT * FROM metaphor WHERE cardno = " . GetSQLValueString($cardno, "int");
} else {
    $query_Recordset1 = "SELECT * FROM metaphor"; // استعلام عام إذا لم يتم إدخال رقم البطاقة
}

$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $go) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض بيانات الاستعارة</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            direction: rtl;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

        input[type="submit"], .show-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            display: inline-block;
        }

        input[type="submit"]:hover, .show-button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-container {
            margin-top: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            direction: ltr;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>عرض بيانات الاستعارة</h2>

    <!-- زر عرض جميع بيانات الاستعارة -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="show_metaphor" value="عرض بيانات الاستعارة" class="show-button" />
    </form>

    <!-- نموذج لعرض الاستعارة حسب رقم البطاقة -->
    <div class="form-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="cardno">رقم البطاقة:</label>
            <input type="text" name="cardno" id="cardno" placeholder="أدخل رقم البطاقة" />
            <input type="submit" name="show_metaphor_card" value="عرض الاستعارة حسب رقم البطاقة" class="show-button" />
        </form>
    </div>

    <!-- عرض الجدول إذا تم الضغط على الزر -->
    <?php 
    if (isset($_POST['show_metaphor']) || isset($_POST['show_metaphor_card'])) {
        if ($totalRows_Recordset1 > 0) {
            echo "<table>";
            echo "<thead><tr><th>الاسم</th><th>الكلية</th><th>القسم</th><th>تاريخ الاستعارة</th><th>تاريخ العودة</th><th>رمز المكتبة</th><th>التوقيع</th><th>عنوان الكتاب</th><th>رقم البطاقة</th></tr></thead><tbody>";

            // عرض البيانات من جدول metaphor
            do {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row_Recordset1['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['collage'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['dept'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['borrowdate'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['returndate'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['libsybol'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['signature'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['bookadress'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row_Recordset1['cardno'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "</tr>";
            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
            
            echo "</tbody></table>";
        } else {
            echo "<p style='text-align: center; color: red;'>لا توجد بيانات لعرضها.</p>";
        }
    }
    ?>
</div>

</body>
</html>

<?php
// تحرير النتيجة بعد الانتهاء
mysql_free_result($Recordset1);
?>
