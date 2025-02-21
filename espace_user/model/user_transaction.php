<?php
include "user.php";
    class user_transaction{
        private $conn;
        public function __construct(){
            $db = new database();
            $this->conn = $db->connect();
        }

        public function login_user(user $u){
            $query = $this->conn->prepare("SELECT * FROM user WHERE email=:email AND role='membre'");
            $query ->bindvalue(":email",$u->getemail());
            if($row=$query->execute()){
                if($row=$query->fetch()){
                    if(password_verify($u->getpassword(),$row["password"])){
                        $id=$row["id_user"];
                        return $id;
                    }  
                    else{
                        echo "info are not correct";
                    }
                }
            }
            else{
                echo "somthing went wrong , the query would not get executed";
            }
        }

        public function display_all() {
            $membres = null;
            $query = $this->conn->query("SELECT * FROM user WHERE role='membre'");

            if ($query) {
                $membres = $query->fetchAll(PDO::FETCH_ASSOC);
                return $membres;
            }
        }

        public function add_user($name , $email , $password){

            $check = $this->conn->prepare("SELECT * FROM user WHERE email=:email AND role='membre'");
            $check->bindParam("email",$email);
            if($check->execute()){
                if($check->fetch()){
                    return 1;
                }
                else{
                    $query = $this->conn->prepare("INSERT INTO user(nom_user,email,password,role) VALUES(:nom_user,:email,:password,'membre')");
                    $query->bindparam("nom_user",$name);
                    $query->bindparam("email",$email);
                    $hashed_password=password_hash($password, PASSWORD_BCRYPT);
                    $query->bindparam("password",$hashed_password);
                    if($query->execute()){
                        return 0;
                    }
                    else{
                        return -1;
                    }
                }
            }
            else{
                return -1;
            }
           
        }

        public function select_user($id){
            $select = $this->conn->prepare("SELECT * FROM user WHERE id_user=:id ");
            $select->bindParam("id",$id);
            if($select->execute()){
                $infos=$select->fetch(PDO::FETCH_ASSOC);
                return $infos;
            }
        }

        public function add_chef($name , $email , $password){
            $check = $this->conn->prepare("SELECT * FROM user WHERE email=:email AND role='chef'");
            $check->bindParam("email",$email);
            if($check->execute()){
                if($check->fetch()){
                    return 1;
                }
                else{
                    $query = $this->conn->prepare("INSERT INTO user(nom_user,email,password,role) VALUES(:nom_user,:email,:password,'chef')");
                    $query->bindparam("nom_user",$name);
                    $query->bindparam("email",$email);
                    $hashed_password=password_hash($password, PASSWORD_BCRYPT);
                    $query->bindparam("password",$hashed_password);
                    if($query->execute()){
                        return 0;
                    }
                    else{
                        return -1;
                    }
                }
            }
            else{
                return -1;
            }
        }

        public function update_membre($id,$name,$email,$password){
            $check = $this->conn->prepare("SELECT * FROM user WHERE email=:email AND role='membre'AND id_user!=:id");
            $check->bindParam("email",$email);
            $check->bindParam("id",$id);
            if($check->execute()){
                if($check->fetch()){
                    return -1;
                }
                else{
                    $insert = $this->conn->prepare("UPDATE user SET nom_user=:nom_user,email=:email,password=:password WHERE id_user=:id");
                    $insert->bindparam("nom_user",$name);
                    $insert->bindparam("email",$email);
                    $hashed_password=password_hash($password, PASSWORD_BCRYPT);
                    $insert->bindparam("password",$hashed_password);
                    $insert->bindparam("id",$id);

                    if($insert->execute()){
                        return 1;
                    }
                    return 0;
                }
            }
            return 0;
        
        }

        public function delete_membre($id){
            $update_cmnt=$this->conn->query("UPDATE commentaire SET id_user=NULL WHERE id_user=$id");
            if($update_cmnt->execute()){
            $update_tache=$this->conn->query("UPDATE tache SET id_user=NULL WHERE id_user=$id");
            if($update_tache->execute()){
                $delete=$check = $this->conn->prepare("DELETE FROM user WHERE id_user=:id");
                $delete->bindParam("id",$id);
                if($delete->execute()){
                    return 1;
                }           
                return 0;
            }
            }
            
        }

        public function delete_chef($id){
            $update_cmnt=$this->conn->query("UPDATE commentaire SET id_user=NULL WHERE id_user=$id");
            if($update_cmnt->execute()){
                $update_tache=$this->conn->query("UPDATE tache SET id_user=NULL WHERE id_user=$id");
                if($update_tache->execute()){
                    $update_projet=$this->conn->query("UPDATE projet SET id_user=NULL WHERE id_user=$id");
                    if($update_projet->execute()){
                        $delete=$check = $this->conn->prepare("DELETE FROM user WHERE id_user=:id");
                        $delete->bindParam("id",$id);
                        if($delete->execute()){
                        return 1;
                    }
                    return 0;
                    }
                }
            }
        }

        public function display_all_chefs(){
            $chefs = null;
            $query = $this->conn->query("SELECT * FROM user WHERE role='chef'");

            if ($query) {
                $chefs = $query->fetchAll(PDO::FETCH_ASSOC);
                return $chefs;
            }
        }

        public function update_chef($id , $name ,$email,$password){
            $check = $this->conn->prepare("SELECT * FROM user WHERE email=:email AND role='chef' AND id_user!=:id");
            $check->bindParam("email",$email);
            $check->bindParam("id",$id);
            if($check->execute()){
                if($check->fetch()){
                    return -1;
                }
                else{
                    $insert = $this->conn->prepare("UPDATE user SET nom_user=:nom_user,email=:email,password=:password WHERE id_user=:id");
                    $insert->bindparam("nom_user",$name);
                    $insert->bindparam("email",$email);
                    $hashed_password=password_hash($password, PASSWORD_BCRYPT);
                    $insert->bindparam("password",$hashed_password);
                    $insert->bindparam("id",$id);

                    if($insert->execute()){
                        return 1;
                    }
                    return 0;
                }
            }
            return 0;
        }

        public function get_emails(){
            $chef = null;
            $query = $this->conn->prepare("SELECT * FROM user WHERE role='chef'");

            if ($query->execute()) {
                $chef = $query->fetchAll();
                return $chef;
            }
        }

        public function user_info_from_projet($id_project){
            $query= $this->conn->query("SELECT * from user WHERE id_user=(SELECT id_user from projet WHERE id_projet=$id_project)");
            if($query->execute()){
                $user_info = $query->fetch();
                return $user_info;
            }
        }

        public function get_membres_from_projecet($id_project){
            $query = $this->conn->query("SELECT * FROM user WHERE role='membre' AND id_user IN (SELECT id_user FROM tache WHERE id_projet=$id_project)");
            if($query->execute()){
                $membres=$query->fetchAll();
                return $membres;
            }
        }

        public function add_memebres_toproject(){
            $query=$this->conn->query("SELECT * FROM user WHERE role='membre'");
            if($query->execute()){
                $membres=$query->fetchAll(PDO::FETCH_ASSOC);
                return $membres;
            }
        }

        public function add_notification($id_sender,$id_projet){
            $infos=$this->select_user($id_sender);
            $nom=$infos["nom_user"];
            $query=$this->conn->query("INSERT INTO notifications(text,id_user,role_user) VALUES('le chef_projet $nom')");
        }

    }
?>