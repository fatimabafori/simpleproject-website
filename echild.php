<?php
// تحديد المسارات للصور
$image1 = "image1.jpg";
$image2 = "image2.jpg";
$image3 = "image3.jpg";

// تحديد الروابط الخاصة بالتحميل
$link1 = "https://www.academia.edu/98270106/Essentials_of_Pediatrics_Nelson";  // رابط تحميل للصورة الأولى
$link2 = "https://jasu.kg/wp-content/uploads/2024/04/Oxford-Handbook-of-";  // رابط تحميل للصورة الثانية
$link3 = "https://terregreenolympiad.com/new-web-assets/Education-Material/pdf/Paediatrics-and-Child-Health.pdf";  // رابط تحميل للصورة الثالثة
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

        /* تنسيق الإطار لكل صورة */
        .image-frame {
            width: 32%; /* عرض الإطار سيكون 32% من عرض الحاوية */
            border: 2px solid #ccc; /* إطار للصورة */
            border-radius: 8px; /* إضافة حواف دائرية للإطار */
            overflow: hidden; /* إخفاء المحتوى الزائد */
            position: relative; /* لجعل الزر في موضع مطلق */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); /* إضافة ظل للإطار */
        }

        /* تنسيق الصور داخل الإطار */
        .image-frame img {
            width: 100%; /* عرض الصورة سيكون 100% من عرض الإطار */
            height: 350px; /* تحديد ارتفاع الصور */
            object-fit: cover; /* الحفاظ على تناسق الصورة مع القص لتغطية الحاوية */
        }

        /* تنسيق زر التحميل */
        .download-button {
            display: block;
            width: 100%; /* تأكيد أن الزر يعرض كامل عرض الإطار */
            padding: 12px 20px;
            background-color: #0066cc; /* اللون الأزرق */
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px; /* مسافة بين الزر والصورة */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .download-button:hover {
            background-color: #004c99; /* تغير اللون عند التمرير */
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
        <div class="image-frame">
            <img src="img/SS (2).jpg" alt="Image 1">
            <!-- زر التحميل للصورة الأولى -->
            <a href="<?php echo $link1; ?>" class="https://www.academia.edu/98270106/Essentials_of_Pediatrics_Nelson" target="_blank">تحميل</a>
        </div>
        <div class="image-frame">
            <img src="img/ZZ (2).jpg" alt="Image 2">
            <!-- زر التحميل للصورة الثانية -->
            <a href="<?php echo $link2; ?>" class="https://jasu.kg/wp-content/uploads/2024/04/Oxford-Handbook-of-" target="_blank">تحميل</a>
        </div>
        <div class="image-frame">
            <img src="img/A (2).jpg" alt="Image 3">
            <!-- زر التحميل للصورة الثالثة -->
            <a href="<?php echo $link3; ?>" class="https://terregreenolympiad.com/new-web-assets/Education-Material/pdf/Paediatrics-and-Child-Health.pdf" target="_blank">تحميل</a>
        </div>
    </div>

    <!-- زر العودة إلى الصفحة الرئيسية -->
    <a href="main.php" class="button">العودة</a>

</body>
</html>
