<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="http://localhost/gestion_projet/espace_admin/vue/css/display_membres.css">
</head>
<body>
<div class="sidebar">
        <div class="buttons">
        <a href="index.php?action=homepage"><button>Menue</button></a>
        <a href="index.php?action=membres"><button>Membres</button></a>
        </div>
        <a href="index.php?action=deconexion"><button class="logout">Déconnexion</button></a>
    </div>
    <div class="content">
        <div class="table-container">
        <!-- <a href="index.php?action=add_user_page"><button class="add-member-btn">Ajouter un Membre</button></a> -->
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($membres as $m) { // ?>
                        <tr>
                            <td><?php echo $m["id_user"]; ?></td>
                            <td><?php echo $m["nom_user"]; ?></td>
                            <td><?php echo $m["email"]; ?></td>
                            <td><?php echo $m["password"]; ?></td>
                            <td><?php echo $m["role"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
