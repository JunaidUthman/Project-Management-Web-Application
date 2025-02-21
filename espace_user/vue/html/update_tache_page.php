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
            <h2>Modifier une Tache</h2>

            <form action="index.php?action=update_tache&id_tache=<?php echo $id_tache;?>" method="POST">
                <div class="form-content">

                        <div class="input-group">
                            <label for="statut_projet">Statut</label>
                            <select id="statut_projet" name="statut_tache">
                                <option value="pas commence">Pas commencé</option>
                                <option value="En cours">En cours</option>
                                <option value="Terminé">Terminé</option>
                                <option value="Bloquée">Bloquée</option>
                            </select>
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
