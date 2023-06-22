function validateInput() {
    var input = document.getElementById("myInput").value;

    var hasNumber = /[0-9]/.test(input);
    var hasLowercase = /[a-z]/.test(input);
    var hasUppercase = /[A-Z]/.test(input);
    var hasSpecialChar = /[!@#$%^&*]/.test(input);

    var errorMessage = document.getElementById("errorMessage");
    var submitButton = document.getElementById("submitButton");

    if (input.length < 8) {
        submitButton.disabled = true;
      } else if (input.length === 8) {
        if (hasNumber && hasLowercase && hasUppercase && hasSpecialChar) {
          errorMessage.style.display = "none";
          submitButton.disabled = false;
        } else {
          errorMessage.style.display = "block";
          submitButton.disabled = true;
        }
      } else {
        submitButton.disabled = true;
      }
}

function validateForm() {

    var hasNumber = document.getElementById("myInput").value.match(/[0-9]/);
    var hasLowercase = document.getElementById("myInput").value.match(/[a-z]/);
    var hasUppercase = document.getElementById("myInput").value.match(/[A-Z]/);
    var hasSpecialChar = document.getElementById("myInput").value.match(/[!@#$%^&*]/);

    if (!(hasNumber && hasLowercase && hasUppercase && hasSpecialChar)) {
        var errorMessage = document.getElementById("errorMessage");
        errorMessage.style.display = "block";
        return false;
    }
    return true;
}

var inputs = document.getElementById("nombre");
inputs.addEventListener("input", function (event) {
    var text = event.target.value;
    event.target.value = text.toUpperCase();
});

inputs.addEventListener("keydown", function(event){
    if(event.keyCode >= 48 && event.keyCode <= 57){
        event.preventDefault();
    }
});


var inputs = document.getElementById("apellido");
inputs.addEventListener("input", function (event) {
    var text = event.target.value;
    event.target.value = text.toUpperCase();
});

inputs.addEventListener("keydown", function(event){
    if(event.keyCode >= 48 && event.keyCode <= 57){
        event.preventDefault();
    }
});