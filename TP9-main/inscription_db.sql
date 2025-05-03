
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `groupe` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `encadrement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `groupe`, `sujet`, `date_debut`, `date_fin`, `encadrement`) VALUES
(3, 'dd', 'ddd', 22, 'eeds', '2000-03-12', '2050-03-12', 'sxccdc'),
(4, 'dd', 'ddd', 22, 'eeds', '2000-03-12', '2050-03-12', 'sxccdc'),
(5, 'dd', 'ddd', 22, 'eeds', '2000-03-12', '2050-03-12', 'sxccdc'),
(6, 'dd', 'ddd', 22, 'eeds', '2000-03-12', '2050-03-12', 'sxccdc'),
(7, 'dd', 'ddd', 22, 'eeds', '2000-03-12', '2050-03-12', 'sxccdc');
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;