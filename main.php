<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة البحر الأحمر</title>

    <style type="text/css">
        .ق {
            font-family: Georgia, Times New Roman, Times, serif;
        }

        body, td, th {
            font-size: x-large;
        }

        r {
            font-family: Georgia, Times New Roman, Times, serif;
        }

        /* تنسيق الجدول */
        table {
            width: 80%;
            margin: auto;
        }

        /* تنسيق الروابط داخل الجدول */
        td a {
            display: block;
            text-decoration: none;
            color: white;
            background-color: #007BFF; /* اللون الأزرق */
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        /* تأثير التحريك عند التمرير على الروابط */
        td a:hover {
            background-color: #0056b3; /* لون أزرق داكن عند التمرير */
            transform: translateY(-5px); /* تحريك الأزرار للأعلى عند التمرير */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* إضافة ظل عند التمرير */
        }

        /* تأثير التوسيع على الأزرار */
        td a:active {
            transform: scale(1.1); /* تكبير الزر عند الضغط */
            background-color: #004085; /* اللون الأزرق الداكن عند الضغط */
        }

        /* تحسين التنسيق للروابط */
        td {
            padding: 10px;
        }

        /* تخصيص اللون الأزرق للمراجع */
        td a[href*="mrefer"] {
            background-color: #0056b3; /* الأزرق الداكن للمراجع */
            color: white;
        }

        td a[href*="mrefer"]:hover {
            background-color: #004085; /* أزرق داكن عند التمرير */
        }

        /* تحسين العرض للأجهزة الصغيرة */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            td a {
                font-size: smaller;
            }
        }
    </style>

    <link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>
<body>
    <div align="center">
        <p class="ق"><strong>جامعة البحر الاحمر</strong></p>
        <p><strong>كلية الطب والعلوم الصحية</strong>        </p>
        <p><img src="img/شعار كلية طب.jpg" width="228" height="191" alt="yy"></p>
        <p>&nbsp;</p>
    </div>

    <!-- الجدول الذي يحتوي على الروابط -->
    <table border="1" align="center">
        <tr>
            <td width="15%"><a href="call.php">اتصل بنا</a></td>
            <td width="15%"><a href="us.php">من نحن</a></td>
            <td width="25%"><a href="vision.php">الرؤية والرسالة</a></td>
            <td width="31%">
                <ul id="MenuBar1" class="MenuBarVertical">
                    <li><a href="#" class="MenuBarItemSubmenu">المراجع </a>
                        <ul>
                            <li><a href="#" class="MenuBarItemSubmenu">المراجع الالكترونية</a>
                                <ul>
                                    <li><a href="eantom.php">قسم التشريح</a></li>
                                    <li><a href="esurjery.php">قسم الجراحة</a></li>
                                    <li><a href="edentisty.php">قسم طب الاسنان</a></li>
                                                                        <li><a href="edentisty.php">قسم الاطفال</a></li>

                                    <li><a href="edentisty.php">قسم العيون</a></li>

                                    <li><a href="edentisty.php">قسم  ثقافة اسلامية </a></li>
                                                                        <li><a href="edentisty.php">قسم الادوية </a></li>

                                    <li><a href="edentisty.php">قسم  فيسولوجيا</a></li>

                                    <li><a href="edentisty.php">قسم علوم ادتماعية </a></li>

                                    <li><a href="edentisty.php">قسم لغة عربية </a></li>


                                </ul>
                            </li>
                            <li><a href="#" class="MenuBarItemSubmenu">المراجع الورقية</a>
                                <ul>
                                    <li><a href="psurjery.php">قسم الجراحة</a></li>
                                    <li><a href="pantom.php">قسم التشريح</a></li>
                                    <li><a href="pdentisty.php">قسم طب الاسنان</a></li>
                                     <li><a href="edentisty.php">قسم الاطفال</a></li>

                                    <li><a href="edentisty.php">قسم العيون</a></li>

                                    <li><a href="edentisty.php">قسم  ثقافة اسلامية </a></li>
                                                                        <li><a href="edentisty.php">قسم الادوية </a></li>

                                    <li><a href="edentisty.php">قسم  فيسولوجيا</a></li>

                                    <li><a href="edentisty.php">قسم علوم ادتماعية </a></li>

                                    <li><a href="edentisty.php">قسم لغة عربية </a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </td>
            <td width="14%"><a href="index.php">الرئيسية</a></td>
        </tr>
    </table>

    <script type="text/javascript">
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
</body>
</html>
