<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Books</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/icon.svg" type="image/x-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Bootstrap 4.6 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!--- CSS -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <!-- Js -->
  <script src="js/criar-livro.js" defer></script>
  <script src="js/updateMark.js" defer></script>

</head>

<body>

  <!-- HEADER -->
  <header class="p-relative">
        <aside class="p-absolute">
            <form action="">
                <div class="form-group">
                    <label for="txt_email">e-mail</label>
                    <input type="email" name="txt_email"
                        id="txt_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_senha">Senha</label>
                    <input type="password" name="txt_senha"
                        id="txt_senha" class="form-control">
                </div>
                <a href="#">Esqueci a senha</a>
                <div class="form-group">
                    <input type="button" value="Login"
                        class="btn btn-primary">
                    <input type="button" value="Cadastre-se"
                        class="btn btn-primary">
                </div>
            </form>
        </aside>
        <h1>
            <?= "Books" ?>
        </h1>
        <h2>
            <?php 
            echo "Info 4M - A turma dos mais apáticos :)";
            ?>
        </h2>
    </header>
  <!-- HEADER -->

  <!-- MAIN -->
  <main>

    <!-- FORM -->
    <form action="#" class="form-inline">
            <div class="form-group">
                <input type="text" name="txt_livro"
                    class="form-control" id="txt_livro">
                <input type="button" value="Salvar"
                    class="btn btn-primary" id="btn_salvar">
            </div>
        </form>
    <!-- FORM -->

    <div id="livros">
            <?php
            require_once "model/Conexao.php";

            $sql = "select * from book;";

            if(!Conexao::execWithReturn($sql)){
                echo Conexao::getErro();
                exit(1);
            }
            //print_r(Conexao::getData());
            $dados = Conexao::getData();
            //print_r($dados);
            //foreach($dados as $livro){
            foreach($dados as $livro):
            
            ?>

      <!-- SECTION -->
      <section class="d-flex">
                <div class="livro-imagem">
                    <img src="img/book.webp" alt="Imagem do livro">
                </div>
                <div class="livro-contexto">
                    <p class="livro-dados">
                        Livro:
                        <span id="livro-nome">
                            <?= $livro["nome"]; ?>
                        </span>
                    </p>
                    <p class="livro-dados">
                        Páginas:
                        <span id="livro-paginas">
                            <?= $livro["paginas"]; ?>
                        </span>
                    </p>
                    <p class="livro-dados">
                        Autor/a/as/es:
                        <span id="livro-autores">
                            <?= $livro["autor"]; ?>
                        </span>
                    </p>
                </div>
                <div class="livro-marcos">
                    <div onclick="updateMark(this)">
                        <span class="material-icons">
                            book
                        </span>
                        <span class="round">
                            12
                        </span>
                    </div>
                    <div onclick="updateMark(this)">
                        <span class="material-icons">
                            favorite
                        </span>
                        <span class="round">
                            12
                        </span>
                    </div>
                </div>
            </section>
      <!-- SECTION -->

      <?php
            //}//foreach
            endforeach;
            ?>
        </div>

  </main>
  <!-- MAIN -->

</body>

</html>