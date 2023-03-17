<?php
$pageTitle = 'Lista de Filmes Admin';
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
            <h1><font face="Arial" color="white">Lista de Espetáculos - Admin</font></h1><br><br>

            <table border="1">
                <tr>
                    <th><font face="Arial" color="white">Pôster</font></th>
                    <th><font face="Arial" color="white">Título</font></th>
                    <th><font face="Arial" color="white">Informações</font></th>
                    <th><font face="Arial" color="white">Elenco</font></th>
                    <th><font face="Arial" color="white">Duração</font></th>
                </tr>

                <?php
                $sql = 'SELECT idEspetaculos, titulo, informacao, elenco, duracao, poster FROM espetaculos ORDER BY idEspetaculos DESC';
                $results = $conn->query($sql);

                while($row = $results->fetch_assoc()){
                ?>
                <tr>
                    <td><?php
                    if(!$row['poster'])
                        echo '<img src="imgs/boxNoContent.png" height="20">';
                    else {
                    ?>
                    <a href="uploads/espetaculos/<?= $row['poster'] ?>" target="_blank">
                    <img src="uploads/espetaculos/<?= $row['poster'] ?>" height="200">
                    </a>
                    <?php
                        }
                    ?></td>
                    <td><font face="Arial" color="white"><?= $row['titulo'] ?></font></td>
                    <td><font face="Arial" color="white"><?= $row['informacao'] ?></font></td>
                    <td><font face="Arial" color="white"><?= $row['elenco'] ?></font></td>
                    <td><font face="Arial" color="white"><?= $row['duracao'] ?></font></td>
                    <td><a href="editaEspetaculo.php?idEspetaculos=<?= $row['idEspetaculos'] ?>">
                        <img src="imgs/pencil.png" alt="Editar" height="16" title="Editar espetaculo"></a>
                        <a href="actions.php?act=eliminaEspetaculo&idEspetaculos=<?= $row['idEspetaculos'] ?>">
                        <img src="imgs/cross.png" alt="Eliminar" height="16" title="Eliminar espetaculo"></a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
        </div>
    </div>
    
<?php include 'footer.php' ?>