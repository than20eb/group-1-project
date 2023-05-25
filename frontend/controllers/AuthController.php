<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

require_once __DIR__ . "/../ControllerBase.php";
require_once __DIR__ . "/../../business-logic/AuthService.php";

// Class for handling requests to "home/Auth"

class AuthController extends ControllerBase
{

    public function handleRequest()
    {

        // Check for POST method before checking any of the GET-routes
        if ($this->method == "POST") {
            $this->handlePost();
        }


        // GET: /home/auth/login
        if ($this->path_count == 3 && $this->path_parts[2] == "login") {
            $this->showLoginForm();
        }

        // GET: /home/auth/register
        if ($this->path_count == 3 && $this->path_parts[2] == "register") {
            $this->showRegisterForm();
        }

        // GET: /home/auth/profile
        if ($this->path_count == 3 && $this->path_parts[2] == "profile") {
            $this->showProfilePage();
        }

        // Show "404 not found" if the path is invalid
        else {
            $this->notFound();
        }
    }



    private function showLoginForm()
    {
        // Shows the view file auth/login.php
        $this->viewPage("auth/login");
    }

    private function showRegisterForm()
    {
        // Shows the view file auth/register.php
        $this->viewPage("auth/register");
    }

    private function showProfilePage()
    {
        // Shows the view file auth/register.php
        $this->viewPage("auth/profile");
    }


    // handle all post requests in one place
    private function handlePost()
    {
        // POST: /home/auth/login
        if ($this->path_count == 3 && $this->path_parts[2] == "login") {
            $this->loginUser();
        }

        // POST: /home/auth/register
        else if ($this->path_count == 3 && $this->path_parts[2] == "register") {
            $this->registerUser();
        }

        // POST: /home/auth/logout
        else if ($this->path_count == 3 && $this->path_parts[2] == "logout") {
            $this->logoutUser();
        }

        // else if ($this->path_count == 3 && $this->path_parts[2] == "update") {
        //     $this->updateUser();
        // }
        else if ($this->path_count == 3 && $this->path_parts[2] == "premium") {
            $this->premiumUser();
        }
        else if ($this->path_count == 3 && $this->path_parts[2] == "location") {
            $this->locationUser();
        }
        // Show "404 not found" if the path is invalid
        else {
            $this->notFound();
        }
    }


    private function loginUser()
    {
        $username = $this->body["username"];
        $test_password = $this->body["password"];

        $user = AuthService::authenticateUser($username, $test_password);

        if ($user === false) {
            $this->model["error"] = "Invalid credentials";
            $this->viewPage("auth/login");
        }

        $_SESSION["user"] = $user;

        $this->redirect($this->home . "/auth/profile");
    }


    private function registerUser()
    {
        $user = new UserModel();

        $user->username = $this->body["username"];
        $user->premium = 0; // hard code all new users to regular "user" role
        $password = $this->body["password"];
        $confirm_password = $this->body["confirm_password"];

        if ($password !== $confirm_password) {
            $this->model["error"] == "Passwords don't match";
            $this->viewPage("auth/register");
        }

        $existing_user = UsersService::getUserByUsername($user->username);

        if ($existing_user) {
            $this->model["error"] == "Username already in use";
            $this->viewPage("auth/register");
        }

        $success = AuthService::registerUser($user, $password);

        if ($success) {
            $this->redirect($this->home . "/auth/login");
        } else {
            $this->model["error"] == "Error registering user";
            $this->viewPage("auth/register");
        }
    }


    private function logoutUser()
    {
        session_destroy();

        $this->redirect($this->home . "/auth/login");
    }

    private function premiumUser()
    {
        $user = $_SESSION["user"];
        if ($this->user->premium === 0) {
            $user->premium = 1; // toggle the value
        }
        else{
            $user->premium = 0;
        }
        $success = UsersService::premiumUser($user);
        
        $this->redirect($this->home . "/auth/profile");
    }

    private function locationUser()
    {
        $user = $_SESSION["user"];
        $user->location = $this->body["location"];
        $success = UsersService::locationUser($user);
        
        $this->redirect($this->home . "/auth/profile");
    }
    // private function updateUser()
    // {
    //     $user = new UserModel();

    //     $user->premium = 0; // hard code all new users to regular "user" role
    //     $password = $this->body["password"];
    //     $confirm_password = $this->body["confirm_password"];

    //     if ($password !== $confirm_password) {
    //         $this->model["error"] == "Passwords don't match";
    //         $this->viewPage("auth/update");
    //     }

    //     $existing_user = UsersService::getUserByUsername($user->username);

    //     if ($existing_user) {
    //         $this->model["error"] == "Username already in use";
    //         $this->viewPage("auth/update");
    //     }

    //     $success = AuthService::updatePassword($user, $password);

    //     if ($success) {
    //         $this->redirect($this->home . "/auth/update");
    //     } else {
    //         $this->model["error"] == "Error registering user";
    //         $this->viewPage("auth/update");
    //     }
    // }
}
