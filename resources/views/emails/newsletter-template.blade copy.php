<!DOCTYPE html>
<html>
<head>
    <title>shibu-{{ $title }}</title>
</head>
<body>

    {!! $content !!}

    <br><br>

    <a href="{{ route('newsletter.unsubscribe', ['id' => $subscriber->id]) }}"
       style="
            display:inline-block;
            padding:12px 20px;
            background:#dc2626;
            color:#ffffff;
            text-decoration:none;
            border-radius:6px;
       ">
        Unsubscribe
    </a>

</body>
</html>