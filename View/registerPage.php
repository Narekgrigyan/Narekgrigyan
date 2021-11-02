<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text">
</head>
<body>

<div class="container">
    <div>
        <h2>Register</h2>
    </div>
    <div class="column col-3">
        <form method="post" action="register">
            <div class="form-group column">
                <label for="staticEmail" class=" col-form-label">FirstName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" placeholder="First Name">
                </div>
            </div>
            <div class="form-group column">
                <label for="staticEmail" class="col-form-label">LastName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group column">
                <label for="staticEmail" class="col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" placeholder="E-mail">
                </div>
            </div>
            <div class="form-group column">
                <label for="inputPassword" class="col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group column">
                <label for="floatingPasswordConfirm" class="col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="floatingPasswordConfirm"
                           placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="loginPage.php">Sign in</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>