<?php
require_once 'includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include 'includes/security.php';
include 'includes/header.php';
?>


<?php
$servername = "localhost";
$username = "root";
$password = "test123";
$database = "phpcrudsample";

$result = "";
$conn = "";
$firstname = $lastname = $email = $company = "";
$fn = $ln = $eml = $id = $cmp ="";
$conditions = $users = $rows = array();
$fields = "";


$sql = "SELECT id, firstname, lastname, email, company FROM tb_user";

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



<div class="container-fluid mt-2" >

    <div class="row ">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
                <h1>Search Feedback</h1>
                <form method="post" action="<?= $_SERVER["PHP_SELF"]?>">
                    <fieldset>
                        <legend>:: Search :: </legend>
                        <label class="tab" for="firstname">First Name: </label>
                        <input type="text" name="firstname" id="firstname" value="">
                        <label class="tab" for="lastname">Last Name: </label>
                        <input type="text" name="lastname" id="lastname" value="">
                        <label class="tab" for="email">Email: </label>
                        <input type="text" name="email" id="email" value="">
                        <input class="tab" type = "submit" name="search" value="Search">
                        <input type = "reset" name="clear_search" value="Clear Search">
                    </fieldset>

                    <br>
                    <h3 class="mt-2" style="text-align: center;">List User</h3>
                    <?php

                    echo "<table id='searchlist' >";
                    echo "   <tr>";
                    echo "       <th class='center'>Delete </th>";
                    echo "       <th class='center'>ID</th>";
                    echo "       <th>First Name </th>";
                    echo "       <th>Last Name</th>";
                    echo "       <th>Email</th>";
                    echo "       <th>Company</th>";
                    echo "   </tr>";

                    if ($_SERVER["REQUEST_METHOD"] == "POST" AND count($users) > 0) {

                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "  <td class='center'><input type='checkbox' name='toDelete[]' value= '" . $user["id"] . "' ><br></td>";
                            echo "  <td class='center'><a href='edit.php?id=" . $user["id"]. "'>" . $user["id"] . "</a></td>";
                            echo "  <td>" . $user['firstname'] . "</td>";
                            echo "  <td>" . $user['lastname'] . "</td>";
                            echo "  <td>" . $user['email'] . "</td>";
                            echo "  <td>" . $user['company'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<input type='hidden' name='deleted' value='1'>";
                        echo "<button type='submit' value='submit'>Delete</button>";

                    }
                    ?>
                </form>
            </div>
            <div class="col-lg-1 col-sm-2"></div>
        </div>
</div>







