
<?php 
session_start();

include("conecta.php");

if (!isset($_SESSION["nome"]))
{
        $texto="Faça login";
        $imagem="img/perfilsemfoto.png";
}
else
{
    $texto=$_SESSION["nome"];
   
    $id=$_SESSION["id"];
    $comando = $pdo->prepare("SELECT imagem_perfil FROM cadastro WHERE id=$id");
    $resultado = $comando->execute();
    while( $linhas = $comando->fetch() )
    {
        $dados_imagem = $linhas["imagem_perfil"];
        $imagem = base64_encode($dados_imagem);
       
    }


    //$imagem="img/imagem_conta.jpg";
}    

$erroLogin = $_GET["erroLogin"] ?? "";
$erroVazio = $_GET["erroVazio"] ?? "";
    
$usuarioLogado = isset($_SESSION["logado"]) && $_SESSION["logado"] === true;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODAPE TESTE</title>
    <script src="rodape.js"></script>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="ntc.css">
    
    
</head>
<body>
    
<div class="cabecalho">
        <div class="logo" onclick="Aparecer();"> 
            <div class="menu"></div>
            <div class="menu"></div>
            <div class="menu"></div>
        </div>
        <div class="logo"><a href="pagina_inicial.php"><img src="img/LOGO FUT VILLE.png" width="280px"></div></a>
        <div class="logo"><img src="img/noti.png" width="20px"></div>
    </div>


        <div class="lateral" id="lateral">
            <div onclick="Fechar();" class="fechar"><img src=img/x.png width="20px"></div> <br>      
            <div class="foto_conta">
                <div class="imagem_conta" onclick="escolherfoto();">

             


    <?php
                  
                if ($imagem=="" || $imagem=="img/perfilsemfoto.png")
                {
                    echo("<img class=\"imagem_conta\" src='img/perfilsemfoto.png' width=\"100%\">");
 
                }
                else{
                echo("<img class=\"imagem_conta\" src='data:image/jpeg;base64,$imagem' width=\"100%\">");
                

            }
            
            
     ?>       
            
            
            </div>
                <div class="nome_imagem"><?php echo( $texto); ?></div>
            </div> <br><br>
            <div class="menu_conta">  
            <a href="cadastro.php"> <div class="rodape2">Cadastro</div></a><br>
            <div class="rodape2">Escalação</div><br>
            <a href="competições.php"><div class="rodape2">Competições</div><br></a>
            <div class="rodape2">Ranking</div><br>
            <a href="ntc.php"><div class="rodape2">Notícias</div><br></a>
            <div class="rodape2">Dashboard</div><br>
            
            <?php if ($usuarioLogado): ?>
            <a href="logout.php" class="logout-button">
            <span class="logout-icon"></span> Sair
            </a>
           
            <form id="formimagem" action="adicionarfoto.php" method="post" enctype="multipart/form-data">
            <input id="nova_imagem_perfil" type="file" onchange="enviar_foto();" name="foto" accept="image/*">
           
            </form>
             <?php endif; ?>


            </div>  
        </div>

        <div class="quadrado_anuncio"></div>

        <h2 class="title" elementtiming="text-csr">O mais novo app</h2>
        <div class="red">Futville é o mais novo aplicativo da região de Joinville, com o objetivo promover o futebol de várzea e interagir com o torcedor </div>
        <img src="img/ntc1.png" alt="ntc1'" class="ntc1">
        <hr>
        
        <h2 class="title2" elementtiming="text-csr">Fundadores</h2>
        <div class="red2">Descubra e conheça aqui os fundadores dessa ideia maluca, que ajuda o futebol de várzea da região</div>
        <img src="img/ntc2.png" alt="ntc1'" class="ntc1">
        <hr>



    <div class="rodape">© 2022-2023 FutVille FC - Liga Joinvilense de Futebol</div> 
</body>
<script>
            function escolherfoto()
            {
                nova_imagem_perfil.click()
        
            }
            function enviar_foto()
            {
                formimagem.submit();
        
            }
        
            </script>
</html>