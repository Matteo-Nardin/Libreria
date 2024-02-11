<?php

    // function getBooks($mysqli){
    //     //global $mysqli;
    //     $sql = 'SELECT * FROM libri'; 
    //     $res = $mysqli->query($sql); // array
    //     var_dump($res);
    //     $result = [];
    //     //controllo se ci sono dei dati nella variabile $res
    //     if($res){
    //         //var_dump($res);
    //         // di solito per iterare una tabella uso un while
    //         while($row = $res->fetch_assoc()){ //$res lo trasformo in un array associativo
    //             array_push($result, $row); // inserisco le righe in un array $result
    //         }
    //     };
    //     return $result;
    // };
    function getBooks($mysqli){
        //global $mysqli;
        $sql = "SELECT * FROM libri"; 
        $res = $mysqli->query($sql); // oggetto contenente: current_field, field_count, num_rows, type (accendo con la sintassi $res->num_rows)
        $all_record = $res->num_rows;
        $start = 0;
        $record_per_page = 1;
        $all_pages = ceil($all_record/$record_per_page);
        //echo $all_pages;
        //raccolgo il get generato dai tasti numerati per aggiornare il valore iniziale del LIMIT
        if(isset($_GET["n_page"])){
            $page = $_GET["n_page"]-1;
            $start = $page * $record_per_page;
            //echo $start;
        };

        $sql = "SELECT * FROM libri LIMIT $start , $record_per_page";
        $res = $mysqli->query($sql);
        $result = [];
        //controllo se ci sono dei dati nella variabile $res
        if($res){
            //var_dump($res);
            // di solito per iterare una tabella uso un while
            while($row = $res->fetch_assoc()){ //$res lo trasformo in un array associativo
                array_push($result, $row); // inserisco le righe in un array $result
            }
        };
        return [$result, $all_pages, $all_record];
    };

    function addBook($mysqli, $titolo, $autore, $anno_pubblicazione, $genere){
        //inserico dati nella tabella occhio che le stringe vanno tra apici i numeri no
        $sql = "INSERT INTO libri (titolo, autore , anno_pubblicazione, genere)VALUES ('$titolo', '$autore', $anno_pubblicazione, '$genere' );";
        //per inserire i dati
        if(!$mysqli->query($sql)){
            echo ($mysqli->connect_error);
        }else{
            echo "record aggiunto con successo";
        }
    }

    function deleteBook($mysqli, $id) {
        if(!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) { echo($mysqli->connect_error); }
        else { echo 'Record eliminato con successo';}
    }

    function modifyBook($mysqli, $id, $titolo, $autore, $anno_pubblicazione, $genere) {
        $sql = "UPDATE libri SET titolo = '" . $titolo . "' , autore = '" . $autore. "', anno_pubblicazione = '" . $anno_pubblicazione. "', genere = '" . $genere. "' WHERE id = " . $id;
            if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
            else { echo 'Record aggiornato con successo!!!';}
    }

    function singleBook($mysqli) {     
        $sql = "SELECT * FROM libri WHERE id = " . $_GET['id']; 
        $res = $mysqli->query($sql);
        if($res) { 
            $result = $res->fetch_assoc();
        }
        return $result;
    }
    //usato sulla navbar per l'hightlight delle pagine
    function uri(){
        $uri = $_SERVER['REQUEST_URI'];
        return $uri;
    }

?>
