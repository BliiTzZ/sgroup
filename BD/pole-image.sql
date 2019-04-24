-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 12 Mars 2019 à 11:33
-- Version du serveur :  5.7.22-0ubuntu0.17.10.1
-- Version de PHP :  7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pole-image`
--

-- --------------------------------------------------------

--
-- Structure de la table `pi_attempt_login`
--

CREATE TABLE `pi_attempt_login` (
  `id_attempt` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `number` tinyint(1) UNSIGNED NOT NULL,
  `last_attempt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pi_conditions`
--

CREATE TABLE `pi_conditions` (
  `id_condition` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `text_condition` text NOT NULL,
  `date_condition` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pi_login`
--

CREATE TABLE `pi_login` (
  `id_login` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pi_login`
--

INSERT INTO `pi_login` (`id_login`, `id_user`, `user_email`, `password`, `date_registration`) VALUES
(2, 2, 'gardenier.eloy30@gmail.com', '$2y$12$zz7jeYcN3IYEA6HqRC0Gguj3dwpD8XdDK5DV9ufxSDgbJUWy9JULS', '2019-03-04 15:59:14'),
(16, 1, 'yaya.ponsot@gmail.com', '$2y$12$zz7jeYcN3IYEA6HqRC0Gguj3dwpD8XdDK5DV9ufxSDgbJUWy9JULS', '2019-03-11 09:30:12');

-- --------------------------------------------------------

--
-- Structure de la table `pi_rank`
--

CREATE TABLE `pi_rank` (
  `id_rank` tinyint(2) NOT NULL,
  `rank_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pi_rank`
--

INSERT INTO `pi_rank` (`id_rank`, `rank_name`) VALUES
(0, 'Développeur'),
(2, 'Admin'),
(10, 'Modérateur'),
(20, 'Adhérent');

-- --------------------------------------------------------

--
-- Structure de la table `pi_request_users`
--

CREATE TABLE `pi_request_users` (
  `id_request` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `message_personalized` text NOT NULL,
  `token_validation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pi_users`
--

CREATE TABLE `pi_users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `job` varchar(100) NOT NULL,
  `enterprise` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `siret` varchar(14) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `id_rank` tinyint(2) UNSIGNED DEFAULT '20',
  `link` varchar(255) NOT NULL,
  `message` text,
  `address` varchar(255) NOT NULL,
  `postal_code` smallint(5) UNSIGNED NOT NULL,
  `validation` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `date_request` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token_recovery` varchar(255) DEFAULT NULL,
  `expiration_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pi_users`
--

INSERT INTO `pi_users` (`id_user`, `first_name`, `last_name`, `user_email`, `tel`, `gender`, `job`, `enterprise`, `status`, `siret`, `avatar`, `id_rank`, `link`, `message`, `address`, `postal_code`, `validation`, `date_request`, `token_recovery`, `expiration_token`) VALUES
(1, 'Yacine', 'Ponsot', 'yaya.ponsot@gmail.com', '0607040814', 'M.', 'Développeur Web - Web Mobile / FullStack', 'Simplon', 'Freelance', '159753', 'yacine.jpeg', 0, 'https://www.linkedin.com/in/yacine-ponsot-41b560172/', NULL, 'Le Grans Bois, Saint Sauveur de Crusière', 7460, 1, '2019-03-11 09:29:22', NULL, NULL),
(2, 'Eloy', 'Gardenier', 'gardenier.eloy30@gmail.com', '06 08 67 03 62', 'M.', 'Développeur web - web mobile / Fullstack', 'Simplon', 'Freelance', '42353453', 'eloy.png', 0, 'https://www.eloy-development.web-edu.fr', 'Salut!', '6 rue Stéphane Morganti', 30480, 1, '2019-02-21 15:14:37', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `pi_attempt_login`
--
ALTER TABLE `pi_attempt_login`
  ADD PRIMARY KEY (`id_attempt`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `pi_conditions`
--
ALTER TABLE `pi_conditions`
  ADD PRIMARY KEY (`id_condition`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `pi_login`
--
ALTER TABLE `pi_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `pi_rank`
--
ALTER TABLE `pi_rank`
  ADD PRIMARY KEY (`id_rank`);

--
-- Index pour la table `pi_request_users`
--
ALTER TABLE `pi_request_users`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `pi_users`
--
ALTER TABLE `pi_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pi_attempt_login`
--
ALTER TABLE `pi_attempt_login`
  MODIFY `id_attempt` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pi_conditions`
--
ALTER TABLE `pi_conditions`
  MODIFY `id_condition` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `pi_login`
--
ALTER TABLE `pi_login`
  MODIFY `id_login` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `pi_request_users`
--
ALTER TABLE `pi_request_users`
  MODIFY `id_request` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `pi_users`
--
ALTER TABLE `pi_users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pi_attempt_login`
--
ALTER TABLE `pi_attempt_login`
  ADD CONSTRAINT `pi_attempt_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pi_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi_conditions`
--
ALTER TABLE `pi_conditions`
  ADD CONSTRAINT `pi_conditions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pi_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi_login`
--
ALTER TABLE `pi_login`
  ADD CONSTRAINT `pi_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pi_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pi_login_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `pi_users` (`user_email`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi_request_users`
--
ALTER TABLE `pi_request_users`
  ADD CONSTRAINT `pi_request_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pi_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
