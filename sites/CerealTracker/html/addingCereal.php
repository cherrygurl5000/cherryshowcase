<?php 
    //Include the constants
    include("../config/constants.php");

    //Function to determine if the numbers are valid
    function validNum($numBoxes, $boxBowls, $eatBowls, $totBowls, $remBowls) {
        //Check if the values are numeric
        if(is_numeric($numBoxes) && $numBoxes >= 0) {
            //Validate the remaining values
        }
        else {
            //Return to the addCereal.php page with a message
            $_SESSION['addCerealFail'] = "Number of boxes is required as a number";
            header("location: addCereal.php");
            exit;
        }
        if(is_numeric($boxBowls) && $boxBowls >= 0) {
            //Validate the remaining values
        }
        else {
            //Return to the addCereal.php page with a message
            $_SESSION['addCerealFail'] = "Number of bowls/box is required as a number";
            header("location: addCereal.php");
            exit;
        }
        if(is_numeric($eatBowls) && $eatBowls >= 0) {
            //Validate the remaining values
        }
        else {
            //Return to the addCereal.php page with a message
            $_SESSION['addCerealFail'] = "Number of eaten bowls is required as a number";
            header("location: addCereal.php");
            exit;
        }
        if(is_numeric($totBowls) && $totBowls >= 0 && is_numeric($remBowls) && $remBowls >= 0) {
            //Everything is good, move on to adding to the database
        }
        else {
            //Change them to match the other numbers already given
            $totBowls = $numBoxes * $boxBowls;
            $remBowls = $totBowls - $eatBowls;
        }
        
        echo $numBoxes . " " . $boxBowls . " " . $eatBowls . " " . $totBowls . " " . $remBowls . " ";
    }

    //Function for validating the image and adding the pic to the img folder
    function validImg($fName, $fTName, $fSize) {
        $dir = "../img/";
        $file = $dir . $fName;
        $uploadOk = 1;
        $imgType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        //Check if img file is an image
        $check = getimagesize($fTName);
        if($check !== false) {
            echo "File is an image";
        }
        else { 
            echo "File is not an image";
            $uploadOk = 0;
        }
        // Check if file already exists, if it does, then set $img to the file name
        if (file_exists($file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            $img = $fName;
        }
        // Check file size
        else {
            if ($fSize > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $img = "nopic.jpg";
            }
        }
  
  
        // Allow certain file formats
        if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            $img = "nopic.jpg";
        }
  
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            $_SESSION['imgFail'] = "Your image was not uploaded due to an error or it already exists";
        }
        // If everything is ok, try to upload file 
        else {
            if (move_uploaded_file($fTName, $file)) {
            echo "The file ". htmlspecialchars($fName). " has been uploaded.";
            $img = $fName;
            } else {
            echo "Sorry, there was an error uploading your file.";
            $_SESSION['imgFail'] = "There was an error uploading your image";
            $img = "nopic.jpg";
            }
        }
        return $img;
    }

    //Check if the form has been submitted and get the data from it
    if(isset($_POST["addCereal"])) {
        //Get the values from the form and save them in variables
        echo $name = '"' . processInput($_POST["name"]) . '"';
        echo $numBoxes = processInput($_POST["numBoxes"]);
        echo $boxBowls = processInput($_POST["boxBowls"]);
        echo $eatBowls = processInput($_POST["eatBowls"]);
        echo $totBowls = processInput($_POST["nTotBowls"]);
        echo $remBowls = processInput($_POST["nRemBowls"]);
        echo $fName = basename($_FILES["pic"]["name"]);
        echo $fTName = $_FILES["pic"]["tmp_name"];
        echo $fSize = $_FILES["pic"]["size"];

        //Validate all the numbers from the form
        validNum($numBoxes, $boxBowls, $eatBowls, $totBowls, $remBowls);

        //Validate the image
        if($fName != '' || $fName != null) {
            $img = validImg($fName, $fTName, $fSize);
            echo $img;
        }
        else {
            $img = "nopic.jpg";
        }

        //Connect to the database and add the information from the form
        $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DATABASE);
        if($con->connect_error){
            die("Connection failed");
        }
        else {
            //Insert the data into the table
            echo $sqlAddCereal = "INSERT INTO `cereals` (`name`, `numBoxes`, `boxBowls`, `eatBowls`, `totBowls`, `remBowls`, `img`) 
            VALUES ($name, $numBoxes, $boxBowls, $eatBowls, $totBowls, $remBowls, '$img')";
            if($con->query($sqlAddCereal)) {
                echo " items added ";
            }
            else {
                echo " items failed " .$con->error;
            }
        }

        //Return to the index page with a message
        $_SESSION['addCerealPass'] = "$name Added";
        header("location: index.php");

    }
    else {
        //Return to the addCereal.php page with a message
        $_SESSION['addCerealFail'] = "No Cereal Added";
        header("location: addCereal.php");
        exit;
    }
?>