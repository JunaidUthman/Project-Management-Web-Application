<?php

    class tache_transaction{
        private $conn;
        public function __construct(){
            $db = new database();
            $this->conn = $db->connect();
        }

        public function tache_null($id_project){
    
            $query=$this->conn->query("SELECT * FROM tache WHERE id_user IS NULL");
            if($query->execute()){
                $taches=$query->fetchALL();
                return $taches;
            }
        }

        public function add_membre_to_tache($id_project,$id_user,$id_tache){
            $query=$this->conn->query("UPDATE tache SET id_user=$id_user WHERE id_tache=$id_tache;");
            if($query->execute()){
                return 1;
            }
        }

        public function get_taches_null($id_project){
            $query=$this->conn->query("SELECT * FROM tache WHERE id_user IS NULL");
            if($query->execute()){
                $tache_null=$query->fetchAll();
                return $tache_null;
            }
        }

        public function add_tache($id_project,$nom_tache,$description_tache,$date_debut_tache,$date_prevue_tache,$date_fin_tache,$statut_tache,$priorite_tache,$id_membre){

            $query = $this->conn->query("INSERT INTO tache 
            (nom_tache, description_tache, date_debut_tache, date_prévue_tache, date_fin_tache, statut_tache, priorite_tache, id_user, id_projet) 
            VALUES ('$nom_tache','$description_tache', '$date_debut_tache', '$date_prevue_tache', '$date_fin_tache', '$statut_tache', '$priorite_tache', $id_membre, $id_project)");
            if($query->execute()){
                return 1;
            }

        }
        public function update_tache($id_membre,$id_tache,$statut_tache){
            $query = "UPDATE tache SET statut_tache = '$statut_tache' WHERE id_tache = $id_tache"; 

            if($this->conn->query($query)){
                ///////////notification///////////
                $get_id_projet = $this->conn->query("SELECT t.id_projet,p.nom_projet FROM tache t JOIN projet p ON t.id_projet=p.id_projet WHERE t.id_tache=$id_tache");
                if($get_id_projet->execute()){
                    $row=$get_id_projet->fetch();
                    if($row){
                        $id_projet=$row["id_projet"];
                        $nom_projet=$row["nom_projet"];
                        $notif=$this->conn->prepare("INSERT INTO notifications(text,id_user,role_user,id_projet,id_tache) VALUES('le membre $id_membre a modifier le statut du tache $id_tache dans le projet : $nom_projet',:id_membre,'membre',$id_projet,:id_tache)");
                        $notif->bindParam(":id_membre",$id_membre);
                        $notif->bindParam(":id_tache",$id_tache);
                        if($notif->execute()){
                            return 1;
                        }
                    
                    }
                    else{
                        echo "tableau row est vide";
                        exit;
                    }
                    

                }
                
            }
        }

        public function info_tache($id_tache){
            $query=$this->conn->query("SELECT * FROM tache WHERE id_tache=$id_tache");
            if($query->execute()){
                $info = $query->fetch();
                return $info;
            }
        }

        public function delete_tach($id_tache){
            $query=$this->conn->query("DELETE FROM tache WHERE id_tache=$id_tache");
            if($query->execute()){
                return 1;
            }
        }

        public function afficher_taches($id_membre){
            $query=$this->conn->query("SELECT * from tache WHERE id_user=$id_membre");
            if($query->execute()){
                $taches=$query->fetchAll();
                return $taches;
            }
        }

    }
?>