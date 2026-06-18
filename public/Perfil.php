<?php
if (!isset($parametro) || !is_array($parametro)) {
  $parametro = [];
}
//echo $_SESSION['usuario'];
$usuario = $_SESSION['usuario'] ?? null;
$dados = $parametro["dados_usuario"][0]["usuario"] ?? null;

$karma = 0;
if ($parametro['estado_salvo'] == null) {
  foreach ($parametro["posts"] as $post) {
    $karma += $parametro['contagens_por_posts'][$post['post_id']]['interacoes']['upvotes'];
    $karma -= $parametro['contagens_por_posts'][$post['post_id']]['interacoes']['downvotes'];
    $_SESSION['karmaReal'] = $karma;
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum - Perfil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style/home2.css">
</head>

<body>
  <?php //var_dump($parametro["dados_usuario"][0]) 
  ?>

  <!-- CONTAINER PRINCIPAL -->
  <div class="main-container">
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <nav class="sidebar-nav">
        <h3><i class="fas fa-home"></i> Menu</h3>

        <?php ini_set('display_errors', '0');
        if ($_SESSION['logado'] == true) {
          echo '<a class="btn-novo-topico" href="CriarPost" style="text-decoration: none"><i class="fas fa-bookmark"></i> Criar Post</a>';
        } ?>

        <ul class="nav-list">
          <li><a href='home' class="nav-link"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="#populares" class="nav-link"><i class="fas fa-fire"></i> Populares</a></li>
          <li><a href="#recentes" class="nav-link"><i class="fas fa-clock"></i> Recentes</a></li>
        </ul>
      </nav>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="content">
      <!-- Banner do Perfil -->
      <div class="profile-banner"></div>

      <!-- Card do Perfil -->
      <div class="profile-card">
        <!-- Avatar -->
        <div class="profile-header">
          <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($dados)); ?>&background=random&size=128" alt="<?php echo htmlspecialchars($dados); ?>" class="profile-avatar-large">

          <div class="profile-info">
            <div class="profile-name-section">
              <h1 class="profile-username">u/<?php echo htmlspecialchars($dados); ?></h1>
              <?php if (isset($usuario) && $usuario === $dados): ?>
                <button class="btn-edit-profile"><i class="fas fa-edit"></i> Editar Perfil</button>
              <?php endif; ?>
            </div>

            <div class="profile-stats">
              <div class="stat-item">
                <span class="stat-label">Karma</span>
                <span class="stat-value"><?php
                                          if ($parametro['estado_salvo'] == 0) {
                                            echo $karma;
                                          } else {
                                            echo $_SESSION['karmaReal'];
                                          }
                                          ?></span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Posts</span>
                <span class="stat-value"><?php echo $parametro['posts_por_usuario'] ?></span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Comentários</span>
                <span class="stat-value"><?php echo $parametro['comentarios_por_usuario'] ?></span>
              </div>
            </div>

            <p class="profile-bio"><?php echo htmlspecialchars($parametro["dados_usuario"][0]["biografia"]); ?></p>

            <!-- Seção de Credenciais -->
            <div class="credentials-section">
              <?php if (isset($parametro["dados_credenciais"][0]))
                echo '<h3 class="credentials-title"><i class="fas fa-badge"></i> Credenciais</h3>';
              ?>
              <div class="credentials-list">
                <?php
                if (!empty($parametro["dados_credenciais"]) && is_array($parametro["dados_credenciais"])) {
                  foreach ($parametro["dados_credenciais"] as $credencial) {
                    $nome = htmlspecialchars($credencial['nome'] ?? '');
                    $desc = htmlspecialchars($credencial['descricao'] ?? '');
                    $nomeEscaped = str_replace("'", "\\'", str_replace("\\", "\\\\", $nome));
                    $descEscaped = str_replace("'", "\\'", str_replace("\\", "\\\\", $desc));
                    echo '<span class="credential-badge" onclick="openCredentialModal(\'' . $nomeEscaped . '\', \'' . $descEscaped . '\')" title="Clique para ver detalhes">' . $nome . '</span>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Abas de Conteúdo -->
      <div class="profile-tabs">
        <?php if ($parametro['estado-salvo'] == 1): ?>
          <button class="tab-btn active" onclick="switchProfileTab('posts')">
            <i class="fas fa-pen-fancy"></i> Posts
          </button>
        <?php else: ?>
          <a href="perfil?id=<?php echo $parametro['id_pagina'] ?>" style="text-decoration: none" class="tab-btn">
            <i class="fas fa-pen-fancy"></i> Posts</a>
        <?php endif ?>
        <button class="tab-btn" onclick="switchProfileTab('comentarios')">
          <i class="fas fa-comments"></i> Comentários
        </button>
        <a href="perfil?id=<?php echo $parametro['id_pagina'] ?>&s=1" style="text-decoration: none" class="tab-btn">
          <i class="fas fa-bookmark"></i> Salvos</a>
      </div>

      <!-- Conteúdo das Abas -->
      <div id="postsTab" class="tab-pane active">
        <!-- Posts do Usuário - Dinâmicos -->
        <?php if (!empty($parametro['posts']) && is_array($parametro['posts'])): ?>
          <?php foreach ($parametro['posts'] as $post): ?>
            <article class="post-item">
              <div class="post-header">
                <div class="user-info">
                  <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($dados)); ?>&background=random" alt="Usuário">
                  <div class="user-details">
                    <h4>u/<?php echo htmlspecialchars($dados); ?></h4>
                    <span class="post-date"><?php echo htmlspecialchars($post['data_criacao'] ?? 'agora'); ?></span>
                  </div>
                </div>
                <span class="category-badge"><?php echo htmlspecialchars($post['categoria'] ?? 'Artigo'); ?></span>
              </div>
              <a href="post?id=<?php echo $post['post_id']; ?>" style="text-decoration: none; color: inherit;">
                <button class='btn-titulo'>
                  <h3><?php echo htmlspecialchars($post['titulo'] ?? 'Sem título'); ?></h3>
                </button>
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
                <span class="post-stats"><i class="fas fa-comment"></i> <?php echo $parametro["contagens_por_posts"][$post['post_id']]['comentarios'] ?? '0'; ?> comentários</span>
                <span class="post-stats"><i class="fas fa-star"></i> <?php echo $parametro["contagens_por_posts"][$post['post_id']]['interacoes']['upvotes'] ?? '0'; ?> upvotes</span>
                <span class="post-stats"><i class="fas fa-times"></i> <?php echo $parametro["contagens_por_posts"][$post['post_id']]['interacoes']['downvotes'] ?? '0'; ?> downvotes</span>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="text-align: center; padding: 20px;">Nenhum post ainda. Comece a compartilhar!</p>
        <?php endif; ?>
      </div>

      <!-- Aba de Comentários -->
      <div id="comentariosTab" class="tab-pane">
        <!-- Comentários do Usuário - Dinâmicos -->
        <?php if (!empty($parametro['comentarios']) && is_array($parametro['comentarios'])): ?>
          <?php foreach ($parametro['comentarios'] as $comentario):
            foreach ($parametro['posts'] as $post): ?>

              <article class="comment-item" style="border-left: 4px solid #3b4fc9; padding: 15px; margin-bottom: 15px; background-color: #f6f7fb; border-radius: 4px;">
                <div class="comment-header">
                  <div class="user-info">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($dados)); ?>&background=random" alt="Usuário" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 10px;">
                    <div class="user-details">
                      <h4>u/<?php echo htmlspecialchars($dados); ?></h4>
                      <span class="post-date"><?php echo htmlspecialchars($comentario['data_criacao'] ?? 'agora'); ?></span>
                    </div>
                  </div>
                </div>
                <p class="comment-text" style="margin: 10px 0; line-height: 1.5;">
                  <?php echo htmlspecialchars($comentario['conteudo'] ?? 'Sem conteúdo'); ?>
                </p>
                <div class="comment-footer" style="font-size: 0.9em; color: #555;">
                  <strong>Comentado em: </strong>
                  <span style="color: #3b4fc9;">
                    <?php
                    $post_id = $comentario['post_id'] ?? null;
                    if ($post_id) {
                      echo htmlspecialchars($post['titulo'] ?? 'Sem título');
                    } else {
                      echo "Post removido";
                    }
                    ?>
                  </span>
                </div>
              </article>
          <?php endforeach;
          endforeach; ?>
        <?php else: ?>
          <p style="text-align: center; padding: 20px;">Nenhum comentário realizado ainda.</p>
        <?php endif; ?>
      </div>
    </main>
  </div>
  <?php if (isset($usuario) && $usuario === $dados): ?>
    <!-- MODAL DE VISUALIZAÇÃO DE CREDENCIAL -->
    <div id="credentialModal" class="modal-credential">
      <div class="modal-content-credential">
        <div class="modal-header-credential">
          <h2 id="credentialModalTitle"></h2>
          <button class="close-modal" onclick="closeCredentialModal()"><i class="fas fa-times"></i></button>
        </div>

        <div class="modal-body-credential">
          <p id="credentialModalDesc"></p>
        </div>

        <div class="modal-footer-credential">
          <button type="button" class="btn-close-modal" onclick="closeCredentialModal()">Fechar</button>
        </div>
      </div>
    </div>

    <!-- MODAL DE EDIÇÃO DE PERFIL -->
    <div id="editProfileModal" class="modal-edit-profile">
      <div class="modal-content-edit-profile">
        <div class="modal-header-edit">
          <h2>Editar Perfil</h2>
          <button class="close-modal" onclick="closeEditProfileModal()"><i class="fas fa-times"></i></button>
        </div>

        <form class="edit-profile-form" method="POST" action="editarBiografia">
          <!-- Seção de Biografia -->
          <div class="form-section">
            <label for="biographyEdit" class="form-label"><i class="fas fa-file-alt"></i> Biografia</label>
            <textarea id="biographyEdit" name="biographyEdit" class="form-textarea" placeholder="Escreva uma breve descrição sobre você..." maxlength="500" rows="5"><?php echo htmlspecialchars($parametro["dados_usuario"][0]["biografia"] ?? ''); ?></textarea>
            <span class="char-count"><span id="charCount">0</span>/500</span>
          </div>

          <!-- Seção de Credenciais -->
          <div class="form-section">
            <div class="credentials-header">
              <label class="form-label"><i class="fas fa-badge"></i> Credenciais</label>
              <button type="button" class="btn-add-credential" onclick="openAddCredentialModal()">
                <i class="fas fa-plus"></i> Adicionar Credencial
              </button>
            </div>

            <div id="credentialsContainer" class="credentials-container">
              <?php
              if (!empty($parametro["dados_credenciais"]) && is_array($parametro["dados_credenciais"])) {
                foreach ($parametro["dados_credenciais"] as $credencial) {
                  $nome = htmlspecialchars($credencial['nome'] ?? '');
                  $descricao = htmlspecialchars($credencial['descricao'] ?? '');
                  echo "
                                <div class=\"credential-input-group\">
                                    <div class=\"credential-field-wrapper\">
                                        <small class=\"form-input credential-input credential-name\">{$nome}</small>
                                        <small class=\"credential-description\">{$descricao}</small>
                                    </div>
                                    <a class=\"btn-remove-credential\" href=\"removerCredencial?id_credencial={$credencial['credencial_id']}&id_usuario={$credencial['usuario_id']}\">
                                        <i class=\"fas fa-trash\"></i>
                                    </a>
                                </div>
                                ";
                }
              } else {
                echo "Adcione credenciais!";
              }
              ?>
            </div>
          </div>


          <!-- Botões de Ação -->
          <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="closeEditProfileModal()">Cancelar</button>
            <button type="button" class="btn-cancel" onclick="openSettingsModal()">Opções de conta</button>
            <button type="submit" class="btn-save-profile">Salvar Alterações</button>
          </div>
        </form>
      </div>
    </div>

    <div id="settingsModal" class="modal-settings">
      <div class="modal-content-settings">

        <div class="modal-header-settings">
          <h2><i class="fas fa-cog"></i> Opções de Conta</h2>
          <button type="button" class="close-modal" onclick="closeSettingsModal()">&times;</button>
        </div>

        <form class="settings-form" method="POST" action="atualizarConta">
          <input type="hidden" name="usuario_id" value=<?php echo $parametro["dados_usuario"][0]["id"] ?>>

          <div class="form-section">
            <label for="settingsEmail" class="form-label">
              <i class="fas fa-envelope"></i> Alterar E-mail
            </label>
            <input type="email" id="settingsEmail" name="email" class="form-input" placeholder="seu-email@exemplo.com" value="<?php echo htmlspecialchars($parametro["dados_usuario"][0]["email"] ?? ''); ?>">
          </div>

          <div class="form-section">
            <label for="settingsPassword" class="form-label">
              <i class="fas fa-lock"></i> Nova Senha
            </label>
            <input type="password" id="settingsPassword" name="nova_senha" class="form-input" placeholder="Digite a nova senha (mínimo 6 caracteres)">
          </div>

          <div class="form-section">
            <label for="settingsConfirmPassword" class="form-label">
              <i class="fas fa-shield-alt"></i> Confirmar Nova Senha
            </label>
            <input type="password" id="settingsConfirmPassword" name="confirmar_senha" class="form-input" placeholder="Confirme a nova senha">
          </div>

          <hr class="settings-divider">

          <a href="limpa" class="btn-cancel" style="text-decoration: none"> Log-out </a>

          <div class="danger-zone">
            <h3><i class="fas fa-exclamation-triangle"></i> Zona de Perigo</h3>
            <p>A exclusão da conta é permanente e apagará todos os seus dados.</p>
            <a href="excluirConta?usuario_id=<?php echo $parametro['dados_usuario'][0]["id"] ?>" class="btn-delete-account" onclick="return confirm('Tem certeza absoluta que deseja excluir sua conta? Esta ação não pode ser desfeita.');">
              <i class="fas fa-user-times"></i> Excluir Minha Conta
            </a>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="closeSettingsModal()">Cancelar</button>
            <button type="submit" class="btn-save-profile">Salvar Configurações</button>
          </div>
        </form>

      </div>
    </div>

    <!-- MODAL DE ADICIONAR CREDENCIAL -->
    <div id="addCredentialModal" class="modal-add-credential">
      <div class="modal-content-add-credential">
        <div class="modal-header-add">
          <h2>Adicionar Credencial</h2>
          <button type="button" class="close-modal" onclick="closeAddCredentialModal()"><i class="fas fa-times"></i></button>
        </div>

        <form method="post" action="adcionarCredencial" class="add-credential-form">
          <div class="form-section">
            <label for="credentialName" class="form-label"><i class="fas fa-tag"></i> Nome da Credencial</label>
            <input type="text" id="credentialName" name="credentialName" class="form-input" placeholder="Ex: Developer Full Stack" maxlength="50" required>
            <span class="char-count"><span id="charCountName">0</span>/50</span>
          </div>

          <div class="form-section">
            <label for="credentialDesc" class="form-label"><i class="fas fa-align-left"></i> Descrição</label>
            <textarea id="credentialDesc" name="credentialDesc" class="form-textarea" placeholder="Descreva esta credencial..." maxlength="200" rows="4"></textarea>
            <span class="char-count"><span id="charCountDesc">0</span>/200</span>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="closeAddCredentialModal()">Cancelar</button>
            <button type="submit" class="btn-save-credential">Adicionar</button>
          </div>
        </form>
      </div>
    </div>
  <?php endif ?>

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

          <div class="form-remember">
            <input type="checkbox" id="rememberMe" name="rememberMe">
            <label for="rememberMe">Lembrar-me</label>
            <a href="#" class="forgot-password">Esqueceu a senha?</a>
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
    // Funções de Modal de Visualização de Credencial
    function openCredentialModal(nome, descricao) {
      const modal = document.getElementById('credentialModal');
      document.getElementById('credentialModalTitle').textContent = nome;
      document.getElementById('credentialModalDesc').textContent = descricao || 'Sem descrição disponível.';
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeCredentialModal() {
      const modal = document.getElementById('credentialModal');
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }

    // Fechar modal de credencial ao clicar fora
    window.addEventListener('click', (event) => {
      const modal = document.getElementById('credentialModal');
      if (event.target === modal) {
        closeCredentialModal();
      }
    });

    // Fechar modal de credencial ao pressionar ESC
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        closeCredentialModal();
      }
    });

    // Funções de controle de abas de perfil
    function switchProfileTab(tabName) {
      const allTabs = document.querySelectorAll('.tab-pane');
      const allButtons = document.querySelectorAll('.profile-tabs .tab-btn');

      allTabs.forEach(tab => tab.classList.remove('active'));
      allButtons.forEach(btn => btn.classList.remove('active'));

      const tabId = tabName + 'Tab';
      document.getElementById(tabId).classList.add('active');
      event.target.classList.add('active');
    }

    // Funções de Modal de Edição de Perfil
    const editProfileBtn = document.querySelector('.btn-edit-profile');
    if (editProfileBtn) {
      editProfileBtn.addEventListener('click', openEditProfileModal);
    }

    function openEditProfileModal() {
      const modal = document.getElementById('editProfileModal');
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';

      // Atualizar o contador de caracteres da biografia ao abrir o modal
      const biographyInput = document.getElementById('biographyEdit');
      if (biographyInput) {
        document.getElementById('charCount').textContent = biographyInput.value.length;
      }
    }

    function closeEditProfileModal() {
      const modal = document.getElementById('editProfileModal');
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }

    // Fechar modal ao clicar fora
    window.addEventListener('click', (event) => {
      const modal = document.getElementById('editProfileModal');
      if (event.target === modal) {
        closeEditProfileModal();
      }
    });

    // Contador de caracteres da biografia
    const biographyInput = document.getElementById('biographyEdit');
    if (biographyInput) {
      biographyInput.addEventListener('input', (e) => {
        document.getElementById('charCount').textContent = e.target.value.length;
      });
      // Inicializar contador
      document.getElementById('charCount').textContent = biographyInput.value.length;
    }

    // Modal de Adicionar Credencial
    function openAddCredentialModal() {
      const modal = document.getElementById('addCredentialModal');
      modal.classList.add('active');
    }

    function closeAddCredentialModal() {
      const modal = document.getElementById('addCredentialModal');
      modal.classList.remove('active');
    }

    // Contadores de caracteres do modal de credencial
    const credentialNameInput = document.getElementById('credentialName');
    if (credentialNameInput) {
      credentialNameInput.addEventListener('input', (e) => {
        document.getElementById('charCountName').textContent = e.target.value.length;
      });
    }

    // Fechar modal ao clicar fora
    window.addEventListener('click', (event) => {
      const addModal = document.getElementById('addCredentialModal');
      if (event.target === addModal) {
        closeAddCredentialModal();
      }
    });

    function openSettingsModal() {
      const modal = document.getElementById('settingsModal');
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeSettingsModal() {
      const modal = document.getElementById('settingsModal');
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }

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