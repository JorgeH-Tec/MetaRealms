<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre o Projeto - Virtual Town</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/paginas.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>


<?php include 'includes/navbar.php'; ?>

  <!-- Seção: Hero simples opcional -->
  <section class="hero">
    <img src="img/imagem_inicio2.png" class="fundo-texto3">
    <div class="conteudo-hero">
      <h1>Conheça o Projeto MetaRealms</h1>
      <p>Um mundo interativo criado com criatividade, tecnologia e colaboração.</p>
    </div>
  </section>

    <!-- Seção: Sobre o Projeto -->
  <section class="cards-classes123">
    <div class="card-classe123">
        <h2>Sobre o Projeto</h2>
        <p>O MetaRealms foi criado por um estudante apaixonado por tecnologia e inovação chamado Jorge. Unindo habilidades para desenvolver um jogo indie único, pensado para evoluir e se adaptar às novas tecnologias que surgirem nos próximos anos. Nosso objetivo é construir um universo vivo, que cresça junto com o avanço do mundo digital.</p>
    </div>
    <div class="card-classe123">
        <h2>Nossa Missão</h2>
        <p>No MetaRealms, desejo oferecer um espaço onde cada pessoa possa se expressar livremente, criar seus próprios personagens e explorar mundos cheios de possibilidades. O diferencial é desenvolver um jogo capaz de incorporar novas tendências tecnológicas ao longo do tempo, tornando a experiência sempre atual, criativa e surpreendente.</p>
    </div>
    <div class="card-classe123">
        <h2>Tecnologias Utilizadas</h2>
        <p>Este projeto foi desenvolvido utilizando HTML, CSS, JavaScript puro e PHP estruturado, integrados a um banco de dados MySQL para gerenciar usuários e suas informações. Também incluímos efeitos visuais em JavaScript, como partículas e animações, para criar uma atmosfera mais imersiva. Além disso, desenvolvemos pequenas demos interativas em JavaScript para apresentar algumas ideias do jogo enquanto ele está em desenvolvimento.</p>
    </div>
  </section>




  <!--MUNDOS-->
  <div style="text-align: center; justify-content: center;">
      <h2 class="titulo-carousel1">Mundos Disponiveis</h2>
  </div>
<section class="cards-carousel"  id="destaque">

  <div class="card artes-marciais">
    <img src="img/artes_marciais_mundo1_regulado.png" alt="Mundo Artes Marciais">
    <div class="card-title1">Artes Marciais</div>
    <p>Lute em arenas inspiradas em culturas orientais com visuais épicos.</p>
    <a href="mundo_artes_marciais.php" class="view-btn1">Entrar no Mundo</a>
  </div>

  <div class="card magia">
    <img src="img/magia2.png" alt="Mundo da Magia">
    <div class="card-title2">Magia e Feitiços</div>
    <p>Descubra reinos encantados onde você domina os elementos.</p>
    <a href="velkaria.php" class="view-btn2">Entrar no Mundo</a>
  </div>

  <div class="card dino">
    <img src="img/dino1.png" alt="Mundo Jurássico">
    <div class="card-title3">Era dos Dinossauros</div>
    <p>Sobreviva entre criaturas pré-históricas em florestas perigosas.</p>
    <a href="dino.php" class="view-btn3">Entrar no Mundo</a>
  </div>
</section>


    <!-- Seção: nos apoie/contato -->
<section class="cta">
  <div class="cta-conteudo">
    <h2>Tem algum feedback, quer nos ajudar, trabalhar conosco?</h2>
    <p>Ficaremos felizes em receber sua mensagem e trocar ideias.</p>
  <a href="https://mail.google.com/mail/?view=cm&fs=1&to=realidadevirtual.phpdt@gmail.com&su=Contato%20RV" target="_blank" class="btn-cta">Contate-nos</a>
  </div>
</section>

<!--
  Seção: Versão Demo 
  <section class="cta">
    <div class="cta-conteudo">
      <h2>Experimente a Versão Demo</h2>
      <p>Curioso para testar? Acesse uma versão <span>compacta e divertida</span> do nosso jogo.</p>
      <a href="demo-jogo.php" class="btn-cta">Testar o Demo</a>
    </div>
  </section>
-->
  <!-- RODAPÉ -->
  <footer>
    <p>&copy; 2025 Virtual Town. Todos os direitos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.10.1/tsparticles.bundle.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>
