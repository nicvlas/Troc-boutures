<?php

function isANumber($var)
{
    return preg_match("/[^0-9]/", $var) == 0;
}

function isVide($var)
{
    return empty($var);
}

/**
 * Vérifie si le numéro est bien vide
 * @param Numéro de téléphone
 * @return Numéro de téléphone ou chaîne "Non renseigné"
 */
function checkNumberEmpty($tel)
{
    if ($tel == null)
    {
        $tel = "Non renseigné";
    }

    return $tel;
}

/**
 * Vérifie si le numéro de téléphone est soit vide (donc "Non renseigné") soit un nombre
 */
function checkNumber($tel)
{
    $result = false;

    if($tel == "Non renseigné" || isANumber($tel))
    {
        $result = true;
    }

    return $result;
}

?>