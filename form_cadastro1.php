<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="design.css">
        <link rel="stylesheet" type="text/css" href="design2.css">
        <link rel="icon" type="imagem/png" href="imagens/icone.jpg">
	    <!--<link rel="stylesheet" type="text/css" href="estilo.css">-->
    </head>
    <body>
    
     <!-- HEADER -->
        <div class="header">
          <center>
               
               <div class="logo">
                    <a href="index.php">
                        <img id="header_logo" src="imagens/logomarca.jpg">
                    </a>
                </div>
               
               <div class="links">
                    <a class="a_header" href="index.php">HOME</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="a_header" href="index1.php">PRODUTOS</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                        session_start();
                        if(isset($_SESSION['usuario']))
                        {
                            include "conexao1.php";
                            $email=$_SESSION['usuario'];
                            $sql="SELECT * FROM cadastro WHERE email='$email' AND excluido='n' AND tipo='Administrador';";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_num_rows($resultado);
                            if($linhas>0)
                            {
                                echo "<a class=\"a_header\" href=\"admin.php\">ADMIN</a>";
                            }
                            else
                            {
                                echo "<a class=\"a_header\" href=\"perfil.php\">PERFIL</a>";
                            }
                        }
                        else
                        {
                            echo "<a class=\"a_header\" href=\"form_login.php\">LOGIN</a>";
                        }
                        
                    ?>
                    
                    &nbsp;&nbsp;&nbsp;
                    <a class="a_header" href="dev.php">DEVS</a>
                    
                    <br><br>
                    
               </div>
                
                <div class="busca">
                    <form action="pesquisa.php" method="post">
                    	<input type="text" id="txtbusca" name="txtbusca" placeholder="Buscar..."/>
                    	<input type=image src="imagens/img_busca.jpeg" id="btnbusca"/>
		             </form>
                    
                </div>
                
                <div class="header_carrinho">
                    <a href="carrinho.php">
                        <img src="imagens/img_carrinho.jpeg" id="img_carrinho"/>
                    </a>
                    <br>
                    
                </div>
                
            </center>
        </div>
        
        <center>
    <div class="div_principal"><section>
       
       <br><br><br><br><br><br><br>
        <font face = "Arial" size = "4" color="#300b59">
        <h1>Cadastro</h1>
        <div id="meio">
        
        <center><div style="text-align: justify; width: 320px; color: #300b59"> <!-- para centralizar o form -->
        
            <form action="insert_cadastro1.php" method="post">
                <text align="justify">
                <br>Nome<sup>*</sup>:<br>
                <input type="text" name="nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" maxlenght = 50 size = 40 required><br>

                <br>Endereço<sup>*</sup>:<br>
                <input type="text" name="endereco" size = 40 required><br>

                <br>CEP<sup>*</sup>:<br>
                <input type="number" name="cep" maxlenght = 50 size = 40 required><br>

                <br>CPF<sup>*</sup>:<br>
                <input type="number" name="cpf" maxlenght = 50 size = 40 required><br>

                <br>Data de nascimento<sup>*</sup>:<br>
                <input type="date" name="data_nasc" required><br>

                <br><fieldset class="form_box">
                Sexo<sup>*</sup>:<hr>
                <input type="radio" name="sexo" value="m" required>
                <label for="masculino">Masculino</label><br>
                <input type="radio" name="sexo" value="f" required>
                <label for="feminino">Feminino</label><br>
                <input type="radio" name="sexo" value="x" required>
                <label for="outro">Outro</label>
                </fieldset>

                <br>E-mail<sup>*</sup>:<br>
                <input type="email" name="email" required><br>

            <script language="javascript">
                function passwordChanged() {
                    var strength = document.getElementById('strength');
                    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
                    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
                    var pwd = document.getElementById("senha");
                    if (pwd.value.length == 0) {
                            strength.innerHTML = 'SENHA:';
                    } else if (false == enoughRegex.test(pwd.value)) {
                            strength.innerHTML = 'Mais caracteres';
                    } else if (strongRegex.test(pwd.value)) {
                            strength.innerHTML = '<span style="color:green">Forte!</span>';
                    } else if (mediumRegex.test(pwd.value)) {
                            strength.innerHTML = '<span style="color:orange">Intermediária!</span>';
                    } else {
                            strength.innerHTML = '<span style="color:red">Fraca!</span>';
                    }
                }
            </script>
            <br><span id="strength">SENHA<sup>*</sup>:</span><br>
            <input name="senha" id="senha" type="password" size="15" maxlength="100" onkeyup="return passwordChanged();" required><br>
		<br>Digite novamente a senha<sup>*</sup>:<br>
                <input type="password" name="confirma" required><br>


                <br><fieldset class="form_box">
                    Tipo<sup>*</sup>:<hr>
                    <input type="radio" name="tipo" value="Administrador" required>
                    <label for="adm">Administrador</label><br>
                    <input type="radio" name="tipo" value="Usuário" required>
                    <label for="cliente">Usuário</label>
                </fieldset>

                <br><br><input type="submit" value="ENVIAR" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" value="LIMPAR" class="btn"><br><br><br>
                </text>
            </form>
            
            </div></center> <!--para centralizar o form-->
            
            </div>
        </font>
    </section></div>
            </center>
    
            <!-- FOOTER -->
                <div class="footer">
                   <center>
                       <br><br>
                        <a class="a_header" href="index.php">HOME</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="a_header" href="index1.php">PRODUTOS</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        session_start();
                        if(isset($_SESSION['usuario']))
                        {
                            include "conexao1.php";
                            $email=$_SESSION['usuario'];
                            $sql="SELECT * FROM cadastro WHERE email='$email' AND excluido='n' AND tipo='Administrador';";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_num_rows($resultado);
                            if($linhas>0)
                            {
                                echo "<a class=\"a_header\" href=\"admin.php\">ADMIN</a>";
                            }
                            else
                            {
                                echo "<a class=\"a_header\" href=\"perfil.php\">PERFIL</a>";
                            }
                        }
                        else
                        {
                            echo "<a class=\"a_header\" href=\"form_login.php\">LOGIN</a>";
                        }
                        
                    ?>
                    
                    &nbsp;&nbsp;&nbsp;
                        <a class="a_header" href="dev.php">DEVS</a>
                        
                        <br><br>
                        
                        01 - Ana Silva | 
                        08 - Diego Rodrigues | 
                        21 - Leonardo Muto | 
                        25 - Luana Lima | 
                        30 - Sara Ceschin | 
                        32 - Sofia Conti
                        
                        <br><br><br>
                    </center>
                </div>
    
    </body>
</html>