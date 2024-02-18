<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include_once('navBar.php'); ?>
    <div class="container">

        <form method="post" action="gestione.php?action=register" enctype="multipart/form-data" class="my-3">
            <div class="row g-3">
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="user name..." name="user_name">
                </div>
                <div class="col-sm">
                    <input type="email" class="form-control" placeholder="email..." name="email">
                </div>
                <div class="col-sm">
                    <input type="password" class="form-control" placeholder="password..." name="password">
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-dark">Register</button>
                </div>
            </div>
        </form>
        <div>
            <p>Se gia un nostro utente? <a href="login.php">Login</a></p>
        </div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>