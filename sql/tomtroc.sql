-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 23 mai 2026 à 18:09
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `dateUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `userId`, `title`, `author`, `description`, `image`, `status`, `dateUpload`) VALUES
(1, 1, 'The Kinkfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', './assets/book_Kinfolk_Table.png', 1, '2026-05-03'),
(2, 2, 'L\'Utopie', 'Thomas More', 'Chancelier du roi Henri VIII, Thomas More se désole des mœurs de son temps : corruption, abus, racket sont monnaie courante dans une société féodale sur le déclin. Il rêve d’un autre monde, d’une république exemplaire, où la propriété individuelle et l’argent seraient abolis et les citoyens gouvernés par la raison et la vertu…\r\nPublié en 1516, ce texte brosse le tableau d’une société anglaise décadente pour mieux introduire le lecteur à un univers débarrassé des faux-semblants et de l’injustice. Rêve de philosophe ou de fou, l’île d’Utopie fascine par son projet égalitaire, dont la réalisation est aussi séduisante que les dérives dangereuses.', './assets/utopie_cover.png', 1, '2026-02-02'),
(3, 2, 'L\'Ombre sur Innsmouth', 'H. P. Lovecraft', 'Féru de l’histoire de la Nouvelle-Angleterre, un jeune homme entreprend un voyage dans les cités anciennes de la région. En route pour Arkham, on lui propose d’emprunter une ligne de bus passant par Innsmouth, une ville côtière isolée. La simple évocation de cette localité semble provoquer un vif sentiment de répulsion chez les habitants des villes voisines ; dans un musée local, des bijoux en or provenant d’Innsmouth, aux formes et aux motifs étrangement dérangeants, attisent sa curiosité. Il décide alors de se rendre sur place.\r\n\r\nAutrefois port de pêche prospère et centre industriel florissant, cette ville lugubre n’est désormais plus que l’ombre d’elle-même. Malgré le dégoût que lui inspirent la morphologie anormale de certains habitants et les ruelles sombres où flotte une insupportable odeur de poisson, le jeune homme éprouve une envie irrésistible d’en apprendre davantage sur Innsmouth. Zadok, un vieil ivrogne aigri, lui livre une partie du passé trouble de la ville : dans les années 1800, Obed Marsh, un capitaine pratiquant le commerce avec de lointaines peuplades polynésiennes, fonda un culte païen, l’Ordre ésotérique de Dagon, qui s’imposa progressivement à tous les habitants. Zadok prétend que Marsh aurait scellé un pacte avec des monstres venus des profondeurs de la mer, qui lui assuraient une prospérité exceptionnelle en échange d’un pacte innommable.\r\n\r\nAlors que le jeune voyageur s’apprête à repartir, le bus tombe subitement en panne. Il n’a pas d’autre choix que de passer la nuit à Innsmouth…', './assets/Innsmouth_cover.png', 0, '2026-01-20'),
(4, 2, 'Bienvenue chez vous', 'Alex Sol', 'Après avoir dépensé toutes leurs économies, Simon et Mathilde peuvent enfin réaliser leur rêve ! Vivre dans cette maison qu’ils ont fait construire à la campagne avec leurs deux enfants !\r\n\r\nMais dès leur arrivée, Mathilde ressent un malaise inexplicable.\r\n\r\nQuant à Nathan, leur fils de six ans, il commence à se comporter étrangement : il dessine des monstres effrayants, réclame à manger en continu et refuse de dormir seul dans sa chambre.\r\n\r\nDe son côté, Simon découvre qu’un des ouvriers ayant travaillé sur leur maison est mort dans des circonstances terribles. Il devrait en parler à sa femme, il le sait, mais il décide de le lui cacher. Mathilde pourrait décider de faire marche arrière et de quitter la maison, or Simon sait que c’est impossible.\r\n\r\nCette maison est tout ce qu’ils ont.\r\nElle devait être un nouveau départ, mais elle a d’autres projets pour eux…', './assets/AlexSol_cover.png', 1, '2026-03-02');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sendId` int(11) NOT NULL,
  `inputId` int(11) NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sendId`, `inputId`, `sendDate`, `message`) VALUES
(1, 1, 2, '2026-03-16 10:35:28', 'Salut, j\'ai vu ton livre d\'Alex Sol. Il est dispo pour une petite lecture ?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(158) NOT NULL,
  `password` varchar(128) NOT NULL,
  `photo` text NOT NULL,
  `dateSubscribe` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `dateSubscribe`) VALUES
(1, 'Alexlecture', 'alex@example.com', 'TomTroc', './assets/Alexlecture_photo.png', '2025-05-01 22:08:40'),
(2, 'nathalire', 'nathalie@example.com', 'TomTroc', './assets/nathalire_photo.svg', '2025-05-01 22:08:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
