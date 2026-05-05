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

                <!-- Post Item -->
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=João+Silva&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>João Silva</h4>
                                <span class="post-date">há 2 horas</span>
                            </div>
                        </div>
                        <span class="category-badge">Tecnologia</span>
                    </div>
                    <h3 class="post-title">Como começar com PHP 8.3?</h3>
                    <p class="post-excerpt">Alguém tem uma boa documentação ou tutorial para iniciantes em PHP 8.3? Estou começando e gostaria de aprender as melhores práticas desde o início...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 5 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 127 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 12</button>
                    </div>
                </article>

                <!-- Post Item -->
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=Maria+Santos&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>Maria Santos</h4>
                                <span class="post-date">há 4 horas</span>
                            </div>
                        </div>
                        <span class="category-badge design">Design</span>
                    </div>
                    <h3 class="post-title">Tendências de Design em 2024</h3>
                    <p class="post-excerpt">Compartilhando as principais tendências de design que estou vendo este ano. Desde minimalismo até design responsivo, tudo está mudando...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 12 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 342 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 45</button>
                    </div>
                </article>

                <!-- Post Item -->
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=Carlos+Oliveira&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>Carlos Oliveira</h4>
                                <span class="post-date">há 6 horas</span>
                            </div>
                        </div>
                        <span class="category-badge dev">Desenvolvimento</span>
                    </div>
                    <h3 class="post-title">Melhorar performance em banco de dados</h3>
                    <p class="post-excerpt">Estou tendo problemas com queries lentas. Alguém tem dicas de otimização de índices ou técnicas para melhorar performance? Meu banco está crescendo...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 8 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 256 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 32</button>
                    </div>
                </article>

                <!-- Post Item -->
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=Ana+Costa&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>Ana Costa</h4>
                                <span class="post-date">há 8 horas</span>
                            </div>
                        </div>
                        <span class="category-badge security">Segurança</span>
                    </div>
                    <h3 class="post-title">Boas práticas de segurança em aplicações web</h3>
                    <p class="post-excerpt">Gostaria de compartilhar algumas boas práticas de segurança que venho aplicando. SQL Injection, XSS e CSRF são vulnerabilidades comuns...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 15 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 523 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 78</button>
                    </div>
                </article>

            </div>

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