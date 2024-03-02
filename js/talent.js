/*Check input on Name and Email*/
function validate() {
  var name = document.getElementById("nameField").value;
  var email = document.getElementById("emailField").value;

  if (name.length > 1) {
    if (
      email.value != "^([a-zA-Z0-9_-.]+)@([a-zA-Z0-9_-.]+).([a-zA-Z]{2,5})$"
    ) {
      alert("Please fill in the email field.");
    } else {
      mail();
    }
  } else {
    alert("Please fill in the name field.");
  }
}

/*Check recaptcha function*/
function recap() {
  if (grecaptcha && grecaptcha.getResponse().length > 0) {
    mail();
  } else {
    //The recaptcha is not cheched
    //Display an error message
    alert("You have to check the recaptcha!");
  }
}

/*Function for sending contact email */
function mail() {
  var name = document.getElementById("nameField").value;
  var comp = document.getElementById("compField").value;
  var email = document.getElementById("emailField").value;
  var phone = document.getElementById("phoneField").value;
  var message = document.getElementById("msgField").value;

  /*Set the email to open in a new window with all information included from the form*/
  window.open(
    "mailto:levelupsess@gmail.com?subject=Contact%20Inquiry&body=Name:%20" +
      name +
      "%0D%0A" +
      "%0D%0A" +
      "Company:%20" +
      comp +
      "%0D%0A" +
      "%0D%0A" +
      "Email:%20" +
      email +
      "%0D%0A" +
      "%0D%0A" +
      "Phone:%20" +
      phone +
      "%0D%0A" +
      "%0D%0A" +
      "Message:%20" +
      message
  );
}


$(document).ready(function () {
  $("body").on("click", ".cmod", function () {
    $(this.id).modal("show");

    //appending modal background inside the block div
    $(".modal-backdrop").appendTo(".block");

    //remove the padding right and modal-open class from the body tag which bootstrap adds when a modal is shown
    $("body").removeClass("modal-open");
    $("body").css("padding-right", "");
  });
});

//$(".container").before("HELLO");
