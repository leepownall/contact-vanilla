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

                $validation = new Vanilla\Validation\Validation;

                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                try {
                    $validation->data($name)->required()->alpha();
                    $validation->data($email)->required()->email();
                    $validation->data($message)->required()->min();
                } catch(\Exception $e) {}

                
            ?>
            <form action="" method="POST" novalidate>
                <ul class="form cf">
                    <li>
                        <label for="title">Name <span class="asterix">&#42;</span></label>
                        <input type="text" name="name">
                    </li>
                    <li>
                        <label for="email">Email <span class="asterix">&#42;</span></label>
                        <input type="email" name="email">
                    </li>
                    <li>
                        <label for="message">Your Message <span class="asterix">&#42;</span></label>
                        <textarea name="message" cols="30" rows="10"></textarea>
                    </li>
                    <li>
                        <input type="submit" value="Send Message">
                    </li>
                </ul>
            </form>
            <?php 
                if($validation->fails()) {
                    echo "<ul class='errors'>";
                    foreach($validation->errors() as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul>";
                }
            ?>
        </div>

		<!-- Type Kit -->
        <script type="text/javascript" src="//use.typekit.net/mjp5qbe.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </body>
</html>