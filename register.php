<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
        
        $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

        if($success) {
            // Store session
            header("Location: index.php");
        }
    }

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Netflix!</title>
        <link rel="shortcut icon" type="image/ico" href="assets/images/netflix.jpg">
        <link rel="stylesheet" type="text/css" href="assets/style/style.css">
    </head>
    <body>

        <div class="signInContainer">
        
            <div class="column">

                <div class="header">
                <img src="assets/images/logo_.png" title=="Logo" alt="Netflix logo">
                    <h3>Sign Up</h3>
                    <span>to continue to Netflix</span>
                </div>
            
                <form action="" method="POST">

                    <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName"); ?>" required>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>


                    <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" required>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>


                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>

                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>

                    <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue("email2"); ?>" required>
                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>

                    <input type="password" name="password" placeholder="Password"  required>

                    <input type="password" name="password2" placeholder="Confirm Password" required>
                    <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

                <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

            </div>
        
        </div>

    </body>
</html>