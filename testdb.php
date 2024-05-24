<?php

require_once './classes/Database.php';

try {
    $db = new Database();
    echo "Connessione al database riuscita!";
} catch (Exception $e) {
    echo "Errore di connessione: " . $e->getMessage();
}

?>