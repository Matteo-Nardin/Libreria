<?php
    require_once 'config.php';
    include_once('functions.php');

    $result = getBooks($mysqli)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">

        <form method="post" action="gestione.php?action=modify&id=<?=$_GET['id']?>" enctype="multipart/form-data" class="my-3">
            <div class="row g-3">
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="titolo..." name="titolo">
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="autore..." name="autore">
                </div>
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="anno..." name="anno_pubblicazione">
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="genere..." name="genere">
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-dark">Modifica Libro</button>
                </div>
            </div>
        </form>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>