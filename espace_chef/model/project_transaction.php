<?php
    class project_transaction{

        private $conn;
        public function __construct(){
            $db_project = new database();
            $this->conn =  $db_project->connect();
        }
        public function project_info(){
            $id_chef=$_SESSION["id_chef"];
            $query = $this->conn->prepare("SELECT id_projet,nom_projet,description_projet,
                                                date_debut_projet,date_fin_projet,statut_projet,
                                                id_user,nom_user FROM projet NATURAL JOIN user WHERE projet.id_user=user.id_user AND id_user=$id_chef");
            if($query->execute()){
                $project_infos=$query->fetchAll(PDO::FETCH_ASSOC);
                return $project_infos;
            }
        }

        public function add_project($nom_projet,$description,$date_debut,$date_fin,$statut,$email_chef){
            $get_id=$this->conn->prepare("SELECT id_user from user WHERE email=:email AND role='chef'");
            $get_id->bindParam("email",$email_chef);
            if($get_id->execute()){
                $info=$get_id->fetch();
                $id_user=$info["id_user"];

                $query = $this->conn->prepare("INSERT INTO projet(nom_projet,description_projet,date_debut_projet,date_fin_projet,statut_projet,id_user)
                                                       values(:nom_projet,:description,:date_debut,:dates_fin,:statut,:id_user)");
                $query->bindParam("nom_projet",$nom_projet);
                $query->bindParam("description",$description);
                $query->bindParam(":date_debut",$date_debut);
                $query->bindParam(":dates_fin",$date_fin);
                $query->bindParam(":statut",$statut);
                $query->bindParam("id_user",$id_user);

                if($query->execute()){
                    return 1;
                }
                return 0;
            }
            return 0;
        }

        public function get_chefs(){
            $query = $this->conn->prepare("SELECT email from user WHERE role='chef'");
            if($query->execute()){
                $email=$query->fetchAll();
                return $email;
            }
        }

        public function projet_info($id_project){
            $query = $this->conn->prepare("SELECT * from projet WHERE id_projet=:id_projet");
            $query->bindparam("id_projet",$id_project);
            if($query->execute()){
                $info_projet=$query->fetch();
                return $info_projet;
            }
        }

        public function update_project($id_project,$nom_projet,$description,$date_debut,$date_fin,$statut){
            
                $insert = $this->conn->prepare("UPDATE projet SET nom_projet=:nom_projet,description_projet=:description_projet,date_debut_projet=:date_debut_projet,date_fin_projet=:date_fin_projet,statut_projet=:statut_projet WHERE id_projet=:id");
                    $insert->bindparam(":nom_projet",$nom_projet);
                    $insert->bindparam(":description_projet",$description);
                    $insert->bindparam(":date_debut_projet",$date_debut);
                    $insert->bindparam(":date_fin_projet",$date_fin);
                    $insert->bindparam(":statut_projet",$statut);
                    $insert->bindparam(":id",$id_project);

                    if($insert->execute()){
                        
                        return 1;
                    }
                    return 0;
                
        }

        public function delete_project($id_project){
                $delete_query=$this->conn->query("DELETE FROM projet WHERE id_projet=$id_project");
                if($delete_query->execute()){
                    return 1;
                }
        }

        public function taches_projet($id_project){
            $query=$this->conn->query("SELECT * FROM tache WHERE id_projet=$id_project");
            if($query->execute()){
                $taches=$query->fetchAll();
                return $taches;
            }
        }

        public function get_projects_searched($search_query,$id_chef){
            $sql = $this->conn->query("SELECT id_projet, nom_projet, description_projet,
       date_debut_projet, date_fin_projet, statut_projet,
       id_user, nom_user
FROM projet 
NATURAL JOIN user
WHERE projet.id_user = user.id_user 
  AND id_user = $id_chef 
  AND nom_projet LIKE '%$search_query%';");
            $sql->execute();
            $project_info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $project_info;
        }

        public function stat_projet_pas_comm(){
            $id_chef=$_SESSION["id_chef"];
            $projet_pas_comm=$this->conn->query("SELECT count(id_projet) as projet_pas_commence FROM projet WHERE statut_projet='Pas commencé' AND id_user=$id_chef");

            if($projet_pas_comm->execute()){
                return $projet_pas_comm->fetch();
            }
        }
        public function stat_projet_encour(){
            $id_chef=$_SESSION["id_chef"];
            $projet_encour=$this->conn->query("SELECT count(id_projet) as projet_encour FROM projet WHERE statut_projet='En cours' AND id_user=$id_chef");            
            if($projet_encour->execute()){
                return $projet_encour->fetch();
            }
        }
        public function stat_projet_fini(){
            $id_chef=$_SESSION["id_chef"];
            $projet_finie=$this->conn->query("SELECT count(id_projet) as projet_fini FROM projet WHERE statut_projet='Terminé' AND id_user=$id_chef");
            if($projet_finie->execute()){
                return $projet_finie->fetch();
            }
        }
        

            
    }
?>