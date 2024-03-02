//window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;

//global variables used throughout the functions
var image = null;
var gImage = null;
var rImage = null;
var rbImage = null;
var blurImage = null;
var fImage = null;
var theCanvas = document.getElementById("canvas");

//Write function to upload multiple copies of the images used for the site
function uploadFile(){
  var uploaded = document.getElementById("imageFile");
  image = new SimpleImage(uploaded);
  gImage = new SimpleImage(uploaded);
  rImage = new SimpleImage(uploaded);
  rbImage = new SimpleImage(uploaded);
  blurImage = new SimpleImage(uploaded);
  fImage = new SimpleImage(uploaded);
  image.drawTo(theCanvas);
  return image;
}

//Ensure that the image has been uploaded
function checkUpload(uimage){
  if (uimage === null || !uimage.complete()) {
    alert('Image not uploaded');
  }
  return;
}

//Reset the canvas, clear the image
function resetCanvas(){
  var ctxt = theCanvas.getContext("2d");
  ctxt.clearRect(0, 0, image.width, image.height);
  var uploaded = document.getElementById("imageFile");
  uploaded.value = null;
  image = null;
  gImage = null;
  rImage = null;
  rbImage = null;
  blurImage = null;
  fImage = null;
  return;
}

//Reset the image back to the original uploaded image
function resetImage(){
  checkUpload(image);
  var uploaded = image;
  uploaded.drawTo(theCanvas);
  return uploaded;
}

//Write a function to add a red filter to the image and initiate in another function
function doRed(redImage) {
  for(var rpixel of redImage.values()) {
    var rRed = rpixel.getRed();
    var rGreen = rpixel.getGreen();
    var rBlue = rpixel.getBlue();
    
    var avg = (rRed + rGreen + rBlue)/3;
    
    if(avg < 128) {
      rpixel.setRed(2*avg);
      rpixel.setGreen(0);
      rpixel.setBlue(0);
    }
    
    else {
    rpixel.setRed(255);
    rpixel.setGreen(2*avg-255);
    rpixel.setBlue(2*avg-255);
    }
  }
  return redImage;
}

function redFilter(){
  checkUpload(rImage);
  var redImage = doRed(rImage);
  redImage.drawTo(theCanvas);
  return;
}

//Write a function to add a gray filter to the image and initiate in another function
function doGray(grayImage) {
  for(var gpixel of grayImage.values()) {
    var gRed = gpixel.getRed();
    var gGreen = gpixel.getGreen();
    var gBlue = gpixel.getBlue();
    
    var avg = (gRed + gGreen + gBlue)/3;
    gpixel.setRed(avg);
    gpixel.setGreen(avg);
    gpixel.setBlue(avg);
  }
  return grayImage;
}

function grayscale(){
  checkUpload(gImage);
  var grayImage = doGray(gImage);
  grayImage.drawTo(theCanvas);
  return;
}

