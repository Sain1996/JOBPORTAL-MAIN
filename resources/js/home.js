
document.addEventListener("DOMContentLoaded", function () {
      var loginSignupLink = document.getElementById("login-signup-link");
    var allowedUsers = ["user1", "user2", "user3"];

    loginSignupLink.addEventListener("click", function () {
        var username = prompt("Enter your username:");
        if (allowedUsers.includes(username)) {
            alert("Login successful!");
            // Redirect or perform other actions after successful login
        } else {
            alert("Invalid username. Access denied.");
        }
    });
});
