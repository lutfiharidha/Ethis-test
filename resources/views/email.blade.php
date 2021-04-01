<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }

    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;">
    <div role="article" aria-roledescription="email" lang="en"
        style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1
                                    style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                                    Hi {{ $user }}!</h1>
                                <p style="margin:0;">We have some news for you.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                                <a href="http://www.google.com/" style="text-decoration:none;"><img
                                        src="https://assets.codepen.io/210284/1200x800-2.png" width="600" alt=""
                                        style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                                <div class="col-sml"
                                    style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                                    <img src="https://assets.codepen.io/210284/icon.png" width="115" alt=""
                                        style="width:80%;max-width:115px;margin-bottom:20px;">
                                </div>
                                <div class="col-lge"
                                    style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                    <h3 style="margin-top:0;margin-bottom:12px;">{{ $news->title }}</h3>
                                    <p style="margin-top:0;margin-bottom:12px;">
                                        {{ str_limit($news->description, $limit = 150, $end = '...')  }}</p>
                                    <p style="font-size:12px;margin-top:0;margin-bottom:18px;">Written by {{ $author }}
                                    </p>
                                    <p style="margin:0;"><a href="https://www.google.com/"
                                            style="background: #ff3884; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884">
                                            <span style="mso-text-raise:10pt;font-weight:bold;">Read More</span>
                                            </a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
