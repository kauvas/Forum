<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
//echo $_SESSION['usuario'];
$usuario = $_SESSION['usuario'] ?? null;
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

    <!-- CONTAINER PRINCIPAL -->
    <div class="main-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <h3><i class="fas fa-home"></i> Menu</h3>

                <ul class="nav-list">
                    <li><a href="home" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#categorias" class="nav-link"><i class="fas fa-list"></i> Categorias</a></li>
                    <li><a href="#populares" class="nav-link"><i class="fas fa-fire"></i> Populares</a></li>
                    <li><a href="#recentes" class="nav-link"><i class="fas fa-clock"></i> Recentes</a></li>
                    <li><a href="#meus-posts" class="nav-link active"><i class="fas fa-user"></i> Meu Perfil</a></li>
                    <li><a href="#favoritos" class="nav-link"><i class="fas fa-bookmark"></i> Favoritos</a></li>
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
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random&size=128" alt="<?php echo htmlspecialchars($usuario); ?>" class="profile-avatar-large">
                    
                    <div class="profile-info">
                        <div class="profile-name-section">
                            <h1 class="profile-username">u/<?php echo htmlspecialchars($usuario); ?></h1>
                            <button class="btn-edit-profile"><i class="fas fa-edit"></i> Editar Perfil</button>
                        </div>

                        <div class="profile-stats">
                            <div class="stat-item">
                                <span class="stat-label">Karma</span>
                                <span class="stat-value">1,250</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Posts</span>
                                <span class="stat-value">24</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Comentários</span>
                                <span class="stat-value">156</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Membro desde</span>
                                <span class="stat-value">há 6 meses</span>
                            </div>
                        </div>

                        <p class="profile-bio">Apaixonado por desenvolvimento web e design. Sempre buscando aprender e compartilhar conhecimento com a comunidade! 🚀</p>
                    </div>
                </div>
            </div>

            <!-- Abas de Conteúdo -->
            <div class="profile-tabs">
                <button class="tab-btn active" onclick="switchProfileTab('posts')">
                    <i class="fas fa-pen-fancy"></i> Posts
                </button>
                <button class="tab-btn" onclick="switchProfileTab('comentarios')">
                    <i class="fas fa-comments"></i> Comentários
                </button>
                <button class="tab-btn" onclick="switchProfileTab('saved')">
                    <i class="fas fa-bookmark"></i> Salvos
                </button>
            </div>

            <!-- Conteúdo das Abas -->
            <div id="postsTab" class="tab-pane active">
                <!-- Posts do Usuário -->
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>u/<?php echo htmlspecialchars($usuario); ?></h4>
                                <span class="post-date">há 2 dias</span>
                            </div>
                        </div>
                        <span class="category-badge">Tecnologia</span>
                    </div>
                    <h3 class="post-title">Meu primeiro projeto em React - Dúvidas sobre performance</h3>
                    <p class="post-excerpt">Acabei de terminar meu primeiro projeto real em React e gostaria de ouvir feedbacks sobre performance e boas práticas. O projeto é um dashboard de análise de dados...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 12 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 342 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 45</button>
                    </div>
                </article>

                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>u/<?php echo htmlspecialchars($usuario); ?></h4>
                                <span class="post-date">há 5 dias</span>
                            </div>
                        </div>
                        <span class="category-badge dev">Desenvolvimento</span>
                    </div>
                    <h3 class="post-title">Dicas de SEO para iniciantes - Tudo que você precisa saber</h3>
                    <p class="post-excerpt">Compilei todas as dicas de SEO que aprendi e achei relevante compartilhar. São estratégias simples mas muito efetivas para melhorar o ranking no Google...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 28 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 892 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 156</button>
                    </div>
                </article>

                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>u/<?php echo htmlspecialchars($usuario); ?></h4>
                                <span class="post-date">há 1 semana</span>
                            </div>
                        </div>
                        <span class="category-badge design">Design</span>
                    </div>
                    <h3 class="post-title">Paleta de cores 2024 - Tendências em Design UI/UX</h3>
                    <p class="post-excerpt">Compartilhando as cores mais tendência para este ano. A tendência é voltar para paletas mais quentes e minimalistas. Veja as recomendações completas...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 15 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 523 visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 89</button>
                    </div>
                </article>
            </div>

            <div id="comentariosTab" class="tab-pane">
                <div class="comment-section">
                    <div class="comment-item">
                        <div class="comment-header">
                            <h4>Em resposta a: "Como começar com PHP 8.3?"</h4>
                            <span class="comment-date">há 3 dias</span>
                        </div>
                        <p class="comment-text">Eu recomendo começar com a documentação oficial do PHP. Depois explore os padrões de design como MVC, SOLID, etc. A prática constante é a chave! 💪</p>
                        <div class="comment-actions">
                            <span class="comment-likes"><i class="fas fa-heart"></i> 34</span>
                            <button>Responder</button>
                        </div>
                    </div>

                    <div class="comment-item">
                        <div class="comment-header">
                            <h4>Em resposta a: "Segurança em aplicações web"</h4>
                            <span class="comment-date">há 5 dias</span>
                        </div>
                        <p class="comment-text">Excelente lista! Adiciono também validação rigorosa de inputs e uso de tokens CSRF. A segurança nunca é demais. Ótimo compartilhamento!</p>
                        <div class="comment-actions">
                            <span class="comment-likes"><i class="fas fa-heart"></i> 67</span>
                            <button>Responder</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="savedTab" class="tab-pane">
                <article class="post-item">
                    <div class="post-header">
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=João+Silva&background=random" alt="Usuário">
                            <div class="user-details">
                                <h4>u/João Silva</h4>
                                <span class="post-date">há 1 dia</span>
                            </div>
                        </div>
                        <span class="category-badge">Tecnologia</span>
                    </div>
                    <h3 class="post-title">TypeScript vs JavaScript - Quando usar cada um?</h3>
                    <p class="post-excerpt">Uma análise profunda sobre quando é melhor usar TypeScript e quando JavaScript puro é suficiente. Discutindo trade-offs e casos de uso específicos...</p>
                    <div class="post-footer">
                        <span class="post-stats"><i class="fas fa-comment"></i> 45 comentários</span>
                        <span class="post-stats"><i class="fas fa-eye"></i> 1.2K visualizações</span>
                        <button class="btn-like"><i class="far fa-heart"></i> 234</button>
                    </div>
                </article>
            </div>
        </main>
    </div>

    <script>
        function switchProfileTab(tabName) {
            // Esconde todas as abas
            const allTabs = document.querySelectorAll('.tab-pane');
            const allButtons = document.querySelectorAll('.profile-tabs .tab-btn');
            
            allTabs.forEach(tab => tab.classList.remove('active'));
            allButtons.forEach(btn => btn.classList.remove('active'));

            // Mostra a aba selecionada
            const tabId = tabName + 'Tab';
            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>

</body>

</html>