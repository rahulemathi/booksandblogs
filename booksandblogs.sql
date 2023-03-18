-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 12:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksandblogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `booktitle` varchar(300) NOT NULL,
  `bookauthor` varchar(300) NOT NULL,
  `bookprice` int(10) NOT NULL,
  `bookimagelocation` varchar(3000) NOT NULL,
  `discountbookprice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `booktitle`, `bookauthor`, `bookprice`, `bookimagelocation`, `discountbookprice`) VALUES
(1, 'Pride and Prejudice', 'Jane Austen', 1300, 'images/1.jpg', '600'),
(2, 'To Kill a Mockingbird', 'Harper Lee', 1500, 'images/2.jpg', '765'),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 1499, 'images/3.jpg', '799'),
(4, 'One Hundred Years of Solitude', 'Gabriel García Márquez', 1299, 'images/4.jpg', '899'),
(5, 'In Cold Blood', 'Truman Capote', 1899, 'images/6.jpg', '789'),
(6, 'Wide Sargasso Sea', 'Jean Rhys', 999, 'images/7.jpg', '699'),
(7, 'Brave New World', 'Aldous Huxley', 1566, 'images/8.jpg', '1299'),
(8, 'I Capture The Castle', 'Dodie Smith', 1299, 'images/9.jpg', '899'),
(9, 'Jane Eyre', 'Charlotte Bronte', 1899, 'images/10.jpg', '899'),
(10, 'Crime and Punishment', 'Fyodor Dostoevsky', 999, 'images/11.jpg', '600'),
(11, 'The Secret History', 'Donna Tartt', 1499, 'images/12.jpg', '899'),
(12, 'The Call of the Wild', 'Jack London', 999, 'images/13.jpg', '765'),
(13, 'The Chrysalids', 'John Wyndham', 1300, 'images/14.jpg', '699'),
(14, 'Persuasion', 'Jane Austen', 2999, 'images/15.jpg', '1299'),
(15, 'Moby-Dick', 'Herman Melville', 5999, 'images/16.jpg', '999'),
(16, 'The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 2599, 'images/17.jpg', '1599'),
(17, 'To the Lighthouse', 'Virginia Woolf', 3299, 'images/18.jpg', '1599'),
(18, 'The Death of the Heart', 'Elizabeth Bowen', 999, 'images/19.jpg', '599'),
(19, 'Tess of the d Urbervilles', 'Thomas Hardy', 799, 'images/20.jpg', '699'),
(20, 'Frankenstein', 'Mary Shelley', 1299, 'images/5.jpg', '799'),
(21, 'Durga', 'Kevin Missal', 999, 'images/21.jpg', '699');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(3000) NOT NULL,
  `author` varchar(300) NOT NULL,
  `referenceid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`) VALUES
(1, 'rahul', 'erahul096@gmail.com', '$2y$10$ibImcUiJf6zl7kDh1H1iHe/FYMP0CXBvrVkcP66ZHQ18mjKbEiwCi'),
(2, 'dell', 'dell@dell.com', '$2y$10$PcqtVvnp456L6cz7dOwVf.5IqbhdJADeniEOn9ono1ZXyStB1Ja/O'),
(3, 'admin', 'admin@admin.com', '$2y$10$E6OFCdfMjZtzpP1lUYuibulHKURXge1m1/PlJ23fi0PfhVmq7eO.q'),
(5, 'ranjith', 'ranjith@gmail.com', '$2y$10$8QQPTX2c6U2bZEorEnk/H.d7pcbI6B6dDd8YkddHq/gsTDK/.FNpO');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `poststitle` varchar(300) NOT NULL,
  `postcontent` varchar(3000) NOT NULL,
  `postdate` date NOT NULL,
  `author` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `poststitle`, `postcontent`, `postdate`, `author`) VALUES
(1, 'what is Bootstrap ?', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains HTML, CSS and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components.', '2023-03-16', 'rahul'),
(2, 'What is Fullstack ?', 'Full-stack refers to a development approach where a single developer or a team of developers are responsible for designing, developing, and maintaining the entire web application stack, from the front-end user interface to the back-end server-side logic and database management.\r\n\r\nIn other words, a full-stack developer has the skills and knowledge required to work on all layers of the web application, including the client-side user interface, the server-side business logic, and the database layer. This approach allows for a more streamlined and efficient development process, as developers have a holistic understanding of the entire application and can easily make changes across all layers.\r\n\r\nFull-stack development typically involves working with a range of technologies, including HTML, CSS, JavaScript, front-end frameworks like React or Angular, back-end frameworks like Node.js or Ruby on Rails, and databases like MySQL or MongoDB.', '2023-03-16', 'rahul'),
(3, 'What is Volcano ?', 'A volcano is a rupture in the crust of a planetary-mass object, such as Earth, that allows hot lava, volcanic ash, and gases to escape from a magma chamber below the surface.\r\n\r\nOn Earth, volcanoes are most often found where tectonic plates are diverging or converging, and most are found underwater. For example, a mid-ocean ridge, such as the Mid-Atlantic Ridge, has volcanoes caused by divergent tectonic plates whereas the Pacific Ring of Fire has volcanoes caused by convergent tectonic plates. Volcanoes can also form where there is stretching and thinning of the crusts plates, such as in the East African Rift and the Wells Gray-Clearwater volcanic field and Rio Grande rift in North America. Volcanism away from plate boundaries has been postulated to arise from upwelling diapirs from the core–mantle boundary, 3,000 kilometers (1,900 mi) deep in the Earth. This results in hotspot volcanism, of which the Hawaiian hotspot is an example. Volcanoes are usually not created where two tectonic plates slide past one another.', '2023-03-16', 'rahul'),
(4, 'What is a Coral Reef ?', 'A coral reef is an underwater ecosystem characterized by reef-building corals. Reefs are formed of colonies of coral polyps held together by calcium carbonate.[1] Most coral reefs are built from stony corals, whose polyps cluster in groups.\r\n\r\nCoral belongs to the class Anthozoa in the animal phylum Cnidaria, which includes sea anemones and jellyfish. Unlike sea anemones, corals secrete hard carbonate exoskeletons that support and protect the coral. Most reefs grow best in warm, shallow, clear, sunny and agitated water. Coral reefs first appeared 485 million years ago, at the dawn of the Early Ordovician, displacing the microbial and sponge reefs of the Cambrian.[2]\r\n\r\nSometimes called rainforests of the sea,[3] shallow coral reefs form some of Earths most diverse ecosystems. They occupy less than 0.1% of the worlds ocean area, about half the area of France, yet they provide a home for at least 25% of all marine species,[4][5][6][7] including fish, mollusks, worms, crustaceans, echinoderms, sponges, tunicates and other cnidarians.[8] Coral reefs flourish in ocean waters that provide few nutrients. They are most commonly found at shallow depths in tropical waters, but deep water and cold water coral reefs exist on smaller scales in other areas.\r\n\r\nCoral reefs have declined by 50% since 1950, partly because they are sensitive to water conditions.[9] They are under threat from excess nutrients (nitrogen and phosphorus), rising ocean heat content and acidification, overfishing (e.g., from blast fishing, cyanide fishing, spearfishing on scuba), sunscreen use,[10] and harmful land-use practices, including runoff and seeps (e.g., from injection wells and cesspools).[11][12][13]\r\n\r\nCoral reefs deliver ecosystem services for tourism, fisheries and shoreline protection. The annual global economic value of coral reefs has been estimated at anywhere from US$30–375 billion (1997 and 2003 estimates)[14][15] to US$2.7 trillion (a 2020 estimate)[16] to US$9.9 trillion (a 2014 estimate).[17]', '2023-03-16', 'rahul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
