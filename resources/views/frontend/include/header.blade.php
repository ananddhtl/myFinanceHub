<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myFinanceHub</title>
    <link rel="stylesheet" href="{{asset('frontend/resources/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
.error-message {
    color: red;
    display: block;
    font-size: 15px;
    text-align: center;


}

.login-register {
    position: relative;
}

.menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #ffffff;
    border: 1px solid #ccc;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

/* Updated CSS styles for the menu */
.menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #ffffff;
    border: 1px solid #ccc;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
    width: 200px;
    /* Adjust width as needed */
    padding: 10px;
    border-radius: 5px;
    font-family: Arial, sans-serif;
}

.menu ul {
    list-style: none;
    padding: 0;
}

.menu li {
    margin: 5px 0;
}

.menu a {
    color: #333;
    text-decoration: none;
    display: block;
    padding: 5px;
    transition: background-color 0.3s ease;
}

.menu a:hover {
    background-color: #f0f0f0;
}

/* Updated styles for user profile */
.user-profile {
    position: relative;
    cursor: pointer;
    display: inline-block;
}

.user-profile:hover+.menu,
.menu:hover {
    display: block;
}
</style>
<?php
if (session()->has('sessionUserId')) {
    $userId = session()->get('sessionUserId');
    $user = \DB::table('clients')
        ->select('*')
        ->where('id', $userId)
        ->first();

}
?>

