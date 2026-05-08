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
    <span><?php var_dump($_SESSION['usuario']) ?></span>
    <span><?php var_dump(isset($_SESSION)) ?></span>
    <!-- Main Container -->
    <div class="post-container">
        <!-- Post Principal -->
        <div class="post-full">
            <!-- Post Header -->
            <div class="post-full-header">
                <div class="post-full-user">
                    <img src="https://ui-avatars.com/api/?name=João+Silva&background=random" alt="Autor">
                    <div class="post-full-user-info">
                        <h4>João Silva</h4>
                        <span>em r/DesenvolvimentoWeb • 2 dias atrás</span>
                    </div>
                </div>
                <button class="post-full-options">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

            <!-- Post Body -->
             <div class="post-full-category">
                <h1 class ="post-full-title"><?php echo htmlspecialchars($parametro["posts"][0]['titulo'] ?? 'Sem título'); ?></h1>
                
             </div>
            <div class="post-full-body">
                <h1 class="post-full-title">
                    Como melhorar a performance do seu site com otimizações CSS
                </h1>

                <p class="post-full-content">
                    Olá pessoal! Hoje quero compartilhar algumas dicas incríveis que descobri sobre otimização de CSS 
                    que podem fazer uma grande diferença no carregamento do seu site.
                </p>

                <p class="post-full-content">
                    Existem várias técnicas que podemos usar, como minificação de CSS, eliminação de estilos não utilizados 
                    com ferramentas como PurgeCSS, e também usar CSS Grid e Flexbox de forma inteligente para reduzir a 
                    necessidade de media queries.
                </p>

                <img src="https://via.placeholder.com/700x400" alt="Exemplo de otimização" class="post-full-image">

                <p class="post-full-content">
                    Uma das melhores práticas é também usar variáveis CSS (CSS Custom Properties) que facilitam a manutenção 
                    e podem ser manipuladas dinamicamente com JavaScript. Isso torna o código mais organizado e reutilizável.
                </p>

                <p class="post-full-content">
                    Compartilhem nos comentários se vocês usam essas técnicas e se têm outras dicas para melhorar a performance!
                </p>

                <!-- Post Stats -->
                <div class="post-full-footer">
                    <div class="post-stat-item">
                        <i class="fas fa-arrow-up"></i>
                        <span><strong>1.2K</strong> upvotes</span>
                    </div>
                    <div class="post-stat-item">
                        <i class="fas fa-arrow-down"></i>
                        <span><strong>45</strong> downvotes</span>
                    </div>
                    <div class="post-stat-item">
                        <i class="fas fa-comment"></i>
                        <span><strong>89</strong> comentários</span>
                    </div>
                    <div class="post-stat-item">
                        <i class="fas fa-share"></i>
                        <span><strong>234</strong> compartilhamentos</span>
                    </div>
                </div>
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
                Comentários (89)
            </h2>

            <!-- Comment Form -->
            <div class="comment-form">
                <div class="comment-form-header">
                    <img src="https://via.placeholder.com/40" alt="Seu avatar">
                    <span style="color: #666; font-weight: 500;">Comentar como <strong>Você</strong></span>
                </div>
                <textarea class="comment-form-input" placeholder="O que você pensa sobre isso?"></textarea>
                <div class="comment-form-actions">
                    <button class="btn-cancel">Cancelar</button>
                    <button class="btn-submit">Comentar</button>
                </div>
            </div>

            <!-- Comments List -->
            <div class="comments-list">
                <!-- Comment 1 -->
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="comment-user-info">
                            <img src="https://via.placeholder.com/35" alt="Usuário">
                            <div class="comment-user-details">
                                <span class="comment-username">Maria Santos</span>
                                <span class="comment-time">1 dia atrás</span>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">
                        Excelente post! Eu já aplicava a maioria dessas técnicas, mas o uso de CSS Custom Properties 
                        foi uma revelação. Vou implementar no meu projeto agora. Obrigada pela dica!
                    </p>
                    <div class="comment-footer">
                        <div class="comment-votes">
                            <button><i class="fas fa-arrow-up"></i></button>
                            <span>342</span>
                            <button><i class="fas fa-arrow-down"></i></button>
                        </div>
                        <div class="comment-actions-small">
                            <button>Responder</button>
                            <button>Compartilhar</button>
                        </div>
                    </div>

                    <!-- Reply -->
                    <div class="replies">
                        <div class="comment-card">
                            <div class="comment-header">
                                <div class="comment-user-info">
                                    <img src="https://via.placeholder.com/35" alt="Usuário">
                                    <div class="comment-user-details">
                                        <span class="comment-username">João Silva</span>
                                        <span class="comment-time">23 horas atrás • OP</span>
                                    </div>
                                </div>
                            </div>
                            <p class="comment-text">
                                Fico feliz que tenha ajudado! CSS Custom Properties realmente revolucionam a forma como 
                                trabalhamos com estilos. Qualquer dúvida, é só chamar! 😊
                            </p>
                            <div class="comment-footer">
                                <div class="comment-votes">
                                    <button><i class="fas fa-arrow-up"></i></button>
                                    <span>189</span>
                                    <button><i class="fas fa-arrow-down"></i></button>
                                </div>
                                <div class="comment-actions-small">
                                    <button>Responder</button>
                                    <button>Compartilhar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment 2 -->
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="comment-user-info">
                            <img src="https://via.placeholder.com/35" alt="Usuário">
                            <div class="comment-user-details">
                                <span class="comment-username">Pedro Costa</span>
                                <span class="comment-time">2 dias atrás</span>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">
                        Adorei a dica sobre PurgeCSS! Consegui reduzir o tamanho do CSS do meu site em 60%. 
                        Performance melhorou bastante!
                    </p>
                    <div class="comment-footer">
                        <div class="comment-votes">
                            <button><i class="fas fa-arrow-up"></i></button>
                            <span>287</span>
                            <button><i class="fas fa-arrow-down"></i></button>
                        </div>
                        <div class="comment-actions-small">
                            <button>Responder</button>
                            <button>Compartilhar</button>
                        </div>
                    </div>
                </div>

                <!-- Comment 3 -->
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="comment-user-info">
                            <img src="https://via.placeholder.com/35" alt="Usuário">
                            <div class="comment-user-details">
                                <span class="comment-username">Ana Ferreira</span>
                                <span class="comment-time">1 dia atrás</span>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">
                        Alguém mais usa Tailwind CSS? Acho que muda um pouco essa abordagem...
                    </p>
                    <div class="comment-footer">
                        <div class="comment-votes">
                            <button><i class="fas fa-arrow-up"></i></button>
                            <span>156</span>
                            <button><i class="fas fa-arrow-down"></i></button>
                        </div>
                        <div class="comment-actions-small">
                            <button>Responder</button>
                            <button>Compartilhar</button>
                        </div>
                    </div>

                    <!-- Reply -->
                    <div class="replies">
                        <div class="comment-card">
                            <div class="comment-header">
                                <div class="comment-user-info">
                                    <img src="https://via.placeholder.com/35" alt="Usuário">
                                    <div class="comment-user-details">
                                        <span class="comment-username">Carlos Lima</span>
                                        <span class="comment-time">18 horas atrás</span>
                                    </div>
                                </div>
                            </div>
                            <p class="comment-text">
                                Tailwind é ótimo, mas essas técnicas ainda são válidas! Você ainda precisa limpar 
                                o CSS não utilizado com o PurgeCSS no build final.
                            </p>
                            <div class="comment-footer">
                                <div class="comment-votes">
                                    <button><i class="fas fa-arrow-up"></i></button>
                                    <span>78</span>
                                    <button><i class="fas fa-arrow-down"></i></button>
                                </div>
                                <div class="comment-actions-small">
                                    <button>Responder</button>
                                    <button>Compartilhar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        // Toggle comment form
        document.querySelectorAll('.action-btn').forEach(btn => {
            if (btn.innerText.includes('Comentar')) {
                btn.addEventListener('click', function() {
                    document.querySelector('.comment-form-input').focus();
                });
            }
        });

        // Cancelar comentário
        document.querySelector('.btn-cancel').addEventListener('click', function() {
            document.querySelector('.comment-form-input').value = '';
        });

        // Responder comentário
        document.querySelectorAll('.comment-actions-small button').forEach(btn => {
            if (btn.innerText === 'Responder') {
                btn.addEventListener('click', function() {
                    alert('Recurso de resposta será implementado em breve!');
                });
            }
        });
    </script>
        
</body>
</html>
