<?php
$pageTitle = 'Registo de Novo Utilizador';
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
                    <a href="login.php" style="text-decoration:none"><font face="Arial" color="white"><div class="op"><b>Login</b></font></div></a>
                </div>
                <div class="btMenu">
                    ...
                </div>
            </div>
        </div>
        <div class="corpo">
            <h1><font face="Arial" color="white">Registo de Novo Utilizador</font></h1>

            <form method="POST" action="actions.php?act=registaUtilizador" class="form" enctype="multipart/form-data">
                <label>
                    <center><font face="Arial" color="white">Nome: </font><input type="text" name="nome" size=60 placeholder="Introduza o seu nome" maxlength=50 required></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">E-mail: </font><input type="email" name="email" size=60 placeholder="Introduza o seu email" maxlength=30 required></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Password: </font><input type="password" name="senha" id="senha" required></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Telefone/Telemóvel: </font><input type="tel" name="telefone" size=20 placeholder="12 3456789" pattern="[0-9]{2} [0-9]{7}" maxlength=15 required><small><font face="Arial" color="white"> Formato: 12 3456789</font></small></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Código Postal: </font><input type="text" name="codPostal" size=8 placeholder="1234-567" pattern="[0-9]{4}-[0-9]{3}" maxlength=10 required><small><font face="Arial" color="white"> Formato: 1234-567</font></small></center><br><br>
                </label>

                <center><input type="submit" value="Registar utilizador"></center><br>
            </form>
        </div>
    </div>
    
<?php include 'footer.php' ?>