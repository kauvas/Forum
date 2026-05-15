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

                <ul class="nav-list">
                    <li><a href="#home" class="nav-link active"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#categorias" class="nav-link"><i class="fas fa-list"></i> Categorias</a></li>
                    <li><a href="#populares" class="nav-link"><i class="fas fa-fire"></i> Populares</a></li>
                    <li><a href="#recentes" class="nav-link"><i class="fas fa-clock"></i> Recentes</a></li>
                    <li><a href="#meus-posts" class="nav-link"><i class="fas fa-user"></i> Meus Posts</a></li>
                    <li><a href="#favoritos" class="nav-link"><i class="fas fa-bookmark"></i> Favoritos</a></li>
                    <?php if (isset($usuario)) {
                    echo '<li><a href="carregarCriarPost" class="nav-link"><i class="fas fa-bookmark"></i> Criar Post</a></li>';
                    } ?>
                </ul>

                <hr>

                <h3><i class="fas fa-layer-group"></i> Categorias</h3>
                <ul class="categories-list">
                    <li><a href="#" class="category-link"><span class="badge">12</span> Tecnologia</a></li>
                    <li><a href="#" class="category-link"><span class="badge">8</span> Desenvolvimento</a></li>
                    <li><a href="#" class="category-link"><span class="badge">15</span> Design</a></li>
                    <li><a href="#" class="category-link"><span class="badge">5</span> Segurança</a></li>
                    <li><a href="#" class="category-link"><span class="badge">20</span> Discussões Gerais</a></li>
                </ul>

                <hr>

                <button class="btn-novo-topico"><i class="fas fa-plus"></i> Novo Tópico</button>
            </nav>
        </aside>

        <!-- CONTEÚDO PRINCIPAL -->
        <main class="content">
            <!-- Seção de Filtros -->
            <div class="filters-section">
                <h2>Tópicos Recentes</h2>
                <div class="filters">
                    <button class="filter-btn active">Mais Recentes</button>
                    <button class="filter-btn">Mais Comentados</button>
                    <button class="filter-btn">Trending</button>
                </div>
            </div>


            <!-- Posts -->
            <div class="posts-container">
                <!-- Posts Dinâmicos -->

                <?php //var_dump($parametro)  ?>
                <?php if (!empty($parametro['posts']) && is_array($parametro['posts'])): ?>
                    <?php foreach ($parametro['posts'] as $post): ; //var_dump($post["post_id"]); ?>
                        <article class="post-item">
                            <div class="post-header">
                                
                                <div class="user-info">
                                    <img src="https://ui-avatars.com/api/?name=Usuário+<?php echo htmlspecialchars($post['usuario_id'] ?? 'Anônimo'); ?>&background=random" alt="Usuário">
                                    <div class="user-details">
                                        <h4>Usuário #<?php echo htmlspecialchars($post['usuario_id'] ?? 'N/A'); ?></h4>
                                        <span class="post-date"><?php echo htmlspecialchars($post['data_criacao'] ?? 'agora'); ?></span>
                                    </div>
                                </div>
                                <span class="category-badge"><?php echo htmlspecialchars($post['categoria'] ?? 'Artigo'); ?></span>
                            </div>
                            <form action="<?php if (isset($_SESSION['usuario'])) {echo 'post';} else {echo 'postVisitante';} ?>" method="post">
                            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['post_id'] ?? ''); ?>">
                            
                            <button type="submit"> <h3 class="post-title"><?php echo htmlspecialchars($post['titulo'] ?? 'Sem título'); ?></h3> </button>
                            </form>
                            <p class="post-excerpt"><?php echo htmlspecialchars($post['conteudo'] ?? 'Sem conteúdo'); ?></p>
                            <div class="post-footer">
                                <span class="post-stats"><i class="fas fa-comment"></i> <?php echo htmlspecialchars($post['num_comentarios'] ?? '0'); ?> comentários</span>
                                <span class="post-stats"><i class="fas fa-eye"></i> <?php echo htmlspecialchars($post['visualizacoes'] ?? '0'); ?> visualizações</span>
                                <button class="btn-like"><i class="far fa-heart"></i> <?php echo htmlspecialchars($post['curtidas'] ?? '0'); ?></button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            <!-- Paginação -->
            <div class="pagination">
                <button class="page-btn"><i class="fas fa-chevron-left"></i> Anterior</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">Próxima <i class="fas fa-chevron-right"></i></button>
            </div>
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