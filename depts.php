<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>اقسام المكتبة</title>
    <style type="text/css">
        /* تنسيق الجسم */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* خلفية الصفحة */
            color: #333; /* لون النص */
        }

        /* تنسيق العنوان "اقسام المكتبة" */
        h1 {
            text-align: center;
            color: #808080; /* لون رمادي */
            margin-top: 50px;
            font-size: 32px; /* حجم العنوان أكبر قليلاً */
            font-weight: bold; /* جعل النص عريض */
            letter-spacing: 2px; /* تباعد أكبر بين الحروف */
            text-transform: uppercase; /* تحويل النص إلى حروف كبيرة */
            padding: 10px; /* إضافة مسافة حول العنوان */
            background-color: #e0e0e0; /* لون خلفية العنوان الرمادي الفاتح */
            border-radius: 8px; /* زوايا دائرية للعنوان */
            width: fit-content; /* عرض مناسب للنص */
            margin-left: auto;
            margin-right: auto; /* محاذاة العنوان في الوسط */
        }

        /* تنسيق الأزرار بشكل أفقي مع تقسيمها إلى 2 زر في كل صف */
        .department-buttons {
            display: flex;
            flex-wrap: wrap; /* السماح بلف الأزرار إلى صفوف جديدة */
            justify-content: space-between; /* توزيع الأزرار بشكل متساوٍ */
            margin-top: 30px;
            padding: 0 20px; /* إضافة بعض الحواف الجانبية */
        }

        /* تنسيق الأزرار */
        .department-buttons a {
            background-color: white; /* تغيير لون الخلفية إلى أبيض */
            color: #333; /* جعل النص باللون الأسود */
            padding: 15px 25px; /* زيادة الحواف الداخلية لجعل الأزرار أكبر */
            margin: 10px;
            font-size: 18px; /* زيادة حجم الخط داخل الأزرار */
            font-weight: bold;
            text-transform: uppercase; /* جعل النص كبير وعريض */
            border-radius: 6px; /* إضافة زوايا دائرية */
            text-decoration: none;
            text-align: center;
            width: 45%; /* عرض الزر ليشغل 45% من المساحة */
            height: auto; /* ارتفاع الأزرار يتكيف مع المحتوى */
            box-sizing: border-box; /* لضمان حساب العرض مع الحواف */
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
            cursor: pointer; /* تغيير المؤشر عند التمرير */
            border: none; /* إزالة الحدود حول الأزرار */
        }

        /* تأثير عند التمرير */
        .department-buttons a:hover {
            transform: translateY(-5px); /* حركة للأعلى عند التمرير */
            background-color: #f4f4f4; /* تغيير اللون عند التمرير */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* إضافة ظل أكبر عند التمرير */
            color: #333; /* الحفاظ على لون النص الأسود */
        }

        /* تأثير التمرير عند التمرير فوق الأزرار */
        .department-buttons a:active {
            transform: translateY(1px); /* تقليص الزر عند الضغط */
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1); /* تأثير ظل خفيف عند الضغط */
        }

        /* لضمان تباعد الأزرار بشكل جيد على الشاشات الصغيرة */
        @media (max-width: 768px) {
            .department-buttons a {
                width: 45%; /* عرض الأزرار 45% في الشاشات الصغيرة */
            }
        }

        /* لضمان عرض الأزرار بالكامل في الشاشات الصغيرة جداً */
        @media (max-width: 480px) {
            .department-buttons a {
                width: 90%; /* عرض الأزرار 90% في الشاشات الصغيرة جداً */
            }
        }
    </style>
</head>

<body>
    <h1>اقسام المكتبة</h1>
    <div class="department-buttons">
        <a href="#">قسم التشريح</a>
        <a href="#">قسم الفيسولوجيا</a>
        <a href="#">قسم طب الاسنان</a>
        <a href="#">قسم الجراحة</a>
        <a href="#">قسم امراض الاطفال</a>
        <a href="#">قسم العيون</a>
       
    </div>
</body>
</html>
