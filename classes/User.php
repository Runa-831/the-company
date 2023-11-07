<?php

require "Database.php";

class User extends Database {
    // function to save a new user
    public function saveUser($first_name, $last_name, $username, $password){
        
        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name','$last_name', '$username','$password')";

        if($this->conn->query($sql)){
            // go to login page
                header("location: ../views");
                exit;
            }else{
                die("Error saving a new user: ".$this->conn->error);
            }
    }

    // login function
    public function login($username, $password){
        // find the user
        $sql ="SELECT * FROM users WHERE username = '$username'";

        $result =$this->conn->query($sql);

        if($result->num_rows ==1){
            // if user is found
            $user_data =$result->fetch_assoc();

            if(password_verify($password, $user_data['password'])){
                // if password is correc, creat the session
                session_start();
                $_SESSION['username'] =$user_data['username'];
                $_SESSION['user_id'] =$user_data['id'];

                header("location: ..//views/dashboard.php");
                exit;
            }else{
                die("Incorrect password");
            }
        }else{
            die("User not found");
        }
    }
    // returns list of all users
    public function getALLUsers(){
        $sql ="SELECT * FROM users";

        if($result =$this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving users list: ".$this->conn->error);
        }
    }
    // return data of one user
    public function getUser($user_id){

        $sql ="SELECT * FROM users WHERE id= '$user_id'";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
            // return one row from the result
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    // edit user
    public function editUser($user_id, $first_name, $last_name, $username){
        $sql = "UPDATE users SET first_name = '$first_name,
                                last_name ='$last_name',
                                username = '$username',
                            WHERE id = $user_id";
        
        if($this->conn->query($sql)){
            // go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }

    }

    // delete the user based on ID
    public function deleteUser($user_id){
        $sql ="DELETE FROM users WHERE id = $user_id";

        if($this->conn->query($sql)){
            // go to dashboard php
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }

    // upload photo for session (log-in) user
    public function uploadPhoto($user_id, $file_name, $tmp_name){
        // seve file name for the user in database
        $sql ="UPDATE users SET photo='$file_name' WHERE id=$user_id";

        if($this->conn->query($sql)){
            $destination = "../images/$file_name";

            if(move_uploaded_file($tmp_name, $destination)){
                // go to profile page
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Cannot move the file");
            }
        }else{
            die("Error updating photo: ".$this->conn->error);
        }
    }

}