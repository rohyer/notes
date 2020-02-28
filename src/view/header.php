<?php
    session_start();
    // echo $_SESSION['logado'];

    // echo $_SESSION['user_datas']['name'];
    // echo $_SESSION['user_datas']['email'];
    // echo $_SESSION['user_datas']['password'];
    // echo $_SESSION['user_datas']['sex'];
    // echo $_SESSION['user_datas']['cellphone'];
    // echo $_SESSION['user_datas']['state'];
    // echo $_SESSION['user_datas']['city'];
            

    if (!isset($_SESSION['logado'])) {
        header("Location: ./login.php");
    }
            
?>

<header id="header">
    <div class="container-fluid">
        <div class="row">
            <div id="header-left" class="col-4">
                <div id="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
                <div id="logo">
                    <h1>Notes</h1>
                </div>
            </div>

            <div id="header-right" class="col-8">
                <div id="profile">
                    <i class="fas fa-caret-down"></i>
                    <img src="" alt="">

                    <div id="profile-box">
                        <p><?php echo $_SESSION['user_datas']['email']; ?></p>
                        <a href="#">Ver perfil</a>
                        <button>Ativar tema escuro</button>
                        <a href="./src/view/sign-out.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
