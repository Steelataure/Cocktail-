<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body>

    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="innerMaker">
                <header>
                    <h1>Notre Cocktail Maker</h1>
                    <p>bla bla bla.</p>
                </header>

                <div class="row">


                    <div class="col-4" style="padding: 2em; overflow-y: scroll; max-height: 600px;">
                        <!-- CARD BLOC 1 -->
                        <div class="card mt-5 loginWave loginWaveInsc shadowCook">
                            <div class="card-body">
                                <h1 class="card-title text-center">Ingrédient</h1>
                                <form method="POST">
                                    <div class="form-group">
                                        <select class="form-control" id="ingredients" name="ingredients[]" multiple>
                                            <?php foreach ($results as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['Libelle']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!-- COCKTAIL MAKER /!\ -->
                    <div class="col-4">
                        <main class="page__content">
                            <section class="controls u-vertical-rhythm" id="controls">
                                <h1 class="controls__label">Select a cocktail</h1>
                                <div class="form-group">
                                    <input type="radio" name="drink-select" id="negroni" />
                                    <label for="negroni">Negroni</label>
                                    <input type="radio" name="drink-select" id="manhattan" />
                                    <label for="manhattan">Manhattan</label>
                                    <input type="radio" name="drink-select" id="old-fashioned" />
                                    <label for="old-fashioned">Old Fashioned</label>
                                </div>
                            </section>
                            <section class="cocktail">
                                <h2 class="cocktail__label" id="drink-name"></h2>
                                <div class="glass" id="glass">
                                    <div class="garnish"></div>
                                    <div class="bowl">
                                        <div class="ingredient-colors" id="ingredient-colors"></div>
                                        <ul class="ingredient-list" id="ingredient-list"></ul>
                                    </div>
                                    <div class="stem"></div>
                                    <div class="base"></div>
                                </div>
                            </section>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partial:index.partial.html -->

    <!-- partial -->
    <script src='https://cdn.jsdelivr.net/npm/zdog'></script>
    <script src="./front/assets/js/customCocktail.js"></script>

</body>



<?php
$content = ob_get_clean();
include 'layout.php';