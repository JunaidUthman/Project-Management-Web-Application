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
    }
?>