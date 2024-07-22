function confirmPassChange(newPassword_name, confirmPassword_name) {
  var newPassword = document.getElementsByName(newPassword_name)[0].value;
  var confirmPassword =
    document.getElementsByName(confirmPassword_name)[0].value;
  console.log(newPassword);
  console.log(confirmPassword);
  if (newPassword != confirmPassword) {
    console.log("password don't match");
    document.getElementById("text-warning").innerHTML = "password don't match";
    document.getElementById("Button").disabled = true;
  } else {
    document.getElementById("text-warning").innerHTML = "";
    document.getElementById("Button").disabled = false;
  }
}
