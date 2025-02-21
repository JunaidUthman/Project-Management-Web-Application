<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/css/add_user.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Inscription</h2>
            <?php
                if(isset($_SESSION["add_user_erreur"]) && $_SESSION["add_user_erreur"]=="erreur" ){
                    echo '<div class="message_error">Something went wrong.</div>';
                }
                if(isset($_SESSION["add_user_erreur"]) && $_SESSION["add_user_erreur"]=="email_used"){
                    echo '<div class="message_error">L\'email que vous avez utilisé existe parmi les membres.</div>';
                }
            ?>

            <form action="index.php?action=add_user" method="POST">
                <div class="input-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="button-group">
                    <button type="submit">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    unset($_SESSION["add_user_erreur"]);
?>
