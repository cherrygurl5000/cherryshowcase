<?php 
    //Include the constants
    include("../config/constants.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="https://kit.fontawesome.com/7cdbf977a6.js" crossorigin="anonymous"></script>

        <link href="../css/styles.css" type="text/css" rel="stylesheet" />

        <title>Add Cereal</title>

        

    </head>
    <body>
        <!-- <div id="first">
            Let's track some 
        </div> -->
        <!-- Put everything in a container div for organization -->
        <div class="container">
            <!-- Div for page title -->
            <div class="row justify-content-center">
                <h1 class="text-center my-3">Add Cereal</h1>
            </div>
            <!-- Div for cereal boxes -->
            <form action="../html/addingCereal.php" method="POST" id="addCerealForm" onsubmit="return validName()" enctype="multipart/form-data">
                <div class="row justify-content-around">
                    <div class="col-12 col-sm-6 col-md-3">
                        <input type="file" class="mb-3" id="pic" name="pic" accept="image/*" onchange="showUpload(event)" />
                        <img src="../img/nopic.jpg" id="uploaded" name="uploaded" class="d-block w-100 mx-auto rounded" />
                    </div>
                </div>
                <hr />
                <div class="row justify-content-center mt-3">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Cereal Name" data-content="Please enter the name of the cereal">Cereal Name</a>
                    <input type="text" id="name" name="name" class="col-5 ml-4" required />
                </div>
                <div class="row justify-content-center mt-3">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Remaining Bowls" data-content="Please enter the number of boxes">Number of Boxes</a>
                    <input type="number" step="1" min="0" value="0" id="numBoxes" name="numBoxes" onchange="bowlCount()" class="col-5 ml-4"/>
                </div>
                <div class="row justify-content-center mt-2">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Bowls per Box" data-content="Please enter the estimated number of bowls in a box">Bowls/Box</a>
                    <input type="number" step="1" min="1" max="20" value="6" id="boxBowls" name="boxBowls" onchange="bowlCount()" class="col-5 ml-4"/>
                </div>
                <div class="row justify-content-center mt-2">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Bowls Eaten" data-content="Please enter the number of bowls already eaten">Bowls Eaten</a>
                    <input type="number" step="1" min="0" value="0" id="eatBowls" name="eatBowls" onchange="bowlCount()" class="col-5 ml-4"/>
                </div>
                <div class="row justify-content-center mt-2">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Total Bowls" data-content="Total Number of Bowls will be calculated">Total Bowls</a>
                    <input type="number" step="1" min="0" id="totBowls" name="totBowls" class="col-5 ml-4" disabled="disabled"/>
                    <input type="hidden" id="nTotBowls" name="nTotBowls" />
                </div>
                <div class="row justify-content-center mt-3">
                    <a tabindex="0" role="button" class="col-5 text-right heading" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="Remaining Bowls" data-content="Remaining bowls will be calculated">Remaining Bowls</a>
                    <input type="number" step="1" min="0" id="remBowls" name="remBowls" class="col-5 ml-4" disabled="disabled"/>
                    <input type="hidden" id="nRemBowls" name="nRemBowls" />
                </div>
                <hr />
                <div class="row justify-content-center mt-3">
                    <button type="submit" id="addCereal" name="addCereal" class="btn btn-primary mr-2">Save</button>
                    <a tabindex="0" role="button" onclick="addCancel()" id="addCancel" name="addCancel" class="btn btn-warning">Cancel</a>
                </div>
            </form>

            <?php 
                //Add an alert about why the add didn't work
                if(isset($_SESSION['addCerealFail'])) {
                    ?>            
                <script type="text/javascript">
                    var b = `<?php echo $_SESSION['addCerealFail']; ?>`;
                    alert(b);
                </script>
                <?php
                    unset($_SESSION['addCerealFail']);
                }
            ?>
                

                    


        </div>

        <!-- Include jQuery, Bootstrap, and popper libraries along with your js pages -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
    </body>
</html>