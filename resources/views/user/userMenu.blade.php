<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - User Manual</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ffffff;
            padding: 40px;
            color: #111;
        }

        .page-title {
            color: #3b82f6;
            /* Blue color matching the image */
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .manual-container {
            background-color: #f3efe4;
            /* Light beige color */
            border-radius: 4px;
            /* Slight rounding if any */
            padding-bottom: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            border-bottom: 2px solid #dcd7c9;
        }

        .header .left-title {
            font-weight: bold;
            font-size: 16px;
            flex: 1;
        }

        .header .center-title {
            font-weight: 900;
            font-size: 32px;
            text-transform: uppercase;
            text-align: center;
            flex: 2;
            letter-spacing: 1px;
        }

        .header .right-action {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .btn-main-menu {
            background-color: #4a86e8;
            color: #111;
            /* Dark text based on the image */
            border: 1px solid #3b74cd;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            transition: background-color 0.2s;
        }

        .btn-main-menu:hover {
            background-color: #3b74cd;
            color: #fff;
        }

        .content-area {
            background-color: #e8e8e8;
            /* Light gray */
            margin: 15px 20px;
            padding: 25px;
            min-height: 280px;
            font-size: 14px;
            line-height: 1.8;
            border: 1px solid #ddd;
        }

        .footer-box {
            background-color: #d6d6d6;
            /* Slightly darker gray */
            margin: 0 20px;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .footer-box h4 {
            margin: 0 0 10px 0;
            font-size: 18px;
            font-weight: 700;
        }

        .footer-box p {
            margin: 5px 0;
            font-weight: bold;
            font-size: 14px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                padding: 15px;
                text-align: center;
            }

            .header .left-title,
            .header .center-title,
            .header .right-action {
                flex: none;
                width: 100%;
                justify-content: center;
            }

            .header .center-title {
                font-size: 24px;
            }

            .content-area {
                margin: 15px 10px;
                padding: 15px;
                min-height: 200px;
            }

            .footer-box {
                margin: 0 10px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="page-title">User Manual</div>

    <div class="manual-container">
        <div class="header">
            <div class="left-title">User Manual</div>
            <div class="center-title">ABK MINI MART</div>
            <div class="right-action">
                <button class="btn-main-menu">Main Menu</button>
            </div>
        </div>

        <div class="content-area">
            <p>၁။ ပစ္စည်းစာရင်းစစ်ရာတွင် ထွက်ပြီးပြန်ဝင်ရပါမည်။ တနည်းအားဖြင့် Software အားပိတ်ပြီး ပြန်ဖွင့်မှသာ
                ဖော်ပြမည်ဖြစ်ပါသည်။</p>
            <p>၂။ Monthly Report စစ်ရာတွင် Month မှာတစ်လုံးတည်းဖြစ်‌နေ‌လျှင် အ‌‌‌‌ရှေ့တွင် 0 ခံ‌ပေးပါ။ ဉပမာ - 01,02။</p>
            <p>၃။ Dashboard ၏ ဇယားတွင် စာရင်းတစ်ခုခုကို စစ်ဆေးလိုပါက Software ကိုပိတ်ပြီးမှ ပြန်ဝင်ရောက်ပေးပါရန်။</p>
        </div>

        <div class="footer-box">
            <h4>Thanks You - Magway Software House</h4>
            <p>Phone - 09111111111</p>
            <p>Email - MSH@gmail.com</p>
        </div>
    </div>

</body>

</html>