<body>

    <!--Modal PopUp-->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="loginForm">
                <h2>Login</h2>
                <form action="{{ url('/user-login') }}" method="POST">
                    @csrf
                    <div class="login-input">

                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="">Enter Username :</label>
                            </div>

                            <input type="text" name="useremail" placeholder="Enter Your Username">
                        </div>
                        <div class="inp-cont" style="margin-bottom: 20px;">
                            <div class="label-container">
                                <label for="">Your Password :</label>
                            </div>

                            <input type="password" name="userpassword" placeholder="Enter Your Password">
                        </div>

                        <a href="{{ url('/login/google') }}"><button type="button" class="login-with-google-btn">
                                Sign in with Google
                            </button></a>
                        <!-- <div class="inp-cont">
                    <div class="label-container">
                        <label for="">Login As :</label>
                    </div>

                    <select name="" id="">
                        <option value="0">Login As</option>
                        <option value="1">Hospital</option>
                        <option value="1">Reteller</option>
                        <option value="1">User</option>
                    </select>
                </div> -->
                        <a href="">Forget Your Password?</a>
                        <button class="modal-button">Login <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="registerForm">
                <h2>Register </h2>
                <form id="registration-form" action="{{url('/registerUser')}}" method="POST">
                    @csrf
                    <div class="login-input">
                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="">Enter Your Full Name :</label>
                            </div>
                            <input type="text" name="fullname" id="fullname" placeholder="Enter Your Username">
                            <span class="error-message" id="fullname-error"></span>
                        </div>
                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="email">Enter Your Email :</label>
                            </div>
                            <input type="email" name="email" id="email" placeholder="Enter Your Email">
                            <span class="error-message" id="email-error"></span> <!-- Add error message container -->
                        </div>
                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="mobile_number">Enter Mobile Number :</label>
                            </div>
                            <input type="number" name="mobile_number" id="mobile_number"
                                placeholder="Enter Your Number">
                            <span class="error-message" id="mobile-number-error"></span>

                        </div>
                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="">Enter Password :</label>
                            </div>

                            <input type="password" name="password" id="password" placeholder="Enter Password">
                            <span class="error-message" id="password-error"></span>
                        </div>
                        <div class="inp-cont">
                            <div class="label-container">
                                <label for="">Confirm Your Password :</label>
                            </div>

                            <input type="password" id="confirm_password" placeholder="Confirm Password">
                            <span class="error-message" id="confirm-password-error"></span>
                        </div>

                        <button class="modal-button">Register <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---Modal Popup Ends-->
    <!----Logo Navbar Starts Here-->
    <div class="nav-sticky">
        <div class="container">
            <div class="logo-navabar">
                <div class="logo">
                    <img src="{{asset('frontend/resources/images/logo.png')}}" alt="">
                </div>
                @if(session()->has('sessionUserId'))
                <!-- User is logged in -->
                <div class="login-register">
                    <div class="user-profile">
                        <i class="bi bi-person-circle"></i>
                        <div class="join-us">
                            <p id="username">{{ $user->fullname }}</p>
                        </div>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="/userdashboard"><i class="ph-bold ph-user"></i>&nbsp;Dashboard</a></li>
                            <li><a href="/logout-user"><i class="ph-bold ph-envelope-simple"></i>&nbsp;Logout</a></li>
                        </ul>
                    </div>
                </div>

                @else
                <div class="login-register">
                    <div class="join-us" id="registerBtn">
                        <p>JOIN US</p>

                    </div>

                    <div class="login-button" id="loginBtn">
                        <button class="log-button">Login</button>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>


    <script>
    document.getElementById('registration-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email').value;
        var mobilenumber = document.getElementById('mobile_number').value;
        var password = document.getElementById('password').value;
        var confirmpassword = document.getElementById('confirm_password').value;
        var hasError = false;

        // Clear previous error messages and border colors
        document.getElementById('fullname').style.borderColor = '';
        document.getElementById('email').style.borderColor = '';
        document.getElementById('mobile_number').style.borderColor = '';
        document.getElementById('password').style.borderColor = '';
        document.getElementById('confirm_password').style.borderColor = '';

        // Clear previous error message texts
        document.getElementById('fullname-error').textContent = '';
        document.getElementById('email-error').textContent = '';
        document.getElementById('mobile-number-error').textContent = '';
        document.getElementById('password-error').textContent = '';
        document.getElementById('confirm-password-error').textContent = '';

        if (fullname.trim() === '') {
            document.getElementById('fullname').style.borderColor = 'red';
            document.getElementById('fullname-error').textContent = 'Full name is required';
            hasError = true;
        }
        if (email.trim() === '') {
            document.getElementById('email').style.borderColor = 'red';
            document.getElementById('email-error').textContent = 'Email is required';
            hasError = true;
        }
        if (mobilenumber.trim() === '') {
            document.getElementById('mobile_number').style.borderColor = 'red';
            document.getElementById('mobile-number-error').textContent = 'Mobile number is required';
            hasError = true;
        }
        if (password.trim() === '') {
            document.getElementById('password').style.borderColor = 'red';
            document.getElementById('password-error').textContent = 'Password is required';
            hasError = true;
        }
        if (confirmpassword.trim() === '') {
            document.getElementById('confirm_password').style.borderColor = 'red';
            document.getElementById('confirm-password-error').textContent = 'Confirm password is required';
            hasError = true;
        }
        if (password !== confirmpassword) {
            document.getElementById('password').style.borderColor = 'red';
            document.getElementById('confirm_password').style.borderColor = 'red';
            document.getElementById('password-error').textContent = 'Passwords do not match';
            document.getElementById('confirm-password-error').textContent = 'Password do not match';
            hasError = true;
        }

        if (hasError) {
            return;
        }

        // Serialize the form data
        var formData = new FormData(this);

        // Send the data using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', this.action, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    if (!response.status) {
                        alert(response.message); // Display error message in an alert
                    } else {
                        alert('this is the message');
                        window.location.href = '/otpcode'; // Redirect to the OTP page
                    }
                } else {
                    // Handle errors
                }
            }
        };
        xhr.send(formData);
    });
    document.addEventListener("click", function(event) {
        const menu = document.querySelector(".menu");
        const userProfile = document.querySelector(".user-profile");

        if (menu.style.display === "block" && !userProfile.contains(event.target) && !menu.contains(event
                .target)) {
            menu.style.display = "none";
        }
    });
    </script>