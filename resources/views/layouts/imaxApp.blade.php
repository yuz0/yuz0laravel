<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style>
            body{
                min-height: 100vh;
            }
            #header_title{
                background-color: #333;
                margin: 30px 0;
            }
            @media screen and (max-device-width: 600px){
                h1{
                    font-size: 30px;
                }
            }
            h1 > a{
                color: #fff;
                padding-left: 30px;
            }
            h1 > a:hover{
                color: #e6e6fa;
            }
            .row{
                padding-bottom: 20px;
            }
            h2{
                font-size: 24px;
            }
            h3{
                font-size: 20px;
            }
            footer{
                padding-bottom: 0;
                margin-bottom: 0;
                position: relative;
            }
            #the-footer{
                background-color: #eee;
            }
        </style>
        @yield('stylesheet')
    <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <header>
            <div id = "header_title">
                <h1><a href="/">IMAX Dolby review</a></h1>
            </div>
        </header>
        <main class = "container">@yield('main')</main>
        <footer>
            <div id = "the-footer">
                <div class = "text-center">©︎IMAX Dolby review</div>
            </div>
        </footer>
    </body>
</html>
