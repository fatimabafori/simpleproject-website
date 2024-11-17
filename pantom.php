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
        /* تنسيق الحاوية التي تحتوي الصور */
        .image-container {
            width: 90%; /* عرض الحاوية سيكون 90% من عرض الشاشة */
            max-width: 1100px; /* الحد الأقصى للحاوية لتجنب عرضها بشكل كبير */
            margin: 40px auto; /* محاذاة الحاوية في المنتصف مع إضافة هامش أعلى وأسفل */
            display: flex;
            justify-content: space-between; /* توزيع الصور بشكل متساوٍ */
            gap: 20px; /* زيادة المسافة بين الصور */
            padding: 20px; /* إضافة مسافة داخل الحاوية */
            align-items: center; /* محاذاة الصور عموديًا */
            border-radius: 10px; /* إضافة حواف دائرية للحاوية */
            background-color: #f9f9f9; /* خلفية فاتحة للحاوية */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* إضافة تأثير ظل للحاوية */
        }

        /* تنسيق الصور داخل الحاوية */
        .image-container img {
            width: 32%; /* عرض الصورة سيكون 32% من عرض الحاوية */
            height: 350px; /* تحديد ارتفاع الصور */
            object-fit: cover; /* الحفاظ على تناسق الصورة مع القص لتغطية الحاوية */
            border-radius: 8px; /* إضافة حواف دائرية للصور */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); /* إضافة ظل للصورة */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* تأثير حركي وتغيير الظل عند التمرير */
        }

        /* تأثير تكبير الصورة عند التمرير عليها */
        .image-container img:hover {
            transform: scale(1.05); /* تكبير الصورة عند التمرير عليها */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* زيادة الظل عند التمرير */
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

    <div class="image-container">
        <img src="img/٢٠٢٤٠٨٢٠_١٠٢٨١٣.jpg" alt="yy">
        <img src="img/٢٠٢٤٠٨٢٠_١٠٢٣٥٠.jpg" alt="rr">
        <img src="img/٢٠٢٤٠٨٢٠_١٠٢٩٠٠.jpg" alt="tt">
    </div>

    <!-- زر العودة إلى الصفحة الرئيسية -->
    <a href="main.php" class="button">العودة</a>

</body>
</html>
