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
            while($row = $res->fetch_assoc()) {
                $name = $row['name'];
                $numBoxes = $row['numBoxes'];
                $boxBowls = $row['boxBowls'];
                $eatBowls = $row['eatBowls'];
                $totBowls = $row['totBowls'];
                $remBowls = $row['remBowls'];
                $img = $row['img'];
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="https://kit.fontawesome.com/7cdbf977a6.js" crossorigin="anonymous"></script>

        <link href="../css/styles.css" type="text/css" rel="stylesheet" />

        <title><?php echo $name; ?></title>
    </head>
    <body>
        <!-- <div id="first">
            Let's track some 
        </div> -->
        <!-- Put everything in a container div for organization -->
        <div class="container">
            <!-- Div for page title -->
            <div class="row justify-content-center">
                <h1 class="text-center my-3"><?php echo $name; ?></h1>
            </div>
            <!-- Div for cereal boxes -->
            <div class="row justify-content-around">
                <div class="col-12 col-sm-6 col-md-3">
                    <img src="../img/<?php echo $img; ?>" class="d-block w-100 mx-auto rounded" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
                </div>
            </div>
            <hr />
            <div class="row justify-content-center mt-3">
                <h1 class="col-6 text-right">Remaining Bowls</h1>
                <h1 class="col-5 ml-4"><small><?php echo $remBowls; ?></small></h1>
                <input type="text" id="remBowls" name="remBowls" class="col-5 ml-4 d-none"/>
            </div>
            <div class="row justify-content-center">
                <h1 class="col-6 text-right"># of Boxes</h1>
                <h1 class="col-5 ml-4"><small><?php echo $numBoxes; ?></small></h1>
                <input type="text" id="numBoxes" name="numBoxes" class="col-5 ml-4 d-none"/>
            </div>
            <!-- <div class="row justify-content-center">
                <h1 class="col-6 text-right">Total Boxes</h1>
                <h1 class="col-5 ml-4"><small><?php echo $totBowls; ?></small></h1>
                <input type="text" id="totBowls" name="totBowls" class="col-5 ml-4 d-none"/>
            </div> -->
            <div class="row justify-content-center">
                <h1 class="col-6 text-right">Bowls/Box</h1>
                <h1 class="col-5 ml-4"><small><?php echo $boxBowls; ?></small></h1>
                <input type="text" id="boxBowls" name="boxBowls" class="col-5 ml-4 d-none"/>
            </div>
            <div class="row justify-content-center">
                <h1 class="col-6 text-right">Bowls Eaten</h1>
                <h1 class="col-5 ml-4"><small><?php echo $eatBowls; ?></small></h1>
                <input type="text" id="eatBowls" name="eatBowls" class="col-5 ml-4 d-none"/>
            </div>
            <hr />
            <div class="row justify-content-center mt-3" id="btns" name="btns">
                <button type="button" onclick="location.href='../html/editCereal.php?cereal_ID=<?php echo $cereal_ID; ?>'" id="edit" name="edit" class="btn btn-primary mr-2">Edit</button>
                <button type="button" onclick="deleteCereal()" id="delete" name="delete" class="btn btn-warning">Delete</button>
            </div>
            <script type="text/javascript">
                var cerealName = "<?php echo $name; ?>";
                var cereal_ID = "<?php echo $cereal_ID; ?>";
                //alert(cerealName);
            </script>



        </div>

        <!-- Include jQuery, Bootstrap, and popper libraries along with your js pages -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
    </body>
</html>