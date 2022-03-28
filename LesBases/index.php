<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
  <div>coucou</div>
</body>
</html>
<?php

$integer = 100; //entier (integer)
$float= 100.5; // FLOAT
$string= "variable string"; // STRING
$booleanVar = true && false; // boolean



echo $integer * $float;
echo "<br/>";
echo "$string";
echo "<br/>";


// CONCATENATION D4UNE VARIABLE
$direBonjour = "Hello";
$destination = "World";

echo $direBonjour." ".$destination ;

//  LES TABLEAUX

$identite = array (
  "id"      => 5,
  "prenom"  => "teddy",
  "nom"     => "williot",
  "age"     => 21,
);

echo "<br/>";

echo $identite["prenom"];
echo "<br/>";


// CONDITION SI


if($identite >= 18) {
  echo $identite["prenom"]." "."vous etes majeur";
} else {
  echo $identite["prenom"].' '."vous etes mineur";
};

echo "<br/>";


$pseudo = "teddy";
$mdp = "TeddyWilliot";

if ($pseudo == "teddy" || $mdp == "TeddyWilliot") {
  echo "mot de passe valide";
}
echo "<br/>";


// LES CONDITIONS TERNAIRES
$number = 10;

echo ($number % 10 == 0) ? "true" : "false";

echo "<br/>";

echo ($identite["age"] >= 18) ? "vous etes majeur " : "vous etes mineur";

echo "<br/>";


// LES CONDITIONS DANS LES CONDITION

$age = 14;

if($age > 18) {
  echo "vous etes majeur";

} elseif ($age == 18) {
  echo "vous etes enfin majeur";
} elseif ($age <= 0) {
  echo "ce n'est pas possible";
} else {
  echo "vous etes mineur";
}

//  LA BOUCLE  WHILE

$ligne = 0;

while ($ligne < 10) {
  echo "voici le numero de la ligne : $ligne <br/>";
  $ligne++;
}


// BOUCLE FOR

for ($i=0; $i < 10; $i++) {
  echo "Voici le numero de la ligne :  ".($i +1)." <br/>";
}


// BOUCLE FOREACH

$variable = array(
"nom" => "Teddy",
"prenom" => "Williot",
"age" => 21,
);

foreach ($variable as $key) {
  echo "$key";
}

// BOUCLE DO, WHILE
$x =  0;

do {
  echo "Le nombre est egale a ".$x."<br/> ";
  $x++;
} while ($x < 10);

// LES FONCTIONS 
// 
