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
        <form method="post" action="../Controller/Register.php">
            <div class="form-group column">
                <label for="staticEmail" class=" col-form-label">FirstName</label>
                <div class="col-sm-10">
                    <input type="text" name="firstname" class="form-control" placeholder="First Name">
                    <?php
                    if (isset($errors['firstname'])) {
                        $errorFirstname = $errors['firstname'];
                        echo "<p style='color: red'>$errorFirstname</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group column">
                <label for="staticEmail" class="col-form-label">LastName</label>
                <div class="col-sm-10">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                    <?php
                    if (isset($errors['firstname'])) {
                        $errorFirstname = $errors['firstname'];
                        echo "<p style='color: red'>$errorFirstname</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group column">
                <label for="staticEmail" class="col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image">
                    <?php
                    if (isset($errors['image'])) {
                        $errorImage = $errors['image'];
                        echo "<p style='color: red'>$errorImage</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group column">
                <label for="staticEmail" class="col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="staticEmail" placeholder="E-mail">
                    <?php
                    if (isset($errors['email'])) {
                        $errorEmail = $errors['email'];
                        echo "<p style='color: red'>$errorEmail</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group column">
                <label for="inputPassword" class="col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword"
                           placeholder="Password">
                    <?php
                    if (isset($errors['password'])) {
                        $errorPassword = $errors['password'];
                        echo "<p style='color: red'>$errorPassword</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group column">
                <label for="floatingPasswordConfirm" class="col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="passwordConfirm" class="form-control" id="floatingPasswordConfirm"
                           placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="loginPage.php">Sign in</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>