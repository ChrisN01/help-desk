<?php

class User extends Connect{
    public function login()
    {
        $connect = parent::conexion();
        parent::set_names();
        if(isset($_POST["send"]))
        {
            $email = $_POST["email"];
            $password =$_POST["password"];
            $rol_id =$_POST["rol_id"];

            if(empty($email) && empty($password))
            {
                header("Location:".connect::route()."index.php?m=2");
                exit();

            }
            else{
                $sql = "SELECT * FROM users WHERE email= ? and password=? and rol_id = ? and status=1;";
                $stmt= $connect->prepare($sql);
                $stmt->bindValue(1,$email);
                $stmt->bindValue(2,$password);
                $stmt->bindValue(3,$rol_id);
                $stmt->execute();
                $result = $stmt->fetch();

                if(is_array($result) && count($result)>0){
                    //Variables de session
                    $_SESSION["id"]=$result["id"];
                    $_SESSION["name"]=$result["name"];
                    $_SESSION["lastname"]=$result["lastname"];
                    $_SESSION["rol_id"]=$result["rol_id"];
                    header("Location:".connect::route()."view/Home/");
                    exit();
                }
                else
                {
                    header("Location:".connect::route()."index.php?m=1");
                    exit();
                }
            }
        }

        
    }

}