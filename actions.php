<?php
session_start();
include 'configs.php';

$act = $_GET['act'];

if($act == 'registaUtilizador'){
    $nomeForm = $_POST['nome'];
    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $telefoneForm = $_POST['telefone'];
    $codPostalForm = $_POST['codPostal'];

    $stmt = $conn->prepare("INSERT INTO utilizadores (nome, email, senha, telefone, codPostal) VALUES (?, ?, ?, ?, ?)");
    //i = inteiro | d = Double | s = string 
    $stmt->bind_param("sssss", $nomeForm, $emailForm, $senhaForm, $telefoneForm, $codPostalForm);
    $stmt->execute();

    if($stmt->affected_rows === 0)
        header ("Location: index.php");
    else
        header ("Location: resultadoRegisto.php?resp=s");

    $stmt->close();
}
else if($act == 'editaUtilizador'){
    $ID = $_POST['id'];
    $nomeForm = $_POST['nome'];
    $emailForm = $_POST['email'];
    $telefoneForm = $_POST['telefone'];
    $codPostalForm = $_POST['codPostal'];

    $stmt = $conn->prepare("UPDATE utilizadores SET nome=?, email=?, telefone=?, codPostal=? WHERE id=?");
    $stmt->bind_param("ssssi", $nomeForm, $emailForm, $telefoneForm, $codPostalForm, $ID);
    $stmt->execute();

    if($stmt->error)
        echo "Erro, não foi possivel editar o utilizador! Tente novamente.";
    else
        echo "Utilizador editado com sucesso!";

    $stmt->close();
}
else if($act == 'eliminaUtilizador'){
    $ID = $_GET['id']; 

    $stmt = $conn->prepare("DELETE FROM utilizadores WHERE id=?");
    $stmt->bind_param("i", $ID );
    $stmt->execute();

    if($stmt->affected_rows === 0)
        echo "Erro, não foi possivel eliminar o utilizador! Tente novamente.";
    else
        echo "Utilizador eliminado com sucesso!";

    $stmt->close();
}
if($act == 'login'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS tot, email, senha FROM utilizadores WHERE email=? AND senha=?");
    
    if($stmt === false and $debug)
        die('Erro: '.$conn->error);

    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    $results = $stmt->get_result();
    $row = $results->fetch_assoc();

    if ($row['tot'] == 1) {
        if ($row['email'] == "admin@teatro.com") {
            header ("Location: indexAdmin.php");
        } else {
            header ("Location: indexLogin.php");
        }
    } else {
        header ("Location: index.php");
    }
}
else if ($act == 'logout'){
    session_destroy();
    header('Location: index.php?msg=logedout');
}
else if ($act == 'registaTeatro'){
    $nomeTeatroForm = $_POST['nomeTeatro'];
    $enderecoTeatroForm = $_POST['enderecoTeatro'];
    $codPostalForm = $_POST['codPostal'];

    $stmt = $conn->prepare("INSERT INTO teatros (nomeTeatro, enderecoTeatro, codPostal) VALUES (?, ?, ?)");
    //i = inteiro | d = Double | s = string 
    $stmt->bind_param("ssd", $nomeTeatroForm, $enderecoTeatroForm, $codPostalForm);
    $stmt->execute();

    if($stmt->affected_rows === 0)
        header ("Location: indexAdmin.php");
    else
        header ("Location: resultadoRegistoAdmin.php?resp=s");

    $stmt->close();
    }
else if($act == 'editaTeatro'){
        $ID = $_POST['idTeatro'];
        $nomeTeatroForm = $_POST['nomeTeatro'];
        $enderecoTeatroForm = $_POST['enderecoTeatro'];
        $codPostalForm = $_POST['codPostal'];
    
        $stmt = $conn->prepare("UPDATE teatros SET nomeTeatro=?, enderecoTeatro=?, codPostal=? WHERE idTeatro=?");
        $stmt->bind_param("sssd", $nomeTeatroForm, $enderecoTeatroForm, $codPostalForm, $ID);
        $stmt->execute();
    
        if($stmt->error)
            echo "Erro, não foi possivel editar o teatro! Tente novamente.";
        else
            echo "Teatro editado com sucesso!";
    
        $stmt->close();
    }
else if($act == 'eliminaTeatro'){
        $ID = $_GET['idTeatro']; 
    
        $stmt = $conn->prepare("DELETE FROM teatros WHERE idTeatro=?");
        $stmt->bind_param("i", $ID );
        $stmt->execute();
    
        if($stmt->affected_rows === 0)
            echo "Erro, não foi possivel eliminar o teatro! Tente novamente.";
        else
            echo "Teatro eliminada com sucesso!";
    
        $stmt->close();
    }
