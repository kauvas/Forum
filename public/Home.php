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
  <title>Forum - Principal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style/home2.css">
</head>

<body>
  <!-- CONTAINER PRINCIPAL -->
  <div class="main-container">
    <!-- SIDEBAR -->
    <aside class="sidebar">

      <nav class="sidebar-nav">
        <h3><i class="fas fa-home"></i> Menu</h3>
        <?php if (isset($usuario)) {
          echo '<a class="btn-novo-topico" href="CriarPost" style="text-decoration: none"><i class="fas fa-bookmark"></i> Criar Post</a>';
        } ?>

        <ul class="nav-list">
          <li><a href="home?t=0" class="nav-link <?php ini_set('display_errors', '0');
                                                  if ($_GET['t'] == 0) echo 'active';
                                                  ini_set('display_errors', '1'); ?>"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="<?php if ($_GET['categoria'] ?? false) echo 'home?categoria=' . $_GET['categoria'] . '&t=1';
                        else echo 'home?t=1' ?>" class="nav-link <?php if ($_GET['t'] == 1) echo 'active' ?>"><i class="fas fa-clock"></i> Recentes</a></li>
          <li><a href="<?php if ($_GET['categoria'] ?? false) echo 'home?categoria=' . $_GET['categoria'] . '&t=2';
                        else echo 'home?t=2' ?>" class="nav-link <?php if ($_GET['t'] == 2) echo 'active' ?>"><i class="fas fa-fire"></i> Populares</a></li>
          <?php if (isset($usuario)) {
            echo '<li><a href="perfil?id=' . htmlspecialchars($_SESSION['id_usuario']) . '" class="nav-link"><i class="fas fa-user"></i> Meus Posts</a></li>';
          } ?>
        </ul>

        <hr>

        <h3><i class="fas fa-layer-group"></i> Categorias</h3>
        <ul class="categories-list">
          <?php if (!empty($parametro['categorias']) && is_array($parametro['categorias'])): ?>
            <?php foreach ($parametro['categorias'] as $categoria): ?>
              <li><a href="home?categoria=<?php echo $categoria['categoria'];
                                          echo "&t=" . $_GET['t']; ?>" class="category-link"><span class="badge"><?php echo htmlspecialchars($categoria['total_posts'] ?? '0'); ?></span> <?php echo htmlspecialchars($categoria['categoria'] ?? 'Sem nome'); ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </nav>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="content">
      <!-- Posts -->
      <div class="posts-container">
        <!-- Posts Dinâmicos -->
        <?php if (!empty($parametro['posts']) && is_array($parametro['posts'])): ?>
          <?php foreach ($parametro['posts'] as $post):;
          ?>
            <article class="post-item">
              <div class="post-header">

                <div class="user-info">
                  <img src="https://ui-avatars.com/api/?name=<?php echo htmlspecialchars($post['nome_usuario'] ?? 'Anônimo'); ?>&background=random" alt="Usuário">
                  <div class="user-details">
                    <a href="perfil?id=<?php echo $post['usuario_id'] ?>" style='text-decoration:none'>
                      <h4><?php echo htmlspecialchars($post['nome_usuario'] ?? 'Usuário Anônimo'); ?></h4>
                    </a>
                    <span class="post-date"><?php echo htmlspecialchars($post['data'] ?? 'agora'); ?></span>
                  </div>
                </div>
                <span class="category-badge"><?php echo htmlspecialchars($post['categoria'] ?? 'Artigo'); ?></span>
              </div>

              <a class="btn-titulo" href="post?id=<?php echo htmlspecialchars($post['post_id'] ?? ''); ?>" style="text-decoration: none">
                <h3><?php echo htmlspecialchars($post['titulo'] ?? 'Sem título'); ?></h3>
              </a>

              <p class="post-excerpt"><?php
                                      $conteudo = $post['conteudo'] ?? 'Sem conteúdo';
                                      $tam_string = 110;
                                      if (strlen($conteudo) > $tam_string) {
                                        echo htmlspecialchars(substr($conteudo, 0, $tam_string)) . '...';
                                      } else {
                                        echo htmlspecialchars($conteudo);
                                      }
                                      ?><br></p>
              <div class="post-footer">
                <span class="post-stats"><i class="fas fa-comment"></i> <?php echo $parametro['comentarios_por_post'][$post['post_id']] ?? '0'; ?> comentários</span>
                <span class="post-stats"><i class="fas fa-star"></i> <?php echo $parametro['interacoes_por_post'][$post['post_id']]["upvotes"]; ?> | <i class="fas fa-times"></i> <?php echo $parametro['interacoes_por_post'][$post['post_id']]["downvotes"]; ?> </span>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
    </main>

    <div id="entrarModal" class="modal">
      <div class="modal-content auth-modal">
        <button class="modal-close" onclick="closeEntrarModal()"><i class="fas fa-times"></i></button>

        <!-- Modal Tabs -->
        <div class="modal-tabs">
          <button class="tab-btn active" onclick="switchTab('login')">
            <i class="fas fa-sign-in-alt"></i> Login
          </button>
          <button class="tab-btn" onclick="switchTab('register')">
            <i class="fas fa-user-plus"></i> Cadastro
          </button>
        </div>

        <!-- Login Form -->
        <div id="loginTab" class="tab-content active">
          <h2 class="tab-title">Bem-vindo de volta!</h2>
          <p class="tab-subtitle">Faça login para acessar a comunidade</p>

          <form id="loginForm" method="POST" action="login" class="auth-form">
            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i> Email</label>
              <input type="email" name="email" id="email" required placeholder="seu.email@dominio.com">
            </div>

            <div class="form-group">
              <label for="senha"><i class="fas fa-lock"></i> Senha</label>
              <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
            </div>

            <button type="submit" class="btn-submit">
              <i class="fas fa-sign-in-alt"></i> Entrar
            </button>
          </form>

          <div class="form-divider">ou continue com</div>

          <div class="social-buttons">
            <button class="social-btn google" title="Login com Google">
              <i class="fab fa-google"></i>
            </button>
            <button class="social-btn github" title="Login com GitHub">
              <i class="fab fa-github"></i>
            </button>
            <button class="social-btn facebook" title="Login com Facebook">
              <i class="fab fa-facebook"></i>
            </button>
          </div>
        </div>

        <!-- Register Form -->
        <div id="registerTab" class="tab-content">
          <h2 class="tab-title">Junte-se a nossa comunidade!</h2>
          <p class="tab-subtitle">Crie sua conta e comece a participar</p>

          <form id="registerForm" method="POST" action="registrar" class="auth-form">
            <div class="form-row">
              <div class="form-group">
                <label for="nome"><i class="fas fa-user"></i> Nome Completo</label>
                <input type="text" name="nome" id="nome" required placeholder="João Silva">
              </div>

              <div class="form-group">
                <label for="usuario"><i class="fas fa-at"></i> Usuário</label>
                <input type="text" name="usuario" id="usuario" required placeholder="joaosilva">
              </div>
            </div>

            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i> Email</label>
              <input type="email" name="email" id="email" required placeholder="seu.email@dominio.com">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="senha"><i class="fas fa-lock"></i> Senha</label>
                <input type="password" name="senha" id="senha" required placeholder="Crie uma senha forte">
              </div>

              <div class="form-group">
                <label for="registerConfirmSenha"><i class="fas fa-lock"></i> Confirmar Senha</label>
                <input type="password" name="registerConfirmSenha" id="registerConfirmSenha" required placeholder="Confirme sua senha">
              </div>
            </div>

            <div class="form-terms">
              <input type="checkbox" id="terms" name="terms" required>
              <label for="terms">
                Concordo com os <a href="#">Termos de Serviço</a> e <a href="#">Política de Privacidade</a>
              </label>
            </div>

            <button type="submit" class="btn-submit">
              <i class="fas fa-user-plus"></i> Criar Conta
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function openEntrarModal() {
      document.getElementById('entrarModal').style.display = 'block';
    }

    function closeEntrarModal() {
      document.getElementById('entrarModal').style.display = 'none';
      document.getElementById('loginForm').reset();
      document.getElementById('registerForm').reset();
      switchTab('login'); // Retorna para a aba de login
    }

    function switchTab(tabName) {
      // Esconde todos os tabs
      const loginTab = document.getElementById('loginTab');
      const registerTab = document.getElementById('registerTab');
      const tabButtons = document.querySelectorAll('.tab-btn');

      loginTab.classList.remove('active');
      registerTab.classList.remove('active');
      tabButtons.forEach(btn => btn.classList.remove('active'));

      // Mostra o tab selecionado
      if (tabName === 'login') {
        loginTab.classList.add('active');
        tabButtons[0].classList.add('active');
      } else {
        registerTab.classList.add('active');
        tabButtons[1].classList.add('active');
      }
    }

    // Fechar modal ao clicar fora dele
    window.onclick = function(event) {
      const modal = document.getElementById('entrarModal');
      if (event.target === modal) {
        closeEntrarModal();
      }
    }
  </script>

</body>

</html>