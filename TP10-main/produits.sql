
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `date_ajout` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

--

--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

