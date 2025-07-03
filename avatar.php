<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aquarium Futurista</title>
   <link rel="stylesheet" href="css/reset.css">
   <link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/paginas.css">     <!-- só nas páginas base -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>


<?php include 'includes/navbar.php'; ?>


<!-- HERO -->
  <section class="hero">

  <div class="conteudo-hero">
   <img src="img/imagem_inicio.png" class="fundo-texto2">
   <h1 class="titulo-dinamico"><span>Avatares</span></h1>
   <p>Personalize seu avatar e viaje por universos incríveis — do mágico ao pré-histórico, do futuro ao passado.</p>
   <a href="#destaque" class="botao-primario">Escolha seu avatar</a>
  </div>

  </section>

<section class="sobre-mundo">
  <!-- SOBRE -->
      <h2>Sobre os Avatares</h2>
      <p>
        Bem-vindo ao Virtual Town! Aqui, cada avatar conta uma história única. Escolha seu avatar, explore novos mundos e viva aventuras emocionantes. 
        Escolha entre 
        <span class="span-artes-marciais">guerreiros</span>, 
        <span class="span-magia">magos</span> ou até 
        <span class="span-dino">dinossauros</span> 
        e transforme sua experiência em algo épico!
      </p>
</section>

</section>


  <div id="destaque"></div>
<section class="popular-collections">
  <img src="img/imagem_inicio2.png" class="fundo-texto3">

  <h2 class="h2bonitin">Escolha seu Avatar</h2> <br>
  

  <div class="card-grid">
    <div class="collection-card">
      <img src="img/espadachim2.png" alt="Yellow Painting">
      <div class="info_artes_marciais">
        <p>Espadachins</p>
      </div>
    </div>
    <div class="collection-card">
      <img src="img/elfos_bons.jpg" alt="Yellow Painting">
      <div class="info_elfo">
        <p>Elfos</p>

      </div>
    </div>
    <div class="collection-card">
      <img src="img/2cacadores.png" alt="Yellow Painting">
      <div class="info_cacador">
        <p>Caçadores</p>
      </div>
    </div>
    <div class="collection-card">
      <img src="img/corpo-a-corpo.png" alt="Yellow Painting" style="filter: brightness(1.5);">
      <div class="info_artes_marciais2">
        <p>Lutadores</p>
      </div>
    </div>
    <div class="collection-card">
      <img src="img/humano_x_demonio.png" alt="Yellow Painting">
      <div class="info">
        <p><span class="demonio">Demônios </span> X <span class="humano"> Humanos</span></p>
      </div>
    </div>
    <div class="collection-card">
      <img src="img/ossada_dino1.png" alt="Yellow Painting">
      <div class="info_domadora">
        <p>Domadora</p>

      </div>
    </div>
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
