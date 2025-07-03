<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Town</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/paginas.css">     <!-- só nas páginas base -->
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>

<?php include 'includes/navbar.php'; ?>

  <!-- HERO -->
  <section class="hero">
    <img src="img/imagem_inicio.png" class="fundo-texto">
    <div class="conteudo-hero">
      <h1 class="titulo-dinamico"><span>Explore o futuro</span></h1>
      <p>Realidade virtual como você nunca viu antes.</p>
      <a href="#destaque" class="botao-primario">Comece agora</a>
    </div>
    <div class="imagem-hero">

      <img src="img/inicio_direita.png">
    </div>
  </section>

  <!-- DESTAQUE1 -->
<section class="destaque" id="destaque">
  <a href="avatar.php" class="box-link">
    <div class="box">
      <h2>Escolha seu Avatar</h2>
      <p>Se identifique com os avatares de acordo suas com roupas, acessórios e estilos únicos.</p>
    </div>
  </a>

  <!-- Carrossel automático -->
  <div class="carrossel">
    <img src="img/Artes_marciais1.png" alt="Imagem 1" class="carrossel-img ativo"> <!-- botar a box link para cada mundo de cada imagem -->
    <img src="img/magia2.png" alt="Imagem 2" class="carrossel-img"> <!-- botar a box link para cada mundo de cada imagem -->
    <img src="img/dino1.png" alt="Imagem 3" class="carrossel-img"> <!-- botar a box link para cada mundo de cada imagem -->
  </div>

 <!-- "DESTAQUE"2 -->
  <a href="mundos.php" class="box-link">
    <div class="box">
      <h2>Explore Mundos</h2>
      <p>Do passado ao futuro, acesse mundos históricos, mágicos e tecnológicos em VR.</p>
    </div>
  </a>
</section>


  <!-- CTA -->
<section class="cta">
  <img src="img/imagem_inicio.png" class="fundo-texto2">
  <div class="cta-conteudo">
    <h2>Pronto para entrar nesse universo?</h2>
    <p><span>Desbloqueie novas experiências</span> explorando mundos incríveis e escolhendo seu avatar.</p>
    <a href="cadastro.php" class="btn-cta">Cadastre-se Agora</a>
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
