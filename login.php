<?php
$pageTitle = 'Login';
include 'header.php';
?>
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
                    <a href="registaUtilizador.php" style="text-decoration:none"><font face="Arial" color="white"><div class="op"><b>Registo</b></font></div></a>
                </div>
                <div class="btMenu">
                    ...
                </div>
            </div>
        </div>
        <div class="corpo">
            <h1><font face="Arial" color="white">Login</font></h1>

            <form method="POST" action="actions.php?act=login" class="form">
                <label>
                    <center><font face="Arial" color="white">Email: <input type="email" name="email" required></a></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Password: <input type="password" name="senha"></a></center><br><br>
                </label>

                <center><input type="submit" value="Enviar"></center><br><br><br><br><br><br><br><br><br><br><br>
            </form>
        </div>
    </div>
    
<?php include 'footer.php' ?>