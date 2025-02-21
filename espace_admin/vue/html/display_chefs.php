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
            <a href="index.php?action=homepage"><button>Menu</button></a>
            <a href="index.php?action=projects"><button>Projets</button></a>
            <a href="index.php?action=membres"><button>Membres</button></a>
            <a href="index.php?action=chefs"><button>Chefs</button></a>
        </div>
        <a href="index.php?action=deconexion"><button class="logout">Déconnexion</button></a>
    </div>
    <div class="content">
        <div class="table-container">
        <a href="index.php?action=add_chef_page"><button class="add-member-btn">Ajouter un Chef de Projet</button></a>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Rôle</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chefs as $m) { // ?>
                        <tr>
                            <td><?php echo $m["id_user"]; ?></td>
                            <td><?php echo $m["nom_user"]; ?></td>
                            <td><?php echo $m["email"]; ?></td>
                            <td><?php echo $m["password"]; ?></td>
                            <td><?php echo $m["role"]; ?></td>
                            <td><a href="index.php?action=update_chef_page&id=<?php echo $m["id_user"]; ?>"><button>update</button></a></td>
                            <td><a href="index.php?action=delete_chef&id=<?php echo $m["id_user"]; ?>"><button>delete</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
