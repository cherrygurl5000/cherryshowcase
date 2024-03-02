//Function for retrieving the name and ensuring it is filled
function getName() {
  var name = document.getElementById('name');
  var nLabel = document.getElementById('nameLabel');

  requiredContent(name, nLabel, "Name");

  return name.value;

}

//Function for retrieving the email and ensuring it is filled
function getEmail() {
  var email = document.getElementById('email');
  var eLabel = document.getElementById('emailLabel');
  var emailExp = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

  requiredContent(email, eLabel, "Email");

  if(emailExp.test(email.value)) {
    eLabel.style.color = "#212529";
    email.style.border = "darkslategray solid 1px";
    return email.value;
  }
  else if (email.value === "") {
      return;
  }
  else {
    eLabel.style.color = "red";
    email.style.border = "red solid 2px";
    alert("Invalid email address!");
    return;
  }
  
  
}

//Function for retrieving the phone number and ensuring it is filled
function getNumber() {
  var phone = document.getElementById('phone');
  var pLabel = document.getElementById('phones');
  var phoneExp = /\d{3}-\d{3}-\d{4}/;

  requiredContent(phone, pLabel, "Phone Number");

  if(phoneExp.test(phone.value)) {
    pLabel.style.color = "#212529";
    phone.style.border = "darkslategray solid 1px";
    return phone.value;
  }
  else if (phone.value === "") {
      return;
  }
  else {
    pLabel.style.color = "red";
    phone.style.border = "red solid 2px";
    alert("Invalid Phone Number!");
    return;
  }
  
}

//Retrieve the reason and ensure at least 1 has been chosen
function getReason() {
  var checks = document.querySelectorAll('input[type="checkbox"]:checked').length;
  var reason = document.getElementById("reason");
  var i = 0;
  var reasons = "";

  if(checks < 1) {
    reason.style.color = "red";
    alert('Requires a Reason!');
    return;
  }
  else {
    reason.style.color = "#212529";
  }

  /*Go through the checkmarks to set the Subject Line*/
  while (i < checks) {
    if(document.getElementById("detail").checked === true) {
      reasons+="Mobile Auto Detailing, ";
      i++;
    }
    if(document.getElementById("inside").checked === true) {
      reasons+="Interior/Exterior Detailing, ";
      i++;
    }
    if(document.getElementById("correct").checked === true) {
      reasons+="Paint Correction, ";
      i++;
    }
    if(document.getElementById("schedule").checked === true) {
      reasons+="Scheduling, ";
      i++;
    }
    if(document.getElementById("other").checked === true) {
      reasons+="Other ";
      i++;
    }
  }

  return reasons;
  
}


//Check and change the color of the unresolved issue
function requiredContent(content, textColor, box) {
    if (content.value === "") {
      textColor.style.color = "red";
      content.style.border = "red solid 2px";
      alert(box + " is required!");
      return;
    }
    else {
      textColor.style.color = "#212529";
      content.style.border = "darkslategray solid 1px";
    }
}

//Function for building the mail message
function mailing() {
  
  var reasons;
  var msg;
  var name = "Name: ";
  var email ="Email: ";
  var phone = "Phone Number: ";
  var message = "Message: ";
  
  name += getName() + " \n\n";
  email += getEmail() + " \n\n";
  phone += getNumber() + " \n\n";
  reasons = getReason();
  msg = document.getElementById('message').value;
  
  message += msg;

  if(grecaptcha.getResponse() == "") {
    alert("Image Verification is required!");
    return;
  }

  console.log(name+email+phone+message);

  /*Set the email to open in a new window with all information included from the form*/
  /*window.open("mailto:cdlcauto@gmail.com?subject="+reasons+"&body=Name:%20"+name+
  "%3C%2Fbr%3E %3C%2Fbr%3E"+"Email:%20"+email+"%3C%2Fbr%3E %3C%2Fbr%3E Phone:%20"+phone+
  "%3C%2Fbr%3E %3C%2Fbr%3E Message:%20"+message);*/
  window.open("mailto:cdlcauto@gmail.com?subject="+reasons+"&body="+name+email+phone+message);

  return;

}