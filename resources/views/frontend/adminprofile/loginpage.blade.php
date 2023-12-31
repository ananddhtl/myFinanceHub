<style>
body {
    padding-top: 4.2rem;
    padding-bottom: 4.2rem;
    background: rgba(0, 0, 0, 0.76);
}

a {
    text-decoration: none !important;
}

h1,
h2,
h3 {
    font-family: cursive;
}

.myform {
    position: relative;
    /*  (1): Browser compatibility  */
    display: -ms-flexbox;
    display: flex;
    padding: 1rem;
    flex-direction: column;
    -ms-flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    /*   (2): Background-area */
    background-clip: padding-box;
    border: 1px solid rbga(0, 0, 0, 0.2);
    border-radius: 1.1rem;
    outline: 0;
    max-width: 500px;
}

.tx-tfm {
    text-transform: uppercase;
}

.mybtn {
    /*   (3): 50px for bootstrap buttons when you have btn-block */
    border-radius: 50px;
}

.login-or {
    /*   (4): So we can create -or- */
    position: relative;
    color: #aaa;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
}

.hr-or {
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
}

.google {
    color: #666;
    width: 100%;
    height: 40px;
    text-align: center;
    outline: none;
    border: 1px solid lightgrey;
}

form .error {
    color: #ff00000;
}

#register {
    display: none;
}

form>.form-group>input {
    background: rgb(230, 212, 206);
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="login">
                <div class="myform form">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Login</h1>
                        </div>
                    </div>
                    <!--     (1) GIVE NAME TO FORM     -->
                    <form action="" method="post" name="login">
                        <div class="form-group">
                            <!--     (2) form-group/label/aria-describedby for each input and name to inputs         -->
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">
                                Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control"
                                aria-describedby="emailHelp" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <p class="text-center">
                                By signing up you accept our <a href="#" target="_blank">
                                    Terms Of Use</a>
                            </p>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-block mybtn btn-primary tx-tfm py-2">
                                Login
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">or</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p class="text-center">
                                <a href="javascript:void();" class="google btn mybtn">
                                    <i class="fa fa-google-plus"></i>
                                    Signup using Google
                                </a>
                            </p>
                        </div>
                        <div class="form-group">
                            <p class="text-center">
                                Don't have account? <a href="#" id="signup">
                                    Sign up here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!--     REGISTER PAGE -->
            <div id="register">
                <!--       (3) Same claases, so it has the same as login -->
                <div class="myform form">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Signup</h1>
                        </div>
                    </div>
                    <form action="#" name="registration">
                        <div class="form-group">
                            <label for="exampleInputEmail">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname"
                                aria-describedby="emailHelp" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname"
                                aria-describedby="emailHelp" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                aria-describedby="emailHelp" placeholder="Enter password">
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <!--             (5) type="submit" -->
                            <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm py-2">
                                Get started for free
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <p class="text-center">
                                    <a href="#" id="signin">
                                        Already have an account?
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    let signup = document.querySelector("#signup");

    signup.addEventListener("click", function() {

        document.querySelector("#login").style.display = "none";
        document.querySelector("#register").style.display = "block";

    });


    let signin = document.querySelector("#signin");

    signin.addEventListener("click", function() {

        document.querySelector("#register").style.display = "none";
        document.querySelector("#login").style.display = "block";

    })
    </script>