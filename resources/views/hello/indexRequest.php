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
        <h1>Index</h1>
        <p><?php echo $msg; ?></p>
        <p>ID = <?php echo $id; ?></p>
        <p><?php echo date("Y年n月j日"); ?></p>
    </body>
</html>
