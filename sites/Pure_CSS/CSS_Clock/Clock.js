function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    //Add variable to ensure the 24-hour format is preserved
    var bh = today.getHours();
    //Ensure that the hours are in the 12-hour format
    var ch = checkHours(h);
    h = checkTime(ch);
    m = checkTime(m);
    s = checkTime(s);
    //Test version of the time
   /* document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;*/
    var t = setTimeout(startTime, 500);
   document.getElementById('hours').innerHTML = h;
  document.getElementById('minutes').innerHTML = m;
  var b = setB(bh);
  document.getElementById('meridiem').innerHTML = b;
  
}

//Add zero in front of numbers < 10
function checkTime(i) {
    if (i < 10) {
      i = "0" + i;
    }  
    return i;
}

//Keep the hours in the 12-hour format
function checkHours(j) {
  if (j > 12) {
    j = j - 12;
  }
  return j;
}

//Set AM/PM
function setB(b) {
  if (b < 12) {
    b = 'AM';
  }
  else {
    b = 'PM';
  }
  return b;
}

startTime();