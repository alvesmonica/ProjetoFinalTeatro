<?php
include 'configs.php';

$pageTitle = 'Editar utilizador';
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
                <?php
                $ID = $_GET['id'];

                $stmt = $conn->prepare('SELECT id, nome, email, telefone, codPostal FROM utilizadores WHERE id=?');
                $stmt->bind_param('i', $ID);
                $stmt->execute();

                $results = $stmt->get_result();
                $row = $results->fetch_assoc();
                ?>

                <h1><center><font face="Arial" color="white">Editar utilizador:</center></font></h1>

                <form method="POST" action="actions.php?act=editaUtilizador" class="form">
                    <input type="hidden" name="id" value="<?= $ID ?>">

                    <label>
                        <center><font face="Arial" color="white">Nome: </font><input type="text" name="nome" value="<?= $row['nome'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">E-mail: </font><input type="text" name="email" value="<?= $row['email'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Telefone: </font><input type="text" name="telefone" value="<?= $row['telefone'] ?>"></center><br><br>
                    </label>

                    <label>
                        <center><font face="Arial" color="white">Código Postal: </font><input type="text" name="codPostal" value="<?= $row['codPostal'] ?>"></center><br><br>
                    </label>

                    <center><input type="submit" value="Editar utilizador"></center><br><br>
                </form>



<?php include 'footer.php' ?>