<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="./src/assets/css/voting-section.css">
    <!-- /// -->
    <!-- Librerías -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- /// -->
    <title>Sistema de votación</title>
</head>

<body>

    <main class="container">
        <h1 class="title text-center mb-4">FORMULARIO DE VOTACIÓN</h1>
        <form action="" action="process-vote.php" method="POST" id="voting-form">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="voter-full-name" class="form-label">Nombre y Apellido:</label>
                    <input type="text" class="form-control" name="voter-full-name" id="voter-full-name">
                    <span class="error-message" id="voter-full-name-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-nickname" class="form-label">Alias:</label>
                    <input type="text" class="form-control" name="voter-nickname" id="voter-nickname">
                    <span class="error-message" id="voter-nickname-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-rut" class="form-label">RUT:</label>
                    <input type="text" class="form-control" name="voter-rut" id="voter-rut">
                    <span class="error-message" id="voter-rut-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="voter-email" id="voter-email">
                    <span class="error-message" id="voter-email-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-region" class="form-label">Región:</label>
                    <select class="form-select" name="voter-region" id="voter-region">
                        <option disabled selected value="">Selecciona una Región</option>
                        <?php foreach ($regiones as $region) { ?>
                            <option value="<?php echo $region['id_region']; ?>"><?php echo $region['name_region']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="error-message" id="voter-region-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-commune" class="form-label">Comuna:</label>
                    <select class="form-select" name="voter-commune" id="voter-commune" disabled>
                        <option disabled selected value="">Selecciona una Comuna</option>
                    </select>
                    <span class="error-message" id="voter-commune-error"></span>
                </div>
                <div class="col-md-6">
                    <label for="voter-candidate" class="form-label">Candidato:</label>
                    <select class="form-select" name="voter-candidate" id="voter-candidate">
                        <option disabled selected value="">Selecciona una candidatura</option>
                        <?php foreach ($candidaturas as $candidatura) { ?>
                            <option value="<?php echo $candidatura['id_candidacy']; ?>"><?php echo $candidatura['name_candidacy']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="error-message" id="voter-candidate-error"></span>
                </div>
                <div class="col-md-12">
                    <label class="form-label">¿Cómo se enteró de nosotros?</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="voter-referral-source[]" value="Internet" id="referral-internet">
                        <label class="form-check-label" for="referral-internet">Internet</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="voter-referral-source[]" value="Redes Sociales" id="referral-social-media">
                        <label class="form-check-label" for="referral-social-media">Redes Sociales</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="voter-referral-source[]" value="Amigos/Familiares" id="referral-friends-family">
                        <label class="form-check-label" for="referral-friends-family">Amigos/Familiares</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="voter-referral-source[]" value="Publicidad" id="referral-advertising">
                        <label class="form-check-label" for="referral-advertising">Publicidad</label>
                    </div>
                    <span class="error-message" id="voter-referral-source-error"></span>
                </div>
            </div>
            <div class="button-section mt-3">
                <button type="submit" class="btn btn-primary">Votar</button>
            </div>
        </form>
        <br>
        <?php
        /* Mensaje de confirmación sobre la acción de votar.
*/
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);

            if (isset($flash['success'])) {
                echo '<div class="alert alert-success">' . $flash['success'] . '</div>';
            } elseif (isset($flash['error'])) {
                echo '<div class="alert alert-danger">' . $flash['error'] . '</div>';
            }
        } ?>
    </main>
    <!-- SCRIPTS -->
    <script src="./src/assets/js/validations.js"></script>
    <script src="./src/assets/js/updateActions.js"></script>
    <!-- /// -->
</body>

</html>