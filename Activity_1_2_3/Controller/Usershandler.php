<?php
include_once "../Database/dbConnection.php";

class Usershandler extends Dbconnection{

    // Insert User
    public function insertUser(array $insertdata){

            $data = ['fname','lname','email','password','token'];
            foreach($data as $key){ 
                if(empty($insertdata[$key])){
                    return['message' => " {$key} is required!"];
                }
            }
            $fname = $insertdata['fname'];
            $lname = $insertdata['lname'];
            $email = $insertdata['email'];
            $password = $insertdata['password'];
            $token = $insertdata['token'];

            $checksql = $this->conn->query("SELECT * FROM users WHERE email = '$email' ");
            if($checksql->num_rows > 0){
                return ['message' => 'Email already exists!'];
            }else{

            $ifinsert = $this->conn->query("INSERT INTO users (fname,lname,email,password,token) VALUES
            ('$fname','$lname','$email','$password','$token')");

            if($ifinsert){
                return ['message' => 'Inserted Successfully!'];
            }else{
                return ['message' => 'Insert failed!'];
            }
        }
    }

    // Get Users All
    public function getallUsers(){
        $data = $this->conn->query("SELECT * FROM users");
        $result = $data->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    // Search Email
    public function searchbyEmail(array $search){
        if(empty($search['email'])){
            return json_encode(['message' => 'Please provide email.']);
        }
        $email = $_GET['email'] ?? null;
        $sql = $this->conn->query("SELECT * FROM users WHERE email LIKE '%$email%'");
        $data = $sql->fetch_all(MYSQLI_ASSOC);
        
        if ($data){
            return $data;
        }else{
            return json_encode(['message'=>'No record found!']);
        }
       
    }
}
?>