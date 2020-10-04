<?php

class PdoTroc
{
    private static $monPdo;
    private static $monPdoTroc = null;

    /**
     * Instance sollicitée par toutes les fonctions de la classe
     * */ 
    private function __construct()
    {
        try
        {
            PdoTroc::$monPdo = new PDO('mysql:host=127.0.0.1;dbname=trocboutures;charset=utf8', 'root', '');
            PdoTroc::$monPdo->query("SET CHARACTER SET utf-8");
            //echo 'ok';
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

    }
    public function _destruct(){
        PdoTroc::$monPdo = null;
    }

    /**
     * Crée l'unique instance de la classe
     */
    public static function getPdoTroc()
    {
        if (PdoTroc::$monPdoTroc == null)
        {
            PdoTroc::$monPdoTroc = new PdoTroc();
        }
        return PdoTroc::$monPdoTroc;
    }

    public function ajouterAnnonce($name, $details, $recherche, $cp, $ville, $pseudo, $tel, $mail, $envoi, $mdp, $date)
    {
        $sql = "INSERT INTO annonce (libelle, details, recherche, cp, ville, pseudo, tel, mail, envoi, date, mdp) VALUES('$name', '$details', '$recherche', '$cp', '$ville', '$pseudo', '$tel', '$mail', '$envoi', '$date', '$mdp')";
        $res = PdoTroc::$monPdo->exec($sql) or die ('erreur');
    }

    public function getLesAnnonces()
    {
        $sql = "SELECT id, libelle, details, recherche, cp, ville, pseudo, tel, mail, envoi, date FROM annonce";
        $res = PdoTroc::$monPdo->query($sql);
        $lesAnnonces = $res->fetchAll();
        return $lesAnnonces;

    }

    public function supprimerAnnonce($id)
    {
        $sql = "DELETE FROM annonce
                WHERE id = $id";
        $res = PdoTroc::$monPdo->exec($sql) or die ('Erreur de mot de passe');
    }

    public function getInfos($id)
    {
        $sql = "SELECT *
                FROM annonce
                WHERE id = '$id'";
        $res = PdoTroc::$monPdo->query($sql);
        $infosAnnonce = $res->fetchAll();
        return $infosAnnonce;
    }

    public function updateAnnonce($id, $name, $details, $recherche, $cp, $ville, $pseudo, $tel, $mail, $envoi)
    {
        $sql = "UPDATE annonce
                SET libelle='$name', details='$details', recherche='$recherche', cp='$cp', ville='$ville', pseudo='$pseudo', tel='$tel', mail='$mail', envoi='$envoi'
                WHERE id = '$id'";
        echo $sql;
        $req = PdoTroc::$monPdo->exec($sql);
    }
}

?>