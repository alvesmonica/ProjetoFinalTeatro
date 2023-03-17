<?php
$pageTitle = 'Index';
include 'header.php';
?>
<! - pagina principal do site dedicado a exibicao dos espetaculos em cartaz ->
    <div class="wrapper">
        <div class="header">
            <a href="index.php"><img class="logo" src="imgs/mascara2.jpg" alt="Vais ao teatro?"></a>
            <div class="right">
                <div class="social">
                    <a href="http://www.facebook.com" target="_blank"><img src="imgs/facebookIcon.png" alt="Facebook"></a>
                    <a href="http://www.twitter.com" target="_blank"><img src="imgs/twitterIcon.png" alt="Twitter"></a>
                    <a href="http://www.instagram.com" target="_blank"><img src="imgs/instagramIcon.png" alt="Instagram"></a>
                    <a href="http://www.tiktok.com" target="_blank"><img src="imgs/tiktokIcon.png" alt="TikTok"></a>
                </div>
                <div class="menu">
                    <div class="op fecharMenu">X</div>
                    <a href="registaUtilizador.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Registo</b></font></div></a>
                    <a href="login.php" style="text-decoration:none"><font face="Arial" color="white"><div class="op"><b>Login</b></font></div></a>
                </div>
                <div class="btMenu">
                    ...
                </div>
            </div>
        </div>
        <div class="corpo">
            <img class="background" src="imgs/teatro1.jpg" alt="Vais ao teatro?">
        </div>
    </div>

<?php include 'footer.php' ?>
