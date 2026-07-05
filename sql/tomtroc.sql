-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 05 juil. 2026 à 23:21
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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `dateUpload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `userId`, `title`, `author`, `description`, `image`, `status`, `dateUpload`) VALUES
(1, 15, 'The Kinkfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', './public/assets/images/uploads/covers/book_Kinfolk_Table.png', 1, '2026-05-03 00:00:00'),
(3, 14, 'L\'Ombre sur Innsmouth', 'H. P. Lovecraft', 'Féru de l’histoire de la Nouvelle-Angleterre, un jeune homme entreprend un voyage dans les cités anciennes de la région. En route pour Arkham, on lui propose d’emprunter une ligne de bus passant par Innsmouth, une ville côtière isolée. La simple évocation de cette localité semble provoquer un vif sentiment de répulsion chez les habitants des villes voisines ; dans un musée local, des bijoux en or provenant d’Innsmouth, aux formes et aux motifs étrangement dérangeants, attisent sa curiosité. Il décide alors de se rendre sur place.\r\n\r\nAutrefois port de pêche prospère et centre industriel florissant, cette ville lugubre n’est désormais plus que l’ombre d’elle-même. Malgré le dégoût que lui inspirent la morphologie anormale de certains habitants et les ruelles sombres où flotte une insupportable odeur de poisson, le jeune homme éprouve une envie irrésistible d’en apprendre davantage sur Innsmouth. Zadok, un vieil ivrogne aigri, lui livre une partie du passé trouble de la ville : dans les années 1800, Obed Marsh, un capitaine pratiquant le commerce avec de lointaines peuplades polynésiennes, fonda un culte païen, l’Ordre ésotérique de Dagon, qui s’imposa progressivement à tous les habitants. Zadok prétend que Marsh aurait scellé un pacte avec des monstres venus des profondeurs de la mer, qui lui assuraient une prospérité exceptionnelle en échange d’un pacte innommable.\r\n\r\nAlors que le jeune voyageur s’apprête à repartir, le bus tombe subitement en panne. Il n’a pas d’autre choix que de passer la nuit à Innsmouth…', './public/assets/images/uploads/covers/Innsmouth_cover.png', 0, '2026-01-20 00:00:00'),
(4, 14, 'Bienvenue chez vous', 'Alex Sol', 'Après avoir dépensé toutes leurs économies, Simon et Mathilde peuvent enfin réaliser leur rêve ! Vivre dans cette maison qu’ils ont fait construire à la campagne avec leurs deux enfants !\r\n\r\nMais dès leur arrivée, Mathilde ressent un malaise inexplicable.\r\n\r\nQuant à Nathan, leur fils de six ans, il commence à se comporter étrangement : il dessine des monstres effrayants, réclame à manger en continu et refuse de dormir seul dans sa chambre.\r\n\r\nDe son côté, Simon découvre qu’un des ouvriers ayant travaillé sur leur maison est mort dans des circonstances terribles. Il devrait en parler à sa femme, il le sait, mais il décide de le lui cacher. Mathilde pourrait décider de faire marche arrière et de quitter la maison, or Simon sait que c’est impossible.\r\n\r\nCette maison est tout ce qu’ils ont.\r\nElle devait être un nouveau départ, mais elle a d’autres projets pour eux…', './public/assets/images/uploads/covers/AlexSol_cover.png', 1, '2026-03-02 00:00:00'),
(7, 19, 'Tremblez !: 10 histoires criminelles vraies et flippantes', 'McSkyz', 'Quatre amis assassinés au bord d&#039;un lac en Finlande, une famille de fermiers tuée en France, une jeune maman torturée en Grèce, une adolescente disparue en Australie...\r\n\r\nLes histoires que vous allez lire sont toutes vraies et ont fait les gros titres des journaux ces dernières années.', './public/assets/images/uploads/covers/tremblez_cover.jpg', 0, '2026-06-21 15:18:15'),
(8, 19, 'Le Trone de Fer', 'George R.R. Martin', 'Le royaume des Sept Couronnes est sur le point de connaître son plus terrible hiver : par-delà le Mur qui garde sa frontière nord, une armée de ténèbres se lève, menaçant de tout détruire sur son passage. Mais il en faut plus pour refroidir les ardeurs des rois, des reines, des chevaliers et des renégats qui se disputent le trône de fer.\r\nTous les coups sont permis, et seuls les plus forts, ou les plus retors, s’en sortiront indemnes…', 'http%3A%2F%2Flocalhost%2Fwww%2F4_TomTroc%2Fpublic%2Fassets%2Fimages%2Fuploads%2Fcovers%2FTrone_de_Fer.jpg', 1, '2026-07-03 12:42:54');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `send_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `read_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `send_id`, `receive_id`, `send_date`, `content`, `read_status`) VALUES
(2, 19, 14, '2026-03-16 20:32:23', 'Salut, j\'ai vu ton livre d\'Alex Sol. Il est toujours disponible pour échanger ?', 1),
(3, 19, 14, '2026-06-21 23:09:17', 'Salut', 0),
(4, 19, 14, '2026-06-21 23:09:32', 'Encore un message', 0),
(5, 19, 15, '2026-06-21 23:15:20', 'Salut', 0),
(6, 19, 15, '2026-06-21 23:21:45', 'Un dernier message pour la route', 0),
(7, 19, 15, '2026-06-22 12:47:22', 'Encore un message', 0),
(15, 14, 19, '2026-07-01 00:49:05', 'Salut, oui toujours dispo', 0),
(19, 19, 14, '2026-07-01 01:57:29', 'Merci, et celui de Lovecraft ?', 0),
(20, 14, 15, '2026-07-01 12:09:08', 'Salut AlexLecture', 0),
(21, 14, 15, '2026-07-01 13:13:41', 'Ton livre est toujours dispo ?', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(128) DEFAULT NULL,
  `email` varchar(158) NOT NULL,
  `password` varchar(128) NOT NULL,
  `photo` text,
  `dateSubscribe` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `photo`, `dateSubscribe`) VALUES
(14, 'nathalire', 'nathalie@example.com', '$2y$10$3Vfr5YJlEfH/cDiNbKbOw.4/dlb2DDwZfw3Pd8JahlaMXzy4p1mGi', './public/assets/images/uploads/profiles/nathalire_photo.png', '2025-05-15 19:47:36'),
(15, 'AlexLecture', 'alexLecture@example.com', '$2y$10$72iH1kY0W5E2SGOUNOfhiuA.rTgkDOzR5QHFtSxsczWQhCITeJ6ES', './public/assets/images/uploads/profiles/Alexlecture_photo.png', '2025-09-15 20:03:18'),
(19, 'Lexa790', 'lexa@example.com', '$2y$10$r2m9aJwQbr4dNMWbn3DcGOLh0jVHw.nhyya0XJyFU6rud//xIgZIq', NULL, '2026-06-21 14:14:36');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
