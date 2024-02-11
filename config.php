<?php
    $config = [
        "mysql_host" => "localhost",
        "mysql_user" => "root",
        "mysql_password" => "",
        
];

  // file di config.php
    $mysqli = new mysqli(
        $config["mysql_host"],
        $config["mysql_user"],
        $config["mysql_password"],
    );

     //se c'è un errore blocca la connessione e stampa l'errore
    if($mysqli->connect_error){
        die($mysqli->connect_error);
    }else{
        //var_dump($mysqli);
    }
    // creo il DB
    $sql = "CREATE DATABASE IF NOT EXISTS gestione_libreria";
    $mysqli->query($sql);

    //se la query non va a buon fine
    if(!$mysqli->query($sql)){
        die( $mysqli->connect_error);
    }

    // seleziono il DB
    $sql = "USE gestione_libreria;";
    $mysqli->query($sql);

    //creo una tabella
    $sql = 'CREATE TABLE IF NOT EXISTS libri( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titolo VARCHAR(255) NOT NULL,
        autore VARCHAR(255) NOT NULL,
        anno_pubblicazione INT NOT NULL,
        genere VARCHAR(255) NOT NULL
        -- FOREIGN KEY autore REFERENCES autori(id_autore)
    )';

    if(!$mysqli->query($sql)){
        die( $mysqli->connect_error);
    };

    // $sql = 'CREATE TABLE IF NOT EXISTS autori( 
    //     -- CONSTRAINT FK_autore FOREIGN KEY (id)
    //     id_autore INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //     nome VARCHAR(255) NOT NULL,
    //     cognome VARCHAR(255) NOT NULL,
    //     nascita DATE NOT NULL,
    //     nazione VARCHAR(255) NOT NULL
    // )';

    // if(!$mysqli->query($sql)){
    //     die( $mysqli->connect_error);
    // };
?>