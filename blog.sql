-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Mai 2017 à 15:35
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`ID`, `titre`, `image`, `contenu`, `date_creation`) VALUES
(151, 'Episode 1', 'Image/alaska.jpg', '1Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus.', '2017-05-19 09:52:04'),
(182, 'Episode 2', 'Image/train.jpg', '1Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus.', '2017-05-19 12:10:48'),
(183, 'Episode 3', 'Image/alaska3.jpg', '1Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus.', '2017-05-19 12:10:57'),
(185, 'Episode 4', 'Image/montagne.jpg', '1Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period;', '2017-05-19 12:10:17'),
(186, 'Episode 5', 'Image/plage.jpg', '1Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period; Quin in ipso equo&comma; cuius modo feci mentionem&comma; si nulla res impediat&comma; nemo est&comma; quin eo&comma; quo consuevit&comma; libentius utatur quam intractato et novo&period; Nec vero in hoc quod est animal&comma; sed in iis etiam quae sunt inanima&comma; consuetudo valet&comma; cum locis ipsis delectemur&comma; montuosis etiam et silvestribus&period;', '2017-05-19 12:13:15');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `ID` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `id_billet` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `signaler` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`ID`, `parent_id`, `pseudo`, `commentaire`, `id_billet`, `date_creation`, `signaler`) VALUES
(6, 0, 'John', 'super', 151, '2017-05-19 07:55:24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`) VALUES
(4, 'admin', '$2y$14$KQCDYaY/ns5kFQYsccE0SOJHNGKKvq/bFmlzzXjBEhv8pqjnwQ6pi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fkey_idbillet` (`id_billet`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_idbillet` FOREIGN KEY (`id_billet`) REFERENCES `billets` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
