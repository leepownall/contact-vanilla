<?php require __DIR__.'/vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="public/css/reset.css">
        <link rel="stylesheet" type="text/css" href="public/css/stylesheet.css">

        <!-- Font Awesome -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
                $db = new Vanilla\Database\Database;

                foreach($db->all() as $message) { ?>
                    <div class="message">
                        <header>
                            <?php echo $message->name . " - " . $message->email; ?>
                        </header>
                        <p><?php echo $message->message; ?></p>
                    </div>
                <?php } ?>
        </div>

        <!-- Type Kit -->
        <script type="text/javascript" src="//use.typekit.net/mjp5qbe.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </body>
</html>