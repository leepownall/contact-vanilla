<?php require __DIR__.'/vendor/autoload.php'; ob_start(); ?>
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
            <nav class="navigation">
                <ul>
                    <li><a href="index.php" class="selected">Add Message</a></li>
                    <li><a href="messages.php">All Messages</a></li>
                </ul>
            </nav>
            <?php 

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = trim(htmlspecialchars($_POST['name']));
                    $email = trim(htmlspecialchars($_POST['email']));
                    $message = trim(htmlspecialchars($_POST['message']));

                    $validation = new Vanilla\Validation\Validation;

                    $validation->field('name')->data($name)->required()->alpha();
                    $validation->field('email')->data($email)->required()->email();
                    $validation->field('message')->data($message)->required()->min();

                    if($validation->passes()) {
                        $db = new Vanilla\Database\Message;
                        $db->insert($name, $email, $message);
                        header('Location: messages.php');
                        ob_flush();
                    } else { ?>
                        <form action="" method="POST" novalidate>
                            <ul class="form cf">
                                <li>
                                    <label for="title">Name: <span class="asterix">&#42;</span></label>
                                    <input type="text" name="name" value="<?php echo $name; ?>">
                                    <?php echo "<span class='error-inline'>" . $validation->first('name') . "</span>"; ?>
                                </li>
                                <li>
                                    <label for="email">Email: <span class="asterix">&#42;</span></label>
                                    <input type="email" name="email" value="<?php echo $email; ?>">
                                    <?php echo "<span class='error-inline'>" . $validation->first('email') . "</span>"; ?>
                                </li>
                                <li>
                                    <label for="message">Your Message: <span class="asterix">&#42;</span></label>
                                    <textarea name="message" cols="30" rows="10"><?php echo $message; ?></textarea>
                                    <?php echo "<span class='error-inline'>" . $validation->first('message') . "</span>"; ?>
                                </li>
                                <li>
                                    <input type="submit" value="Send Message">
                                </li>
                            </ul>
                        </form>
                    <?php }
                } else {
            ?>
            <form action="" method="POST" novalidate>
                <ul class="form cf">
                    <li>
                        <label for="title">Name: <span class="asterix">&#42;</span></label>
                        <input type="text" name="name">
                    </li>
                    <li>
                        <label for="email">Email: <span class="asterix">&#42;</span></label>
                        <input type="email" name="email">
                    </li>
                    <li>
                        <label for="message">Your Message: <span class="asterix">&#42;</span></label>
                        <textarea name="message" cols="30" rows="10"></textarea>
                    </li>
                    <li>
                        <input type="submit" value="Send Message">
                    </li>
                </ul>
            </form>
            <?php } ?>
        </div>

		<!-- Type Kit -->
        <script type="text/javascript" src="//use.typekit.net/mjp5qbe.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </body>
</html>