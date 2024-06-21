<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=shorlink", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}