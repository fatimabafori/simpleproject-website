<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    body, td, th {
        font-size: x-large;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* تنسيق الصورة */
    img {
        margin: 20px 0;
    }

    /* تنسيق الجدول بدون حواف */
    table {
        width: 100%;
        border-collapse: collapse; /* إزالة الحدود بين الخلايا */
        margin-top: 20px;
        border: none; /* إزالة حدود الجدول */
    }

    table td {
        text-align: center;
        padding: 20px;
    }

    /* تنسيق الأزرار */
    a.button {
        display: inline-block;
        background-color: #007BFF;
        color: white;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        width: 100%; /* تأكد من أن الأزرار تملأ الخلايا */
        box-sizing: border-box; /* التأكد أن الأزرار تملأ الخلايا بالكامل */
    }

    a.button:hover {
        background-color: #0056b3;
        transform: scale(1.1); /* تكبير الزر عند المرور عليه */
    }

    /* تنسيق القائمة المنسدلة */
    #MenuBar1 {
        margin-top: 10px;
    }

    #MenuBar1 .MenuBarItemSubmenu a {
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 18px;
        border-radius: 5px;
        width: 100%;
    }

    #MenuBar1 .MenuBarItemSubmenu a:hover {
        background-color: #0056b3;
        transform: scale(1.1);
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p align="center"><img src="img/شعار كلية طب.jpg" width="150" height="150" alt="hh" /></p>

  <table>
    <tr>
      <td><a href="metaphors.php" class="button">الاستعارة</a></td>
      <td><a href="members.php" class="button">الاعضاء</a></td>
      <td><a href="emp.php" class="button">الموظفين</a></td>
      <td><a href="books.php" class="button">الكتب</a></td>
      <td>
        <ul id="MenuBar1" class="MenuBarHorizontal">
          <li><a class="MenuBarItemSubmenu" href="#">التقارير</a>
            <ul>
              <li><a href="bookreport.php">تقرير الكتب</a></li>
              <li><a href="empreport.php">تقرير الموظفين</a></li>
              <li><a href="membreport.php">تقرير الاعضاء</a></li>
              <!-- تم تعديل الرابط هنا ليوجه المستخدم إلى صفحة metareport.php -->
              <li><a href="metareport.php">تقرير الاستعارة</a></li>
            </ul>
          </li>
        </ul>
      </td>
    </tr>
  </table>

</form>

<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
