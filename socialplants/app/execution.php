<?php

/**
 * 
 * Execuçao do CRUD de Planta
 */

 include_once '../plants/Plants.php';
    // Criando uma instancia de Cliente
    $plant = new Plant();
        // Realizando as possibilidades de inserir deletar e atualizar
        switch ($_GET['action']){
            //inserindo novo cliente
            case 'insert':
            $plant->insertPlant($_POST);
            break;
            //deletando o cliente
            case 'delete':
            $plant->deletePlant($_GET['id_plant']);
            break;
            // Atualizando o cliente
            case 'update':
            $plant->updatePlant($_POST);
            break;
        }
// Redirecionando para o index de Clientes
header('location: index.php');
exit;