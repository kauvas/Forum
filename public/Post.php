<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
//echo $_SESSION['usuario'];
$usuario = $_SESSION['usuario'] ?? null;
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
    <span><?php var_dump($usuario) ?></span>
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
    
    <script>
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
