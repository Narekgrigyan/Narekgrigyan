<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div>
        <h2>Login</h2>
    </div>
    <div class="row">
        <form method="post" action="../Controller/Login.php">
            <div class="form-group column">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="staticEmail" placeholder="E-mail">
                </div>
            </div>
            <div class="form-group column">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="col-sm-5">
                <button  type="submit" class="btn btn-success" name="log_user">Login</button>
            </div>
            <p>
                Are you yet do not registered? <a href="registerPage.php">Sign up</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
