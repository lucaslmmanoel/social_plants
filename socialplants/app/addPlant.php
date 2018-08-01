<?php
/**
 * esse arquivo ira criar um novo objeto de Planta
 */
 // Inicio da aplicação
include_once './structApp/start.php';
// Navbar
include_once './structApp/navbar.php';
// Conexão com o banco
include_once  '../conf/ConnectDB.php';
// Incluindo o arquivo de classe da planta
include_once '../plants/Plants.php';
// Especie da planta
include_once '../plants/Specie.php';
$specie = new Specie();
$species = $specie->recoverySpecies();
$plant = new Plant();
if (!empty($_GET['id_plant']))
{
    $plant->loadID($_GET['id_plant']);
    $arg = "Update plant";
}
else{
    $arg = "Insert plant";
}
// Decidindo qual ação irá ser tomada
$action = isset($_GET['id_plant'])?'update':'insert';
?>

<div class="container">
<div class="row mt-5 ml-5">
    <div class="col-md-12 ml-5">
<h1 class='h1 text-dark mt-5'><?=$arg?></h1>
 
    
<form class='form-group text-center ml-auto' action="execution.php?action=<?=$action?>"  method="POST" enctype='multipart/form-data'>

<div class="col-lg-4">
    <div class="md-form form-group">
            <input type="hidden" value='<?=$plant->getId_plant() ?>' name='id_plant'>
            <!-- Captando o nome da planta -->
            <label for="name">Plant's Name <i class='fa fa-leaf'></i> </label>
            <input class='form-control' type="text" placeholder='Type the name of plant' value='<?=$plant->getName() ?>' name='name' id='name'>
    </div>
</div>

<div class="col-lg-4">
    <div class="md-form form-group">
        <!--  Tempo da planta -->
        <label for="years">Years<i class='fa fa-clock'></i></label>
        <input class='form-control' type="text" placeholder='Type here the time of life of plant' value='<?=$plant->getYears() ?>' name='years' id='years'>
    </div>
</div>

<div class="col-lg-4">
    <div class="md-form form-group">
        <!-- Descrição da planta -->
        <label for="description">Plant's Description <i class='fa fa-comment'></i> </label>
        <input  class='form-control' type="text" placeholder='Type here a little description' value='<?=$plant->getDescription() ?>' name='description'>


    </div>

</div>
<div class="col-lg-4">
    <div class="md-form form-group">
        <!-- // Cuidados da planta -->
        <label for="cares">Cares <i class='fa fa-exclamation-triangle'></i> </label>
        <input type="text"  class='form-control' name='cares' value='<?=$plant->getCares() ?>' placeholder='Type here the cares of plant'>
    </div>
</div>


    <div class="col-lg-4 mt-0 mb-0 ml-0">
        <div class="md-form form-group">
            <label for="id_specie">Choose Plant Specie <i class='fa fa-leaf'></i> </label>
            <select class='custom-select' value='<?=$plant->getId_specie(); ?>' name="id_specie" id="id_specie">
            <option value="">Choose Specie</option>
<!-- // Recuperando os dados de perfis -->
            <?php
            foreach ($species as $specie) {
                $checked = ($specie['id_specie']) == $plant->getId_specie() ? 'selected' : '';
                echo "
                <option $checked value='{$specie['id_specie']}'>
                    {$specie['name_specie']}
                </option>
                ";
            }
            ?>
            </select>
        </div>
        <input type="submit" name='submit' class='btn btn-info ml-5'> 

</div>

<!-- Foto da planta
<label for="photo">Plant's Picture</label>
<input type="file" class='btn btn-success' name="id_photo"> -->

<!-- // Enviando os dados para o formulário -->

</form>

</div>
</div>
</div>
<?php

// Termino da aplicação
include_once './structApp/end.php';