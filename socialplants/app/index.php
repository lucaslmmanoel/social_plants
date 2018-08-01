<?php
// Este é o inicio da aplicação após o login
//incluindo a estrutura do projeto
// inicio
include_once 'structApp/start.php';
// navbar
include_once 'structApp/navbar.php';
// Puxando os dados do usuário
include_once '../users/Users.php';
$user = new User();
$users = $user->recoveryUsers(); 
// incluindo a classe das plantas
include_once '../plants/Plants.php';
$plant = new Plant();
$plants = $plant->recoveryPlants();
?>

<link rel="stylesheet" href="Main.css">
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-4 mt-4">
          <h1>Social Plants <i class='fa fa-leaf'></i> </h1>
                      <?php
                        foreach ($users as $user) {
                            ECHO "
                         
                             <div class='card mb-3'>
                             <div class='card-body'>
                               <h5 class='card-title'> Nome : {$user['name']}</h5>
                               <p class='card-text'> Planta Favorita: {$user['favoritePlant']}</p>
                             </div>
                           </div>              
                           <a href='formUser.php?id_plant={$user['id_user']}'>
                           <i class='fa fa-leaf mr-1 ml-2'></i>
                          Editar Dados da Conta</a>
                            
                            
                          <a href='../users/execution.php?action=delete&id_user={$user['id_user']}'><i class='fa fa-trash' ></i>
                          Excluir Conta
                          </a>   
                            ";
                        }
                        ?>     
   
      </div>

    <div class="col-md-8 mt-4 text-center">
      <h1>Posts <i class=' far fa-sticky-note'></i></h1>
        <a href="addPlant.php">
        <h5>New Post <i class='fa fa-plus'></i> </h5>
        </a>
        <!-- Passar um laço no card alimentando com as imagens das plants -->
  
        <?php
                        foreach ($plants as $plant) {
                            ECHO "
                            <a href='addPlant.php?id_plant={$plant['id_plant']}'>
                              <i class='fa fa-leaf mr-1 ml-2'></i>
                             Editar</a>
                               
                               
                             <a href='execution.php?action=delete&id_plant={$plant['id_plant']}'><i class='fa fa-trash' ></i>
                             Excluir
                             </a>
                             <div class='card mb-3'>
                             <img class='card-img-top' src='...' alt='Plant image Here'>
                             <div class='card-body'>
                               <h5 class='card-title'>Plant's Name:{$plant['name']}</h5>
                               <p class='card-text'>Description:{$plant['description']}</p>
                               <p class='card-text'>Cares: {$plant['cares']}</p>
                             </div>
                           </div>              
                            
                            ";
                        }
                        ?>     
                  

      </div>
    </div>
  </div>
</div>

<?php
// Final da aplicação
include_once '../struct/end.php';