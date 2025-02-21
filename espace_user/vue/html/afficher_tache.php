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
            <a href="index.php?action=display_taches&id_membre=<?php $id=$_SESSION["id_membre"]; echo $id; ?>"><button>Taches</button></a>
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
                        <th>Description</th>
                        <th>Date_Debut</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Modifier</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($taches as $t) { // ?>
                        <tr>
                            <td><?php echo $t["id_tache"]; ?></td>
                            <td><?php echo $t["nom_tache"]; ?></td>
                            <td><?php echo $t["description_tache"]; ?></td>
                            <td><?php echo $t["date_debut_tache"]; ?></td>
                            <td><?php echo $t["date_fin_tache"]; ?></td>
                            <td><?php echo $t["statut_tache"]; ?></td>
                            <td><?php echo $t["priorite_tache"]; ?></td>
                            <td><a href="index.php?action=update_tache_page&id_tache=<?php echo $t["id_tache"];?>"><button>modifier</button></a></td>
                            <td>
                                <button type="button" class="comment-btn" data-task-id="<?php echo $t['id_tache']; ?>">Commentaire</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
   <!-- Modal -->
   <div id="commentModal" class="modal" style="display: none; 
   #commentModal {
    display: none; /* Par défaut, la modal est cachée */
    position: fixed;
    z-index: 1000; /* Place la modal au-dessus des autres éléments */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6); /* Fond semi-transparent pour l'effet pop-up */
    justify-content: center; /* Centrer horizontalement */
    align-items: center; /* Centrer verticalement */
    display: flex; /* Flexbox pour centrer */
    animation: fadeInModal 0.5s ease-out; /* Animation pour l'apparition */
}

#commentModal .modal-content {
    background-color: #ffffff; /* Fond blanc pour la modal */
    padding: 20px;
    border: 1px solid #8e44ad; /* Bordure violette pour correspondre au thème */
    width: 50%; /* Largeur de la modal */
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Ombre douce pour l'effet pop-up */
    max-width: 600px; /* Largeur maximale pour éviter que la modal soit trop grande */
    animation: fadeInModal 0.5s ease-out; /* Animation d'apparition */
}

#commentModal h2 {
    font-size: 24px;
    color: #8e44ad; /* Violet pour le titre */
    margin-bottom: 15px;
}

#commentModal .comments-section {
    background-color: #f7f7f7; /* Fond très clair pour la section des commentaires */
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    max-height: 300px;
    overflow-y: auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #333; /* Texte en gris foncé */
}

#commentModal textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 14px;
    margin-bottom: 15px;
    resize: vertical;
    background-color: #f3f3f3; /* Couleur de fond clair pour la zone de texte */
    color: #333; /* Texte gris pour la zone de texte */
    transition: background-color 0.3s;
}

#commentModal textarea:focus {
    background-color: #ffffff; /* Change la couleur de fond au focus */
    border-color: #8e44ad; /* Bordure violette au focus */
    outline: none;
}

#commentModal button {
    background-color: #8e44ad; /* Bouton violet */
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

#commentModal button:hover {
    background-color: #7b3f96; /* Un ton plus foncé au survol du bouton */
}

#commentModal .close {
    color: #8e44ad; /* Couleur violette pour la croix de fermeture */
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

#commentModal .close:hover,
#commentModal .close:focus {
    color: #5e3370; /* Un violet plus foncé au survol */
    text-decoration: none;
}

/* Animation pour l'apparition de la modal */
@keyframes fadeInModal {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

   ">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Commentaires</h2>
            <div class="comments-section" id="comments-section">
                <p>Chargement des commentaires...</p>
            </div>
            <form id="commentForm">
                <input type="hidden" name="task_id" id="task_id">
                <textarea name="comment" placeholder="Écrivez votre commentaire ici..." required></textarea>
                <button type="submit">Soumettre</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById("commentModal");
        const closeModal = document.querySelector(".close");

        // Ouvrir la modal
        document.querySelectorAll(".comment-btn").forEach(button => {
            button.addEventListener("click", () => {
                const taskId = button.dataset.taskId;
                document.getElementById("task_id").value = taskId;
                modal.style.display = "block";

                // Charger les commentaires via AJAX
                fetch(`index.php?action=display_comments&task_id=${taskId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("comments-section").innerHTML = data;
                    });
            });
        });

        // Fermer la modal
        closeModal.addEventListener("click", () => modal.style.display = "none");
        window.addEventListener("click", event => {
            if (event.target === modal) modal.style.display = "none";
        });

        // Soumettre un commentaire
        document.getElementById("commentForm").addEventListener("submit", event => {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch("index.php?action=insert_comment", {
                method: "POST",
                body: formData
            }).then(response => response.text())
            .then(data => {
                document.getElementById("comments-section").innerHTML = data;
            });
        });
    </script>
</body>
</html>
