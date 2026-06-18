<?php
if (!isset($parametro) || !is_array($parametro)) {
  $parametro = [];
}
$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Post - Forum</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style/home2.css">
  <link rel="stylesheet" href="style/post.css">
  <link rel="stylesheet" href="style/criarPost.css">
</head>

<body>
  <!-- CONTAINER PRINCIPAL -->
  <div class="main-container">
    <!-- SIDEBAR -->
    <aside class="sidebar">

      <nav class="sidebar-nav">
        <h3><i class="fas fa-home"></i> Menu</h3>

        <ul class="nav-list">
          <li><a href="home" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="#populares" class="nav-link"><i class="fas fa-fire"></i> Populares</a></li>
          <li><a href="#recentes" class="nav-link"><i class="fas fa-clock"></i> Recentes</a></li>
          <li><a href="perfil?id=<?php echo $_SESSION['id_usuario'] ?>" class="nav-link"><i class="fas fa-user"></i> Meus Posts</a></li>
        </ul>
      </nav>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="content">
      <?php //var_dump($parametro) 
      ?>
      <div class="criar-post-container">
        <div class="criar-post-header">
          <i class="fas fa-edit"></i>
          <h1>Criar Novo Post</h1>
        </div>

        <form class="criar-post-form" method="POST" action="salvarPost">
          <div class="form-group-criar">
            <label for="titulo"><i class="fas fa-heading"></i> Título do Post</label>
            <input
              type="text"
              id="titulo"
              name="titulo"
              required
              placeholder="Digite um título atrativo para seu post..."
              maxlength="200">
            <div class="character-count"><span id="tituloCount">0</span>/200</div>
          </div>

          <div class="form-row-criar">
            <div class="form-group-criar">
              <label for="categoria"><i class="fas fa-layer-group"></i> Categoria</label>
              <select id="categoria" name="categoria" required>
                <option value="">Selecione uma categoria...</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Desenvolvimento">Desenvolvimento</option>
                <option value="Design">Design</option>
                <option value="Segurança">Segurança</option>
                <option value="Discussões Gerais">Discussões Gerais</option>
              </select>
            </div>

            <div class="form-group-criar">
              <label for="tags"><i class="fas fa-tags"></i> Tags (separadas por vírgula)</label>
              <input
                type="text"
                id="tags"
                name="tags"
                placeholder="ex: php, laravel, web">
            </div>
          </div>

          <div class="form-group-criar">
            <label for="conteudo"><i class="fas fa-file-alt"></i> Conteúdo do Post</label>
            <textarea
              id="conteudo"
              name="conteudo"
              required
              placeholder="Compartilhe seus conhecimentos, perguntas ou discussões aqui. Seja claro e detalhado..."></textarea>
            <div class="character-count"><span id="conteudoCount">0</span> caracteres</div>
          </div>

          <div class="form-actions-criar">
            <button type="button" class="btn-criar btn-cancelar" onclick="window.history.back()">
              <i class="fas fa-times"></i> Cancelar
            </button>
            <button type="submit" class="btn-criar btn-publicar">
              <i class="fas fa-paper-plane"></i> Publicar Post
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script>
    // Contador de caracteres do título
    const tituloInput = document.getElementById('titulo');
    const tituloCount = document.getElementById('tituloCount');

    tituloInput.addEventListener('input', function() {
      tituloCount.textContent = this.value.length;
    });

    // Contador de caracteres do conteúdo
    const conteudoInput = document.getElementById('conteudo');
    const conteudoCount = document.getElementById('conteudoCount');

    conteudoInput.addEventListener('input', function() {
      conteudoCount.textContent = this.value.length;
    });

    // Validação antes de enviar
    document.querySelector('.criar-post-form').addEventListener('submit', function(e) {
      const titulo = document.getElementById('titulo').value.trim();
      const conteudo = document.getElementById('conteudo').value.trim();
      const categoria = document.getElementById('categoria').value;

      if (!titulo || titulo.length < 5) {
        e.preventDefault();
        alert('O título deve ter pelo menos 5 caracteres');
        return false;
      }

      if (!conteudo || conteudo.length < 20) {
        e.preventDefault();
        alert('O conteúdo deve ter pelo menos 20 caracteres');
        return false;
      }

      if (!categoria) {
        e.preventDefault();
        alert('Selecione uma categoria');
        return false;
      }
    });
  </script>
</body>

</html>