<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .container{
                padding: 0 30px;
                width: 600px;
            }
            h1{
                font-size: 20px;
                font-weight: normal;
                padding: 20px 0;
            }
            h2{
                font-size: 12px;
                font-weight: normal;
            }
            p{
                font-size: 10px;
            }
            span{
                color: red;
            }
            .content{
                padding: 10px 0;
            }
                .item{
                    display: flex;
                    padding-bottom: 10px;
                }
                label{
                    display: flex;
                }
                option{
                    font-size: 12px;
                }
                textarea{
                    font-size: 10px;
                }
                .button{
                    text-align: center;
                    padding: 20px;
                }


        </style>
    </head>
    <body>
        <div class = "container">
            <div class = "header">
                @yield('header')
            </div>
            <h1>@yield('title')</h1>
            <div class = "content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
