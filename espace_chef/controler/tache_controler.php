<?php
    include "model/commentaire_transaction.php";


    class tache_controler{
        // public function display_comments($task_id) {
        //     if ($_SESSION["loged_in"] == "admin") {
        //         $commentModel = new commentaire_transaction;
        //         $comments = $commentModel->get_comments($task_id);
        //         include "vue/html/comments_modal.php";
        //     } else {
        //         header("location:index.php");
        //     }
        // }

        public function display_comments($task_id) {
            if($_SESSION["loged_in"] == "admin"){
            $commentModel = new commentaire_transaction;
            $comments = $commentModel->get_comments($task_id);
            $user=new user_transaction;
            
            //
            foreach ($comments as $comment) {
                $id_user=$comment["id_user"];
                $user_info=$user->select_user($id_user);
                echo "  <div class='comment'>
                            <p>" . htmlspecialchars($user_info["nom_user"]) . " : " . htmlspecialchars($comment['text']) . "</p>
                            <small>" . htmlspecialchars($comment['date_cmnt']) . "</small>
                        </div>";
            }
            }
            else{
                header("location:index.php");
            }
        }
        

        public function insert_comment() {
            if ($_SESSION["loged_in"] == "admin") {
                $task_id = $_POST['task_id'];
                $comment = $_POST['comment'];
                $commentModel = new commentaire_transaction();
                $result = $commentModel->add_comment($task_id, $comment);
                
                if ($result) {
                    header("location:index.php?action=display_comments&task_id=$task_id");
                } else {
                    echo "Erreur lors de l'insertion du commentaire.";
                }
            } else {
                header("location:index.php");
            }
        }

        public function add_membre_to_tache($id_project){
            if($_SESSION["loged_in"] == "admin") {
                $id_user=$_POST["membre"];
                $id_tache=$_POST["tache"];
                $tache = new tache_transaction;
                $tache-> add_membre_to_tache($id_project,$id_user,$id_tache);
                header("location:index.php?action=see_more&id_projet=$id_project");
            } 
            else{
                header("location:index.php");
            }
        }

        public function add_tache_page($id_project){
            if($_SESSION["loged_in"] == "admin") {
                $user=new user_transaction;
                $add_membres=$user->add_memebres_toproject();
                include_once "vue/html/add_tache.php";
            } 
            else{
                header("location:index.php");
            }
        }

        public function ajouter_tache($id_project){
            if($_SESSION["loged_in"] == "admin") {
                $nom_tache=$_POST["nom_tache"];
                $description_tache=$_POST["description_tache"];
                $date_debut_tache=$_POST["date_debut_tache"];
                $date_prevue_tache=$_POST["date_prévue_tache"];
                $date_fin_tache=$_POST["date_fin_tache"];
                $statut_tache=$_POST["statut_tache"];
                $priorite_tache=$_POST["priorite_tache"];
                $id_membre=$_POST["id_membre"];
                $tache=new tache_transaction;
                $result=$tache->add_tache($id_project,$nom_tache,$description_tache,$date_debut_tache,$date_prevue_tache,$date_fin_tache,$statut_tache,$priorite_tache,$id_membre);
                if($result ==1){
                    header("location:index.php?action=see_more&id_projet=$id_project");
                    exit;
                }
                else{
                    echo 'il ya un probleme dans transaction';
                }

            } 
            else{
                header("location:index.php");
            }
        }

        public function update_tache_page($id_tache,$id_project){
            if($_SESSION["loged_in"] == "admin") {
                $tache=new tache_transaction;
                $user=new user_transaction;
                $add_membres=$user->add_memebres_toproject();
                $info_tache=$tache->info_tache($id_tache);
                include "vue/html/update_tache_page.php";
            } 
            else{
                header("location:index.php");
            }
        }

        public function update_tache($id_tache,$id_project){
            if($_SESSION["loged_in"] == "admin") {
                $tache=new tache_transaction;
                $nom_tache=$_POST["nom_tache"];
                $description_tache=$_POST["description_tache"];
                $date_debut_tache=$_POST["date_debut_tache"];
                $date_prevue_tache=$_POST["date_prévue_tache"];
                $date_fin_tache=$_POST["date_fin_tache"];
                $statut_tache=$_POST["statut_tache"];
                $priorite_tache=$_POST["priorite_tache"];
                $id_membre=$_POST["id_membre"];
                $tache->update_tache($id_tache,$nom_tache,$description_tache,$date_debut_tache,$date_prevue_tache,$date_fin_tache,$statut_tache,$priorite_tache,$id_membre);
                header("location:index.php?action=see_more&id_projet=$id_project");
            } 
            else{
                header("location:index.php");
            }
        }

        public function delete_tache($id_tache,$id_project){
            if($_SESSION["loged_in"] == "admin") {
                $tache=new tache_transaction;
                $tache->delete_tach($id_tache);
                header("location:index.php?action=see_more&id_projet=$id_project");
            } 
            else{
                header("location:index.php");
            }
        }
    }
?>