//Write a function to add a rainbow filter to the image and initiate in another function
function doRainbow(rainbowImage) {
  for(var rbpixel of rainbowImage.values()) {
    var rbRed = rbpixel.getRed();
    var rbGreen = rbpixel.getGreen();
    var rbBlue = rbpixel.getBlue();
    var x = rbpixel.getX();
    var y = rbpixel.getY();      
    
    var avg = (rbRed + rbGreen + rbBlue)/3;
    
    //Make the first bar of the image red
    if (x < rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(2*avg);
          rbpixel.setGreen(0);
          rbpixel.setBlue(0);
    }
    
      else {
          rbpixel.setRed(255);
          rbpixel.setGreen(2*avg-255);
          rbpixel.setBlue(2*avg-255);
     }
    }
    
    //Make the second bar orange
    else if (x > rbImage.getWidth()/7 && x < 2*rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(2*avg);
          rbpixel.setGreen(0.8*avg);
          rbpixel.setBlue(0);
    }
    
      else {
          rbpixel.setRed(255);
          rbpixel.setGreen(1.2*avg-51);
          rbpixel.setBlue(2*avg-255);
     }
    }
    
    //Make the third bar yellow
    else if (x > 2*rbImage.getWidth()/7 && x < 3*rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(2*avg);
          rbpixel.setGreen(2*avg);
          rbpixel.setBlue(0);
    }
    
      else {
          rbpixel.setRed(255);
          rbpixel.setGreen(255);
          rbpixel.setBlue(2*avg-255);
     }
    }
    
    //Make the fourth bar green
    else if (x > 3*rbImage.getWidth()/7 && x < 4*rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(0);
          rbpixel.setGreen(2*avg);
          rbpixel.setBlue(0);
    }
    
      else {
          rbpixel.setRed(2*avg-255);
          rbpixel.setGreen(255);
          rbpixel.setBlue(2*avg-255);
     }
    }

    //Make the fifth bar blue
    else if (x > 4*rbImage.getWidth()/7 && x < 5*rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(0);
          rbpixel.setGreen(0);
          rbpixel.setBlue(2*avg);
    }
    
      else {
          rbpixel.setRed(2*avg-255);
          rbpixel.setGreen(2*avg-255);
          rbpixel.setBlue(255);
     }
    }

    //Make the sixth bar indigo
    else if (x > 5*rbImage.getWidth()/7 && x < 6*rbImage.getWidth()/7) {
      if(avg < 128) {
          rbpixel.setRed(0.8*avg);
          rbpixel.setGreen(0);
          rbpixel.setBlue(2*avg);
    }
    
      else {
          rbpixel.setRed(1.2*avg-51);
          rbpixel.setGreen(2*avg-255);
          rbpixel.setBlue(255);
     }
    }

    //Make the last bar violet
    else {
      if(avg < 128) {
          rbpixel.setRed(1.6*avg);
          rbpixel.setGreen(0);
          rbpixel.setBlue(1.6*avg);
    }
    
      else {
          rbpixel.setRed(0.4*avg+153);
          rbpixel.setGreen(2*avg-255);
          rbpixel.setBlue(0.4*avg+153);
     }
    }
  }
  return rainbowImage;
  
}

function rainbow(){
  checkUpload(rbImage);
  var rainbowImage = doRainbow(rbImage);
  rainbowImage.drawTo(theCanvas);
  return;  
}

//Write function to make the image blurred and initiate in another function
function doBlur(bImage) {
  var output = new SimpleImage(bImage.getWidth(), bImage.getHeight());

  for(var bpix of bImage.values()) {
    var rand = Math.random();
    var x = bpix.getX();
    var y = bpix.getY();
    var xnew;
    var ynew;
    var newpix;
    if(rand < 0.5) {
        output.setPixel(x, y, bpix);
    }
    else {
        var plus = Math.random();
        var xrand = Math.random()*20;
        var yrand = Math.random()*20;
        
        if(plus > 0.5) {
            xnew = x + xrand;
            ynew = y + yrand;
        }
        else {
            xnew = x - xrand;
            ynew = y - yrand;
        }
        
        if(xnew > 0 && xnew < bImage.getWidth()-1) {
            if(ynew > 0 && ynew < bImage.getHeight()-1) {
                newpix = bImage.getPixel(xnew, ynew);
                output.setPixel(x, y, newpix);
            }
            
            else if(ynew < 0) {
                newpix = bImage.getPixel(xnew, 0);
                output.setPixel(x, y, newpix);
            }
            
            else {
                newpix = bImage.getPixel(xnew, bImage.getHeight()-1);
                output.setPixel(x, y, newpix);
            }
        }
        else if (xnew < 0) {
            if (ynew > 0 && ynew < bImage.getHeight()-1) {
                newpix = bImage.getPixel(0, ynew);
                output.setPixel(x, y, newpix);
            }
            
            else if(ynew < 0) {
                newpix = bImage.getPixel(0, 0);
                output.setPixel(x, y, newpix);
            }
            
            else {
                newpix = bImage.getPixel(0, bImage.getHeight()-1);
                output.setPixel(x, y, newpix);
            }
        }
        else {
            if (ynew > 0 && ynew < bImage.getHeight()-1) {
                newpix = bImage.getPixel(bImage.getWidth()-1, ynew);
                output.setPixel(x, y, newpix);
            }
        
            else if(ynew < 0) {
                newpix = bImage.getPixel(bImage.getWidth()-1, 0);
                output.setPixel(x, y, newpix);
            }
            
            else {
                newpix = bImage.getPixel(bImage.getWidth()-1, bImage.getHeight()-1);
                output.setPixel(x, y, newpix);
             }
        }
    }
}
  return output;
}

