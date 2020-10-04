<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'afficherForm':
    {
        include('vues/formpost.php');
        break;
    }

    case 'posterAnnonce':
    {
        $name = $_POST['name'];
        $details = $_POST['details'];
        $recherche = $_REQUEST['recherche'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $pseudo = $_POST['pseudo'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $envoi = $_POST['envoi'];
        $mdp = $_POST['mdp']; //mdp non hashé
        $date = $_POST['date'];

        //hashage mdp
        $mdphash = password_hash($mdp, PASSWORD_BCRYPT);

        // vérification du numéro
        $tel = checkNumberEmpty($tel);

        if(checkNumber($tel))
        {
            $pdo->ajouterAnnonce($name, $details, $recherche, $cp, $ville, $pseudo, $tel, $mail, $envoi, $mdphash, $date);
            $message = "Annonce ajoutée ! À vos trocs !";
            include('vues/message.php');
            $lesAnnonces=$pdo->getLesAnnonces();
            include('vues/tab.php');
        }
        else
        {
            $message = "Numéro de téléphone erroné.";
            include('vues/message.php');
            include('vues/formpost.php');
        }
        break;
    }
}
?>