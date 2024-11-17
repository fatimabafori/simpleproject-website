<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        /* تنسيق الصفحة */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-3px); /* تأثير عند التمرير */
        }

        input[type="submit"]:active {
            transform: translateY(0); /* تأثير عند الضغط */
        }

        .input-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="admainmain.php" method="POST">
        <h2>تسجيل الدخول</h2>

        <div class="input-group">
            <input type="text" name="name" id="name" placeholder="اسم المستخدم" required>
        </div>

        <div class="input-group">
            <input type="password" name="pass" id="pass" placeholder="كلمة المرور" required>
        </div>

        <div class="input-group">
            <input type="submit" name="log" id="log" value="دخول">
        </div>
    </form>
</body>
</html>
