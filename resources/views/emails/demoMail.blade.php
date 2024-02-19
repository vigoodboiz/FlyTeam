<!DOCTYPE html>
<html>

<head>
    <title>C.O.I Cosmestics</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Cảm ơn bạn đã tin tưởng shop của chúng tôi! Chúc bạn một ngày làm việc tốt lành và mua sắm thả ga, không cần nhìn
        giá.</p>
    <p><a href="{{ route('send.email', $mailData->email) }}">Click here to verify your account!</a></p>

    <p>Cảm ơn bạn rất nhiều!</p>
</body>

</html>
