<?php
$pageTitle = 'Index Admin';
include 'header.php';
?>
    <div class="wrapper">
        <div class="header">
            <a href="indexAdmin.php"><img class="logo" src="imgs/mascara2.jpg" alt="Vais ao teatro?"></a>
            <div class="right">
                <div class="social">
                    <a href="http://www.facebook.com" target="_blank"><img src="imgs/facebookIcon.png" alt="Facebook"></a>
                    <a href="http://www.twitter.com" target="_blank"><img src="imgs/twitterIcon.png" alt="Twitter"></a>
                    <a href="http://www.instagram.com" target="_blank"><img src="imgs/instagramIcon.png" alt="Instagram"></a>
                    <a href="http://www.tiktok.com" target="_blank"><img src="imgs/tiktokIcon.png" alt="TikTok"></a>
                </div>
                <div class="menu">
                    <div class="op fecharMenu">X</div>
                    <a href="listaEspetaculosAdmin.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Espetáculos</b></font></div></a>
                    <a href="listaTeatrosAdmin.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Teatros</b></font></div></a>
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