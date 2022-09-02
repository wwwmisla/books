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

</head>

<body>

  <!-- HEADER -->
  <header>
    <aside>
      <form action="#">
        <div class="form-group">
          <label for="txt_email">e-mail</label>
          <input type="email" name="txt_email" id="txt_email" class="form-control">
        </div>
        <div class="form-group">
          <label for="txt_senha">senha</label>
          <input type="password" name="txt_senha" id="txt_senha" class="form-control">
        </div>
        <a href="#">Esqueci a senha</a>
        <div>
          <input type="submit" value="Login" class="btn btn-primary">
          <a href="#" class="btn btn-primary">Cadastre-se</a>
        </div>
      </form>
    </aside>
    <h1>
      <?="Books"?>
    </h1>
    <h2>
      <?php 
      echo "Info 4M - A turma dos mais apáticos :) ";
      ?>
    </h2>
  </header>
  <!-- HEADER -->

  <!-- MAIN -->
  <main>

    <!-- FORM -->
    <form action="#" class="form-inline">
      <div class="form-group">
        <input type="text" name="txt_livro" id="txt_livro" class="form-control">
        <input type="button" value="Salvar" class="btn btn-primary" 
          onclick="criarHTML('txt_livro')">
      </div>
    </form>
    <!-- FORM -->

    <!-- SECTION -->
    <section id="sectionLivros">
      
      <?php
      require_once "model/Conexao.php";

      $sql = "select * from book;";

      if(!Conexao::execWithReturn($sql)){
        echo Conexao::getErro();
        exit(1);
      } 

        //print_r(Conexao::getData());
        $dados = Conexao::getData();

        //foreach($dados as $livro){
        foreach($dados as $livro):
  
      ?>

      <!-- ARTICLE -->
      <article>
        <!-- IMG -->
        <div>
          <img src="img/book.webp" alt="Imagem do livro">
        </div>
        <!-- IMG -->

        <!-- DETALHES -->
        <div class="detalhes">
          <h3>
            Livro: 
            <span>
              <?= $livro["nome"]; ?>
            </span>
          </h3>
          <h3>
            Páginas: 
            <span>
              <?= 
              $livro["paginas"];
              ?>
            </span>
          </h3>
          <h3>
            Autor/a/as/es: 
            <span>
              <?=
              $livro["autor"];
              ?>
            </span>
          </h3>
        </div>
        <!-- DETALHES -->

        <!-- MARCADORES -->
        <div class="livro-marcos">
          <!-- LIVRO -->
          <div class="marcadores" onclick="updateMark(this)">
            <span class="material-icons">
              book
            </span>
            <span class="contador rounded-circle">
              12
            </span>
          </div>
          <!-- LIVRO -->

          <!-- FAVORITO -->
          <div class="marcadores" onclick="updateMark(this)">
            <span class="material-icons">
              favorite
            </span>
            <span class="contador rounded-circle">
              15
            </span>
          </div>
          <!-- FAVORITO -->
        </div>
        <!-- MARCADORES -->

      </article>
      <!-- ARTICLE -->

      <?php
      //} <!-- FIM DO FOREACH() -->
      endforeach;
    ?>
    
    </section>
    <!-- SECTION -->

  </main>
  <!-- MAIN -->

</body>

</html>