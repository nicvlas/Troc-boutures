<div class="tabpages">
<form action="index.php?uc=rechercher&action=formModifOuSuppr" method="POST">
        <table class="formannonce">
        <h5 class="center">Modifier ou supprimer votre annonce <i>(* : champ obligatoire)</i></h5>
        <?php $date = date('d/m/Y');?>

        <?php
            foreach($infos as $info){
        ?>
            <tr>
                <td>Nom de la plante *</td>
                <td><input type="text" class="form-control" name="name" value="<?php echo $info['libelle']; ?>" maxlength="200" required></td>
            </tr>
            <tr>
                <td>Détails *</td>
                <td><div id="app">
                    <div class="text-container">
                    <div class="border-top"></div>
                        <textarea class="form-control" name="details" placeholder="Taille, nombre de feuilles, enracinement, etc." rows="3" maxlength="200" v-model="description" @keyup="checkLength" required><?php echo $info['details']; ?></textarea>                    </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Je recherche *</td>
                <td><div id="app2">
                    <div class="text-container">
                        <textarea class="form-control" name="recherche" placeholder="Contre quelle(s) plante(s) voulez-vous troquer cette bouture ?" rows="3" maxlength="255" v-model="recherche" @keyup="checkLength" required><?php echo $info['recherche']; ?></textarea>
                    </div>
                    </div>
                </td>
            
            
            </tr>
            <tr>
                <td>Code postal *</td>
                <td><input type="text" name="cp" value="<?php echo $info['cp']; ?>" class="form-control" maxlength="5" required></input></td>
            </tr>
            <tr>
                <td>Ville *</td>
                <td><input type="text" name="ville" value="<?php echo $info['ville']; ?>" class="form-control" maxlength="200" required></td>
            </tr>
            <tr>
                <td>Pseudo *</td>
                <td><input type="text" name="pseudo" value="<?php echo $info['pseudo']; ?>" class="form-control" maxlength="20" required></td>
            </tr>
            <tr>
                <td>Téléphone</td>
                <td><input type="text" name="tel" value="<?php echo $info['tel']; ?>" class="form-control" maxlength="10"></td>
            </tr>
            <tr>
                <td>Mail *</td>
                <td><input type="email" name="mail" value="<?php echo $info['mail']; ?>" class="form-control" maxlength="50" required></td>
            </tr>
            <tr>
                <td>Envoi postal *</td>
                <td><input type="radio" name="envoi" value="Oui" checked> Oui <input type="radio" name="envoi" value="Non"> Non</td>
            </tr>
        </table>
        
        <input type='hidden' name='date' value='<?php echo "$date";?>'/>

        <?php
            }
        ?>
        <br>
        <a href="index.php?uc=poster&action=modifierAnnonce"><p class="center"><input type="submit" value="Modifier"></p></a>
        <a href="index.php?uc=poster&action=supprimerAnnonce"><p class="center"><input type="submit" class="btn btn-danger" value="Supprimer"></p></a>
    </form>
</div>