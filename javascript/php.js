function switchToCreate() {
    $("#login-form").css("display", "none");
    $("#register-form").css("display", "flex");
}

function switchToLogin() {
    $("#login-form").css("display", "flex");
    $("#register-form").css("display", "none");
}

// function to display account activation
function accountActivated(email) {
    $("#login-form").css("display", "none");

    // display account activation message
    document.getElementById("successful-form-activation").style.display = 'block'

    // login
    $.ajax({
        type: "POST",
        url: 'action_login_activation.php',
        data: {
            email: email
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            document.getElementById("user-details-activation").innerText = jsonData.first_name + ' ' + jsonData.last_name
        }
    });
}

// function to log the user in
function loginClick() {
    let email = document.getElementById("email-login").value
    let password = document.getElementById("password-login").value

    $.ajax({
        type: "POST",
        url: 'action_login.php',
        data: {
            email: email,
            password: password
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData)

            // clear inputs
            document.getElementById("email-login").value = ""
            document.getElementById("password-login").value = ""

            if (jsonData.success) {
                // user details
                document.getElementById("user-details").innerText = jsonData.first_name + ' ' + jsonData.last_name

                // enabling check
                document.getElementById("fail-form-login").style.display = 'none';
                document.getElementById("successful-form-login").style.display = 'block'
                $("#login-form").css("display", "none");
            }
            else {
                // set fail
                document.getElementById("fail-form-login").style.display = 'block';
                document.getElementById("successful-form-login").style.display = 'none';
            }
        }
    });
}

// function to sign the user up
function signUpClick() {
    let first_name = document.getElementById("first-name-signup").value
    let last_name = document.getElementById("last-name-signup").value
    let email = document.getElementById("email-signup").value
    let password = document.getElementById("password-signup").value

    if (first_name != '' ||
        last_name != '' ||
        email != '' ||
        password != ''
    ) {
        $.ajax({
            type: "POST",
            url: 'action_signup.php',
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password
            },
            success: function (response) {
                var jsonData = JSON.parse(response);
                console.log(jsonData)

                // clear inputs
                document.getElementById("first-name-signup").value = ""
                document.getElementById("last-name-signup").value = ""
                document.getElementById("email-signup").value = ""
                document.getElementById("password-signup").value = ""

                if (jsonData.success) {
                    // enabling check
                    document.getElementById("fail-form-signup").style.display = 'none';
                    document.getElementById("successful-form-signup").style.display = 'block'
                    $("#register-form").css("display", "none");
                }
                else {
                    // set fail
                    document.getElementById("fail-form-signup").style.display = 'block';
                    document.getElementById("successful-form-signup").style.display = 'none';
                    document.getElementById("failure-text").innerText = "Email is already taken."
                }
            }
        });
    }
    else {
        document.getElementById("fail-form-signup").style.display = 'block';
        document.getElementById("failure-text").innerText = "All fields are required."
    }
}