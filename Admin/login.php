<?php
ob_start();
session_start(); //=> trabajar sessiones
header('Content-Type: text/html; charset=UTF-8'); //=> documento muestro con tipo utf-8 => tildes y ñ
define('CONTROLADOR', TRUE);
require 'config/database.php'; //Clase de conexion
require 'config/constantes.php'; //Constantes de la aplicacion
require 'clases/clsUsuario.php'; // clase de usuario
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AdminPres</title>

  <meta name="robots" content="noindex">

  <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
  <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
  <link rel="canonical" href="https://codepen.io/danielkvist/pen/LYNVyPL?editors=1111">

  
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <style class="INLINE_PEN_STYLESHEET_ID">
                :root {
                /* COLORS */
                --white: #e9e9e9;
                --gray: #333;
                --blue: #0367a6;
                --lightblue: #008997;

                /* RADII */
                --button-radius: 0.7rem;

                /* SIZES */
                --max-width: 379px;
                --max-height: 420px;

                font-size: 16px;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
                    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            }

            body {
                align-items: center;
                background-color: var(--white);
                /* background: url("https://res.cloudinary.com/dci1eujqw/image/upload/v1616769558/Codepen/waldemar-brandt-aThdSdgx0YM-unsplash_cnq4sb.jpg"); */
                background: url("https://www.holistor.com.ar/content/img/slides/slide-corporate-6.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                display: grid;
                height: 100vh;
                place-items: center;
            }
            .alert {
                color: #D8000C;
                background-color: #FFBABA;
               
            }
            .form__title {
                font-weight: 300;
                margin: 0;
                margin-bottom: 1.25rem;
            }

            .link {
                color: var(--gray);
                font-size: 0.9rem;
                margin: 1.5rem 0;
                text-decoration: none;
            }
            .btn_login{
                color: var(--white);
                font-size: 0.8rem;
                font-weight: bold;
                letter-spacing: 0.1rem;
                text-transform: uppercase;
                transition: transform 80ms ease-in;
                text-decoration: none;

            }

            .container {
                background-color: var(--white);
                border-radius: var(--button-radius);
                box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
                    0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
                height: var(--max-height);
                max-width: var(--max-width);
                overflow: hidden;
                position: relative;
                width: 100%;
            }

            .container__form {
                height: 100%;
                position: absolute;
                top: 0;
                transition: all 0.6s ease-in-out;
            }

            .container--signin {
                left: 0;
                width: 50%;
                z-index: 2;
            }

            .container.right-panel-active .container--signin {
                transform: translateX(100%);
            }

            .container--signup {
                left: 0;
                opacity: 0;
                width: 50%;
                z-index: 1;
            }

            .container.right-panel-active .container--signup {
                -webkit-animation: show 0.6s;
                        animation: show 0.6s;
                opacity: 1;
                transform: translateX(100%);
                z-index: 5;
            }

            .container__overlay {
                height: 100%;
                left: 50%;
                overflow: hidden;
                position: absolute;
                top: 0;
                transition: transform 0.6s ease-in-out;
                width: 50%;
                z-index: 100;
            }

            .container.right-panel-active .container__overlay {
                transform: translateX(-100%);
            }

            .overlay {
                background-color: var(--lightblue);
                /* background: url("https://res.cloudinary.com/dci1eujqw/image/upload/v1616769558/Codepen/waldemar-brandt-aThdSdgx0YM-unsplash_cnq4sb.jpg"); */
                background: url("https://www.holistor.com.ar/content/img/slides/slide-corporate-6.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                left: -100%;
                position: relative;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
                width: 200%;
            }

            .container.right-panel-active .overlay {
                transform: translateX(50%);
            }

            .overlay__panel {
                align-items: center;
                display: flex;
                flex-direction: column;
                height: 100%;
                justify-content: center;
                position: absolute;
                text-align: center;
                top: 0;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
                width: 50%;
            }

            .overlay--left {
                transform: translateX(-20%);
            }

            .container.right-panel-active .overlay--left {
                transform: translateX(0);
            }

            .overlay--right {
                right: 0;
                transform: translateX(0);
            }

            .container.right-panel-active .overlay--right {
                transform: translateX(20%);
            }

            .btn {
                background-color: var(--blue);
                background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
                border-radius: 20px;
                border: 1px solid var(--blue);
                color: var(--white);
                cursor: pointer;
                font-size: 0.8rem;
                font-weight: bold;
                letter-spacing: 0.1rem;
                padding: 0.9rem 4rem;
                text-transform: uppercase;
                transition: transform 80ms ease-in;
            }

            .form > .btn {
                margin-top: 1.5rem;
            }

            .btn:active {
                transform: scale(0.95);
            }

            .btn:focus {
                outline: none;
            }

            .form {
                background-color: var(--white);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 3rem;
                height: 100%;
                text-align: center;
            }

            .input {
                background-color: #fff;
                border: none;
                padding: 0.9rem 0.9rem;
                margin: 0.5rem 0;
                width: 100%;
            }

            @-webkit-keyframes show {
                0%,
                49.99% {
                    opacity: 0;
                    z-index: 1;
                }

                50%,
                100% {
                    opacity: 1;
                    z-index: 5;
                }
            }

            @keyframes show {
                0%,
                49.99% {
                    opacity: 0;
                    z-index: 1;
                }

                50%,
                100% {
                    opacity: 1;
                    z-index: 5;
                }
            }

  </style>

  
<script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeConsoleRunner-d8236034cc3508e70b0763f2575a8bb5850f9aea541206ce56704c013047d712.js"></script>
<script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-4793b73c6332f7f14a9b6bba5d5e62748e9d1bd0b5c52d7af6376f3d1c625d7e.js"></script>
<script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRuntimeErrors-4f205f2c14e769b448bcf477de2938c681660d5038bc464e3700256713ebe261.js"></script>
</head>

<body>
  <div class="container">
	<!-- Sign Up -->
	<!-- <div class="container__form container--signup">
		<form action="#" class="form" id="form1">
			<h2 class="form__title">Registre una Cuenta</h2>
			<input type="text" placeholder="Usuario" class="input">
			<input type="email" placeholder="Email" class="input">
			<input type="password" placeholder="Contraseña" class="input">
			<button class="btn">Registrar</button>
		</form>
	</div> -->

	<!-- Sign In -->
	
		<form action="#" class="form" id="form2" role="form" id="form2" method="post">
             <h2 class="form__title">Ingrese su Cuenta</h2>
                        <?php 
                            if(isset($_POST['email'])){
                                $validar = clsUsuario::ValidarCorreo(Conexion::getInstancia(),$_POST['email']);

                                if($validar){
                                    $validar_clave = clsUsuario::ValidarClave(Conexion::getInstancia(), $_POST['clave'], $_POST['email']);
                                    if($validar_clave){
                                        $usuario = clsUsuario::Obtener(Conexion::getInstancia(), $_POST['email']);
                                        $_SESSION['email'] = $usuario->correo;
                                        if($usuario->id_tipo_usuario == 0){
                                            //header('Location: http://resumeucci.me/');
                                            
                                            echo '<div class="alert bg-danger">SU CUENTA NO TIENE CREDENCIALES COMUNNIQUESE CON EL ADMINISTRADOR</div>';
                                        }else{

                                             header('Location: index.php');
                                        }
                                    }else{
                                        echo '<div class="alert bg-danger">El correo o la contraseña son incorrectos.</div>';
                                    }
                                }else{
                                    echo '<div class="alert bg-danger">No se encontró ninguna cuenta con el correo ingresado.</div>';
                                }
                            }
                        ?>
			<input autofocus=""name="email"type="email" placeholder="Ingrese email" class="form-control input">
			<input type="password"  value="" name="clave" placeholder="Ingrese contraseña" class="form-control input">
			<a href="#" class="link">¿Olvidó su contraseña?</a>
			<button type="submit" class="btn"><a href="#" class="btn_login">
            Iniciar sesión</a></button> 
		</form>
	

	<!-- Overlay -->
	<!-- <div class="container__overlay">
		<div class="overlay">
			<div class="overlay__panel overlay--left">
				<button class="btn" id="signIn">Ingresar</button>
			</div>
			<div class="overlay__panel overlay--right">
				<button class="btn" id="signUp">Registrar</button>
			</div>
		</div>
	</div> -->
</div>
<?php
    if(isset($_POST['email'])){
        echo '<script  type="text/javascript">
        window.setTimeout(function(){
            $(\'.alert\').alert(\'close\');
        }, 3000);
    </script>';
    }
?>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

<!-- <script type="text/javascript">

    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    fistForm.addEventListener("submit", (e) => e.preventDefault());
    secondForm.addEventListener("submit", (e) => e.preventDefault());


</script>  -->
</body></html>