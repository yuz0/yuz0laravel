<html>
    <head>
        <title>@yield('title')</title>
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
            ul{
                font-size: 12px;
            }
            hr{
                margin: 25px 100px;
                border-top: 1px dashed #ddd;
            }

            th{
                background-color: #999;
                color: #fff;
                padding: 5px 10px;
            }
            td{
                border: solid 1px #aaa;
                color: #999;
                padding: 5px 10px;
            }

            .footer{
                text-align: right;
                font-size: 10px;
                border-bottom: 1px solid #ccc;
                color: #ccc;
            }
        </style>
    </head>
    <body>
        <h1>@yield('title')</h1>
        @section('menubar')
        <h2 class = "menutitle">MENU</h2>
        <ul>
            <li>@show</li>
        </ul>
        <hr size = "1">
        <div class = "content">
            @yield('content')
        </div>
        <div class = "footer">
            @yield('footer')
        </div>
    </body>
</html>
