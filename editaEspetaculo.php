<?php
include 'configs.php';

$pageTitle = 'Editar espetaculo';
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
                        <a href="listaEspetaculosAdmin.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Espetáculos</b></font></div></a>
                        <a href="listaTeatrosAdmin.php" style="text-decoration:none" ><div class="op"><font face="Arial" color="white"><b>Teatros</b></font></div></a>
                    </div>
                    <div class="btMenu">
                        ...
                    </div>
                </div>
            </div>
            <div class="corpo">
                <?php
                $ID = $_GET['idEspetaculos'];

                $stmt = $conn->prepare('SELECT idEspetaculos, titulo, informacao, elenco, duracao, poster FROM espetaculos WHERE idEspetaculos=?');
                $stmt->bind_param('i', $ID);
                $stmt->execute();

                $results = $stmt->get_result();
                $row = $results->fetch_assoc();
                ?>

                <h1><center><font face="Arial" color="white">Editar espetáculo:</center></font></h1>

                <form method="POST" action="actions.php?act=editaEspetaculo" class="form">
                    <input type="hidden" name="idEspetaculos" value="<?= $ID ?>">

                    <label>
                        <center><font face="Arial" color="white">Título: </font><input type="text" name="titulo" value="<?= $row['titulo'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Informaçóes: </font><input type="text" name="informacao" value="<?= $row['informacao'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Elenco: </font><input type="text" name="elenco" value="<?= $row['elenco'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Duração: <input type="number" name="duracao" value="<?= $row['duracao'] ?>"> minutos</center></font><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white"><img src="uploads/espetaculos/<?= $row['poster'] ?>" height="200" alt="(Sem foto)"></center></font><br>
                        <center><font face="Arial" color="white"><div class="desc">Poster:</div></center></font><br><br>
                        <center><input type="file" name="poster"></center><br><br>
                    </label>

                    <center><input type="submit" value="Editar espetáculo"></center>
                </form>

<?php include 'footer.php' ?>