<div class="tab-pane active show" id="tab-1">
    <div class="row">
        <div class="col-lg-8 details order-2 order-lg-1">
            <h3>Mes Informations</h3>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>


            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label" for="Nom">
                    Nom</label>
                <input type="text"
                       name="Nom"
                       id="Nom"
                       value="<?= $_SESSION['Nom'] ?>"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="Prenom">
                    Prénom</label>
                <input type="text"
                       name="Prenom"
                       id="Prenom"
                       value="<?= $_SESSION['Prenom'] ?>"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="Adresse">
                    Adresse</label>
                <input type="text"
                       class="form-control"
                       id="Adresse"
                       value="<?= $_SESSION['Adresse'] ?>"
                       name="Adresse">
            </div>

            <div class="mb-3">
                <label class="form-label" for="Telephone">
                    Télèphone</label>
                <input type="text"
                       class="form-control"
                       id="Telephone"
                       value="<?= $_SESSION['Telephone'] ?>"
                       name="Telephone">
            </div>

            <div class="mb-3">
                <label class="form-label" for="Email">
                    Email</label>
                <input type="email"
                       name="Email"
                       id="Email"
                       value="<?= $_SESSION['Email'] ?>"
                       class="form-control">
            </div>

        </div>
    </div>
</div>