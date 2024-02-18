<?php

    require_once "config.php";
    include_once('functions.php');

    
    session_start();
    if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'login') {
        echo 'Sono nella sezione login';
        login($mysqli, $_REQUEST['email'], $_REQUEST['password']);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    } else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
        echo 'Sono nella sezione logout';
        session_unset();
        exit(header('Location: http://localhost/IFOA/libreria/login.php'));
    }

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
    }else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'register'){
        
        $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
        preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
        $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
        preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);

        $user_name = strlen(trim(htmlspecialchars($_REQUEST['user_name']))) > 2 ? trim(htmlspecialchars($_REQUEST['user_name'])) : exit();
        $email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();
        $pass = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();
        $hash_password = password_hash($pass , PASSWORD_DEFAULT);

        register($mysqli, $user_name, $email, $hash_password);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    }else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'addBook'){
        $title = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) >= 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $author = strlen(trim(htmlspecialchars($_REQUEST['autore']))) >= 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
        $publish_year =  is_numeric(trim(htmlspecialchars($_REQUEST['anno_pubblicazione']))) && $_REQUEST['anno_pubblicazione'] <= 2024 ? htmlspecialchars($_REQUEST['anno_pubblicazione']) : exit();
        $genres = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();

        addBook($mysqli, $title, $author, $publish_year, $genres);
        exit(header('Location: http://localhost/IFOA/libreria/index.php'));
    }
    echo "ciao";
?>