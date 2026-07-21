<!DOCTYPE html>
<html>

<head>
    <title>shibu-{{ $title }}</title>
</head>

<body>

    {!! $content !!}

  <div style="margin-top:30px; text-align:center;">
    <a href="{{ URL::signedRoute('newsletter.unsubscribe', ['id' => $subscriber->id]) }}"
       style="
            color:#9ca3af;
            font-size:12px;
            text-decoration:none;
            font-family:Arial,sans-serif;
       ">
        Click here to unsubscribe
    </a>
</div>

</body>

</html>
