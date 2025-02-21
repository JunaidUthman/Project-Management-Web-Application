<?php 
    class notification_transaction{

        private $conn;
        public function __construct(){
            $db_project = new database();
            $this->conn =  $db_project->connect();
        }
        public function get_notifications(){
            $id_chef=$_SESSION["id_chef"];
            // $query = $this->conn->query("SELECT text,nom_user FROM notifications NATURAL JOIN user
            //                              WHERE role_user='membre' ");

            $query1=$this->conn->query("SELECT text,nom_user FROM notifications NATURAL JOIN user WHERE id_projet IN (SELECT id_projet FROM projet WHERE id_user=$id_chef)");
            if($query1->execute()){
                $notifications=$query1->fetchAll();
                return $notifications;
            }

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