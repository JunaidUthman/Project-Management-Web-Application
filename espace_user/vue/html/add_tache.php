<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Projet</title>
    <link rel="stylesheet" href="vue/css/add_tache.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <div class="form-container">
            <h2>Ajout une Tache</h2>

            <form action="index.php?action=ajouter_tache&id_project=<?php echo $id_project; ?>" method="POST">
                <div class="form-content">
                    <!-- Left side of the form -->
                    <div class="form-left">
                        <div class="input-group">
                            <label for="nom_projet">Nom du Projet</label>
                            <input type="text" id="nom_projet" name="nom_tache" required>
                        </div>

                        <div class="input-group">
                            <label for="description_projet">Description</label>
                            <textarea id="description_projet" name="description_tache" rows="5" required></textarea>
                        </div>

                        <div class="input-group">
                            <label for="date_debut_projet">Date de Début</label>
                            <input type="date" id="date_debut_projet" name="date_debut_tache" required>
                        </div>

                        <div class="input-group">
                            <label for="date_fin_projet">Date Prévue</label>
                            <input type="date" id="date_fin_projet" name="date_prévue_tache" required>
                        </div>
                    </div>

                    <!-- Right side of the form -->
                    <div class="form-right">

                        <div class="input-group">
                            <label for="date_fin_projet">Date de Fin</label>
                            <input type="date" id="date_fin_projet" name="date_fin_tache" required>
                        </div>

                        <div class="input-group">
                            <label for="statut_projet">Statut</label>
                            <select id="statut_projet" name="statut_tache">
                                <option value="pas commence">Pas commencé</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="statut_projet">Priorité</label>
                            <select id="statut_projet" name="priorite_tache">
                                <option value="Haute">Haute</option>
                                <option value="Moyenne">Moyenne</option>
                                <option value="Basse">Basse</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="nom_chef">Email du Membre</label>
                            <select id="nom_chef" name="id_membre">
                                <?php foreach($add_membres as $e) { ?>
                                <option value=<?php echo $e["id_user"]; ?>><?php echo $e["email"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit">Ajouter une Tache</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
