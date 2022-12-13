<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Heritage College of Education (B.Ed & D.El.Ed)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Heritage College of Education</title>

</head>
<!-- Complete Email template -->

<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="550" bgcolor="white" style="border:2px solid black">
    <tbody>
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="col-550" width="550">
                <tbody>
                <tr>
                    <td align="center" style="background-color: #001a39;height: 50px;">
                        <a href="#" style="text-decoration: none;">
                            <p style="color:white;font-weight:bold;">
{{--                                <img src="http://localhost/projects/heritage-college/public/assets/img/logo-primary.png" width="150">--}}
                            </p>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td style="height: 150px;padding: 20px;border: none;border-bottom: 2px solid #361B0E;background-color: white;">
            <p class="data" style="text-align: justify-all;align-items: center;font-size: 15px;padding-bottom: 12px;">
                You have a new contact message. Please check below for the message:
            </p>
            <p style="text-transform: none !important;"><span>Name:</span> {{$name}}</p>
            <p style="text-transform: none !important;"><span>Email:</span> {{$email}}</p>
            <p style="text-transform: none !important;"><span>Mobile:</span> {{$mobile}}</p>
            <p style="text-transform: none !important;"><span>Message:</span> {{$messageBody}}</p>
        </td>
    </tr>
    <tr style="border: none;background-color: #4cb96b;height: 40px;color:white;padding-bottom: 20px;text-align: center;">
        <td height="40px" align="center">
            <p style="color:white;line-height: 1.5em;">
                © {{$date}} Heritage College of Education
            </p>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
