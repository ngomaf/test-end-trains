-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22-Jan-2025 às 00:34
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aonews`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `idCat` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `slugCat` varchar(100) NOT NULL,
  `descriptionCat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`idCat`, `category`, `slugCat`, `descriptionCat`) VALUES
(1, 'Polítipca', 'politica', 'Notícias sobre politíca'),
(2, 'Desporto', 'desporto', 'Notícias sobre desporto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notice`
--

CREATE TABLE `notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'img-5.jpg',
  `views` int(10) UNSIGNED DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` tinyint(1) DEFAULT NULL,
  `fk_category_idCat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `notice`
--

INSERT INTO `notice` (`id`, `title`, `slug`, `content`, `image`, `views`, `updated_at`, `created_at`, `state`, `fk_category_idCat`) VALUES
(1, 'Title of notice list of notice list', 'Title-of-notice-list-of-notice', '\r\n        <p>\r\n            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error neque maxime ducimus sequi, soluta exercitationem quis omnis cumque libero unde earum eveniet, ullam rem voluptatem doloremque consequatur officia sed nostrum velit? Fuga molestiae autem voluptatem illum doloribus itaque, fugiat, possimus nemo ipsam ducimus doloremque hic! Cumque quae provident atque non quibusdam ratione adipisci maiores! Explicabo expedita modi corrupti ut a numquam, perspiciatis, pariatur placeat tempore tenetur aliquid, aspernatur consequuntur corporis eaque. Ea soluta quisquam, quasi, impedit odio nulla tempore laborum voluptates dignissimos debitis odit quibusdam ratione reprehenderit quaerat dolorem placeat.\r\n        </p>\r\n        <p>\r\n            Cum ut minima architecto porro ex obcaecati in nobis cupiditate quasi beatae explicabo esse maiores quaerat similique distinctio cumque amet incidunt velit exercitationem repudiandae facilis, ipsa eaque quo. \r\n        </p>\r\n        <p>\r\n            Provident impedit ab voluptatem cupiditate at, natus maxime nostrum cumque tenetur quae minus officia eaque eos sint quidem veritatis est repellendus. Quaerat illum debitis ducimus cum, rerum, autem officia facilis animi assumenda nesciunt saepe inventore molestiae temporibus, corrupti nulla facere reiciendis! Magnam aperiam blanditiis placeat ullam eligendi accusantium provident expedita, autem quidem sapiente adipisci dignissimos perspiciatis mollitia itaque at laborum error obcaecati vero, enim ut id voluptatem ea vitae doloremque!\r\n        </p>\r\n        <p>\r\n            Quam molestias, eos fuga sunt, necessitatibus modi consequatur dolores nulla ab veritatis consectetur molestiae! Porro culpa quas vero molestiae quasi veniam ab explicabo magni suscipit. Temporibus sunt, nobis aspernatur suscipit doloremque deserunt fuga eum eligendi placeat voluptates quaerat? Nisi adipisci quae quod iure ullam velit dolorem ipsam officia, laborum debitis?\r\n        </p>\r\n        <p>\r\n              Repellat ex magni officia obcaecati quasi voluptates labore modi laborum eaque vel veniam, sit nam animi minima aliquam debitis porro, totam iusto libero? Provident architecto iure debitis officia unde cupiditate aliquam. Ea, perspiciatis ad sequi itaque suscipit odit ipsum ratione autem in, nam laudantium! Placeat sed ex totam ut quam, dolores omnis nisi doloremque, laborum consequatur provident veritatis cupiditate ipsa tempore doloribus!\r\n        </p>', 'img-1.jpg', 0, '2025-01-21 09:47:09', '2025-01-21 09:47:09', NULL, 2),
(2, 'Teste one', 'Teste-one', 'Content test one', 'img-2.jpg', 0, '2025-01-21 12:32:29', '2025-01-21 12:32:29', 1, 1),
(4, 'O espírito de solidariedade do povo no Huambo', 'O-espírito-de-solidariedade-do-povo-no-Huambo', 'Why you might need it\r\n\r\nMany PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.\r\n\r\nFormatting email correctly is surprisingly difficult. There are myriad overlapping (and conflicting) standards, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you\'ll find online that uses the mail() function directly is just plain wrong, if not unsafe!', 'img-5.jpg', 0, '2025-01-21 14:20:08', '2025-01-21 14:20:08', 1, 1),
(5, '&#60;?php Maira', '&#60;?php-Maira', '&#60;p&#62;&#13;&#10;Many PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.&#13;&#10;&#60;/p&#62;&#60;p&#62;&#13;&#10;Formatting email correctly is surprisingly difficult. There are myriad overlapping (and conflicting) standards, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you&#39;ll find online that uses the mail() function directly is just plain wrong, if not unsafe!&#60;/p&#62;', 'img-5.jpg', 0, '2025-01-21 16:55:12', '2025-01-21 16:55:12', 1, 1),
(6, 'My notice', 'My-notice', '&#60;p&#62;&#13;&#10;Many PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.&#13;&#10;&#60;/p&#62;&#60;p&#62;&#13;&#10;Formatting email correctly is surprisingly difficult. There are myriad overlapping (and conflicting) standards, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you&#39;ll find online that uses the mail() function directly is just plain wrong, if not unsafe!&#60;/p&#62;', 'img-5.jpg', 0, '2025-01-21 17:07:03', '2025-01-21 17:07:03', 0, 1),
(7, 'Mamamia', 'Mamamia', '&#60;p&#62;The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, and macOS platforms, however, Windows usually doesn&#39;t include a local mail server; PHPMailer&#39;s integrated SMTP client allows email sending on all platforms without needing a local mail server. Be aware though, that the mail() function should be avoided when possible; it&#39;s both faster and safer to use SMTP to localhost.&#60;/p&#62;', 'img-5.jpg', 0, '2025-01-21 17:26:51', '2025-01-21 17:26:51', 1, 2),
(8, 'Mamamia 1', 'Mamamia-1', '&#60;p&#62;The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, and macOS platforms, however, Windows usually doesn&#39;t include a local mail server; PHPMailer&#39;s integrated SMTP client allows email sending on all platforms without needing a local mail server. Be aware though, that the mail() function should be avoided when possible; it&#39;s both faster and safer to use SMTP to localhost.&#60;/p&#62;', 'img-5.jpg', 0, '2025-01-21 17:27:09', '2025-01-21 17:27:09', 1, 2),
(9, 'Joe Biden vizita Angola', 'Joe-Biden-vizita-Angola', '\r\nIsso não quer dizer que as outras respostas estão erradas, apenas que há mais casos a serem considerados além do que já foi apresentado. Até porque há muitas situações nas quais você não vai precisar se preocupar com o que vem a seguir (mas ainda sim acho válido conhecer, pois se um dia precisar, está aí).\r\n\r\n\r\n\r\nIsso não quer dizer que as outras respostas estão erradas, apenas que há mais casos a serem considerados além do que já foi apresentado. Até porque há muitas situações nas quais você não vai precisar se preocupar com o que vem a seguir (mas ainda sim acho válido conhecer, pois se um dia precisar, está aí).\r\n', 'img-5.jpg', 0, '2025-01-21 22:25:41', '2025-01-21 22:25:41', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCat`),
  ADD UNIQUE KEY `slugCat` (`slugCat`);

--
-- Índices para tabela `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_category_idCat` (`fk_category_idCat`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`fk_category_idCat`) REFERENCES `category` (`idCat`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
