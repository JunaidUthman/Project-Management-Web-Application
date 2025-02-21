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
            <a href="index.php?action=homepage"><button>Menu</button></a>
            <a href="index.php?action=projects"><button>Projets</button></a>
            <a href="index.php?action=membres"><button>Membres</button></a>
            <a href="index.php?action=chefs"><button>Chefs</button></a>
        </div>
        <a href="index.php?action=deconexion"><button class="logout">Déconnexion</button></a>
    </div>

    <div class="grid-container">
        <div class="grid-box">
            <h2>Statut des tâches</h2>
            <canvas id="taskStatusChart"></canvas>
        </div>
        <div class="grid-box">
            <h2>Membres par projet</h2>
            <canvas id="membersPerProjectChart"></canvas>
        </div>
        <div class="grid-box">
            <h2>Tâches par projet</h2>
            <canvas id="tasksPerProjectChart"></canvas>
        </div>
        <div class="grid-box">
            <h2>Statut des projets</h2>
            <canvas id="projectStatusChart"></canvas>
        </div>
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
    // Appeler la fonction pour obtenir la valeur
    $pas_comm_value = isset($pas_comm['projet_pas_commence']) ? (int)$pas_comm['projet_pas_commence'] : 0;
?>
    <script>
        // Chart.js setup
        const taskStatusCtx = document.getElementById('taskStatusChart').getContext('2d');
        const membersPerProjectCtx = document.getElementById('membersPerProjectChart').getContext('2d');
        const tasksPerProjectCtx = document.getElementById('tasksPerProjectChart').getContext('2d');
        const projectStatusCtx = document.getElementById('projectStatusChart').getContext('2d');

        new Chart(taskStatusCtx, {
            type: 'line',
            data: {
                labels: ['Complet', 'En cours', 'Pas commencé'],
                datasets: [{
                    label: 'Tâches',
                    data: [30, 30, 20],
                    backgroundColor: 'rgba(33, 150, 243, 0.5)',
                    borderColor: '#2196f3',
                    fill: true
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(membersPerProjectCtx, {
            type: 'bar',
            data: {
                labels: ['Projet 1', 'Projet 2', 'Projet 3'],
                datasets: [{
                    label: 'Membres',
                    data: [5, 10, 8],
                    backgroundColor: ['#673ab7', '#3f51b5', '#2196f3']
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(tasksPerProjectCtx, {
            type: 'radar',
            data: {
                labels: ['Projet 1', 'Projet 2', 'Projet 3'],
                datasets: [{
                    label: 'Tâches',
                    data: [20, 15, 25],
                    backgroundColor: 'rgba(255, 193, 7, 0.5)',
                    borderColor: '#ffc107'
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(projectStatusCtx, {
            type: 'pie',
            data: {
                labels: ['Finis', 'En cours', 'Pas commencés', 'Annulés'],
                datasets: [{
                    data: [10, 20, 30, 5],
                    backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#f44336']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
