<!DOCTYPE html>
<html lang="en-US">
<head>
    <!--The website for Cherry's Carries Transport-->
    <meta charset="UTF-8" >

    <title>Cherry's Carries Transport</title>

    <!--Add in favicon-->
    <link href="../img/muscleLogo2.ico" type="image/x-icon" rel="icon" />

    <!--Stylesheets including Bootstrap and page-specific styling-->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/styles.css" type="text/css" rel="stylesheet" />

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital@1&display=swap" rel="stylesheet">

</head>
<body>
    <div class="jumbotron pb-0">
        <div class="container">
            <div class="row mb-4">
                <a href="#" class="text-center col-12"><img src="../img/truckLogo2.png" alt="Logo" class="img-fluid mx-auto rounded mainLogo" /> </a>
                <!-- <button id="menuBtn" class="navbar-toggler btn btn-success" type="button" data-toggle="collapse" data-target="#navBar">
                    <span class="navbar-toggler-icon"></span>
                </button>  -->
            </div>
            <nav id="navBar" class="navbar">
                <a href="#" class="nav-link">Home</a>
                <a href="#quoteForm" class="nav-link">Quote</a>
                <a href="#service" class="nav-link">Services</a>
                <a href="./about.html" class="nav-link">About</a>
            </nav>
            
        </div>
    </div>


    <!--The entire page needs to be in a container div-->
    <div class="main container">

        <div class="row justify-content-center p-3 rounded aboutMain">
            <h1 class="col-12 text-center mx-auto pb-2 mb-4">Cherry’s Carries Transport</h1>
            <div id="picMain" class="col-12 col-md-5 align-self-center mb-5">
                <img src="../img/truckMagnet.jpg" alt="Truck with Magnet Image" id="truckM" class="img-fluid mx-auto rounded" />
            </div>
            <div id="paraMain" class="col col-md-10 align-self-center">
                <p id="sAbout">
                    Born from the need to transport streetcars from the shop to the track and back, 
                    Cherry’s Carries Transport delivers!
                </p>
            </div>
        <!--End aboutMain div-->
        </div>

        <div id="service" class="row rounded pt-5 pb-5 services">
            <h1 class="col-12 pb-2 text-center mx-auto servicesHeader">Services</h1>
            <div class="col">
                <div id="servicesCarousel" class="carousel slide mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#servicesCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#servicesCarousel" data-slide-to="1"></li>
                      <li data-target="#servicesCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-toggle="modal" data-target="#scModal">
                          <h2>Service Centers</h2>
                          <p>*Click image for more information*</p>
                        <img class="d-block w-100 rounded-circle mx-auto" src="../img/carLoad.jpg" alt="Service Center Slide">
                      </div>
                      <div class="carousel-item" data-toggle="modal" data-target="#rModal">
                          <h2>Racing</h2>
                          <p>*Click image for more information*</p>
                        <img class="d-block w-100 rounded-circle mx-auto" src="../img/muscleLogo2.png" alt="Racing Slide">
                      </div>
                      <div class="carousel-item" data-toggle="modal" data-target="#mModal">
                          <h2>Moving</h2>
                          <p>*Click image for more information*</p>
                        <img class="d-block w-100 rounded-circle mx-auto" src="../img/truckLogo2.png" alt="Moving Slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#servicesCarousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#servicesCarousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>

            <!--Add modal info: Service Centers (sc), Racing (r), Moving (m)-->
            <div class="modal fade" id="scModal" tabindex="-1" role="dialog" aria-labelledby="scModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="scModalTitle">Service Centers</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="scModalBody">
                                Your vehicle can be collected from a Service Center, Auction, or Car Lot and delivered to 
                                your desired destination. Your satisfaction is our number one priority; therefore, we will 
                                deliver your automobile on the date of your choosing. Whether that is to another Service 
                                Center, Auction, or Car Lot, it all depends on you!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="rModal" tabindex="-1" role="dialog" aria-labelledby="rModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="rModalTitle">Racing</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="rModalBody">
                                Do you need to get your baby to the track or to a race event? This is our specialty! We 
                                are into streetcars and know how complicated getting to an event can be. We will come to 
                                you and ensure that your investment makes it to its destination and back if that is your 
                                desire. Just let us know what you need and we’ll guarantee that you get it!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mModal" tabindex="-1" role="dialog" aria-labelledby="mModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mModalTitle">Moving</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="mModalBody">
                                You can trust us to make your move easier. Cherry’s Carries Transport will do the 
                                “heavy lifting” to ensure your vehicle/vehicles are properly relocated to their 
                                new home. We make your move simpler by providing you with phenomenal service at a 
                                reasonable price.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        <!--End services div-->
        </div>

        <div id="quoteForm" class="row px-2 pt-5 bg-light rounded">
            <h1 class="col-12 text-center mx-auto pb-2 quoteHeader">Quote</h1>
            <form method="POST" action="./validation.php">
                <fieldset id="location" class="row justify-content-around">
                    <h2 class="col-12 mt-3">Where do you want to send it? </h2>
                    <label for="from" class="col-12">From: </label>
                    <input type="text" id="fromCity" name="from" value="City" class="col-5 mx-2 mb-2" />
                    <input type="text" id="fromState" name="from" value="State" class="col-5 mx-2 mb-2" />
                    
                    <label for="to" class="col-12">To: </label>
                    <input type="text" id="toCity" name="to" value="City" class="col-5 mx-2 mb-2" />
                    <input type="text" id="toState" name="to" value="State" class="col-5 mx-2 mb-2" />
                </fieldset>
                <fieldset id="vehicleInfo" class="row justify-content-around">
                    <h2 class="col-12 mt-3">Vehicle Info: </h2>
                    <div class="row my-2">
                        <h4 class="mr-3">Condition: </h4>
                        <input type="radio" id="oper" name="running" value="Operable" class="mt-2" />
                        <label for="oper" class="ml-1 mr-3 px-3 text-success bg-dark font-weight-bold">Operable</label>
                        <input type="radio" id="inop" name="running" value="Inoperable" class="mt-2" />  
                        <label for="inop" class="ml-1 mr-3 px-3 text-warning bg-secondary font-weight-bold">Inoperable</label>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <label for="year" class="neg">Year: </label>
                        <input type="text" id="year" name="year" value="Year" class="col-2 col-md-1 pr-1 mt-4" />
                        <label for="make" class="neg">Make: </label>
                        <input type="text" id="make" name="make" value="Make" class="col-3 pr-1 mt-4" />
                        <label for="model" class="neg">Model: </label>
                        <input type="text" id="model" name="model" value="Model" class="col-3 pr-1 mt-4" />
                    </div>
                                      
                </fieldset>
                <fieldset id="move">
                    <div class="row justify-content-center">
                        <h2 class="col-12 mt-4 pb-2">When do you want it there?</h2>
                        <label for="delivery" class="pr-2">Delivery Date: </label>
                        <input type="date" id="delivery" name="delivery" value="mm/dd/yyyy" class="text-center" />
                    </div>
                </fieldset>
                <fieldset id="contactInfo">
                    <h2 class="col-12 mt-4">How do we contact you?</h2>
                    <div class="row">
                        <label for="name" class="px-2 ml-2 col-12">Name: </label>
                        <input type="text" id="name" name="name" value="Your Name" class="col-10 offset-1" />
                        <label for="email" class="px-2 ml-2 col-12">Email: </label>
                        <input type="email" id="email" name="email" value="Your Email" class="col-10 offset-1" />
                        <label for="num" class="px-2 ml-2 col-12">Phone: </label>
                        <input type="tel" id="num" name="num" value="Your Digits" class="col-10 offset-1" />
                    </div>
                </fieldset>
                <fieldset id="submission">
                    <div class="row justify-content-center my-5">
                        <button type="reset" class="mr-4 btn btn-warning rounded">Reset</button>
                        <button type="submit" class="px-2 btn btn-success">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="row justify-content-center pt-4 infoBox">
            <a href="#" class="col-12 text-center mt-4 mb-5"><img src="../img/truckLogo2.png" alt="Logo" class="img-fluid mx-auto rounded infoLogo" /> </a>
            
            <!--Embedded Google Map for the service area-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3340381.762553641!2d-82.10398507474933!3d35.15433710145509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88541fc4fc381a81%3A0xad3f30f5e922ae19!2sNorth%20Carolina!5e0!3m2!1sen!2sus!4v1612206581162!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="mb-5 rounded"></iframe>

            <h3 class="col-12 text-center mb-3">Hauling up and down the East Coast!</h3>
            <div class="col-12 text-center mb-3">
                <h3 class="col-12 text-center">Charlotte, NC</h3>
                <p class="col-12 text-center">Mon-Sun: 10am - 10pm</p>
            </div>
            <a href="#quoteForm" class="btn btn-info mb-3 mt-1 contactBtn" >Get a Quote!</a>
            <div class="col-12 my-3 text-center social">
                <!--Link to Facebook page-->
                <a target="_blank" href="https://www.facebook.com/CherrysCarries/">
                    <img src="../img/fb.svg" alt="Facebook Link" /></a>
                <!--Link to Yelp reviews-->
                <a target="_blank" href="https://www.yelp.com/biz/cherrys-carries-transport-charlotte">
                    <img src="../img/yelp.svg" alt="Yelp Link" /></a>
                <!--Link to Instagram page-->
                <a target="_blank" href="https://www.instagram.com/cherryscarries/">
                    <img src="../img/ig.svg" alt="Instagram Link" /></a>

                <!--End of social div-->
            </div>
            <div class="col-12 text-center copyright">
                <p> Copyright &#169; <script>document.write(new Date().getFullYear())</script> Cherry's Carries Transport <br />
                    All rights reserved.
                </p>
            </div>
        <!--End infoBox div-->
        </div>


        
        <nav id="footerBar" class="navbar mt-5">
            <a href="#" class="nav-link">Home</a>
            <a href="#quoteForm" class="nav-link">Quote</a>
            <a href="#service" class="nav-link">Services</a>
            <a href="./about.html" class="nav-link">About</a>
        </nav>





    <!--End main div-->
    </div>




    <!--Script tags for the Bootstrap functionality, fontawesome, and jQuery usage.-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="../node_modules/fontawesome/index.js"></script>

    <script src="../js/index.js"></script>
</body>


</html>
