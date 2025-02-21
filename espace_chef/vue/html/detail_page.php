<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link rel="stylesheet" href="vue/css/detail_page.css">
    <link rel="stylesheet" href="vue/css/comments_modal.css">
</head>
<body>
    <div class="page-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="index.php?action=projects"><button  class="add_membre">retourner</button></a>
    <h2>Membres du Projet</h2>
    <a href="index.php?action=membre_to_project&id_project=<?php echo $id_project; ?>" 
       onclick="return checkTaches();">
        <button class="add_membre">+ add membre</button>
    </a>
    <div class="members-container">
        <?php foreach ($membres as $m) { ?>
        <div class="member-box">
            <img src="http://localhost/gestion_projet/espace_admin/images/images.png" alt="Chef de projet" class="chef-image">
            <div class="member-info">
                <h4><?php echo $m["nom_user"]; ?></h4>
                <p><?php echo $m["email"]; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- JavaScript pour vérifier les tâches -->
<script>
    function checkTaches() {
        <?php if (empty($tache_nulle)) { ?>
            alert("Il n'y a aucune tâche sans membre.");
            return false; // Empêche la redirection
        <?php } ?>
        return true; // Permet la redirection si la condition est fausse
    }
</script>


        <!-- Main Content -->
        <div class="main-content">
            <div class="project-info">
                <h1>Nom du Projet: <?php echo $info_projet["nom_projet"]; ?></h1>
                <p><strong>Description:</strong> <?php echo $info_projet["description_projet"]; ?></p>
                <p><strong>Date de début:</strong><?php echo $info_projet["date_debut_projet"]; ?></p>
                <p><strong>Date de fin:</strong> <?php echo $info_projet["date_fin_projet"]; ?></p>
                <p><strong>Statut:</strong><?php echo $info_projet["statut_projet"]; ?></p>
                <p><strong>Chef du Projet:</strong> <?php echo $info_chef["email"]; ?></p>
            </div>

            <!-- Tableau des tâches -->
            <div class="tasks-table">
                <h2>Liste des Tâches</h2>
                <a href="index.php?action=add_tache_page&id_project=<?php echo $id_project; ?>"><button class="add_mem">+ ajouter tache</button></a>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Date Début</th>
                            <th>Date Prévue</th>
                            <th>Date Fin</th>
                            <th>Statut</th>
                            <th>Priorité</th>
                            <th>Commentaire</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($taches as $t) {?>
                            <tr>
                                <td><?php echo $t["nom_tache"]; ?></td>
                                <td><?php echo $t["description_tache"]; ?></td>
                                <td><?php echo $t["date_debut_tache"]; ?></td>
                                <td><?php echo $t["date_prévue_tache"]; ?></td>
                                <td><?php echo $t["date_fin_tache"]; ?></td>
                                <td><?php echo $t["statut_tache"]; ?></td>
                                <td><?php echo $t["priorite_tache"]; ?></td>
                                <td>
                                    <button type="button" class="comment-btn" data-task-id="<?php echo $t['id_tache']; ?>">Commentaire</button>
                                </td>
                                <td><a href="index.php?action=update_tache_page&id_tache=<?php echo $t["id_tache"]; ?>&id_project=<?php echo $id_project; ?>"><button  class="comment-btn">modifier</button></a></td>
                                <td><a href="index.php?action=delete_tache&id_tache=<?php echo $t["id_tache"]; ?>&id_project=<?php echo $id_project; ?>"><button  class="comment-btn">supprimer</button></a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="commentModal" class="modal">
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
