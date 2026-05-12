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
    <title>Criar Post - Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/home2.css">
    <link rel="stylesheet" href="style/post.css">
    <style>
        .criar-post-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .criar-post-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e0e0e0;
        }

        .criar-post-header h1 {
            font-size: 28px;
            color: #1a1a1a;
            margin: 0;
        }

        .criar-post-form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group-criar {
            margin-bottom: 25px;
        }

        .form-group-criar label {
            display: block;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group-criar input[type="text"],
        .form-group-criar textarea,
        .form-group-criar select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-group-criar input[type="text"]:focus,
        .form-group-criar textarea:focus,
        .form-group-criar select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .form-group-criar textarea {
            resize: vertical;
            min-height: 300px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-row-criar {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions-criar {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .btn-criar {
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-publicar {
            background: #007bff;
            color: white;
        }

        .btn-publicar:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .btn-cancelar {
            background: #f0f0f0;
            color: #333;
        }

        .btn-cancelar:hover {
            background: #e0e0e0;
        }

        .character-count {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
            text-align: right;
        }

        @media (max-width: 768px) {
            .form-row-criar {
                grid-template-columns: 1fr;
            }

            .form-actions-criar {
                flex-direction: column-reverse;
            }

            .btn-criar {
                width: 100%;
                justify-content: center;
            }

            .criar-post-container {
                margin: 20px auto;
            }
        }
    </style>
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

                <button class="btn-novo-topico" onclick="window.location.href='criarPost'"><i class="fas fa-plus"></i> Novo Tópico</button>
            </nav>
        </aside>

        <!-- CONTEÚDO PRINCIPAL -->
        <main class="content">
            <?php var_dump($parametro) ?>
            <div class="criar-post-container">
                <div class="criar-post-header">
                    <i class="fas fa-edit"></i>
                    <h1>Criar Novo Post</h1>
                </div>

                <form class="criar-post-form" method="POST" action="salvarPost">
                    <div class="form-group-criar">
                        <label for="titulo"><i class="fas fa-heading"></i> Título do Post</label>
                        <input 
                            type="text" 
                            id="titulo" 
                            name="titulo" 
                            required 
                            placeholder="Digite um título atrativo para seu post..."
                            maxlength="200"
                        >
                        <div class="character-count"><span id="tituloCount">0</span>/200</div>
                    </div>

                    <div class="form-row-criar">
                        <div class="form-group-criar">
                            <label for="categoria"><i class="fas fa-layer-group"></i> Categoria</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">Selecione uma categoria...</option>
                                <option value="tecnologia">Tecnologia</option>
                                <option value="desenvolvimento">Desenvolvimento</option>
                                <option value="design">Design</option>
                                <option value="seguranca">Segurança</option>
                                <option value="geral">Discussões Gerais</option>
                            </select>
                        </div>

                        <div class="form-group-criar">
                            <label for="tags"><i class="fas fa-tags"></i> Tags (separadas por vírgula)</label>
                            <input 
                                type="text" 
                                id="tags" 
                                name="tags" 
                                placeholder="ex: php, laravel, web"
                            >
                        </div>
                    </div>

                    <div class="form-group-criar">
                        <label for="conteudo"><i class="fas fa-file-alt"></i> Conteúdo do Post</label>
                        <textarea 
                            id="conteudo" 
                            name="conteudo" 
                            required 
                            placeholder="Compartilhe seus conhecimentos, perguntas ou discussões aqui. Seja claro e detalhado..."
                        ></textarea>
                        <div class="character-count"><span id="conteudoCount">0</span> caracteres</div>
                    </div>

                    <div class="form-actions-criar">
                        <button type="button" class="btn-criar btn-cancelar" onclick="window.history.back()">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn-criar btn-publicar">
                            <i class="fas fa-paper-plane"></i> Publicar Post
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Contador de caracteres do título
        const tituloInput = document.getElementById('titulo');
        const tituloCount = document.getElementById('tituloCount');
        
        tituloInput.addEventListener('input', function() {
            tituloCount.textContent = this.value.length;
        });

        // Contador de caracteres do conteúdo
        const conteudoInput = document.getElementById('conteudo');
        const conteudoCount = document.getElementById('conteudoCount');
        
        conteudoInput.addEventListener('input', function() {
            conteudoCount.textContent = this.value.length;
        });

        // Validação antes de enviar
        document.querySelector('.criar-post-form').addEventListener('submit', function(e) {
            const titulo = document.getElementById('titulo').value.trim();
            const conteudo = document.getElementById('conteudo').value.trim();
            const categoria = document.getElementById('categoria').value;

            if (!titulo || titulo.length < 5) {
                e.preventDefault();
                alert('O título deve ter pelo menos 5 caracteres');
                return false;
            }

            if (!conteudo || conteudo.length < 20) {
                e.preventDefault();
                alert('O conteúdo deve ter pelo menos 20 caracteres');
                return false;
            }

            if (!categoria) {
                e.preventDefault();
                alert('Selecione uma categoria');
                return false;
            }
        });
    </script>
</body>

</html>
