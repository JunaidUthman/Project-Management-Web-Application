<?php //echo $info_projet["nom_projet"]; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Projet</title>
    <link rel="stylesheet" href="vue/css/add_project.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <div class="form-container">
            <h2>Modifier le Projet</h2>

            <form action="index.php?action=update_project&id_projet=<?php echo $info_projet["id_projet"];?>" method="POST">
                <div class="form-content">
                    <!-- Left side of the form -->
                    <div class="form-left">
                        <div class="input-group">
                            <label for="nom_projet">Nom du Projet</label>
                            <input type="text" id="nom_projet" name="nom_projet" value=<?php $nom= $info_projet["nom_projet"]; echo $nom; ?> required>
                        </div>

                        <div class="input-group">
                            <label for="description_projet">Description</label>
                            <textarea id="description_projet" name="description_projet" rows="4" required><?php echo $info_projet["description_projet"];?></textarea>
                        </div>

                        <div class="input-group">
                            <label for="date_debut_projet">Date de Début</label>
                            <input type="date" id="date_debut_projet" name="date_debut_projet" value=<?php echo $info_projet["date_debut_projet"];?> required>
                        </div>
                    </div>

                    <!-- Right side of the form -->
                    <div class="form-right">
                        <div class="input-group">
                            <label for="date_fin_projet">Date de Fin</label>
                            <input type="date" id="date_fin_projet" name="date_fin_projet" value=<?php echo $info_projet["date_fin_projet"];?> required>
                        </div>

                        <div class="input-group">
                            <label for="statut_projet">Statut</label>
                            <select id="statut_projet" name="statut_projet" >
                                <option value="pas commence">Pas commencé</option>
                                <option value="pas commence">En cours</option>
                                <option value="pas commence">Terminé</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="nom_chef">Email du Chef</label>
                            <select id="nom_chef" name="email_chef" >
                                <?php foreach($email as $e) { ?>
                                <option value=<?php echo $e["email"]; ?>><?php echo $e["email"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit">Ajouter le Projet</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
