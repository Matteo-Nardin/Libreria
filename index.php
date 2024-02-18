<?php
    require_once 'config.php';
    include_once('functions.php');
    
    [$result,$all_pages, $all_record] = getBooks($mysqli);
    //print_r ($all_pages);
    //print_r($result);
    //$_SERVER['DOCUMENT_ROOT']
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
    <?php include_once('navBar.php'); ?>
    <div class="container">
    <p>Risultati: <?= $all_record ?> in <?= $all_pages ?> pagine</p>
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

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                if(isset($_GET["n_page"]) && $_GET["n_page"] > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?n_page=1">Inizio</a></li>
                <?php }else{ ?>
                    <li class="page-item disabled"><a class="page-link" href="">Inizio</a></li>
                <?php } ?>

                <?php
                if(isset($_GET["n_page"]) && $_GET["n_page"] > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?n_page=<?= $_GET["n_page"]-1 ?>">Precedente</a></li>
                <?php }else{ ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Precedente</a></li>
                <?php } ?>

                <?php for($i=1; $i<=$all_pages; $i++) { ?>
                    <!-- ogni volta che clicco con href aggiorno la pagina stessa e richiamo getBooks() -->
                    <li class="page-item"><a class="page-link<?= preg_match("/n_page=$i/i", uri() ) ? " active" : "" ?>" href="?n_page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>

                <?php
                if(!isset($_GET["n_page"])) { ?>
                    <li class="page-item"><a class="page-link" href="?n_page=2">Successivo</a></li>
                <?php }else if($_GET["n_page"] >= $all_pages){ ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Sucessivo</a></li>
                <?php }else{ ?>
                    <li class="page-item"><a class="page-link" href="?n_page=<?= $_GET["n_page"]+1 ?>">Sucessivo</a></li>
                <?php } ?>

                <?php
                if(!isset($_GET["n_page"])) { ?>
                    <li class="page-item"><a class="page-link" href="?n_page=<?= $_GET["n_page"]=$all_pages ?>">Fine</a></li>
                <?php }else if($_GET["n_page"] >= $all_pages){ ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Fine</a></li>
                <?php }else{ ?>
                    <li class="page-item"><a class="page-link" href="?n_page=<?= $_GET["n_page"]=$all_pages ?>">Fine</a></li>
                <?php } ?>
                
            </ul>
        </nav>

    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>