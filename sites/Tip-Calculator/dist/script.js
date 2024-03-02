//Sets the initial values for aesthetics
var percent = document.getElementById("slideValue");
percent.innerHTML = 20;

var portion = document.getElementById("yourPortion");
portion.innerHTML = 0;

var tip = document.getElementById("tipAmount");
tip.innerHTML = 0;

var total = document.getElementById("totalAmount");
total.innerHTML = 0;

function gratuity() {
  //Set the value of the slider as it changes
  var slider = document.getElementById("myRange").value;
  percent.innerHTML = slider;
  
  //
  var tBill = document.getElementById("totalBill").value;
  var people = document.getElementById("Npeople").value;
    
  if(people > 0) {
    portion.innerHTML = (tBill/people).toFixed(2);
    tip.innerHTML = ((slider/100)*tBill/people).toFixed(2);
    total.innerHTML = ((slider/100)*tBill/people+tBill/people).toFixed(2);
  }
  else {
    portion.innerHTML = (tBill/1).toFixed(2);
    tip.innerHTML = ((slider/100)*tBill).toFixed(2);
    total.innerHTML = ((slider/100)*tBill+tBill/1).toFixed(2);
  }
  
  
}