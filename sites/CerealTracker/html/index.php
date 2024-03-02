<?php 
    //Include the config page
    include_once("../config/constants.php");
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

        <title>Cereal Tracker</title>
    </head>
    <body>
        <!-- <div id="first">
            Let's track some 
        </div> -->
        <!-- Put everything in a container div for organization -->
        <div class="container">
            <!-- Div for page title -->
            <div class="row justify-content-center my-3">
                <h1 class="text-center m-2">Cereal Tracker</h1>
            </div>
            <!-- Div for cereal boxes -->
            <div class="row justify-content-around">
            
            <?php
                //Check if the database has already been created
                $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD);
                if ($con->connect_error){
                    die("Connection failed!");
                }
                else {
                    $dbSel = mysqli_select_db( $con, DATABASE);        
                    if($dbSel) {
                        ?>

                <script type="text/javascript">
                    console.log("Connected!");
                </script>

            <?php
            //Get all items from the table
            $sqlSelAll = "SELECT * FROM " . CEREAL;
            $res = $con->query($sqlSelAll);

            //Print them all on the screen
            if($res == TRUE) {
                //Count the rows to ensure there are cereals to add
                $count = $res->num_rows;
                if($count > 0) {
                    while($row = $res->fetch_assoc()) {
                        $cereal_ID = $row['cereal_ID'];
                        $name = $row['name'];
                        $numBoxes = $row['numBoxes'];
                        $boxBowls = $row['boxBowls'];
                        $eatBowls = $row['eatBowls'];
                        $totBowls = $row['totBowls'];
                        $remBowls = $row['remBowls'];
                        $img = $row['img'];

                        ?>
                <div class="col-12 col-sm-6 col-md-3 mb-2">
                    <a href="bowls.php?cereal_ID=<?php echo $cereal_ID; ?>">
                        <img src="../img/<?php echo $img; ?>" class="d-block w-100 mx-auto rounded hov" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
                        <h3 class="w-100 h-100 text-center mt-2"><?php echo $name; ?></h3>
                    </a>
                </div>
                        <?php

                    }
                }
                else {
                    ?>
                    <script type="text/javascript">
                        alert("Count is 0");
                    </script>
                    <?php
                }

            }
            else {
                echo " this is why";
            }
        }
        else {
            echo "Table does not exist" . $con->error;
        }


    }
    $con->close();
?>
                
                <div class="col-12 col-sm-6 col-md-3 mb-2">
                    <a href="addCereal.php">
                        <div class="imageStack">
                            <div class="imageStack_item imageStack_item__bottom">
                                <img src="../img/nopic.jpg" class="d-block w-100 mx-auto rounded" title="Add Cereal" alt="Add Cereal" />
                            </div>
                            <div class="imageStack_item imageStack_item__top">
                                <img src="../img/addingT.png" class="d-block w-100 mx-auto rounded" id="adding" />
                            </div>
                        </div>
                        <p class="w-100 h-100 text-center mt-3">Add Cereal</p>
                    </a>
                </div>
                

            </div>
        </div>

        <!-- Check if the cereal was added successfully -->
        <?php 
                //Add an alert about adding the cereal
                if(isset($_SESSION['addCerealPass'])) {
                    ?>            
                <script type="text/javascript">
                    var b = `<?php echo $_SESSION['addCerealPass']; ?>`;
                    alert(b);
                </script>
                <?php
                    unset($_SESSION['addCerealPass']);
                }
                //Add an alert about deleting the ceral
                if(isset($_SESSION['delCerealPass'])) {
                    ?>            
                <script type="text/javascript">
                    var c = `<?php echo $_SESSION['delCerealPass']; ?>`;
                    alert(c);
                </script>
                <?php
                    unset($_SESSION['delCerealPass']);
                }
            ?>
        <!-- Include jQuery, Bootstrap, and popper libraries along with your js pages -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
    </body>
</html>