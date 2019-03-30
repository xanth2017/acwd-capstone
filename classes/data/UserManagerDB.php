<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;

class UserManagerDB
{
    /**
     * @param $row which is an array which holds the values of the user information
     * @return a new User object
     */
    public static function fillUser($row){
        $user=new User();
        $user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
        $user->city=$row["city"];
        $user->company=$row["company"];
        $user->country=$row["country"];
        $user->password=$row["password"];
        $user->is_admin=$row["is_admin"];
        $user->is_block=$row["is_block"];
        return $user;
    }

    /**
     * @param $email
     * @param $password
     * @return User information in an array if the $email and $password is valid
     */
    public static function getUserByEmailPassword($email, $password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     * @param $email
     * @return User information in an array if the $email is valid
     */
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     * @param Insert User $user data into the mysql database
     */
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $user->id,$user->firstName, $user->lastName, $user->email,
            $user->city, $user->company, $user->country, $user->password);
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }

    /**
     * @return getAlUsers array
     */
    public static function getAllUsers(){
        $users = array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }


    /**
     * @return getAlUsersById array
     */
    public static function getUsersById($ids){
        $users = array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user where id in (".$ids.")";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }

    /**
     * @param User $user information is used to update the user database
     */
    public static function updateUserStatus(User $user){
        $conn=DBUtil::getConnection();
        $sql="call updateUserStatus(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user->id,$user->is_block);
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }

    public static function searchAllUsers($first_name="", $last_name="", $email=""){
        $users = array();
        $where = array();

        if($first_name){
            $where[] = "firstname like '%".$first_name. "%'";
        }

        if($last_name){
            $where[] = "lastname like '%".$last_name. "%'";
        }

        if($email){
            $where[] = "email like '%".$email. "%'";
        }


        $where = count($where)>0?implode(" and ", $where):"";


        $conn=DBUtil::getConnection();
        if(empty($where)){
            $sql="select * from tb_user";
        }else{
            $sql="select * from tb_user where ".$where;
        }


        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }


}
?>
