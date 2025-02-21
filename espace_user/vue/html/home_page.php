<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="http://localhost/gestion_projet/espace_admin/vue/css/homepage.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="buttons">
            <a href="index.php?action=homepage"><button>Menue</button></a>
            <a href="index.php?action=display_taches&id_membre=<?php $id=$_SESSION["id_membre"]; echo $id; ?>"><button>Taches</button></a>
        </div>
        <a href="index.php?action=deconexion"><button class="logout">Déconnexion</button></a>
    </div>

    
    <div class="notification-sidebar">
        <h2>Notifications</h2>
        <?php  foreach($notifications as $n) { ?>
        <div class="notification">
            <img src="http://localhost/gestion_projet/espace_admin/images/images.png" alt="Profile">
            <p><strong><?php echo $n["nom_user"]; ?></strong> : <?php echo $n["text"]; ?></p>
        </div>
        <?php }?>
    </div>
    <?php
?>
    
</body>
</html>
