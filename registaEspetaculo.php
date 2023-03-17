<?php
$pageTitle = 'Regista espetaculo';
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
                    <a href="listaEspetaculos.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Espetáculos</b></font></div></a>
                    <a href="listaTeatros.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Teatros</b></font></div></a>
                </div>
                <div class="btMenu">
                    ...
                </div>
            </div>
        </div>
        <div class="corpo">
            <h1><font face="Arial" color="white">Registo de Novo Espetáculo</font></h1>

            <form method="POST" action="actions.php?act=registaEspetaculo" class="form" enctype="multipart/form-data">
                <label>
                    <center><font face="Arial" color="white">Título: </font><input type="text" name="titulo" size=60 placeholder="Introduza o título do espetaculo" maxlength=100 required></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Informações: </font><input type="text" name="informacao" size=60 maxlength=50></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Elenco: </font><input type="text" name="elenco" size=60 maxlength=500></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white">Duração: <input type="number" name="duracao" size=60 maxlength=3> minutos</font></center><br><br>
                </label>

                <label>
                    <center><font face="Arial" color="white"><div class="desc">Pôster: </font></div>
                    <input type="file" name="poster" required></center><br><br>
                </label>

                <center><input type="submit" value="Registar espetaculo"></center>
            </form>
        </div>

<?php include 'footer.php' ?>