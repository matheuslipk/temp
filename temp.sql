SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `comosoube` (
  `id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comosoube` VALUES
(1, 'TV'),
(2, 'Redes sociais'),
(3, 'Cartaz/faixa'),
(4, 'Site'),
(5, 'Radio'),
(6, 'Jornal'),
(7, 'Outros');

CREATE TABLE `questionario` (
  `idQuestionario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `ocupacao` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comoSoube` int(11) DEFAULT NULL,
  `outros` varchar(50) DEFAULT NULL,
  `impTema` int(11) DEFAULT NULL,
  `interacao` int(11) DEFAULT NULL,
  `atendimento` int(11) DEFAULT NULL,
  `sugerirTema` varchar(100) DEFAULT NULL,
  `criticaSugestao` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `questionario` VALUES
(1, 'NOme', 34, '2', 'email@email', 3, 'e4fad', 1, 1, 1, '', '');


ALTER TABLE `comosoube`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questionario`
  ADD PRIMARY KEY (`idQuestionario`),
  ADD KEY `comoSoube` (`comoSoube`);


ALTER TABLE `comosoube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `questionario`
  MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `questionario`
  ADD CONSTRAINT `questionario_ibfk_1` FOREIGN KEY (`comoSoube`) REFERENCES `comosoube` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
