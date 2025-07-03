<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Town - Mundos</title>
   <link rel="stylesheet" href="css/reset.css">
   <link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/paginas.css">     <!-- só nas páginas base -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />

</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>

<?php include 'includes/navbar.php'; ?>

  <!-- HERO 
  <section class="hero">
    <h1>Mundos Virtuais</h1>
    <p>Explore diferentes experiências — do mágico ao pré-histórico, do futuro ao passado.</p>
  </section>
  -->   


  <!-- HERO -->
  <section class="hero">

    <div class="conteudo-hero">
    <img src="img/imagem_inicio.png" class="fundo-texto2">
      <h1 class="titulo-dinamico"><span>Mundos Virtuais</span></h1>
      <p>Explore diferentes experiências — do mágico ao pré-histórico, do futuro ao passado.</p>
      <a href="#destaque" class="botao-primario">Comece agora</a>
    </div>

  </section>

  <!-- MUNDOS - CARDS -->

    <div style="text-align: center; justify-content: center;   margin-top: 20px;">
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


  <!-- RODAPÉ -->
  <footer>
    <p>&copy; 2025 Virtual Town. Todos os direitos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.10.1/tsparticles.bundle.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
