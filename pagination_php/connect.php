<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=pagination_php', 'root', '');
  $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
 echo 'Erreur :'. $e->getMessage();
 die();
}
?>
