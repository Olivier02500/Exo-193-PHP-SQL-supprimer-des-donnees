<?php

/**
 * 1. Importez la table user dans une base de données que vous aurez créée au préalable via PhpMyAdmin
 * 2. En utilisant l'objet de connexion qui a déjà été défini =>
 *    --> Remplacez les informations de connexion ( nom de la base et vérifiez les paramètres d'accès ).
 *    --> Supprimez le dernier utilisateur de la liste, faites une capture d'écran dans PhpMyAdmin pour me montrer que vous avez supprimé l'entrée et pushez la avec votre code.
 *    --> Faites un truncate de la base de données, les auto incréments présents seront remis à 0
 *    --> Insérez un nouvel utilisateur dans la table ( faites un screenshot et ajoutez le au repo )
 *    --> Finalement, vous décidez de supprimer complètement la table
 *    --> Et pour finir, comme vous n'avez plus de table dans la base de données, vous décidez de supprimer aussi la base de données.
 */

require __DIR__ . "/Classes/DB.php";

$name = 'Didier';
$fname = 'Machin';
$rue = 'rue de nul pars';
$num = 12;
$code = 75690;
$ville = 'nice';
$pays = 'france';
$mail = 'didierM@machin.fr';

try {
    $pdo = new DB();
    $request = $pdo->getInstance();

    $sql=$request->prepare( "
    INSERT INTO user (nom ,prenom ,rue ,numero , code_postal ,ville ,pays ,mail)
    VALUES (:nom ,:prenom ,:rue ,:numero ,:codepostal ,:ville ,:pays ,:mail)
    ");

    $sql ->bindParam(':nom' ,$name);
    $sql ->bindParam(':prenom' ,$fname);
    $sql ->bindParam(':rue' ,$rue);
    $sql ->bindParam(':numero' ,$num, PDO::PARAM_INT);
    $sql ->bindParam(':codepostal' ,$code, PDO::PARAM_INT);
    $sql ->bindParam(':ville' ,$ville);
    $sql ->bindParam(':pays' ,$pays);
    $sql ->bindParam(':mail' ,$mail);




    $sql->execute();
        echo "un new user a était ajouter ";

}

catch (PDOException $e){
    echo $e->getMessage();
}