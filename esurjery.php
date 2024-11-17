<?php
// تحديد المسارات للصور
$image1 = "image1.jpg";
$image2 = "image2.jpg";
$image3 = "image3.jpg";
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض ثلاث صور متساوية الحجم</title>
    <style>
        /* تنسيق الصندوق الذي يحتوي الصور */
        .image-container {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 20px;
            padding: 10px;
            max-width: 1000px; /* تحديد أقصى عرض للحاوية */
            width: 100%; /* تأكد من ملاءمة العرض */
            margin: 0 auto; /* محاذاة الحاوية في الوسط */
        }

        /* تنسيق الإطار الذي يحتوي على الصورة والزر */
        .image-frame {
            width: 32%; /* عرض الإطار سيكون 32% من عرض الحاوية */
            text-align: center; /* محاذاة المحتوى في الوسط */
            border: 2px solid #ddd; /* إطار الصورة */
            padding: 10px;
            border-radius: 8px; /* حواف دائرية للإطار */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* إضافة تأثير ظل */
            background-color: #f9f9f9;
        }

        /* تنسيق الصور داخل الإطار */
        .image-frame img {
            width: 100%; /* عرض الصورة كامل داخل الإطار */
            height: auto; /* الحفاظ على النسبة الأصلية للارتفاع */
            max-height: 300px; /* الحد الأقصى للارتفاع */
            object-fit: contain; /* الحفاظ على الأبعاد الأصلية للصورة دون قص */
            border-radius: 8px; /* إضافة حواف دائرية للصورة */
            transition: transform 0.3s ease; /* تأثير حركي عند التمرير على الصورة */
        }

        /* تأثير تكبير الصورة عند التمرير عليها */
        .image-frame img:hover {
            transform: scale(1.05);
        }

        /* تنسيق زر التحميل */
        .download-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .download-btn:hover {
            background-color: #218838;
        }

        /* تنسيق الزر العودة إلى الصفحة الرئيسية */
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 30px;
            background-color: #0066cc;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #004c99;
        }
    </style>
</head>
<body>

    <!-- الحاوية التي تحتوي على الصور -->
    <div class="image-container">
        <div class="image-frame"><img src="img/G (2).jpg" width="520" height="560" alt="bb"><!-- رابط للانتقال إلى موقع التحميل عند النقر -->
            <a href="https://books.google.gg/books?id=Qs-JCgAAQBAJ&printsec=copyright#v=onepage&q&f=false" class="download-btn" target="_blank">تحميل</a>
        </div>
        <div class="image-frame"><img src="img/GG (2).jpg" width="440" height="403" alt="vv"><!-- رابط للانتقال إلى موقع التحميل عند النقر -->
            <a href="https://noor-book.com/fnp6wo" class="download-btn" target="_blank">تحميل</a>
        </div>
        <div class="image-frame"><img src="img/SS (2).jpg" width="430" height="430" alt="cc"><!-- رابط للانتقال إلى موقع التحميل عند النقر -->
            <a href="https://books-library.net/free-348026109-download" class="download-btn" target="_blank">تحميل</a>
        </div>
    </div>

    <!-- زر العودة إلى الصفحة الرئيسية -->
    <a href="main.php" class="button">العودة</a>

</body>
</html>
