<?php
include './Model/Database.php';
$data = new Database;
$success_message = '';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="./src/assets/css/voting-section.css">
    <!-- /// -->
    <!-- Librerías -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- /// -->
    <title>Sistema de votación</title>
</head>

<body>
    <main>
        <h1>FORMULARIO DE VOTACIÓN:</h1>
        <!-- Formulario que enviará los datos al servidor para su posterior procesamiento -->
        <form action="" action="process-vote.php" method="POST" id="voting-form">
            <!-- Campos del formulario -->
            <div class="voter-information-section">
                <div class="form-group">
                    <label for="voter-full-name">Nombre y Apellido:</label>
                    <input type="text" name="voter-full-name" id="voter-full-name"><br>
                    <span class="error-message" id="voter-full-name-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-nickname">Alias:</label>
                    <input type="text" name="voter-nickname" id="voter-nickname"><br>
                    <span class="error-message" id="voter-nickname-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-rut">RUT:</label>
                    <input type="text" name="voter-rut" id="voter-rut"><br>
                    <span class="error-message" id="voter-rut-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-email">Email:</label>
                    <input name="voter-email" id="voter-email"><br>
                    <span class="error-message" id="voter-email-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-region">Región:</label>
                    <select name="voter-region" id="voter-region">
                        <option disabled selected value>Selecciona una Región</option>
                        <?php
                        $region = $data->regionVoter('region');
                        foreach ($region as $region) { ?>
                            <option value="<?php echo $region['id_region']; ?>"><?php echo $region['name_region']; ?></option>
                        <?php  } ?>
                    </select><br>
                    <span class="error-message" id="voter-region-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-commune">Comuna:</label>
                    <select name="voter-commune" id="voter-commune">
                        <option disabled selected value>Selecciona una Comuna</option>
                        <?php
                        $comunne = $data->communeVoter('commune');
                        foreach ($commune as $commune) { ?>

                            <option value="<?php echo $commune['name_commune']; ?>"><?php echo $commune['name_commune']; ?></option>
                        <?php  } ?>
                    </select><br>
                    <span class="error-message" id="voter-commune-error"></span> 
                </div>
                <div class="form-group">
                    <label for="voter-candidate">Candidato:</label>
                    <select name="voter-candidate" id="voter-candidate">
                        <option value="">Selecciona un Candidato</option>
                    </select><br>
                    <span class="error-message" id="voter-candidate-error"></span> 
                </div>
                <div class="form-group">
                    <label>¿Cómo se enteró de nosotros?</label><br>
                    <input type="checkbox" name="voter-referral-source[]" value="Internet"> Internet<br>
                    <input type="checkbox" name="voter-referral-source[]" value="Redes Sociales"> Redes Sociales<br>
                    <input type="checkbox" name="voter-referral-source[]" value="Amigos/Familiares"> Amigos/Familiares<br>
                    <input type="checkbox" name="voter-referral-source[]" value="Publicidad"> Publicidad<br>
                    <span class="error-message" id="voter-referral-source-error"></span> 
                </div>
            </div>
            <div class="button-section">
                <button type="submit">Enviar Voto</button>
            </div>
        </form>
    </main>
    <script src="./src/assets/js/validations.js"></script>
</body>

</html>