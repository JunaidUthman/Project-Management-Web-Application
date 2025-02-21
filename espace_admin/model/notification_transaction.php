<?php 
    class notification_transaction{

        private $conn;
        public function __construct(){
            $db_project = new database();
            $this->conn =  $db_project->connect();
        }
        public function get_notifications(){
            $query = $this->conn->query("SELECT text,nom_user FROM notifications NATURAL JOIN user
                                         WHERE role_user='chef' ");
            if($query->execute()){
                $notifications=$query->fetchAll();
                return $notifications;
            }

        }

        public function ProjectIsDeleted($id_project){
            $projet=new project_transaction;
            
            $id_admin=$_SESSION["id_admin"];
            $query=$this->conn->query("INSERT INTO notifications(text,id_user,role_user,id_projet) VALUES('ADMIN a supprimer le projet $id_project',$id_admin,'admin',$id_project)");
            if($query->execute()){
                return 1;
            }
        }
    }
?>