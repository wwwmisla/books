function criarHTML(idLivro) {

  let nomeLivro = document.querySelector("#" + idLivro).value;
  
  let article = document.createElement("article");
  let divImagem = document.createElement("div");
  let divDetalhes = document.createElement("div");
  let divMarcadores = document.createElement("div");

  let img = document.createElement("img");

  let hTitulo = document.createElement("h3");
  let hPaginas = document.createElement("h3");
  let hAutores = document.createElement("h3");
  ////
  let spanTitulo = document.createElement("span");
  let spanPaginas = document.createElement("span");
  let spanAutores = document.createElement("span");

  let marcadorLido = criarMarcador("book", "0");
  let marcadorFavorito = criarMarcador("favorite", "0");

  img.setAttribute("src", "img/book.webp");
  img.setAttribute("alt", "Imagem do livro: " + nomeLivro);

  divDetalhes.setAttribute("class", "detalhes");
  hTitulo.innerHTML = "Livro: ";
  hPaginas.innerHTML = "Páginas: ";
  hAutores.innerHTML = "Autor/a/as/es: ";

  spanTitulo.innerHTML = nomeLivro;
  spanPaginas.innerHTML = "???";
  spanAutores.innerHTML = "???";

  divImagem.appendChild(img);

  hTitulo.appendChild(spanTitulo);
  hPaginas.appendChild(spanPaginas);
  hAutores.appendChild(spanAutores);

  divDetalhes.appendChild(hTitulo);
  divDetalhes.appendChild(hPaginas);
  divDetalhes.appendChild(hAutores);

  divMarcadores.appendChild(marcadorLido);
  divMarcadores.appendChild(marcadorFavorito);

  article.appendChild(divImagem);
  article.appendChild(divDetalhes);
  article.appendChild(divMarcadores);

  document.querySelector("#sectionLivros").appendChild(article);
}

function criarMarcador(icone, numero) {
  let div = document.createElement("div");
  let spanIcone = document.createElement("span");
  let spanNumero = document.createElement("span");

  div.setAttribute("class", "marcadores");
  spanIcone.setAttribute("class", "material-icons");
  spanNumero.setAttribute("class", "contador rounded-circle");

  spanIcone.innerHTML = icone;
  spanNumero.innerHTML = numero;

  div.appendChild(spanIcone);
  div.appendChild(spanNumero);

  return div;
}

/*
document.querySelector("#btn_salvar").addEventListener("click", criarLivro);

function criarLivro(){
    let nomeLivro = document.querySelector("#txt_livro").value;

    let livro = document.createElement("section");
    livro.setAttribute("class", "d-flex");

    document.querySelector("#livros").appendChild(livro);

    adicionarImagem(livro);
    adicionarDetalhes(livro, nomeLivro);
    adicionarMarcadores(livro);
}

function adicionarImagem(section){
    let div = document.createElement("div");
    div.setAttribute("class", "livro-imagem");

    let imagem = document.createElement("img");
    imagem.src = "img/livro.webp";
    imagem.alt = "Imagem do livro";

    div.appendChild(imagem);
    section.appendChild(div);
}

function adicionarDetalhes(section, nomeLivro){
    let div = document.createElement("div");
    div.setAttribute("class", "livro-contexto");

    section.appendChild(div);

    criarTexto(div, "Livro", nomeLivro);
    criarTexto(div, "Páginas", "???");
    criarTexto(div, "Autor/a/as/es", "???");
}

function criarTexto(div, descricao, valor){
    let p = document.createElement("p");
    let span = document.createElement("span");

    p.className = "livro-dados";
    p.innerHTML = descricao + ": ";
    p.appendChild(span);

    span.id = "livro-nome[]";
    span.innerHTML = valor;

    div.appendChild(p);
}

function adicionarMarcadores(section){
    let div = document.createElement("div");
    div.setAttribute("class", "livro-marcos");

    section.appendChild(div);
    criarMarcador(div, "book", 0);
    criarMarcador(div, "favorite", 0);
}

function criarMarcador(div, icone, numero){
    let marcador = document.createElement("div");
    let spanIcone = document.createElement("span");
    let spanNumero = document.createElement("span");

    spanIcone.className = "material-icons";
    spanIcone.innerHTML = icone;

    spanNumero.className = "round";
    spanNumero.innerHTML = numero;

    marcador.appendChild(spanIcone);
    marcador.appendChild(spanNumero);
    div.appendChild(marcador);
}
*/