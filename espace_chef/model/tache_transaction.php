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

        public function add_tache($id_project, $nom_tache, $description_tache, $date_debut_tache, $date_prevue_tache, $date_fin_tache, $statut_tache, $priorite_tache, $id_membre) {
            try {
                // Utilisation d'une requête préparée
                $query = $this->conn->prepare("INSERT INTO tache 
                    (nom_tache, description_tache, date_debut_tache, date_prévue_tache, 
                     date_fin_tache, statut_tache, priorite_tache, id_user, id_projet) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $result = $query->execute([
                    $nom_tache,
                    $description_tache,
                    $date_debut_tache,
                    $date_prevue_tache,
                    $date_fin_tache,
                    $statut_tache,
                    $priorite_tache,
                    $id_membre,
                    $id_project
                ]);
                
                return $result ? 1 : 0;
            } catch (PDOException $e) {
                // Gérer l'erreur
                error_log("Erreur d'insertion de tâche : " . $e->getMessage());
                return 0;
            }
        }
        public function update_tache($id_tache,$nom_tache,$description_tache,$date_debut_tache,$date_prevue_tache,$date_fin_tache,$statut_tache,$priorite_tache,$id_membre){
            $query = "UPDATE tache 
            SET 
                nom_tache = '$nom_tache',
                description_tache = '$description_tache',
                date_debut_tache = '$date_debut_tache',
                date_prévue_tache = '$date_prevue_tache',
                date_fin_tache = '$date_fin_tache',
                statut_tache = '$statut_tache',
                priorite_tache = '$priorite_tache',
                id_user = $id_membre 
            WHERE id_tache = $id_tache"; 

            if($this->conn->query($query)){
                return 1;
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

    }
?>