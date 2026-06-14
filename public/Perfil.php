<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
//echo $_SESSION['usuario'];
$usuario = $_SESSION['usuario'] ?? null;
$dados = $parametro["dados_usuario"][0]["usuario"] ?? null;
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
    <?php //var_dump($parametro["dados_credenciais"][0]) ?>

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
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(htmlspecialchars($dados)); ?>&background=random" alt="Usuário">
                                    <div class="user-details">
                                        <h4>u/<?php echo htmlspecialchars($dados); ?></h4>
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
                    <?php endforeach; endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; padding: 20px;">Nenhum comentário realizado ainda.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>

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

            <form class="edit-profile-form" method="post" action="editarBiografia">
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
                                        <input type=\"text\" class=\"form-input credential-input credential-name\" placeholder=\"Ex: Developer\" value=\"{$nome}\" data-description=\"{$descricao}\">
                                        <small class=\"credential-description\">{$descricao}</small>
                                        
                                    </div>
                                    <form method='post' action='removerCredencial'>
                                    <input type='hidden' name='id_usuario' value='{$_SESSION['id_usuario']}'>
                                    <input type='hidden' name='id_credencial' value='{$credencial['credencial_id']}'>
                                    <button type='submit' class=\"btn-remove-credential\">
                                        <i class=\"fas fa-trash\"></i>
                                    </button>
                                    </form>
                                </div>
                                ";
                            }
                        } else {
                            echo "
                            <div class=\"credential-input-group\">
                                <input type=\"text\" class=\"form-input credential-input\" placeholder=\"Ex: Developer\" value=\"\">
                                <button type=\"button\" class=\"btn-remove-credential\" onclick=\"removeCredentialField(this)\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                

                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeEditProfileModal()">Cancelar</button>
                    <button type="submit" class="btn-save-profile">Salvar Alterações</button>
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
            // Limpar formulário
            document.getElementById('addCredentialForm').reset();
            document.getElementById('charCountName').textContent = '0';
            document.getElementById('charCountDesc').textContent = '0';
        }

        // Contadores de caracteres do modal de credencial
        const credentialNameInput = document.getElementById('credentialName');
        if (credentialNameInput) {
            credentialNameInput.addEventListener('input', (e) => {
                document.getElementById('charCountName').textContent = e.target.value.length;
            });
        }

        const credentialDescInput = document.getElementById('credentialDesc');
        if (credentialDescInput) {
            credentialDescInput.addEventListener('input', (e) => {
                document.getElementById('charCountDesc').textContent = e.target.value.length;
            });
        }

        // Fechar modal ao clicar fora
        window.addEventListener('click', (event) => {
            const addModal = document.getElementById('addCredentialModal');
            if (event.target === addModal) {
                closeAddCredentialModal();
            }
        });

        // Manipular envio do formulário de credencial
        const addCredentialForm = document.getElementById('addCredentialForm');
        if (addCredentialForm) {
            addCredentialForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                const credentialName = document.getElementById('credentialName').value.trim();
                const credentialDesc = document.getElementById('credentialDesc').value.trim();

                if (!credentialName) {
                    alert('Por favor, insira o nome da credencial!');
                    return;
                }

                // Adicionar o campo de credencial ao container
                addCredentialField(credentialName, credentialDesc);
                
                closeAddCredentialModal();
            });
        }

        // Adicionar novo campo de credencial
        function addCredentialField(name, description = '') {
            const container = document.getElementById('credentialsContainer');
            const div = document.createElement('div');
            div.className = 'credential-input-group';
            div.innerHTML = `
                <div class="credential-field-wrapper">
                    <input type="text" class="form-input credential-input credential-name" value="${name}" data-description="${description}">
                    <small class="credential-description">${description}</small>
                </div>
                <button type="button" class="btn-remove-credential" onclick="removeCredentialField(this)">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            container.appendChild(div);
        }

        // Remover campo de credencial
        /*function removeCredentialField(button) {
            const group = button.closest('.credential-input-group');
            if (document.querySelectorAll('.credential-input-group').length > 1) {
                group.remove();
            } else {
                alert('Você deve ter pelo menos uma credencial!');
            }
        }*/

        // Manipular envio do formulário
        const editForm = document.getElementById('editProfileForm');
        if (editForm) {
            editForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                const biography = document.getElementById('biographyEdit').value;
                const credentials = Array.from(document.querySelectorAll('.credential-input'))
                    .map(input => input.value)
                    .filter(val => val.trim() !== '');

                console.log('Biografia:', biography);
                console.log('Credenciais:', credentials);
                
                closeEditProfileModal();
            });
        }
    </script>

</body>

</html>