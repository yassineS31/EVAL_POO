<?php
/**
 * function for clean data
 *@param string $data
 *@return string data cleaning
*/
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

/**
 * Create a PDO object for connexion
 *@return PDO objet of database connexion
*/
    function connect() {
        try {
            return new PDO(
                "mysql:host=localhost;dbname=supergame;port=3307",
                "root",
                "123",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

