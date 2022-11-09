<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0;
        }

        html {
            margin: 0;
        }

        body {
            margin: 0;
            position: relative;
            padding: 0;
            font-family:" sans-serif","sans-serif";
        }

        #header {
            display: block;
        }

        .header-content {
            margin-top: 32px;
        }

        .text {
            font-weight: 400;
            font-size: 15px;
            color: #5F5E61;
            font-family:" sans-serif","sans-serif";
        }

        .email p {
            margin-top: 16px;
            color: #175067;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
        }

        .date_content_wrapper .date {
            font-weight: 600;
            font-size: 16px;
            color: #5F5E61;
        }

        .date_content_wrapper {

        }

        .header-content-wrapper {
            /*border:1px solid red;*/
        }

        .header-content-wrapper .email {
            width: 80%;
            float: left;
            /*clear: both;*/
            display: block;
        }

        .header-content-wrapper .date_content_wrapper {
            float: right;
            width: 20%;
            /*clear: both;*/
            display: block;
        }

        footer {
            position: fixed;
            background: #175067;
            height: 32px;
            width: 100%;
            left: 0;
            right: 0;
            bottom: 0;
        }

        header {
            position: fixed;
            height: 10px;
            background: #175067;
            top: 0;
            left: 0;
            width: 100%;
            right: 0;
        }

        main {
            padding: 70px;
        }
    </style>
</head>
<body>
{{--header start--}}
<header></header>
<main>
    <section id="header">
        <img src="{{asset("image/common/logo.png")}}" alt="">
        <div class="header-content">
            <p class="text">Accounteer Smart Cloud Accounting Ltd</p>
            <p class="text">No Mambilla street, </p>
            <p class="text">Federal Capital Territory, Abuja</p>
            <div class="header-content-wrapper">
                <div class="email">
                    <p>team@legable.com</p>
                </div>
                <div class="date_content_wrapper" style="text-align: right">
                    <div class="text">Date</div>
                    <div class="date">30 June, 2022</div>
                </div>
            </div>
        </div>
    </section>
    <hr style="overflow: hidden; margin-top: 60px; border:1px solid #E2E2E2"/>
    {{--header end--}}
    {{--section plan start--}}
    <section id="plan" style="margin-top: 70px;">
        <h3>Legable Premium Plan</h3>
        <p>Billing Address</p>
        <p>IOTA Infotech Limited</p>
        <div class="text">House 1/D 1/C, Road No. 16, Nikunja 02</div>
        <div class="text">Dhaka, Bangladesh.</div>
    </section>
    <hr style="overflow: hidden; margin-top: 24px; border:1px solid #E2E2E2"/>
    {{--section plan end--}}
    {{-- section summury start--}}
    <section id="invoice_summary">
        <h3 style="
                    font-weight: 600;
                    font-size: 15px;
                    line-height: 22px;
                    text-transform: uppercase;
                    color: #175067;
                ">Invoice Summary</h3>
        <hr style="overflow: hidden; margin-top: 30px; border:1px solid #E2E2E2"/>
        <div class="invoice_summary_content">
            <div class="invoice_summary_heading" style="
                        letter-spacing: 0.05em;
                        text-transform: uppercase;
                        font-weight: 600;
                        font-size: 12px;
                        color: #504648;

                    ">
                <div style="
                        float: left;
                        width: 80%;
                        ">Title
                </div>
                <div style="
                        float: right;
                        text-align: right;
                        width: 20%;
                        ">Amount
                </div>
            </div>
            <hr style="overflow: hidden; margin-top: 20px; border:1px dashed #BCB0C4"/>
            {{-- loop start from here--}}
            <div class="invoice_content" style="margin-top: 30px">
                <div style="
                         width: 80%;
                          float: left;
                        ">Legable Premium Plan
                </div>
                <div style="
                        width: 20%;
                         float: right;
                        text-align: right;
                        ">$ 30.00
                </div>
            </div>
            {{-- loop end--}}
        </div>
    </section>
    {{-- section summury end--}}
    {{--sub total area start--}}
    <div style="margin-top: 72px">
        <hr style="overflow: hidden; border:1px dashed #BCB0C4;"/>
        <hr style="overflow: hidden; border:1px dashed #BCB0C4;"/>
    </div>
    <section id="subtotal" style="float: right">
        <table style="font-family: sans-serif">
            <tr>
                <th style="padding:10px 50px 10px 0;color: #3A494E; font-weight: 500; font-size: 14px;">Subtotal</th>
                <td style="text-align: right;font-weight: 600;font-size: 16px;line-height: 24px;color: #504648;">$ 30.00</td>
            </tr>
            <tr>
                <th style="padding:10px 50px 10px 0;color: #3A494E; font-weight: 500; font-size: 14px;">VAT(5%)</th>
                <td style="text-align: right;font-weight: 600;font-size: 16px;line-height: 24px;color: #504648;">$ 2.00</td>

            </tr>
            <tr>
                <th style="padding:10px 50px 10px 0;color: #3A494E; font-weight: 500; font-size: 14px;">Total</th>
                <td style="text-align: right;font-weight: 600;font-size: 16px;line-height: 24px;color: #504648;">$ 32.00</td>
            </tr>
        </table>
    </section>
    {{-- heart  --}}
    <div class="heart" style="margin-top: 30px; clear: both;">
        <img src="{{asset("image/heart.png")}}" alt="">
    </div>
</main>
{{--sub total area end--}}
<footer></footer>
</body>
</html>
