<?php

    require_once "config.php";
    include_once('functions.php');
    echo "ciao";
    if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
        deleteBook($mysqli, $_REQUEST['id']);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    }else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'modify'){
        $title = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) >= 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $author = strlen(trim(htmlspecialchars($_REQUEST['autore']))) >= 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
        $publish_year =  is_numeric(trim(htmlspecialchars($_REQUEST['anno_pubblicazione']))) && $_REQUEST['anno_pubblicazione'] <= 2024 ? htmlspecialchars($_REQUEST['anno_pubblicazione']) : exit();
        $genres = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();
        
        modifyBook($mysqli, $_REQUEST['id'], $title, $author, $publish_year, $genres);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    }else{
        $title = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) >= 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $author = strlen(trim(htmlspecialchars($_REQUEST['autore']))) >= 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
        $publish_year =  is_numeric(trim(htmlspecialchars($_REQUEST['anno_pubblicazione']))) && $_REQUEST['anno_pubblicazione'] <= 2024 ? htmlspecialchars($_REQUEST['anno_pubblicazione']) : exit();
        $genres = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();

        addBook($mysqli, $title, $author, $publish_year, $genres);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    }
    echo "ciao";
?>