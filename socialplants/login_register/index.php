<?php

// Incluindo o incio da aplicação

include_once '../struct/start.php';
// include_once '../struct/navbar.php';

//Inciando uma sessão 
// session_start();

// incluindo e Criando uma instancia de usuário
include_once '../users/Users.php';
$user = new User();




?>

<!-- Formulários -->
<div class="container">
<div class="row mt-5">        
<div class="col-md-12">
<div id="box">
            <div id="main"></div>
          <!-- Form login -->
          <form method='POST' action='../users/execution.php?action=login' >  
            <div id="loginform">
                <h1>LOGiN</h1>
                <input class='inputx' name='email' type="email" placeholder="Email"/><i class='fa fa-user'></i><br>
                <input class='inputx' name= 'passwd' type="password" placeholder="Password"/><i class='fa fa-lock'></i><br>
                <button class='inputx'  type='submit' name='sigin' value='signin'>LOGIN</button>
            </div>
            </form>
            <!-- form sign up  -->
            <form method='POST' action='../users/execution.php?action=insert'>
            <div id="signupform">
                <h1>SIGN UP</h1>
                <input class='inputx' name='name' type="text" placeholder="Full Name"/> <i class='fa fa-user'></i><br>
                <input class='inputx' name='email' type="email" placeholder="Email"/> <i class='fa fa-envelope'></i> <br>
                <input class='inputx' name='favoritePlant' type="text" placeholder="Your Favorite Plant"/> <i class='fa fa-leaf'></i><br>
                <input class='btn btn-info ml-5' type='submit'> <i class='fa fa-unlock'></i>
            </div>
            </form>
            <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>
            
            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>

        </div>
        </div>
        </div>
        </div>
        <!-- incluiondo os scripts e o css dos formulários  -->
        <link href="Main.css" rel="stylesheet" type='text/css'/>
        <script src="../content/js/jquery-1.10.2.min.js"></script>
        <script src="../content/js/JQUERY%20Main.js"></script>
        
<?php
// Final da aplicação
include_once '../struct/end.php';