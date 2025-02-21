<?php
include "model/project_transaction.php";
    class project_controler{
        public function display_projects(){
            if($_SESSION["loged_in"]=="admin"){
            
            $project=new project_transaction;
            $project_info = $project->project_info();
            $pas_comm=$project->stat_projet_pas_comm();
            $encour=$project->stat_projet_encour();
            $finies=$project->stat_projet_fini();
            include "vue/html/display_projects.php";
            }
            else{
                header("location:index.php");
            }
        }
        public function display_projects_searched($search_query){
            if($_SESSION["loged_in"]=="admin"){
                $project=new project_transaction;
                $project_info=$project->get_projects_searched($search_query);
                $pas_comm=$project->stat_projet_pas_comm();
                $encour=$project->stat_projet_encour();
                $finies=$project->stat_projet_fini();

                include "vue/html/display_projects.php";
            }
            else{
                header("location:index.php");
            }
        }

        public function add_project_page(){
            if($_SESSION["loged_in"]=="admin"){
                $project=new project_transaction;
                $emails=$project->get_chefs();
                include "vue/html/add_project.php";
            }
            else{
                header("location:index.php");
            }
        }

        public function add_project(){
            if($_SESSION["loged_in"]=="admin"){
                $nom_projet=$_POST["nom_projet"];
                $description=$_POST["description_projet"];
                $date_debut=$_POST["date_debut_projet"];
                $date_fin=$_POST["date_fin_projet"];
                $statut=$_POST["statut_projet"];
                $email_chef=$_POST["email_chef"];
                $project = new project_transaction();
                $result=$project->add_project($nom_projet,$description,$date_debut,$date_fin,$statut,$email_chef);
                if($result==1){
                    header("location:index.php?action=projects");
                }
            }
            else{
                header("location:index.php");
            }
        }

        public function modify_project_page($id_project){
            if($_SESSION["loged_in"]=="admin"){
                $project=new project_transaction;
                $info_projet=$project->projet_info($id_project);
                $user=new user_transaction;
                $email=$user->get_emails();
                include "vue/html/update_project.php";
            }
            else{
                header("location:index.php");
            }
        }

        public function update_project($id_project){
            if($_SESSION["loged_in"]=="admin"){
                $nom_projet=$_POST["nom_projet"];
                $description=$_POST["description_projet"];
                $date_debut=$_POST["date_debut_projet"];
                $date_fin=$_POST["date_fin_projet"];
                $statut=$_POST["statut_projet"];
                $email_chef=$_POST["email_chef"];
                $project = new project_transaction();
                $result=$project->update_project($id_project,$nom_projet,$description,$date_debut,$date_fin,$statut,$email_chef);
                header("location:index.php?action=projects");

            }
            else{
                header("location:index.php");
            }
        }

        public function delete_project($id_project){
            if($_SESSION["loged_in"]=="admin"){
                $project=new project_transaction();
                $project->delete_project($id_project);
                header("location:index.php?action=projects");
            }
            else{
                header("location:index.php");
            }
        }
        public function display_detail_page($id_project){
            if($_SESSION["loged_in"]=="admin"){
                $user=new user_transaction;
                $project=new project_transaction;
                $info_projet=$project->projet_info($id_project);
                $taches=$project->taches_projet($id_project);
                $info_chef=$user->user_info_from_projet($id_project);
                $membres=$user->get_membres_from_projecet($id_project);
                include "vue/html/detail_page.php";
            }
            else{
                header("location:index.php");
            }
        }

        

        
    }
?>