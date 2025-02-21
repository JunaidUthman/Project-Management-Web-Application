<?php 
    class notification_transaction{

        private $conn;
        public function __construct(){
            $db_project = new database();
            $this->conn =  $db_project->connect();
        }
        public function get_notifications() {
            $notification = [];
            $id_user = $_SESSION["id_membre"];
        
            // Récupérer les IDs des projets associés à l'utilisateur
            $get_id_project = $this->conn->prepare("SELECT id_projet FROM tache WHERE id_user = :id_user");
            $get_id_project->execute(['id_user' => $id_user]);
            $id_projects = $get_id_project->fetchAll(PDO::FETCH_COLUMN);
        
            if (!empty($id_projects)) {
                // Récupérer toutes les notifications pour ces projets
                $placeholders = implode(',', array_fill(0, count($id_projects), '?'));
                $query = $this->conn->prepare("
                    SELECT n.text, u.nom_user
                    FROM notifications n
                    NATURAL JOIN user u
                    WHERE n.id_projet IN ($placeholders) AND n.id_user !=$id_user
                ");
                $query->execute($id_projects);
                $notification = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        
            return $notification;
        }
        

        public function add_notification1($id_sender,$id_projet){
            $projet=new project_transaction;
            $info_projet=$projet->projet_info($id_projet);
            $nom_projet=$info_projet["nom_projet"];
            
            $query = $this->conn->prepare(
                "INSERT INTO notifications (text, id_user, role_user) 
                 VALUES (:text, :id_user, :role_user)"
            );
            $text = "a modifier le projet <strong>$nom_projet</strong>";
            $role_user = "chef";
            
            $query->bindParam(":text", $text);
            $query->bindParam(":id_user", $id_sender);
            $query->bindParam(":role_user", $role_user);
            
            if ($query->execute()) {
                return 1;
            }
            return 0;
            
        }
    }
?>