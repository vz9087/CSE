<!DOCTYPE html>

<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-sscale = 1.0">

        <title>Visitor Counter</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center; padding: 50px;
            }

            h1 { color: #333; }

            .counter { font-size: 2em; color: #FF5733; margin-top: 20px; }
        </style>
    </head>

    <body>
        <h1>Welcome to Our Website</h1>

        <p class = "counter">You are visitor number: </p>

        <?php
            $counterFile = "counter.txt";

            if (!file_exists ($counterFile)) { file_put_contents ($counterFile, 0); }

            $visitorCount = file_get_contents ("$counterFile");

            $visitorCount ++;

            file_put_contents ($counterFile, $visitorCount);

            echo "<div class = 'counter'>$visitorCount</div>";
        ?>
    </body>
</html>
