<?php
$pageTitle = 'Lista de Teatros Admin';
include 'header.php';
include 'configs.php';
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
            <h1><font face="Arial" color="white">Lista de Teatros - Admin</font></h1><br><br>

            <table border="1">
                <tr>
                    <th><font face="Arial" color="white">Teatro</font></th>
                    <th><font face="Arial" color="white">Endereço</font></th>
                    <th><font face="Arial" color="white">Código Postal</font></th>
                    <th><font face="Arial" color="white">Opções</font></th>
                </tr>

                <?php
                $sql = 'SELECT idTeatro, nomeTeatro, enderecoTeatro, codPostal FROM teatros ORDER BY idTeatro DESC';
                $results = $conn->query($sql);

                while($row = $results->fetch_assoc()){
                ?>
                <tr>
                    <td><font face="Arial" color="white"><?= $row['nomeTeatro'] ?></font></td>
                    <td><font face="Arial" color="white"><?= $row['enderecoTeatro'] ?></font></td>
                    <td><font face="Arial" color="white"><?= $row['codPostal'] ?></font></td>
                    <td><a href="editaTeatro.php?idTeatro=<?= $row['idTeatro'] ?>">
                        <img src="imgs/pencil.png" alt="Editar" height="16" title="Editar teatro"></a>
                        <a href="actions.php?act=eliminaTeatro&idTeatro=<?= $row['idTeatro'] ?>">
                        <img src="imgs/cross.png" alt="Eliminar" height="16" title="Eliminar teatro"></a>
                    </td>
                </tr>
                <?php
                }
                ?>
        </table>
        </div>
    </div>
    
<?php include 'footer.php' ?>