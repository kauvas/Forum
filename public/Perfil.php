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
    <?php //var_dump($parametro) ?>

    <!-- CONTAINER PRINCIPAL -->
    <div class="main-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <h3><i class="fas fa-home"></i> Menu</h3>

                <?php if (isset($usuario)) {
                    //echo '<button class="filter-btn"><a href="carregarCriarPost" class="nav-link"><i class="fas fa-bookmark"></i> Criar Post</a></button>';
                    echo '<a class="btn-novo-topico" href="carregarCriarPost" style="text-decoration: none"><i class="fas fa-bookmark"></i> Criar Post</a>';
                    } ?>

                <ul class="nav-list">
                    <li><a href='redirect' class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#populares" class="nav-link"><i class="fas fa-fire"></i> Populares</a></li>
                    <li><a href="#recentes" class="nav-link"><i class="fas fa-clock"></i> Recentes</a></li>
                    <li><a href="#meus-posts" class="nav-link active"><i class="fas fa-user"></i> Meus Posts</a></li>
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
                <!-- Posts do Usuário - Dinâmicos -->
                <?php if (!empty($parametro['posts']) && is_array($parametro['posts'])): ?>
                    <?php foreach ($parametro['posts'] as $post): ?>
                        <article class="post-item">
                            <div class="post-header">
                                <div class="user-info">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random" alt="Usuário">
                                    <div class="user-details">
                                        <h4>u/<?php echo htmlspecialchars($usuario); ?></h4>
                                        <span class="post-date"><?php echo htmlspecialchars($post['data_criacao'] ?? 'agora'); ?></span>
                                    </div>
                                </div>
                                <span class="category-badge"><?php echo htmlspecialchars($post['categoria'] ?? 'Artigo'); ?></span>
                            </div>
                            <form action='post' method="post">
                            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['post_id'] ?? ''); ?>">
                            <button class='btn-titulo' type="submit"> <h3><?php echo htmlspecialchars($post['titulo'] ?? 'Sem título'); ?></h3> </button>
                            </form>
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
                                <span class="post-stats"><i class="fas fa-comment"></i> <?php echo htmlspecialchars($post['num_comentarios'] ?? '0'); ?> comentários</span>
                                <span class="post-stats"><i class="fas fa-eye"></i> <?php echo htmlspecialchars($post['visualizacoes'] ?? '0'); ?> visualizações</span>
                                <button class="btn-like"><i class="far fa-heart"></i> <?php echo htmlspecialchars($post['curtidas'] ?? '0'); ?></button>
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
                          foreach($parametro['posts'] as $post):?>
                        
                        <article class="comment-item" style="border-left: 4px solid #3b4fc9; padding: 15px; margin-bottom: 15px; background-color: #f6f7fb; border-radius: 4px;">
                            <div class="comment-header">
                                <div class="user-info">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($usuario)); ?>&background=random" alt="Usuário" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 10px;">
                                    <div class="user-details">
                                        <h4>u/<?php echo htmlspecialchars($usuario); ?></h4>
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
                    <?php endforeach; endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; padding: 20px;">Nenhum comentário realizado ainda.</p>
                <?php endif; ?>
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