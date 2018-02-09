$(document).ready(function() {
$("#submit").click(function() {
var name = $("#name").val();
var roll_no = $("#roll_no").val();
var class=$("#class").val();
var password = $("#password").val();
var password1 = $("#password1").val();
if (name == '' || roll_no == '' || password == '' || password1 == '' || class=='') {
alert("Please fill all fields...!!!!!!");
} else if ((password.length) < 8) {
alert("Password should atleast 8 character in length...!!!!!!");
} else if (!(password).match(password1)) {
alert("Your passwords don't match. Try again?");
} else {
$.post("register.php", {
name: name,
roll_no: roll_no,
password: password,
password1:password,
class: class,
}, function(data) {
if (data == 'You have Successfully Registered.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});
