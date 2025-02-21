<?php 
    class commentaire_transaction{

        private $conn;
        public function __construct(){
            $db_project = new database();
            $this->conn =  $db_project->connect();
        }

        public function get_comments($task_id){
            $stmt = $this->conn->prepare("SELECT * FROM commentaire WHERE id_tache =:id_tache ORDER BY date_cmnt ASC");
            $stmt->bindparam(":id_tache", $task_id);
            $stmt->execute();
            $comments=$stmt->fetchAll();
            return $comments;
        }

        public function add_comment($task_id, $comment) {
            $currentDate = date("Y-m-d");

            $stmt = $this->conn->prepare("INSERT INTO commentaire (id_tache, text, date_cmnt,id_user) VALUES (:id_tache,:cmnt, :date_cmnt,:id_user)");

            $stmt->bindParam(":id_tache", $task_id);
            $stmt->bindParam(":cmnt", $comment);
            $stmt->bindValue(":date_cmnt", $currentDate, PDO::PARAM_STR);
            $id_user=$_SESSION["id_chef"];
            $stmt->bindParam(":id_user", $id_user);

            if ($stmt->execute()) {
                return 1;
            }
        }
    }
?>