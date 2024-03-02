<?php 
    //Start the session for the data needed on the entire site
    session_start();

    //Create constants to save database info
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'u192034522_showcase');
    define('DB_PASSWORD', 'C3realTrack3r');
    define('DATABASE', 'u192034522_cerealTracker');
    define('CEREAL', 'cereals');

    define('SITE_URL', 'https://cherryshowcase.ml/sites/cerealTracker/');
    define('HOME', 'html/index.php');


    //Add a function to clean the input
    function processInput($input) {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
    }
?>