else if($act == 'registaEspetaculo'){
        $tituloForm = $_POST['titulo'];
        $informacaoForm = $_POST['informacao'];
        $elencoForm = $_POST['elenco'];
        $duracaoForm = $_POST['duracao'];
        $poster = $_FILES['poster'];

        if($poster['size'] > 10000000){ //10 MB em Bytes
            echo 'O seu ficheiro não pode ter mais do que 10 MB';
            exit;
        }

        $fileExt = strtolower(pathinfo($poster['name'], PATHINFO_EXTENSION));

        if(!in_array($fileExt, array('jpg', 'jpeg', 'bmp', 'gif', 'png'))){
            echo 'Os únicos ficheiros permitidos são PNG, JPG, BMP, GIF!!';
            exit;
        }

        $fileName = uniqid().".$fileExt";
        if(!move_uploaded_file($poster['tmp_name'], "uploads/espetaculos/$fileName")){
            echo "Não foi possivel anexar o ficheiro, tente novamente!";
            exit;
        }
    
        $stmt = $conn->prepare("INSERT INTO espetaculos (titulo, informacao, elenco, duracao, poster) VALUES (?, ?, ?, ?, ?)");
        //i = inteiro | d = Double | s = string 
        $stmt->bind_param("sssds", $tituloForm, $informacaoForm, $elencoForm, $duracaoForm, $fileName);
        $stmt->execute();
    
        if($stmt->affected_rows === 0)
            header ("Location: indexAdmin.php");
        else
            header ("Location: resultadoRegistoAdmin.php?resp=s");
    
        $stmt->close();
    }
else if($act == 'editaEspetaculo'){
    $ID = $_POST['idEspetaculos'];    
    $tituloForm = $_POST['titulo'];
    $informacaoForm = $_POST['informacao'];
    $elencoForm = $_POST['elenco'];
    $duracaoForm = $_POST['duracao'];
    $poster = @$_FILES['poster'];

        if($poster['size'] != 0){
          $stmt = $conn->prepare('SELECT poster FROM espetaculos WHERE idEspetaculos=?');
          $stmt->bind_param('i', $ID);
          $stmt->execute();
          $results = $stmt->get_result();
          $row = $results->fetch_assoc();
          unlink("uploads/espetaculos/$row[poster]");

          if($stmt->error)
            die ("Erro, nem todos os dados foram alterados. Tente novamente");

          $stmt->close();
    
          if($poster['size'] > 10000000){ //10 MB em Bytes
            echo 'O seu ficheiro não pode ter mais do que 10 MB';
            exit;
          }
    
          $fileExt = strtolower(pathinfo($poster['name'], PATHINFO_EXTENSION));
    
          if(!in_array($fileExt, array('jpg', 'jpeg', 'bmp', 'gif', 'png'))){
            echo 'Os únicos ficheiros permitidos são PNG, JPG, BMP, GIF!!';
            exit;
          }
    
          $fileName = uniqid().".$fileExt";
          if(!move_uploaded_file($foto['tmp_name'], "uploads/espetaculos/$fileName")){
            echo "Não foi possivel anexar o ficheiro, tente novamente!";
            exit;
          }
    
          $stmt = $conn->prepare("UPDATE espetaculos SET poster=? WHERE idEspetaculos=?");
          $stmt->bind_param("si", $fileName, $ID);
          $stmt->execute();

          if($stmt->error)
            die ("Erro, nem todos os dados foram alterados. Tente novamente");

          $stmt->close();
        }
    
        $stmt = $conn->prepare("UPDATE espetaculos SET titulo=?, informacao=?, elenco=?, duracao=? WHERE idEspetaculos=?");
        $stmt->bind_param("ssss", $tituloForm, $informacaoForm, $elencoForm, $duracaoForm, $ID);
        $stmt->execute();
    
        if($stmt->error)
            echo "Erro, não foi possivel editar o espetáculo! Tente novamente.";
        else
            echo "Espetáculo editado com sucesso!";
    
        $stmt->close();
    }
else if($act == 'eliminaEspetaculo'){
        $ID = $_GET['idEspetaculos']; 
    
        $stmt = $conn->prepare("DELETE FROM espetaculos WHERE idEspetaculos=?");
        $stmt->bind_param("i", $ID );
        $stmt->execute();
    
        if($stmt->affected_rows === 0)
            echo "Erro, não foi possivel eliminar o espetáculo! Tente novamente.";
        else
            echo "Espetáculo eliminado com sucesso!";
    
        $stmt->close();
    }
?>