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
    </head>
    <body>
        <div class="container">
            <nav class="navigation">
                <ul>
                    <li><a href="index.php">Add Message</a></li>
                    <li><a href="messages.php" class="selected">All Messages</a></li>
                </ul>
            </nav>
            <?php              
                $messages = new Vanilla\Database\Message;
                if(count($messages->all()) > 0) {
                    foreach($messages->all() as $message) {
            ?>
                        <div class="message">
                            <div class="message-row">
                                <span class="message-label">Name:</span>
                                <span><?php echo $message->name; ?></span>
                            </div>
                            <div class="message-row">
                                <span class="message-label">Email:</span>
                                <span><?php echo $message->email; ?></span>
                            </div>
                            <div class="message-row">
                                <span class="message-label">Date Sent:</span>
                                <span><?php echo $message->created_at; ?></span>
                            </div>
                            <div class="message-row">
                                <span class="message-label">Message:</span>
                                <span class="actual-message">
                                    <?php echo $message->message; ?>
                                </span>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<span class='no-messages'>No messages to display.</span>";
                }
            ?>
        </div>

        <!-- Type Kit -->
        <script type="text/javascript" src="//use.typekit.net/mjp5qbe.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </body>
</html>