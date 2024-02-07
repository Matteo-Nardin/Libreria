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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">

        <form method="post" action="gestione.php" enctype="multipart/form-data" class="my-3">
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
                    <button type="submit" class="btn btn-dark">Aggiungi Libro</button>
                </div>
            </div>
        </form>

        <div class="my-3">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Anno di Pubblicazione</th>
                        <th scope="col">Genere</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($result){
                    foreach ($result as $key => $record) { 
                    ?>
                        <tr>
                            <th scope="row"><?= $key+1 ?></th>
                            <th scope="row"><?= $record["id"]?></th>
                            <td><?= $record["titolo"] ?></td>
                            <td><?= $record["autore"] ?></td>
                            <td><?= $record["anno_pubblicazione"] ?></td>
                            <td><?= $record["genere"] ?></td>
                            <td>
                                <a class="btn btn-danger" href="gestione.php?action=delete&id=<?= $record['id'] ?>" role="button"><i class="bi bi-fire"></i></a>
                                <a class="btn btn-warning" href="detail.php?id=<?= $record['id'] ?>" role="button"><i class="bi bi-feather"></i></a>
                            </td>
                        </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>