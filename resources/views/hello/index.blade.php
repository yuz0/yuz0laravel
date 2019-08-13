<html>
    <head>
        <title>Hello/Index</title>
        <style>
            body{
                font-size: 16px;
                color: #999;
            }
            h1{
                font-size: 100px;
                color: #f6f6f6;
                margin: 0 0 -100px 50px;
            }
        </style>
    </head>
    <body>
        <h1>Blade/Index</h1>
        @isset($msg)
        <p>HELLO, {{$msg}}</p>
        @else
        <p>Write something !</p>
        @endif
        <form method = "POST" action="/hello">
            {{csrf_field()}}
            <input type="text" name = "msg">
            <input type="submit">
        </form>
    </body>
</html>
