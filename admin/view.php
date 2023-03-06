<?php
    require 'database.php';/*pour pouvoir me connecter à ma base de donées*/
    
    if(!empty($_GET['id']))/* en faisant if "!" ce signe signifie "not" empty = vide *//*J'ai ensuite envie de récupérer l'id */
    {
        $id=checkInput($_GET['id']);
    } 

    $db = Database::connect();

    $statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, categories.name AS category 
    FROM items LEFT JOIN categories on items.category = categories.id
    WHERE items.id = ?');

    $statement->execute(array($id));







    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>