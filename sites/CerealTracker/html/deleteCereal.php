<?php
    //Include the constants.php file
    include('../config/constants.php');

    //Check if the cereal_ID was set
    if(isset($_GET['cereal_ID']) == FALSE) {
        //Redirect to index.php
        $_SESSION['cerealFail'] = "No Cereal Chosen";
        header("location: ../" . HOME);
    }
    else {
        $cereal_ID = $_GET['cereal_ID'];

        //Connect to the database to display the items on the page
        $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DATABASE);

        //Display the contents of the selected cereal
        $sqlCereal = "SELECT * FROM " . CEREAL . " WHERE cereal_ID = $cereal_ID";
        $res = $con->query($sqlCereal);

        if($res == TRUE) {
            //Send the name back to the index page
            while($row = $res->fetch_assoc()) {
                $name = $row['name'];
            }
            //Move the selection to the deleted Cereal table
            echo $sqlDelCereal = "INSERT INTO delCereals $sqlCereal";
            $resDel = $con->query($sqlDelCereal);
            if($resDel == TRUE) {
                //Remove from the cereals table
                $sqlRemCereal = "DELETE FROM cereals WHERE cereal_ID = $cereal_ID"; 
                $con->query($sqlRemCereal);
                echo "Cereal deleted";
                $_SESSION['delCerealPass'] = $name . " Deleted";
                header("location: ../" . HOME);
                exit;
            }
            else {
                echo "Couldn't delete";
            }
        }
    }

?>
