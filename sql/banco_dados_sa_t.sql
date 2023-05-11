-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2022 às 06:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_dados_sa_t`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_usuario` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `id_avaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `data_avaliacao` date NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `nome_usuario` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_usuario`, `id_filme`, `id_avaliacao`, `nota`, `data_avaliacao`, `comentario`, `nome_usuario`) VALUES
(1, 8, 1, 3, '2022-09-26', 'Muito bom tá', 'Admin'),
(60, 41, 2, 3, '2022-09-27', 'Topppp!', 'Hícaro Gabriel Bauer Nonato'),
(1, 44, 3, 4, '2022-09-27', 'Oi', 'Admin'),
(1, 45, 4, 5, '2022-09-27', 'Top!', 'Admin'),
(1, 45, 5, 2, '2022-09-27', 'Horrível!', 'Admin'),
(1, 45, 6, 2, '2022-09-27', 'Horrível!', 'Admin'),
(1, 45, 7, 4, '2022-09-27', 'Não escuta o que ele tá falando', 'Admin'),
(60, 41, 8, 4, '2022-09-27', 'Bom Filme!', 'Hícaro Gabriel Bauer Nonato'),
(60, 19, 9, 4, '2022-09-27', 'Ele vive na floresta, muito diferente.', 'Hícaro Gabriel Bauer Nonato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id_filme` int(11) NOT NULL,
  `nome_filme` varchar(60) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `img` varchar(400) NOT NULL,
  `ano_lancamento` int(11) NOT NULL,
  `duracao` varchar(20) NOT NULL,
  `sinopse` varchar(500) NOT NULL,
  `media` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id_filme`, `nome_filme`, `genero`, `img`, `ano_lancamento`, `duracao`, `sinopse`, `media`) VALUES
(2, '1917', 'Épico/Guerra/Suspense', '_740490832.jpg', 2019, '1h 59m', 'Na Primeira Guerra Mundial, dois soldados britânicos recebem ordens aparentemente impossíveis de cumprir. Em uma corrida contra o tempo, eles precisam atravessar o território inimigo e entregar uma mensagem que pode salvar 1.600 de seus companheiros.', NULL),
(6, 'O Senhor dos Anéis: A Sociedade do Anel', 'Fantasia/Aventura', '_1574707776.jpg', 2001, '2h 58m', 'Em uma terra fantástica e única, um hobbit recebe de presente de seu tio um anel mágico e maligno que precisa ser destruído antes que caia nas mãos do mal. Para isso, o hobbit Frodo tem um caminho árduo pela frente, onde encontra perigo, medo e seres bizarros. Ao seu lado para o cumprimento desta jornada, ele aos poucos pode contar com outros hobbits, um elfo, um anão, dois humanos e um mago, totalizando nove seres que formam a Sociedade do Anel.', NULL),
(13, 'Coringa', 'Suspense/Drama', 'Coringa_1818157795.jpg', 2019, '2h 2m', 'Isolado, intimidado e desconsiderado pela sociedade, o fracassado comediante Arthur Fleck inicia seu caminho como uma mente criminosa após assassinar três homens em pleno metrô. Sua ação inicia um movimento popular contra a elite de Gotham City, da qual Thomas Wayne é seu maior representante', 4),
(14, 'Homem-Aranha no Aranhaverso', 'Ação/Infantil', 'Homem-Aranha no Aranhaverso_1048494353.jpg', 2018, '1h 56m', 'Após ser atingido por uma teia radioativa, Miles Morales, um jovem negro do Brooklyn, se torna o Homem-Aranha, inspirado no legado do já falecido Peter Parker. Entretanto, ao visitar o túmulo de seu ídolo em uma noite chuvosa, ele é surpreendido com a presença do próprio Peter, vestindo o traje do herói por baixo de um sobretudo. A surpresa fica ainda maior quando Miles descobre que ele veio de uma dimensão paralela,', 4),
(15, 'Laranja Mecânica', 'Drama/Crime', 'Laranja Mecânica_1322212699.jpg', 1971, '2h 16m', 'O jovem Alex passa as noites com uma gangue de amigos briguentos. Depois que é preso, se submete a uma técnica de modificação de comportamento para poder ganhar sua liberdade.', 2),
(16, 'V de Vingança', 'Ação/Thriller', 'V de Vingança_1877509066.jpg', 2005, '2h 12m', 'Após uma guerra mundial, a Inglaterra é ocupada por um governo fascista e vive sob um regime totalitário. Na luta pela liberdade, um vigilante, conhecido apenas como V, utiliza-se de táticas terroristas para enfrentar os opressores da sociedade. V salva uma jovem chamada Evey da polícia secreta e encontra nela uma nova aliada em busca de liberdade e justiça para o seu país.', 5),
(17, 'Não! Não Olhe!', 'Terror/Ficção científica', 'Não! Não Olhe!_981317828.jpg', 2022, '2h 15m', '\"O que é um mau milagre?\" O vencedor de um Óscar, Jordan Peele causou disrupção e redefiniu o género do terror moderno com \"Foge\" e \"Nós\". Agora, Peele reimagina o filme de verão com um novo pesadelo pop: o épico expansivo de terror \"Nope\".no papel de residentes de uma localidade solitária no interior da Califórnia, que testemunham uma espantosa e arrepiante descoberta.', 5),
(18, 'Corra!', 'Terror/ThrillerTerror/Thriller', 'Corra!_1778292114.jpg', 2017, '1h 44m', 'Chris é um jovem fotógrafo negro que está prestes a conhecer os pais de Rose, sua namorada caucasiana. Com o tempo, ele percebe que a família dela esconde algo muito perturbador.', 3),
(19, 'Tarzan', 'Aventura/Musical', 'Tarzan_719080545.jpg', 1999, '1h 28m', 'Um bebê perde os pais na selva. Órfão e sozinho, ele é encontrado por uma macaca que o cria como se fosse seu próprio filho. Tarzan cresce pensando ser um gorila, agindo e vivendo como tal. Quando uma equipe de pesquisadores chega à floresta, o rapaz percebe que é igual a eles. Tarzan encontra a bela Jane correndo perigo e a salva, apaixonando-se por ela. ', 5),
(20, 'Mogli - O Menino Lobo', 'Infantil/Aventura', 'Mogli - O Menino Lobo_1352955127.jpg', 1967, '1h 29m', 'O menino Mogli foi criado por lobos na floresta. Seus amigos resolvem mandá-lo para uma tribo humana por causa da ameaçadora presença do tigre Shere Kahn. Ao lado da pantera Baguera e do urso Balú, Mogli vive uma aventura a caminho da civilização.', 3),
(21, 'Alice no País das Maravilhas', 'Musical/Fantasia', 'Alice no País das Maravilhas_902282566.jpg', 1951, '1h 15m', 'Alice é uma garota curiosa e cansada da monotonia de sua vida. Um dia, ao seguir o apressado e misterioso Coelho Branco até uma toca, ela acaba entrando no País das Maravilhas. Lá, ela conhece diversos seres incríveis, como o peculiar Chapeleiro Maluco, o misterioso Mestre Gato, a Lagarta e a tirana Rainha de Copas.', 5),
(22, 'O Rei Leão', 'Musical/Infantil', 'O Rei Leão_323552724.jpg', 1994, '1h 27m', 'Este desenho animado da Disney mostra as aventuras de um leão jovem de nome Simba, o herdeiro de seu pai, Mufasa. O tio malvado de Simba, Oscar, planeja roubar o trono de Mufasa atraindo pai e filho para uma emboscada. Simba consegue escapar e somente Mufasa morre. Com a ajuda de seus amigos,Timon e Pumba, ele reaparece como adulto para recuperar sua terra, que foi roubada por seu tio Oscar.', 4),
(25, 'Aladdin', 'Musical/Fantasia', 'Aladdin_385444951.jpg', 1992, '1h 30m', 'Aladdin liberta o gênio da lâmpada e tem seus desejos atendidos. Porém, ele logo descobre que o diabo tem outros planos para a lâmpada - e para a princesa Jasmim.', 5),
(29, 'O Poderoso Chefão', 'Crime/Drama', 'O Poderoso Chefão_304084106.jpg', 1972, '2h 55m', 'Uma família mafiosa luta para estabelecer sua supremacia nos Estados Unidos depois da Segunda Guerra Mundial. Uma tentativa de assassinato deixa o chefão Vito Corleone incapacitado e força os filhos Michael e Sonny a assumir os negócios.', 3),
(30, 'Godzilla vs Kong', 'Ficção científica/Ação', 'Godzilla vs Kong_531761.jpg', 2021, '1h 45m', 'Kong e seus protetores embarcam em uma jornada perigosa para encontrar seu verdadeiro lar. Jia, uma garota órfã que tem um vínculo único e poderoso com a poderosa besta, acompanha a aventura. No entanto, eles logo se encontram no caminho de Godzilla, completamente enfurecido, deixando um rastro de destruição em todo o mundo. O confronto inicial entre os dois titãs, instigado por forças misteriosas.', 4),
(31, 'Robocop - O Policial do Futuro', 'Ficção científica/Ação', 'Robocop - O Policial do Futuro_1958994699.jpg', 1987, '1h 42m', 'Policial é morto em combate e transformado por cientistas da empresa que dirige a força policial em um ciborgue ultrassofisticado a fim de ser usado na luta contra o crime na cidade de Detroit. Porém, apesar de ter sua memória apagada, lembranças o assombram e o levam a buscar vingança.', 4),
(32, 'O Exterminador do Futuro', 'Ficção científica/Ação', 'O Exterminador do Futuro_1693575963.jpg', 1984, '1h 47m', 'Disfarçado de humano, o assassino conhecido como o Exterminador (Arnold Schwarzenegger) viaja de 2029 a 1984 para matar Sarah Connor (Linda Hamilton). Enviado para proteger Sarah está Kyle Reese (Michael Biehn), que divulga a chegada do Skynet, um sistema de inteligência artificial que detonará um holocausto nuclear. Sarah é o alvo porque a Skynet sabe que seu futuro filho comandará a luta contra eles. ', 2),
(33, 'Jurassic Park - Parque dos Dinossauros', 'Ficção científica/Ação ', 'Jurassic Park - Parque dos Dinossauros_898233168.jpg', 1993, '2h 7m', 'Os paleontólogos Alan Grant, Ellie Sattler e o matemático Ian Malcolm fazem parte de um seleto grupo escolhido para visitar uma ilha habitada por dinossauros criados a partir de DNA pré-histórico. O idealizador do projeto e bilionário John Hammond garante a todos que a instalação é completamente segura. Mas após uma queda de energia, os visitantes descobrem, aos poucos, que vários predadores ferozes estão soltos.', 2),
(36, 'Scooby-Doo', 'Mistério', 'Scooby-Doo_1409552399.jpg', 2002, '1h 27m', 'Dois anos depois de separarem-se após resolverem seu último caso, a equipe da Mystery Inc. une-se para investigar estranhos acontecimentos em um parque mal-assombrado chamado Spook Island. A atração parece assombrar jovens visitantes de maneiras muito estranhas, mas cabe a Scooby, Salsicha e todo o grupo desvendar o mistério.', 4),
(39, 'Rambo - Programado para Matar', 'Ação/Aventura', 'Rambo - Programado para Matar_1592241939.jpg', 1982, '1h 33m', 'Um veterano da Guerra do Vietnã usa todo seu treinamento e agressividade exercitada nos campos de batalha quando é preso e torturado por policiais.', 1),
(40, 'Doutor Estranho no Multiverso da Loucura', 'Ação/Aventura', 'Doutor Estranho no Multiverso da Loucura_407259266.jpg', 2022, '2h 6m', 'O aguardado filme trata da jornada do Doutor Estranho rumo ao desconhecido. Além de receber ajuda de novos aliados místicos e outros já conhecidos do público, o personagem atravessa as realidades alternativas incompreensíveis e perigosas do Multiverso para enfrentar um novo e misterioso adversário.', 5),
(41, 'The Batman', 'Ação/Aventura ', 'The Batman_679837565.jpg', 2022, '2h 56m', 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', 1),
(44, 'Matrix Resurrections', 'Ficção científica/Ação ', 'Matrix Resurrections_163040598.jpg', 2021, '2h 28m', 'Da visionária realizadora Lana Wachowski chega-nos MATRIX RESURRECTIONS o tão aguardado 4º filme do inovador franchise que redefiniu o género. O novo filme reúne os protagonistas originais Keanu Reeves e Carrie-Anne Moss nos icónicos personagens que os tornaram famosos, Neo e Trinity.', 2),
(47, 'As Aventuras de Sharkboy e Lavagirl em 3-D', 'Aventura/Infantil', '_1334108748.jpg', 2005, '1h 35m', 'Max é um solitário garoto de 10 anos que se perde em seu próprio mundo de fantasia para escapar das confusões diárias. Porém, quando ele descobre que os super-heróis de sua imaginação podem ser mais reais do que ele pensava, seu mundo se transforma completamente. Max parte em uma viagem interplanetária rumo ao planeta Baba, onde conhece Sharkboy e Lavagirl.', 5);

--
-- Acionadores `filme`
--
DELIMITER $$
CREATE TRIGGER `filme_AFTER_DELETE` AFTER DELETE ON `filme` FOR EACH ROW BEGIN
SET foreign_key_checks = 1;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `filme_BEFORE_DELETE` BEFORE DELETE ON `filme` FOR EACH ROW BEGIN
SET foreign_key_checks = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_completo`, `email`, `senha`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$jMuaKQEqMe9J9821tYmoKOg05BMHo1zhCpL75DqRvhD3ooEmsTpo2'),
(2, 'Joaquim Madureira Santos', 'joaquim@gmail.com', '$2y$10$Xs0.mqZBb1LRy4e7aXyjRubeDQt2WyJacP1Yz7F4tO2lADDRGxxG6'),
(60, 'Hícaro Gabriel Bauer Nonato', 'nonato@gmail.com', '$2y$10$arWwkwlx4vSCOWTi7aXHqe4pIoR1MuMb33FIAYjgB/R.wxCdvU.tK'),
(63, 'Fábio Vitório dos Santos', 'fabao@gmail.com', '$2y$10$NTbS5Eaundi2V1UXqdoiZ.hcuQQE9cjMUsRogCpsUck5fi8dIRkTi'),
(64, 'Clóvis Honorato Silveira', 'cloclo@gmail.com', '$2y$10$y4zBW8N7EtZA1Fr2VwwL0OeXCogOuu.huWbxeIZknLrrdj.MHmC/q'),
(65, 'Rafael Alves', 'jogador@gmail.com', '$2y$10$lbmN.wEBW2K3JxncyNxr3ebrvbzxxnb8xUcj5sIadyfuwQjCcAjNK'),
(66, 'Leonardo Guedes Gomes Junior', 'leoindio@gmail.com', '$2y$10$wead.A6KPJci1JycmFN5M.F6MU8EarD/y2hGotWNI9q/NzRWgcABm'),
(67, 'Gustavo', 'gustavovalorant@gmail.com', '$2y$10$eU2qfFSHbc6kKt.UYowrU.RGSW7c2vloCdOLoJwqopbQxoOuGDT2i'),
(68, 'Gabriel', 'gabigol@gmail.com', '$2y$10$K6oYGXvXqw3nd88dOtCpp.YhsoKPDp283X84VebHymLBBZqXGVP92'),
(69, 'Priscilla Silveira Oliveira', 'pri@gmail.com', '$2y$10$IVpBsWvkKpT/xcSPFJQlOuz7yfeWnhtJlaZzyfDqnkG07hE0saRyS'),
(70, 'Diego Amarelo', 'diegao@gmail.com', '$2y$10$Ful77pYw2JgfAqG4/otk1./9fzm07RamVM6tN9CU5f0I8vgSFCv1S'),
(71, 'Marcos Ibirité', 'cc@gmail.com', '$2y$10$dywhvkgcquQswsQkO.468OH.TKtKL7B8wYDpI.OYulD0Er1Xd5SmO'),
(72, 'Guilherme (cpf MG)', 'juanfrancisco@gmail.com', '$2y$10$2W58.b470E2Fdtrg2FJnPOscSGDs3uHB50s5Niiwx6v4tCEsribCO'),
(73, 'Geovana Cruz', 'ge@gmail.com', '$2y$10$LXzLHCJeuNcwOFSLARhwieU/B/zbXcGH6/3YMj1ETRVSWETia7WKe'),
(74, 'Raquel Aurora Campos', 'raquel@gmail.com', '$2y$10$QXND.BoV.geslKUBlH2UROU1RMEEJyfQv6SoGqin0xzaNgKtwDtXS'),
(75, 'Larissa Olivia', 'larissa@gmail.com', '$2y$10$c2Wv9C0dktAXbNVGA3LYQesDOhyAtDnpwMhMXRS9Ls2nbUPsSx5Tu'),
(76, 'Chico Xavier ', 'chicao@gmail.com', '$2y$10$IWbxk821U5y3qKXCm8oPXusZIp/lWwchVrje9pXWXBwPqLKfCXqfS'),
(77, 'Cinquenta Centavos', '50cent@gmail.com', '$2y$10$blFpGdex9BoTNTVC9jkzVe5BkI/o91Ne9qGh5FdJbrFAv8SAH29Eu'),
(78, 'Rebeca Fernanda da Silva', 'rabecva@gmail.com', '$2y$10$FKrm4jsdwGeUzWzTD4ReCeaDPoLd8BE7sMaCZO7b5kCW/Akjv1AM.'),
(79, 'Leo dias ', 'fafa@gmail.com', '$2y$10$hzxv86rPGPXx1xw4VwUsYO2OFUHi12eehUpyvG6SeyTXHQlQpMPRu');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD UNIQUE KEY `id_avaliacao_UNIQUE` (`id_avaliacao`);

--
-- Índices para tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id_filme`),
  ADD UNIQUE KEY `id_filme_UNIQUE` (`id_filme`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id_filme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
