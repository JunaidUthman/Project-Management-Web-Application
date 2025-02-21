<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="http://localhost/gestion_projet/espace_admin/vue/css/display_projects.css">
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
        <div id="menue" class="menue">
            <h1>Statistiques</h1>
        </div>

        <div class="stats-section">
            <div class="stat-box">Projets finis:<?php echo $finies["projet_fini"]; ?></div>
            <div class="stat-box">Projets en cours: <?php echo $encour["projet_encour"]; ?></div>
            <div class="stat-box">Projets non commencés: <?php echo $pas_comm["projet_pas_commence"]; ?></div>
        </div>

        <div id="menue" class="menue">
            <h1>Projets</h1>
        </div>

        <!-- <div class="add-project">
            <form action="index.php?action=search_projects&id_user=<?php echo $_SESSION["id_chef"];?>" method="post">
                <input type="text" name="search_query" class="search_bar" placeholder="Rechercher un projet...">
                <button type="submit" class="search_button">&#128269;</button>
            </form>
        </div> -->




        <div class="projects-section">
            <?php foreach($project_info as $info) { ?>
                <div class="project-box">
                    <div class="project-title">
                        <h3><?php echo $info["nom_projet"]; ?></h3>
                    </div>

                    <div class="project-header">
                        <img src="http://localhost/gestion_projet/espace_admin/images/profileprotectionsnap-350x264.jpg" alt="Chef de projet" class="chef-image">
                        <span class="chef-name"><?php echo $info["nom_user"] ?></span>
                    </div>

                    <div class="project-status">Statut: <?php echo $info["statut_projet"]; ?></div>

                    <div class="project-members">
                        <img src="http://localhost/gestion_projet/espace_admin/images/images.png" alt="Membre 1" class="member-image">
                        <img src="http://localhost/gestion_projet/espace_admin/images/images.png" alt="Membre 2" class="member-image">
                        <img src="http://localhost/gestion_projet/espace_admin/images/images.png" alt="Membre 3" class="member-image">
                        <span class="member-count">3 membres</span>
                    </div>
                    <a href="index.php?action=see_more&id_projet=<?php echo $info["id_projet"]; ?>"><button class="see_more_button">See More</button></a>
                    <div class="update_buttons">
                        <a href="index.php?action=modify_project_page&id_projet=<?php echo $info["id_projet"]; ?>"><button class="modifier_button">modifier</button></a>
                        
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
