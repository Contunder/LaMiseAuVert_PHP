<div class="tab-pane" id="tab-2">
    <div class="row">
        <div class="col-lg-8 details order-2 order-lg-1">
            <h3>Mon Animal</h3>
            <?php if ($animal != []) { ?>
                <form method="post" action="app/create/animal.php">

                    <?php if (isset($_GET['erreur'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo htmlspecialchars($_GET['erreur']); ?>
                        </div>
                    <?php } ?>

                    <div class="mb-3">
                        <label class="form-label" for="Nom">
                            Nom</label>
                        <input type="text"
                               name="Nom"
                               id="Nom"
                               value="<?= $animal['Nom'] ?>"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Espece">
                            Espece</label>
                        <select class="form-select chosen-select" id="Espece" name="Espece">
                            <option><?= $espece['Libelle'] ?></option>
                            <option disabled="disabled">----Chien----</option>
                            <?php foreach ($chiens as $chien) { ?>
                                <option><?= $chien['Libelle'] ?></option>
                            <?php } ?>
                            <option disabled="disabled">----Chat----</option>
                            <?php foreach ($chats as $chat) { ?>
                                <option><?= $chat['Libelle'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--<button type="submit" class="btn btn-primary">Ajouter</button>-->
                </form><br>
            <?php } else { ?>
                <form method="post" action="app/create/animal.php" >

                    <?php if (isset($_GET['erreur'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo htmlspecialchars($_GET['erreur']); ?>
                        </div>
                    <?php }
                    if (isset($_GET['Nom'])) {
                        $nom = $_GET['Nom'];
                    } else $nom = '';

                    if (isset($_GET['Espece'])) {
                        $espece = $_GET['Espece'];
                    } else $espece = '';

                    ?>

                    <div class="mb-3">
                        <label class="form-label" for="Nom">
                            Nom</label>
                        <input type="text"
                               name="Nom"
                               id="Nom"
                               value="<?= $nom ?>"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Espece">
                            Espece</label>
                        <select class="form-select chosen-select" id="Espece" name="Espece"
                                value="<?= $espece ?>">
                            <option disabled="disabled">----Chien----</option>
                            <?php foreach ($chiens as $chien) { ?>
                                <option><?= $chien['Libelle'] ?></option>
                            <?php } ?>
                            <option disabled="disabled">----Chat----</option>
                            <?php foreach ($chats as $chat) { ?>
                                <option><?= $chat['Libelle'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form><br>

            <?php } if ($_SESSION['Role'] == $pension['Ville'] || $_SESSION['Role'] === 'ADMIN') { ?>
                <form method="post" action="app/create/espece.php">
                    <h3>Ajouter une éspece</h3>
                    <div class="row g-2">
                        <div class="col">
                            <label for="selectAnimal">Choix de l'animal</label>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <select class="form-select" id="selectAnimal" name="Animal">
                                    <option>Chien</option>
                                    <option>Chat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col">
                            <label for="Espece">Ajout de l'espece</label>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                       name="Espece"
                                       id="Espece"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            <?php } ?>
        </div>
    </div>
</div>