-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2026 às 22:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `usuario_id` int(16) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comentario_id` int(16) NOT NULL,
  `conteudo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`usuario_id`, `post_id`, `comentario_id`, `conteudo`) VALUES
(11, 17, 33, 'Acho uma excelente primeira linha de defesa, Gabriel. Mas o grande desafio é o viés do modelo e os falsos positivos. Se a IA derrubar posts legítimos por falta de contexto humano, corremos o risco de censura automatizada.'),
(13, 20, 34, 'Do ponto de vista de auditoria financeira, isso é crucial. Se o sistema permitir que um orçamento ou conta fique negativa por uma falha de concorrência que a trigger não pegou, o prejuízo financeiro para a fintech é real.'),
(13, 19, 35, 'Como analista, assino embaixo. A falta de clareza visual faz as pessoas assinarem contratos sem ler. Um design transparente ajuda na educação financeira e evita o superendividamento por impulso.'),
(8, 17, 36, 'Concordo com a Mariana. No backend, podemos estruturar filas de processamento assíncronas onde a IA sinaliza o post duvidoso para uma fila de revisão humana, em vez de deletar direto. O score ajuda o moderador a priorizar.'),
(8, 18, 37, 'O clássico erro de arquitetura de tags! No PHP puro isso também quebra o comportamento dos botões de submit, pois o navegador envia o formulário errado ou ignora a ação. HTML limpo é a base de tudo.'),
(8, 20, 38, 'Perfeito, Mariana. O banco de dados deve ser a última linha de defesa (garantindo a integridade dos dados), mas a validação de regras de negócio pesadas e sanitização de inputs pertencem estritamente aos Controllers e Services no PHP.'),
(14, 17, 39, 'Como estudante, eu me sentiria muito mais seguro sabendo que os posts passam por uma auditoria. Plataformas de discussão precisam desse filtro urgente para manter a credibilidade.'),
(9, 18, 40, 'Esse tipo de erro também quebra totalmente a árvore de acessibilidade (AOM). Leitores de tela ficam completamente perdidos quando encontram formulários aninhados. Ótimo toque, Lucas!'),
(10, 18, 41, 'Excelente post. Às vezes focamos tanto em lógica complexa no JavaScript que esquecemos que o navegador ainda precisa interpretar uma árvore DOM válida. Linters rígidos no projeto resolvem isso direto.'),
(12, 19, 42, 'E do lado do desenvolvimento, fazer essas simulações interativas com transições suaves usando CSS bem estruturado eleva o nível da plataforma. O usuário sente que o sistema é robusto e profissional.'),
(14, 19, 43, 'Verdade! Quando entro em um site financeiro com design amador ou poluído, saio na hora achando que é golpe. Identidade visual limpa gera confiança imediata.'),
(10, 20, 44, 'Sim! Um atacante pode explorar brechas de atribuição em massa se o backend não filtrar o que vem das requisições POST. Triggers são ótimas para logs históricos de contas, mas não substituem segurança de código.'),
(11, 21, 45, 'A resposta técnica é implementar autenticação multifator (MFA) obrigatória para transações críticas e avisos de segurança nativos no app sempre que um padrão de comportamento estranho for detectado pelo sistema.'),
(9, 21, 46, 'Podemos usar o design contextual (Just-In-Time UX). Em vez de um manual gigante que ninguém lê, colocamos pequenos alertas ilustrados bem na tela de transferência ou alteração de dados, avisando: \'A OnCred nunca pede sua senha\'.'),
(12, 21, 47, 'Esses pequenos alertas salvam vidas. Minha família quase caiu em um golpe esses dias, e o que parou o processo foi um aviso vermelho bem chamativo na tela do aplicativo do banco bem na hora do clique.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `credenciais`
--

CREATE TABLE `credenciais` (
  `credencial_id` int(11) NOT NULL,
  `usuario_id` int(16) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `credenciais`
--

INSERT INTO `credenciais` (`credencial_id`, `usuario_id`, `nome`, `descricao`) VALUES
(26, 10, 'Especialista Backend', 'Certificação avançada em microsserviços e arquitetura escalável. | Provedor: Alura Latam'),
(27, 10, 'Java SE Developer', 'Validação de proficiência em desenvolvimento orientado a objetos e concorrência Java. | Provedor: Oracle'),
(28, 10, 'Segurança em APIs', 'Especialização em barramento de serviços, OAuth2 e blindagem de rotas contra invasões. | Provedor: Udemy Academy'),
(29, 12, 'Frontend Engineer', 'Formação intensiva em ecossistemas modernos de desenvolvimento web e JavaScript avançado. | Provedor: Rocketseat'),
(31, 12, 'React Core', 'Especialista em gerenciamento de estados complexos, Hooks customizados e Next.js. | Provedor: Origamid'),
(32, 12, 'Web Performance', 'Otimização de Core Web Vitals e renderização crítica do navegador. | Provedor: Google Developers'),
(33, 9, 'Product Designer', 'Certificado profissional em ciclo completo de descoberta e entrega de produto digital. | Provedor: Tera'),
(34, 9, 'Especialista UX/UI', 'Proficiência em prototipagem de alta fidelidade e testes de usabilidade com usuários reais. | Provedor: Interaction Design Foundation (IxDF)'),
(35, 9, 'Acessibilidade Digital', 'Capacitação em conformidade com as diretrizes WCAG para interfaces inclusivas. | Provedor: Movimento Web para Todos'),
(36, 11, 'Auditora de Segurança', 'Certificação internacional CISA para auditoria e controle de sistemas de informação. | Provedor: ISACA'),
(37, 11, 'Ethical Hacker', 'Certificado CEH demonstrando habilidades avançadas em testes de invasão e brechas defensivas. | Provedor: EC-Council'),
(38, 11, 'Especialista LGPD', 'Encarregada de Proteção de Dados (DPO) certificada para adequação de plataformas financeiras. | Provedor: EXIN'),
(39, 13, 'Analista Financeira', 'Certificação CEA para especialista em investimentos e alta gestão de recursos. | Provedor: ANBIMA'),
(40, 13, 'Consultora de Crédito', 'Especialização técnica em análise de risco de crédito empresarial e concessão de limites. | Provedor: Serasa Experian'),
(41, 13, 'Graduação em Economia', 'Bacharel em Ciências Econômicas com ênfase em mercados digitais. | Provedor: FGV'),
(42, 8, 'Especialista Backend', 'Certificação avançada em microsserviços e arquitetura escalável. | Provedor: Alura Latam'),
(43, 8, 'Java SE Developer', 'Validação de proficiência em desenvolvimento orientado a objetos e concorrência Java. | Provedor: Oracle'),
(44, 8, 'Segurança em APIs', 'Especialização em barramento de serviços, OAuth2 e blindagem de rotas contra invasões. | Provedor: Udemy Academy'),
(45, 14, 'Estudante ADS', 'Atualmente cursando o 5º período do tecnólogo em Análise e Desenvolvimento de Sistemas. | Provedor: Universidade Uniube'),
(46, 14, 'Fundamentos de TI', 'Curso introdutório de hardware, redes, lógica de programação e arquiteturas de computadores. | Provedor: Fundação Bradesco'),
(47, 14, 'Git & GitHub', 'Domínio em controle de versão de código, branching, pull requests e repositórios remotos. | Provedor: Curso em Vídeo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `interacoes`
--

CREATE TABLE `interacoes` (
  `interacao_id` int(11) NOT NULL,
  `usuario_id` int(16) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `interacoes`
--

INSERT INTO `interacoes` (`interacao_id`, `usuario_id`, `post_id`, `tipo`) VALUES
(101, 14, 19, 1),
(102, 14, 20, 1),
(103, 14, 21, 1),
(125, 14, 17, 1),
(130, 8, 18, 1),
(131, 8, 19, 1),
(132, 8, 20, 1),
(133, 8, 17, 1),
(141, 7, 19, 2),
(142, 7, 20, 2),
(143, 7, 21, 1),
(144, 7, 17, 2),
(145, 9, 17, 1),
(147, 9, 18, 1),
(148, 9, 19, 1),
(151, 9, 20, 1),
(152, 9, 21, 1),
(153, 10, 17, 1),
(154, 10, 18, 2),
(157, 10, 20, 2),
(158, 10, 21, 2),
(159, 11, 17, 1),
(160, 11, 18, 1),
(161, 11, 19, 2),
(162, 11, 20, 2),
(163, 11, 21, 1),
(164, 12, 17, 1),
(165, 12, 18, 2),
(166, 12, 19, 2),
(167, 12, 20, 1),
(168, 12, 21, 2),
(169, 13, 17, 1),
(170, 13, 18, 1),
(171, 13, 19, 2),
(172, 13, 20, 1),
(173, 13, 21, 2),
(174, 14, 18, 1),
(175, 10, 18, 3),
(177, 10, 21, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `usuario_id` int(16) NOT NULL,
  `post_id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `tags` varchar(40) NOT NULL,
  `conteudo` varchar(1000) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`usuario_id`, `post_id`, `titulo`, `categoria`, `tags`, `conteudo`, `data`) VALUES
(10, 17, 'O papel da IA na moderação de fóruns e o combate a Fake News', 'Tecnologia', 'IA', 'Com o aumento de bots e campanhas coordenadas de desinformação, moderar comunidades manualmente tornou-se impossível. Modelos de linguagem (LLMs) configurados localmente podem analisar o contexto das postagens em tempo real, checar fontes em bancos de dados confiáveis e atribuir um \"score de confiabilidade\" antes mesmo que o post viralize. Qual a opinião de vocês sobre automatizar essa barreira inicial?', '2026-06-23 22:22:11'),
(12, 18, 'Por que o aninhamento incorreto de Tags quebra o ciclo de renderização?', 'Desenvolvimento', 'HTML', 'Recentemente peguei um bug onde o estado do meu componente React resetava do nada. Descobri que no HTML renderizado havia um <form> dentro de outro <form>. O navegador tentava corrigir a árvore DOM gerando nós fantasmas, o que confundia o algoritmo de reconciliação do React. Fica o aviso: validem o HTML semântico antes de culpar o framework!', '2026-06-17 15:22:39'),
(9, 19, 'UX em Fintechs: Como o design de interface pode reduzir o estresse financeiro?', 'Design', 'UX', 'Telas de solicitação de crédito geralmente são frias, confusas e cheias de termos técnicos que assustam o usuário. Um bom design focado em transparência (mostrando juros de forma clara, simulações interativas em tempo real e cores que passam segurança, como azuis e roxos degradês) reduz drasticamente a taxa de abandono e humaniza a experiência de pegar crédito online.', '2026-06-18 15:32:15'),
(11, 20, 'Vulnerabilidades em Triggers de Banco de Dados e validações no Backend', 'Segurança', 'Banco de dados', 'Um erro comum em sistemas financeiros é confiar toda a regra de consistência de saldos e auditoria a triggers automáticos no MySQL, esquecendo de blindar a camada de controle (Controller) no backend. Se uma requisição maliciosa burlar a API com parâmetros adulterados, o banco pode aceitar dados corrompidos se a trigger não prever todas as exceções. Validem sempre em ambas as camadas!', '2026-06-01 19:14:38'),
(13, 21, 'O avanço do Crédito Digital e os golpes de engenharia social', 'Discussões Gerais', 'Economia', 'O acesso ao crédito nunca foi tão rápido graças às plataformas digitais, mas isso abriu uma brecha gigante para os golpes de engenharia social (clonagem de perfis, falsos atendentes de suporte e links maliciosos prometendo limites absurdos). Como nós, profissionais de tecnologia e finanças, podemos educar o usuário final diretamente através das nossas plataformas?', '2026-06-23 11:08:27'),
(10, 22, 'A ameaça dos perfis clonados e o impacto na confiabilidade do fórum', 'Segurança', 'OpSec', 'Pessoal, estava a analisar os padrões de metadados das últimas contas criadas no ecossistema e notei um padrão preocupante: ataques de raspagem de dados (data scraping) para clonar biografias e credenciais de utilizadores legítimos em plataformas de crédito. O objetivo destes atacantes é usar a autoridade de um perfil verificado para aplicar golpes de engenharia social através de mensagens privadas ou respostas falsas. Qual seria a melhor estratégia técnica para mitigar isso? Verificação por assinatura criptográfica das credenciais ou uma auditoria comportamental por IA no backend?', '2026-06-24 16:07:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(16) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Usuario` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Senha` varchar(40) NOT NULL,
  `biografia` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome`, `Usuario`, `Email`, `Senha`, `biografia`) VALUES
(7, 'teste', 'teste', 'teste@teste.com', '12345', ''),
(8, 'Carlos Mendoza', 'Carlos', 'carlos.mendoza@email.com', '12345', 'Desenvolvedor Backend sênior focado em arquiteturas seguras e APIs financeiras. Entusiasta de criptografia e código limpo.'),
(9, 'Ana Beatriz Silva', 'Ana Beatriz Silva', 'ana.bia@email.com', '12345', 'Designer de Produto (UX/UI) com 5 anos de experiência em Fintechs. Minha missão é tornar interfaces de crédito simples e acessíveis para todos.'),
(10, 'Gabriel Rocha', 'Gabriel Rocha', 'gabi.rocha@email.com', '12345', 'Desenvolvedor Backend sênior focado em arquiteturas seguras e APIs financeiras. Entusiasta de criptografia e código limpo.'),
(11, 'Mariana Costa', 'Mariana Costa', 'mari.costa@email.com', '12345', 'Especialista em cibersegurança e auditoria de sistemas de pagamento online. Defensora ferrenha da privacidade de dados.'),
(12, 'Lucas Oliveira', 'Lucas Oliveira', 'lucas.oli@email.com', '12345', 'Desenvolvedor Front-end apaixonado por ecossistemas React, performance de componentes e interfaces fluidas na web.'),
(13, 'Fernanda Lima', 'Fernanda Lima', 'fer.lima@email.com', '12345', 'Economista e Analista de Crédito. Escrevo sobre educação financeira, mercado digital e fraudes no ecossistema bancário moderno.'),
(14, 'Rodrigo Souza', 'Rodrigo Souza', 'rodrigo.souza@email.com', '12345', 'Estudante de Análise e Desenvolvimento de Sistemas, entusiasta do open source e aspirante a desenvolvedor full-stack.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Índices de tabela `credenciais`
--
ALTER TABLE `credenciais`
  ADD PRIMARY KEY (`credencial_id`);

--
-- Índices de tabela `interacoes`
--
ALTER TABLE `interacoes`
  ADD PRIMARY KEY (`interacao_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usuario` (`Usuario`,`Email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `credenciais`
--
ALTER TABLE `credenciais`
  MODIFY `credencial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `interacoes`
--
ALTER TABLE `interacoes`
  MODIFY `interacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
