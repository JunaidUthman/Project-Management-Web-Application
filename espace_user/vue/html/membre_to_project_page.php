
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/css/membre_to_page.css">
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

            <form action="index.php?action=add_membre_to_tache&id_project=<?php echo $id_project; ?>" method="POST">
                <div>
                    <h2>Tache :</h2>
                    <select name="tache" id="">
                        <?php foreach($tache as $t){ ?>
                            <option value="<?php echo $t["id_tache"]; ?>"><?php echo $t["nom_tache"]?></option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <h2>Membre :</h2>
                    <select name="membre" id="">
                        <?php foreach($add_membres as $m){ ?>
                            <option value="<?php echo $m["id_user"]; ?>"><?php echo $m["nom_user"]; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit">Affecter</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    unset($_SESSION["add_user_erreur"]);
?>
