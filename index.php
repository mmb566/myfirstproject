<?php
    $woord = "Mustafa";
    $db = new DBhandler();
    $db->findwoord($woord);
    
        class DBhandler {
            //put your code here.
            public function findwoord($woord) {
                //instellen van PDO.
                $options = [
                    PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => FALSE,
                ];
            }
        }
        
    //connect met de database
$adres = '127.0.0.1';
$charset = 'utf8mb4';
$database = 'palindroom';
$user = 'root';
$password = '';

$host = "mysql:host=$adres;dbname=$database;cherset=$charset";

$sql = "SELECT * FROM palindromen WHERE woord='".$woord."';";
try {
    $conn = new PDO ($host, $user, $password);
    $stmt = $conn->query($sql);
    
    //ophalen van gegevens over de uitgevoerde code.
    if ($stmt->rowCount() == 1) {
        echo 'woord gevonden';
    } else {
        echo 'woord niet gevonden';
    }
}

catch (PDOException $e) {
    echo "jou tekst" . $e->getMessage()."(".$e->getCode().").";
    }

?>
