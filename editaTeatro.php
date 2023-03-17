<?php
include 'configs.php';

$pageTitle = 'Editar teatro';
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
                $ID = $_GET['idTeatro'];

                $stmt = $conn->prepare('SELECT idTeatro, nomeTeatro, enderecoTeatro, codPostal FROM teatros WHERE idTeatro=?');
                $stmt->bind_param('i', $ID);
                $stmt->execute();

                $results = $stmt->get_result();
                $row = $results->fetch_assoc();
                ?>

                <h1><center><font face="Arial" color="white">Editar teatro:</center></font></h1>

                <form method="POST" action="actions.php?act=editaTeatro" class="form">
                    <input type="hidden" name="idTeatro" value="<?= $ID ?>">

                    <label>
                        <center><font face="Arial" color="white">Nome: </font><input type="text" name="nomeTeatro" value="<?= $row['nomeTeatro'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Endereço: </font><input type="text" name="enderecoTeatro" value="<?= $row['enderecoTeatro'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Código Postal: </font><input type="number" name="codPostal" value="<?= $row['codPostal'] ?>"></center><br><br>
                    </label>

                    <center><input type="submit" value="Editar teatro"></center>
                </form>

<?php include 'footer.php' ?>