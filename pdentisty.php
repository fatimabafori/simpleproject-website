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

        /* تنسيق الصور لتكون متساوية في الحجم */
        .image-container img {
            width: 32%; /* عرض الصورة سيكون 32% من عرض الحاوية */
            height: auto; /* الحفاظ على النسبة الأصلية للارتفاع */
            max-height: 300px; /* الحد الأقصى للارتفاع */
            object-fit: contain; /* الحفاظ على الأبعاد الأصلية للصورة دون قص */
            border-radius: 8px; /* إضافة حواف دائرية للصورة */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* إضافة تأثير ظل للصورة */
            transition: transform 0.3s ease; /* تأثير حركي عند التمرير على الصورة */
        }

        /* تأثير تكبير الصورة عند التمرير عليها */
        .image-container img:hover {
            transform: scale(1.05);
        }

        /* تنسيق الزر */
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
        <img src="img/٢٠٢٤٠٨٢٠_١٠١٤١٩.jpg" alt="hy">
        <img src="img/٢٠٢٤٠٨٢٠_١٠١٣٢٨.jpg" alt="rr">
        <img src="img/٢٠٢٤٠٨٢٠_١٠١٢٠٥.jpg" alt="hh">
    </div>

    <!-- زر العودة إلى الصفحة الرئيسية -->
    <a href="main.php" class="button">العودة</a>

</body>
</html>
