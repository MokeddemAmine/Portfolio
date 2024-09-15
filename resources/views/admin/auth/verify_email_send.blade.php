<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{_('Verify Email')}}</title>
</head>
<body style="background:#eee;">
    <div style="max-width:600px;margin:auto;">
        <a style="text-decoration:none;color:#777;display:block;margin:3rem;font-size:2rem;text-align:center" href="{{url('127.0.0.1:8000')}}">Logo</a>
        <div style="background: white;padding:3rem;">
            <h2>{{_('Hello!')}}</h2>
            <p style="margin:2rem 0;">{{_('Please click the button below to verify your email address.')}}</p>
            <a style="text-decoration:none;width:150px;display:block;margin:auto;text-align:center;padding:.5rem 1.5rem;background:#333;color:white;border-radius:.5rem;" href="{{url('admin/dashboard/verify_email_send/'.$user_id.'/'.$user_email.'/'.$user_created_at)}}">Verify Email Address</a>
            <p style="margin:2rem 0;">{{_('If you did not create an account, no further action is required.')}}</p>
            <p style="margin:.2rem 0;">{{_('Regards')}}</p>
            <p style="margin:.2rem 0;">{{_('Mokeddem Amine')}}</p>
        </div>
        <p style="margin:2rem;color:#777;text-align:center;">&copy; 2024 MAM. All rights reserved</p>
    </div>
    
</body>
</html>