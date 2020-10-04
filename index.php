<html>
    <!--<h2>Troc de boutures - bienvenue</h2>-->
    <head>
    <title>Troc boutures</title>
    <?php
    session_start();
    require('modele/classPdo.php');
    require('modele/entete.php');
    require('vues/choice.php');
    ?>
    </head>
    <body>
    dfgdfgf
        <?php
            if(!isset($_REQUEST['uc']))
            $uc = 'accueil';
            else
            $uc = $_REQUEST['uc'];

            // Création instance pour accéder à la BDD
            $pdo = PdoTroc::getPdoTroc();	 

            switch($uc)
            {
                case 'index':
                {
                    include('index.php');
                    break;
                }
                case 'rechercher':
                {
                    include('controleurs/c_rechercher.php');
                    break;
                }
                case 'poster':
                {
                    include('controleurs/c_post.php');
                    break;
                }
            }
        ?>
        <?php include('vues/footer.php');?>
    </body>
</html>

