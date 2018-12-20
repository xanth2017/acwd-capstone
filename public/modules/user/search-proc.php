<?php
require_once '../../includes/autoload.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$servername = "localhost";
$username = "root";
$password = "test123";
$database = "php_lab";

$result = "";
$conn = "";
$firstname = $lastname = $email = $comments = "";
$fn = $ln = $eml = $id = $cmt ="";
$conditions = $users = $rows = array();
$fields = "";


$sql = "SELECT id, firstname, lastname, email, comments FROM TB_FEEDBACK";

if (isset($_POST['search']) && $_POST['search'] !== ""){

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // define the list of fields
        $firstname =strip_tags( $_POST['firstname']);
        $lastname =strip_tags( $_POST['lastname']);
        $email = strip_tags($_POST['email']);


        $fields = array(
            'firstname',
            'lastname',
            'email'
        );

        $isEmpty = true;

        foreach ($fields as $field) {
            // if the field is set and not empty
            if (isset($_POST[$field]) && $_POST[$field] != '') {
                $isEmpty = false;
            }
        }

        if ($isEmpty AND isset($_POST['search'])){
            echo "Please enter at least one fields";
        } else {
            $conditions = array();

            //define database connection information
            $conn = new mysqli($servername, $username, $password, $database);

            // To escape special characters in the input before writing into MySQL like ', ", %, etc
            $firstname =$conn->real_escape_string($firstname);
            $lastname =$conn->real_escape_string($lastname);
            $email = $conn->real_escape_string($email);


            foreach ($fields as $field) {
                if (isset($_POST[$field]) && $_POST[$field] != '') {
                    $conditions[] = "`$field` LIKE '%" . $_POST[$field] . "%'";
                }
            }

            $sql .= " WHERE " . implode(' OR ', $conditions);

            $result = $conn->query($sql);
            if ($conn->errno != 0){
                echo $conn->error;
            } else {
                echo "Result: $result->num_rows found!";
                if ($result->num_rows > 0) {

                    while ($rows = $result->fetch_assoc()) {
                        $users[] = $rows;
                    }
                }
            }
        }
    }catch (Exception $e) {
        $_SESSION['formerror'] = $e->getMessage();
        header("Location: error.php");
    }
}
?>
