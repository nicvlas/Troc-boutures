<div class="tabpages">
    <form action="index.php?uc=poster&action=posterAnnonce" method="POST">
        <table class="formannonce">
        <h5 class="center">Poster une annonce <i>(* : champ obligatoire)</i></h5>
        <?php $date = date('d/m/Y');?>
            <tr>
                <td>Nom de la plante *</td>
                <td><input type="text" class="form-control" name="name" maxlength="200" required></td>
            </tr>
            <tr>
                <td>Détails *</td>
                <td><div id="app">
                    <div class="text-container">
                    <div class="border-top"></div>
                        <textarea class="form-control" name="details" placeholder="Taille, nombre de feuilles, enracinement, etc." rows="3" maxlength="200" v-model="description" @keyup="checkLength" required></textarea>
                    <span>{{ dLength }} / 200</span>
                    </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Je recherche *</td>
                <td><div id="app2">
                    <div class="text-container">
                    <div class="border-top"></div>
                        <textarea class="form-control" name="recherche" placeholder="Contre quelle(s) plante(s) voulez-vous troquer cette bouture ?" rows="3" maxlength="255" v-model="recherche" @keyup="checkLength" required></textarea>
                    <span>{{ dLength }} / 255</span>
                    </div>
                    </div>
                </td>
            
            
            </tr>
            <tr>
                <td>Code postal *</td>
                <td><input type="text" name="cp" class="form-control" maxlength="5" required></input></td>
            </tr>
            <tr>
                <td>Ville *</td>
                <td><input type="text" name="ville" class="form-control" maxlength="200" required></td>
            </tr>
            <tr>
                <td>Pseudo *</td>
                <td><input type="text" name="pseudo" class="form-control" maxlength="20" required></td>
            </tr>
            <tr>
                <td>Téléphone</td>
                <td><input type="text" name="tel" class="form-control" maxlength="10"></td>
            </tr>
            <tr>
                <td>Mail *</td>
                <td><input type="email" name="mail" class="form-control" maxlength="50" required></td>
            </tr>
            <tr>
                <td>Envoi postal *</td>
                <td><input type="radio" name="envoi" value="Oui" checked> Oui <input type="radio" name="envoi" value="Non"> Non</td>
            </tr>
            <tr>
                <td>Mot de passe (pour pouvoir supprimer l'annonce,<br> gardez le précieusement) *</td>
                <td><input type="password" name="mdp" class="form-control" maxlength="50" required></td>
            </tr>
        </table>
        
        <input type='hidden' name='date' value='<?php echo "$date";?>'/>

        <p class="center"><input type="submit" value="Troquer !"></p>
    </form>
</div>

<script id="rendered-js">
            new Vue({
            el: '#app',
            data() {
                return {
                msg: 'Click',
                description: '' };

            },
            computed: {
                dLength() {
                return this.description.length;
                } },

            methods: {
                checkLength() {
                let bt = document.querySelector('.border-top');
                bt.style.right = 100 - this.dLength + '%';
                } } });
            //# sourceURL=pen.js
</script>

<script id="rendered-js">
            new Vue({
            el: '#app2',
            data() {
                return {
                msg: 'Click',
                recherche: '' };

            },
            computed: {
                dLength() {
                return this.recherche.length;
                } },

            methods: {
                checkLength() {
                let bt = document.querySelector('.border-top');
                bt.style.right = 100 - this.dLength + '%';
                } } });
            //# sourceURL=pen.js
</script>