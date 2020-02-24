<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="./assets/css/style.css">

        <title>Notes</title>
    </head>
    <body>

        <?php
            
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
                echo $_SESSION['logado'];

                if (!isset($_SESSION['logado'])) {
                    header("Location: ./login.php");
                }
            }
            
        
        ?>

        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <div id="header-left" class="col-4">
                        <div id="hamburger">
                            <span></span>
                        </div>
                        <div id="logo">
                            <h1>Notes</h1>
                        </div>
                    </div>

                    <div id="header-right" class="col-8">
                    <a href="./src/view/sign-out.php">
                        <div id="profile">
                            <!-- <img src="" alt=""> -->
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