function blurFilter(){
  checkUpload(blurImage);
  var bImage = doBlur(blurImage);
  bImage.drawTo(theCanvas);
  return;
}

//Write function to draw the fangs, then initiate the fangs in another function
function doTeeth(fangImage) {
    var ctx = theCanvas.getContext('2d');
    var w = theCanvas.width;
    var h = theCanvas.height;
   
    ctx.fillStyle = "#0a0f0f";

    //Top fangs
    ctx.beginPath();
    ctx.moveTo(0.235*w, 0);
    ctx.lineTo(0.32*w, 0.5*h);
    ctx.lineTo(0.4*w, 0);
    ctx.fill();
    
    ctx.beginPath();
    ctx.moveTo(0.62*w, 0);
    ctx.lineTo(0.71*w, 0.5*h);
    ctx.lineTo(0.79*w, 0);
    ctx.fill();
    
    //Bottom fangs
    ctx.beginPath();
    ctx.moveTo(0.3*w, h);
    ctx.lineTo(0.37*w, 0.6*h);
    ctx.lineTo(0.43*w, h);
    ctx.fill();
    
    ctx.beginPath();
    ctx.moveTo(0.61*w, h);
    ctx.lineTo(0.68*w, 0.6*h);
    ctx.lineTo(0.75*w, h);
    ctx.fill();
   
    //Teeth for the top of the filter
    ctx.fillRect(0, 0, 0.12*w, 0.2*h);
    ctx.fillRect(0.125*w, 0, 0.12*w, 0.2*h);
    ctx.fillRect(0.39*w, 0, 0.12*w, 0.2*h);
    ctx.fillRect(0.515*w, 0, 0.12*w, 0.2*h);
    ctx.fillRect(0.78*w, 0, 0.12*w, 0.2*h);
    ctx.fillRect(0.905*w, 0, 0.12*w, 0.2*h);
    //Teeth for the bottom of the filter
    ctx.fillRect(0, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.105*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.21*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.42*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.525*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.735*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.84*w, 0.8*h, 0.1*w, 0.2*h);
    ctx.fillRect(0.945*w, 0.8*h, 0.1*w, 0.2*h);
   
  //Sides of the mouth
    ctx.fillRect(0, 0, 0.04*w, h);
    ctx.fillRect(0.96*w, 0, 0.04*w, h);

    ctx.beginPath();
    ctx.moveTo(0.01*w, 0);
    ctx.bezierCurveTo(0.12*w, 0.23*h, 0.12*w, 0.375*h, 0.01*w, h);
    ctx.fill();
    
    ctx.beginPath();
    ctx.moveTo(0.99*w, 0);
    ctx.bezierCurveTo(0.88*w, 0.23*h, 0.88*w, 0.375*h, 0.99*w, h);
    ctx.fill();
 
  return;
  }

function teeth(){
  checkUpload(fImage);
  fImage.drawTo(theCanvas);
  var fangImage = doTeeth(fImage);
  fangImage.drawTo(theCanvas);
  return;  
}