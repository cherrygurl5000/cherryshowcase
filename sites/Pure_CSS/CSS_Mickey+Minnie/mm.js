function clicked() {
  /*document.getElementById("Bow").style.visibility = "visible";
  document.getElementById("lpupil").className = "pupil2";
  document.getElementById("rpupil").className = "pupil2";*/
  
  var bow = document.getElementById("Bow");
  var lpupil = document.getElementById("lpupil");
  var rpupil = document.getElementById("rpupil");
  var click = document.getElementById("click");
  if(bow.style.visibility === "hidden") {
    bow.style.visibility = "visible";
    lpupil.className ="pupil2";
    rpupil.className ="pupil2";
    click.innerHTML ="Click Minnie";
    
  }
  else {
    bow.style.visibility = "hidden";
    lpupil.className ="pupil";
    rpupil.className ="pupil";
    click.innerHTML = "Click Mickey";
  }
    return;
  
}