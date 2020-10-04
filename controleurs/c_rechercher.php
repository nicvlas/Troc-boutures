<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'demanderMdp':
    {
        $_SESSION['sessionAnnonceAModif'] = $_REQUEST['id'];
        include('vues/mdp.php');
        break;
    }
    case 'verifMdp':
    {
        $mdp = $_REQUEST['mdp'];
        break;
    }
    case 'afficherTab':
    {
        $lesAnnonces = $pdo->getLesAnnonces();
        include('vues/tab.php');
        break;
    }

    case 'supprOuModif':
    {
        $_SESSION['sessionAnnonceAModif'] = $_REQUEST['id'];
        echo $_SESSION['sessionAnnonceAModif'];
        $infos = $pdo->getInfos($_SESSION['sessionAnnonceAModif']);
        include('vues/formsupprmodif.php');
        break;
    }

    case 'formModifOuSuppr':
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
        
        // vérification du numéro
        $tel = checkNumberEmpty($tel);

        if(checkNumber($tel))
        {
            $pdo->updateAnnonce($_SESSION['sessionAnnonceAModif'], $name, $details, $recherche, $cp, $ville, $pseudo, $tel, $mail, $envoi);
            $message = "Annonce modifiée avec succès.";
            include('vues/messageaction.php');
            $lesAnnonces = $pdo->getLesAnnonces();
            include('vues/tab.php');
        }
        else
        {
            $message = "Numéro de téléphone erroné.";
            include('vues/messageaction.php');

            $infos = $pdo->getInfos($_SESSION['sessionAnnonceAModif']);
            include('vues/formsupprmodif.php');
        }
        break;
    }
}
?>