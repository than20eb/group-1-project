<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

require_once __DIR__ . "/../data-access/UsersDatabase.php";


class UsersService
{
    public static function getUserById($id){
        $users_database = new UsersDatabase();

        $user = $users_database->getOne($id);

        return $user;
    }

    public static function getUserByUsername($username)
    {
        $users_database = new UsersDatabase();

        $user = $users_database->getByUsername($username);

        return $user;
    }

    // Get all users by creating a database object 
    // from data-access layer and calling its getAll function.
    public static function getAllUsers(){
        $users_database = new UsersDatabase();

        $users = $users_database->getAll();

        return $users;
    }
    // Save a user to the database by creating a database object from data-access layer and calling its insert function.
    public static function saveUser(UserModel $user){
        $users_database = new UsersDatabase();

        // If you need to validate data or control what 
        // gets saved to the database you can do that here.
        // This makes sure all input from any presentation
        // layer will be validated and handled the same way.

        $success = $users_database->insert($user);

        return $success;
    }
    public static function updateUserById($user_id, UserModel $user){
        $users_database = new UsersDatabase();

        // If you need to validate data or control what 
        // gets deleted from the database you can do that here.
        // This makes sure all input from any presentation
        // layer will be validated and handled the same way.

        $success = $users_database->updateById($user_id, $user);

        return $success;
    }

    public static function updatePassword($user_id, UserModel $user)
    {
        $users_database = new UsersDatabase();

        $success = $users_database->updateById($user_id, $user);

        return $success;
    }

    public static function premiumUser(UserModel $user)
    {
        $users_database = new UsersDatabase();

        $success = $users_database->updateById($user->user_id, $user);
        // $success = $users_database->insert($user_id, $user);

        return $success;
    }
    public static function locationUser(UserModel $user)
    {
        $users_database = new UsersDatabase();

        $success = $users_database->updateById($user->user_id, $user);

        // $success = $users_database->insert($user);

        return $success;
    }


    public static function deleteUserById($user_id){
        $users_database = new UsersDatabase();

        // If you need to validate data or control what 
        // gets deleted from the database you can do that here.
        // This makes sure all input from any presentation
        // layer will be validated and handled the same way.

        $success = $users_database->deleteById($user_id);

        return $success;
    }



}
