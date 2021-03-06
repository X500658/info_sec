<?php include 'backend.php';
if(isset($_SESSION['logged in'])){
    header('location: index.php');
}?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "style.css" />
<body class="container bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand title text-white" href="./index.php"><?php echo $title?></a>
    </nav>
    <div class="row justify-content-around mt-5">
        <div class="col-5 bg-success text-white mb-6">
            <h2 class="text-center my-3">Sign Up</h2>
            <form method="POST" action=<?php echo $_SERVER['PHP_SELF']?>>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn l-green" name="signup">Sign Up</button>
                    <?php if(isset($_SESSION['error']))
                            echo "<span class=\"text-danger font-weight-bold\">".$_SESSION['error']."</span>";
                    ?>  
                </div>
            </form>
        </div>
        <div class="col-5 bg-success text-white">
            <h2 class="text-center mt-3">Log In</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn l-green" name="login">Log In</button>
                    <?php if(isset($_SESSION['login error'])){
                            echo "<span class=\"text-danger font-weight-bold\">".$_SESSION['login error']."</span>";
                            // unset($_SESSION["error"]);
                        }
                    ?>  
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>
