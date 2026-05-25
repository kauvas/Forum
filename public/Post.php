<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
//echo $_SESSION['usuario'];
//$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post - Forum</title>
    <link rel="stylesheet" href="style/home2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style/post.css">
</head>
<body>
    <span><?php //var_dump($_SESSION['usuario']) ?></span>
    <span><?php //var_dump(isset($_SESSION)) ?></span>
    <span><?php //var_dump($parametro) ?></span>
    <!-- Main Container -->
    <div class="post-container">
        <!-- Post Principal -->
        <div class="post-full">
            <!-- Post Header -->
            <div class="post-full-header">
                <div class="post-full-user">
                    <img src="https://ui-avatars.com/api/?name=<?php echo htmlspecialchars($parametro["post"][0]['nome_usuario'] ?? 'Anônimo') ?>&background=random" alt="Autor">
                    <div class="post-full-user-info">
                        <h4><?php echo htmlspecialchars($parametro["post"][0]['nome_usuario'] ?? 'N/A'); ?></h4>
                        <span>em r/DesenvolvimentoWeb • 2 dias atrás</span>
                    </div>
                </div>
                <button class="post-full-options">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

            <!-- Post Body -->
            <div class="post-full-body">
                <h1 class="post-full-title"><?php echo htmlspecialchars($parametro["post"][0]['titulo'] ?? 'Sem título'); ?></h1>
                <p class="post-full-content"><?php echo nl2br(htmlspecialchars($parametro["post"][0]['conteudo'] ?? 'Sem conteúdo')); ?></p>
            </div>

            <!-- Post Actions -->
            <div class="post-actions">
                <button class="action-btn">
                    <i class="fas fa-arrow-up"></i>
                    <span>Upvote</span>
                </button>
                <button class="action-btn">
                    <i class="fas fa-arrow-down"></i>
                    <span>Downvote</span>
                </button>
                <button class="action-btn">
                    <i class="fas fa-reply"></i>
                    <span>Comentar</span>
                </button>
                <button class="action-btn">
                    <i class="fas fa-share"></i>
                    <span>Compartilhar</span>
                </button>
                <button class="action-btn">
                    <i class="fas fa-bookmark"></i>
                    <span>Salvar</span>
                </button>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h2 class="comments-header">
                <i class="fas fa-comments"></i>
                Comentários (<span id="comentariosCount">0</span>)
            </h2>

            <!-- Comment Form - Apenas para usuários logados -->
            <?php if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])): ?>
            <div class="comment-form" id="commentFormLogado">
                <div class="comment-form-header">
                    <img src="https://ui-avatars.com/api/?name=<?php echo htmlspecialchars($_SESSION['usuario'] ?? 'Usuário') ?>&background=random" alt="Seu avatar">
                    <span style="color: #666; font-weight: 500;">Comentar como <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></span>
                </div>
                <form method='POST' action='criarComentario'>
                <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($parametro['id'] ?? ''); ?>">
                <textarea class="comment-form-input" id="conteudo" name="conteudo" placeholder="O que você pensa sobre isso?" maxlength="600"></textarea>
                <div class="comment-form-actions">
                    <button class="btn-submit" type="submit" id="submitComentario">Comentar</button>
                </div>
                </form>
            </div>
            <?php else: ?>
            <!-- Mensagem para usuários não logados -->
            <div class="comment-form-login-prompt">
                <i class="fas fa-lock"></i>
                <p>Faça <a href="#" onclick="openEntrarModal(); return false;">login</a> para comentar neste post</p>
            </div>
            <?php endif; ?>

            <!-- Comments List -->
            <div class="comments-list" id="comentariosList">
                <?php if (!empty($parametro['comentarios']) && is_array($parametro['comentarios'])): ?>
                    <?php foreach ($parametro['comentarios'] as $comentario): ?>
                        <article class="comment-item">
                            <div class="comment-header">
                                <img src="https://ui-avatars.com/api/?name=<?php echo htmlspecialchars($comentario['nome_usuario'] ?? 'Anônimo'); ?>&background=random" 
                                     alt="<?php echo htmlspecialchars($comentario['nome_usuario'] ?? 'Usuário'); ?>" 
                                     class="comment-avatar">
                                <div class="comment-info">
                                    <strong class="comment-author"><?php echo htmlspecialchars($comentario['nome_usuario'] ?? 'Anônimo'); ?></strong>
                                    <span class="comment-date"><?php echo htmlspecialchars($comentario['data_criacao'] ?? 'Agora'); ?></span>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p><?php echo nl2br(htmlspecialchars($comentario['conteudo'])); ?></p>
                            </div>
                            <div class="comment-actions-small">
                                <button class="btn-reply" type="button"><i class="fas fa-reply"></i> Responder</button>
                                <button class="btn-like" type="button"><i class="fas fa-thumbs-up"></i> <span>0</span></button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-comments">
                        <p>Nenhum comentário ainda. Seja o primeiro a comentar!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
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

                <form id="loginForm" method="POST" action="homeL" class="auth-form">
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

        // Adicionar interatividade aos botões
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.classList.contains('upvoted') || this.classList.contains('downvoted')) {
                    this.classList.remove('upvoted', 'downvoted');
                } else if (this.innerText.includes('Upvote')) {
                    this.classList.add('upvoted');
                } else if (this.innerText.includes('Downvote')) {
                    this.classList.add('downvoted');
                }
            });
        });
    </script>
        
</body>
</html>
