<?php
session_start();
include "model/user_transaction.php";
include "model/notification_transaction.php";

    class user_controler{

        public function display_login(){
            header("location:vue/html/login.php");
        }

        public function display_homepage(){
            if($_SESSION["loged_in"]=="admin"){
                $notifications=new notification_transaction;
                $notifications=$notifications->get_notifications();
                // $project=new project_transaction;
                // $pas_comm=$project->stat_projet_pas_comm();
                // $encour=$project->stat_projet_encour();
                // $finies=$project->stat_projet_fini();
                include "vue/html/home_page.php";
            }
            else{
                header("location:index.php");
            }
        }

        // public function display_chefs(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new  user_transaction();
        //         $chefs=$user -> display_all_chefs();
        //         include "vue/html/display_chefs.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }
        // public function display_membres(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new  user_transaction();
        //         $membres=$user -> display_all();
        //     include "vue/html/display_membres.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        public function login_user(){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user= new user($email , $password);
            $login_user= new user_transaction(); 
            $id_membre=$login_user->login_user($user);

            if($id_membre){
                $_SESSION["loged_in"]="admin";
                $_SESSION["id_membre"]=$id_membre;
                header("location:index.php?action=homepage");
            }
            else{
                $_SESSION["loged_in"]="erreur";
                header("location:vue/html/login.php");
            }
        }
        

        

        // public function add_user_page(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         include "vue/html/add_user.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function add_user(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $name=$_POST["name"];
        //         $email=$_POST["email"];
        //         $password=$_POST["password"];
        //         $user = new user_transaction();
        //         $inserted=$user->add_user($name , $email , $password);
        //         if($inserted==0){
        //             header("location:index.php?action=membres");
        //         }
        //         elseif($inserted==1){
        //             $_SESSION["add_user_erreur"]="email_used";
        //             header("location:index.php?action=add_user_page");
        //         }
        //         else{
        //             $_SESSION["add_user_erreur"]="erreur";
        //             header("location:index.php?action=add_user_page");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function update_page($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new user_transaction();
        //         $user_info=$user->select_user($id);
        //         include "vue/html/update_page.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function update_chef($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $name = $_POST["name"];
        //         $email= $_POST["email"];
        //         $password = $_POST["password"];
        //         $user = new user_transaction();
        //         $ok=$user->update_chef($id , $name ,$email,$password);
        //         if($ok==1){
        //             header("location:index.php?action=chefs");
        //         }
        //         elseif($ok==-1){
        //             $_SESSION["update_user_erreur"]="email_used";
        //             header("location:index.php?action=update_chef_page&id=$id");
        //         }
        //         else{
        //             $_SESSION["update_user_erreur"]="erreur";
        //             header("location:index.php?action=update_chef_page&id=$id");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function update_membre($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $name = $_POST["name"];
        //         $email= $_POST["email"];
        //         $password = $_POST["password"];
        //         $user = new user_transaction();
        //         $ok=$user->update_membre($id , $name ,$email,$password );
        //         if($ok==1){
        //             header("location:index.php?action=membres");
        //         }
        //         elseif($ok==-1){
        //             $_SESSION["update_user_erreur"]="email_used";
        //             header("location:index.php?action=update_member_page&id=$id");
        //         }
        //         else{
        //             $_SESSION["update_user_erreur"]="erreur";
        //             header("location:index.php?action=update_member_page&id=$id");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function add_chef_page(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         include "vue/html/add_chef.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function add_chef(){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $name=$_POST["name"];
        //         $email=$_POST["email"];
        //         $password=$_POST["password"];
        //         $user = new user_transaction();
        //         $inserted=$user->add_chef($name , $email , $password);
        //         if($inserted==0){
        //             header("location:index.php?action=chefs");
        //         }
        //         elseif($inserted==1){
        //             $_SESSION["add_user_erreur"]="email_used";
        //             header("location:index.php?action=add_chef_page");
        //         }
        //         else{
        //             $_SESSION["add_user_erreur"]="erreur";
        //             header("location:index.php?action=add_chef_page");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function update_chef_page($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new user_transaction();
        //         $user_info=$user->select_user($id);
        //         include "vue/html/update_chef_page.php";
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function delete_membre($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new user_transaction($id);
        //         $deleted=$user->delete_membre($id); 
        //         if($deleted==1){
        //             header("location:index.php?action=membres");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        // public function delete_chef($id){
        //     if($_SESSION["loged_in"]=="admin"){
        //         $user = new user_transaction($id);
        //         $deleted=$user->delete_chef($id); 
        //         if($deleted==1){
        //             header("location:index.php?action=chefs");
        //         }
        //     }
        //     else{
        //         header("location:index.php");
        //     }
        // }

        public function deconexion(){
            if($_SESSION["loged_in"]=="admin"){
                session_destroy();
                header("location:index.php");
            }
            else{
                header("location:index.php");
            }
        }


    }
?>