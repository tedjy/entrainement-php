<?php
// on determine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])) {
  $currentPage = (int) strip_tags($_GET['page']);
} else {
  $currentPage = 1;
}

// on se connecte a la base
require_once('connect.php');


// on determine le nombre totale d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`';



// on prepare la requete
$query = $db->prepare($sql);

// ici on execute
$query->execute();

// on recupere le nombres d'articles
$result = $query->fetch();
$nbArticles = (int) $result['nb_articles'];

// on detemrine le nombre d'article par pages
$parPage = 7;
//  on calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT :premier, :parPage;';

// on prepare la requete
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parPage', $parPage, PDO::PARAM_INT);


// ici on execute
$query->execute();

// on recupere les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <main class="container">
     <div class="row">
       <section class="col-12">
         <h1>liste des articles </h1>
         <table class="table">
           <thead>
             <th>ID</th>
             <th>Titre</th>
             <th>Date</th>
           </thead>
           <tbody>
             <?php
             foreach ($articles as $article) {
             ?>
             <tr>
               <td><?=$article['id']?></td>
               <td><?=$article['title']?></td>
               <td><?=$article['created_at']?></td>
             </tr>
             <?php
             }
             ?>
           </tbody>
         </table>
         <nav>
           <ul class="pagination">
             <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
               <a href="./?page<?= $currentPage - 1?>" class="page-link">precedente</a>
             </li>
             <?php
             for($page = 1; $page <= $pages; $page++) :
             ?>
             <li class="page-item">
               <a href="./?page=<?=$page?>" class="page-link"><?= $page?></a>
             </li>
           <?php endfor?>

             <li class="page-item">
               <a href="./?page=<?= $currentPage + 1?>" class="page-link">suivante</a>
             </li>
           </ul>
         </nav>

       </section>
     </div>
   </main>
</body>
</html>
