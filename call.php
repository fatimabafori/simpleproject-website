<!DOCTYPE html>
<html lang="ar">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تحسين الصفحة باستخدام CSS</title>
<style type="text/css">
body {
  background-color: #b3e5fc; /* لون خلفية لبني فاتح */
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  direction: rtl; /* النصوص من اليمين لليسار */
}

h1, h2, h3 {
  color: #00796B; /* أزرق داكن */
}

p {
  font-size: 16px;
  color: #00796B;
}

input[type="text"], textarea {
  width: 100%;
  padding: 8px;
  margin: 10px 0;
  border: 1px solid #e0e0e0; /* إطار فاتح */
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #c2e0f4; /* اللون اللبني */
  color: #00796B;
  padding: 12px 25px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #6ca0dc; /* أزرق غامق عند التمرير */
}

form {
  width: 70%;
  margin: 50px auto;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
  font-size: 18px;
  font-weight: bold;
  color: #00796B;
}

textarea {
  resize: vertical;
  font-size: 16px;
}

table {
  width: 100%;
  margin: 20px 0;
}

table td {
  padding: 10px;
}

div#buttons {
  text-align: center;
}

#notes, #user-name {
  font-size: 16px;
  font-weight: bold;
  color: #00796B;
}

#user-name, #notes {
  text-align: right;
}

/* تنسيق الزر */
#buttons input[type="submit"]:first-child {
  background-color: #c2e0f4; /* زر ارسال اللون اللبني */
}

#buttons input[type="submit"]:last-child {
  background-color: #c2e0f4; /* زر الصفحة الرئيسية اللون اللبني */
  color: #00796B;
  margin-top: 10px;
  transition: transform 0.3s ease;
}

#buttons input[type="submit"]:last-child:hover {
  transform: translateY(-5px);
}

a {
  text-decoration: none;
}

a input[type="button"]:hover {
  background-color: #6ca0dc; /* أزرق غامق عند التمرير */
}

#buttons input[type="submit"], a input[type="button"] {
  width: 150px;
}

input[type="text"], textarea {
  font-size: 14px;
}

#tel {
  font-size: 14px;
}

/* تحريك زر الصفحة الرئيسية إلى وسط الصفحة */
a {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 30px;
}

/* تغيير لون الزر عند التمرير */
a input[type="button"] {
  width: 150px;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  background-color: #c2e0f4; /* الأزرق اللبني */
  border: none;
  border-radius: 5px;
  color: #00796B;
}

a input[type="button"]:hover {
  background-color: #6ca0dc; /* أزرق غامق عند التمرير */
  transform: translateY(-5px);
}

/* إخراج العنوان خارج الإطار */
h2 {
  text-align: center;
  color: #00796B;
  font-size: 22px;
  margin-top: 20px;
}
</style>
</head>

<body>

<h2>نموذج الاستفسارات والملاحظات</h2>

<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <label for="tel" id="user-name">اسم المستخدم:</label>
  <input type="text" name="tel" id="tel" placeholder="أدخل اسم المستخدم" />

  <label for="notes" id="notes">الملاحظات و الاستفسارات:</label>
  <textarea name="notes" id="notes" cols="50" rows="5" placeholder="أدخل الملاحظات أو الاستفسار هنا"></textarea>

  <div id="buttons">
    <input type="submit" value="إرسال" />
  </div>

  <input type="hidden" name="MM_insert" value="form2" />
</form>

<!-- زر الصفحة الرئيسية في وسط الصفحة -->
<a href="main.php"><input type="button" value="الصفحة الرئيسية" /></a>

</body>
</html>
