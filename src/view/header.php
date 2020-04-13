<?php
session_start();
// echo $_SESSION['logado'];

    
// echo $_SESSION['user_datas']['id'];
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

require_once "./src/model/User.php";
$objUserHeader = new User();
$value = $objUserHeader->readTheme($_SESSION['user_datas']['id']);


            
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

                    <div id="profile-box" class="main-profile-box">
                        <p><?php echo $_SESSION['user_datas']['email']; ?></p>
                        <!-- <p><?php echo $_SESSION['user_datas']['id']; ?></p> -->
                        <p><?php echo $_SESSION['user_datas']['name']; ?></p>
                        <a href="#">Ver perfil</a>
                        <form action="./src/model/processing/alter-theme.php" method="POST" id="theme-form">
                            <input type="hidden" value="<?php echo $_SESSION['user_datas']['id']; ?>" name="iduser" readonly>
                            <input type="checkbox" value="1" name="themeuser" id="theme">
                            <?php if ($value['themeuser'] != 1) { ?>
                                <button type="submit" name="RegTheme">Ativar tema escuro</button>
                            <?php } else { ?>
                                <button type="submit" name="RegTheme">desativar tema escuro</button>
                            <?php } ?>
                        </form>
                        <input type="hidden" value="<?php echo $value['themeuser']; ?>" id="theme-value">
                        <?php echo $value['themeuser']; ?>
                        <a href="./src/view/sign-out.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
