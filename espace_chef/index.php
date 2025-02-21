<?php
include "model/database.php";
include "controler/user_controler.php";
include "controler/project_controler.php";
include "controler/tache_controler.php";
$user =new user_controler;
$project=new project_controler;
$controller= new tache_controler;
// $project=new project_transaction;
    if(isset($_GET["action"])){
        $action=$_GET["action"];
    }
    else{
        $action=1;
    }

    switch($action){
        case "login" : $user->login_user(); break;

        case "membres" : $user->display_membres(); break;

        case "chefs" : $user->display_chefs(); break;

        case "homepage" : $user->display_homepage(); break;

        case "projects" : $project->display_projects(); break;

        // case "add_user_page" : $user->add_user_page(); break;

        // case "add_user" : $user ->add_user(); break;

        case "update_member_page" : $id=$_GET["id"] ; $user->update_page($id); break;

        case "update_membre" :  $id=$_GET["id"] ; $user->update_membre($id); break;

        case  "delete_member" : $id=$_GET["id"] ; $user->delete_membre($id); break;

        case "update_chef_page" : $id=$_GET["id"] ; $user->update_chef_page($id); break;

        case "update_chef" : $id=$_GET["id"] ; $user->update_chef($id); break;

        case "delete_chef" : $id=$_GET["id"] ; $user->delete_chef($id); break;

        case "add_chef_page" : $user->add_chef_page(); break;

        case "add_chef" : $user->add_chef(); break;

        case  "add_project_page" : $project->add_project_page(); break;

        case "add_project" : $project->add_project(); break;

        case "modify_project_page" : $id_project=$_GET["id_projet"]; $project->modify_project_page($id_project); break;

        case "update_project" : $id_project=$_GET["id_projet"]; $project->update_project($id_project); break;

        case "delet_project" : $id_project=$_GET["id_projet"]; $project->delete_project($id_project); break;

        case "see_more" : $id_project=$_GET["id_projet"]; $project->display_detail_page($id_project); break;

        case 'display_comments': if (isset($_GET['task_id'])) {$controller->display_comments($_GET['task_id']);}break;

        case 'insert_comment' : $controller->insert_comment(); break;

        case 'search_projects':
            $search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';

            $id_chef = $_GET["id_user"];

            $project->display_projects_searched($search_query,$id_chef);
            break;

        case 'membre_to_project' : $id_project=$_GET["id_project"]; $project->membre_to_project_page($id_project); break;

        case 'add_membre_to_tache' : $id_project=$_GET["id_project"]; $controller->add_membre_to_tache($id_project); break;

        case 'add_tache_page' : $id_project=$_GET["id_project"]; $controller->add_tache_page($id_project); break;

        //case 'add_tache' : $id_project=$_GET["id_project"]; $controller->add_tache($id_project); break;

        case 'update_tache_page' : $id_tache=$_GET["id_tache"];$id_project=$_GET["id_project"]; $controller->update_tache_page($id_tache,$id_project); break;

        case 'update_tache' : $id_tache=$_GET["id_tache"];$id_project=$_GET["id_project"]; $controller->update_tache($id_tache,$id_project); break;

        case 'delete_tache' : $id_tache=$_GET["id_tache"];$id_project=$_GET["id_project"]; $controller->delete_tache($id_tache,$id_project); break;

        case 'deconexion' : $user->deconexion(); break;

        case 'ajouter_tache' : $id_project=$_GET["id_project"]; $controller->ajouter_tache($id_project);die("Route exécutée une fois."); break;
        
        default : header("location:vue/html/login.php");
    }
?>