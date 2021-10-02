<?php include 'backend.php';
persistentLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "style.css" />
<body class="container bg-dark">
<nav class="navbar navbar-expand-lg navbar-light bg-success circ spacer">
    <a class="navbar-brand title text-white" href="./index.php"><?php echo $title?></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> 
                <!-- FSR I need this for actual navbar to be at the right hahaah -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown acct">
                    <a class="nav-link dropdown-toggle black " href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="black title"><?php cookieU()?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user/<?php echo $_COOKIE['u']?>">View
                            Account</a>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <button type="submit" class="dropdown-item" name="logout">Log Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row justify-content-around mt-5  bg-success">
        <h1 class="w-100 text-center"><?php cookieU()?></h1>
        <div class="row m-3">
            <div class="col-6">
                <img class="w-100" src="nonchan.jpg">
            </div>
            <div class="col-6">
                <ol>
                    <li>The queries are not hard coded but instead prepared statements are used.</li><br>
                    <li>No magic/hidden inputs were used but instead the UUID is stored in a cookie named "u", named in such a way to prevent it from being recognized by people</li><br>
                    <li>Local storage wasn't used.</li>
                </ol>
            </div>
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