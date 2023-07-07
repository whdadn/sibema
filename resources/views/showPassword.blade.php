<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI BEBAS MASALAH</title>
</head>

<body>
    <h1>Reset Password</h1>

    <p>Hello {{ $user->username }},</p>
    <p>Kamu mendapat pesan email ini dikarenakan kami menerima permintaan reset password dari akun mu.</p>
    <p>Silahkan klik link yang disediakan untuk melakukan perubahaan pada password kamu</p>
    <p><a href="{{ url('/ubahPassword' . $token) }}">Reset Password</a></p>
    <p>Jika kamu tidak merasa melakukan permintaan reset password maka abaikan saja pesan ini</p>

    <p>Hormat kami,<br> Tim sibema</p>
</body>

</html>
