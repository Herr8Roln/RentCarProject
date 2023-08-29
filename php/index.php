<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //afficher une chaine
    #afficher une chaine
    /* commentaire
    sur plusieurs
    lignes */
    echo "<h1>bonjour</h1>";

define('TVA',19);
echo TVA;

define('COEFS',[2,3,1,4]);
print_r(COEFS);

echo "<br>";
$x=5;
define('X',10);

//Porté GLOBALS
function test(){
    
    echo "la variable x contient ".$GLOBALS['x'];
}

test();

//porté LOCALE
function mytest(){
    $y=8;
    echo "la variable x contient ".$y;
}
mytest();

echo $y;

//Porté STATIC

function increment(){
    static $i=0;
    $i++;
    echo $i;
}
increment();
increment();
increment();

echo "<br>";

//isset & empty
$a="bonjour";
if(isset($a))
echo "la variable a existe";
else
echo "la variable est introuvable";



if(empty($a))
echo "la variable est vide";
else
echo "la variable n'est pas vide";
    ?>
</body>
</html>