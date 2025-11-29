-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2025 at 12:11 PM
-- Server version: 9.1.0
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emigo-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_no`, `subject`, `message`, `productname`, `remarks`, `status`, `date`) VALUES
(1, 'testcustomer', 'test12@gmail.com', '1234567890', 'testsubject', 'testsubject', '', 'test', 'ordered', '2025-11-25'),
(2, 'Saumya', 'saumya@gmail.com', '8978675634', 'Test', 'Test msg', '', 'test', 'rejected', '2025-11-25'),
(10, 'Arjun Vt', 'Arjunvt004@gmail.com', '7510949135', 'testsubject', 'steel core', '', 'test1', 'viewed', '2025-11-27'),
(13, 'achu', 'testachu@gmail.com', '1234567890', '0', 'test enquiry message', 'producttestt', 'test', 'communicated', '2025-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `img_alt`) VALUES
(1, 'photo-gallery1.webp', 'Test alt'),
(2, 'photo-gallery2.webp', ''),
(3, 'photo-gallery3.webp', ''),
(4, 'photo-gallery4.webp', ''),
(5, 'photo-gallery5.webp', ''),
(6, 'photo-gallery6.webp', ''),
(7, 'photo-gallery7.webp', ''),
(8, 'photo-gallery8.webp', ''),
(9, 'photo-gallery9.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', 'header', '2025-04-16 16:02:13', '2025-04-16 16:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `parent_id` int DEFAULT '0',
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '_self',
  `icon_class` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `parent_id`, `label`, `link`, `target`, `icon_class`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Home', '/home', '_self', NULL, 1, 1, '2025-04-16 16:14:48', '2025-04-16 16:14:48'),
(2, 1, 0, 'Certification Training', '/certification-training', '_self', NULL, 2, 1, '2025-04-16 16:14:48', '2025-06-03 10:02:17'),
(11, 1, 2, 'test', '#', '_self', NULL, 0, 1, '2025-05-20 18:36:29', '2025-05-20 18:36:29'),
(12, 1, 0, 'About us', '/about-us', '_self', NULL, 6, 1, '2025-06-03 10:10:44', '2025-06-03 10:11:23'),
(13, 1, 0, 'IT Solutions', '/it-solutions', '_self', NULL, 4, 1, '2025-06-03 10:10:44', '2025-06-03 10:11:10'),
(8, 1, 0, 'Corporate Training', '/corporate-training', '_self', NULL, 3, 1, '2025-05-14 11:45:09', '2025-06-03 10:07:51'),
(9, 1, 0, 'Support', '/support', '_self', NULL, 5, 1, '2025-05-14 11:45:09', '2025-06-03 10:11:17'),
(10, 1, 0, 'Contact us', '/contact-us', '_self', NULL, 7, 1, '2025-05-14 11:46:59', '2025-06-03 10:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `metatitle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `canonical` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_schema` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_img_alt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_completed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `year_experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeywords` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadescription` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `parent_id`, `metatitle`, `canonical`, `page_schema`, `title`, `banner_title`, `banner_description`, `banner_image`, `banner_img_alt`, `project_completed`, `year_experience`, `slug`, `template`, `metakeywords`, `metadescription`, `sort_order`, `created_at`, `is_active`) VALUES
(1, 0, ' IT, Cloud & Networking Certification Training Institute | Emigo ', 'https://emigonetworks.com/home', '<script type=\"application/ld+json\">\n{\n  \"@context\": \"https://schema.org\",\n  \"@type\": \"Organization\",\n  \"name\": \"Emigo Network Experts Pvt Ltd\",\n  \"alternateName\": \"Emigo Networks\",\n  \"url\": \"https://emigonetworks.com/\",\n  \"logo\": \"https://emigonetworks.com/wp-content/uploads/2021/03/logo.png\",\n  \"foundingDate\": \"2009\",\n  \"description\": \"Emigo Network Experts Pvt Ltd, established in 2009 in Kochi, Kerala, is a leading IT solutions provider specializing in networking, cybersecurity, cloud computing, and advanced technical training. With certified experts and state-of-the-art infrastructure, Emigo Networks delivers innovative IT services, corporate training, and end-to-end technology solutions to businesses and professionals across India.\",\n  \"address\": {\n    \"@type\": \"PostalAddress\",\n    \"streetAddress\": \"2nd Floor, Chakos Chembers, Civil Line Road, Palarivattom\",\n    \"addressLocality\": \"Kochi\",\n    \"addressRegion\": \"Kerala\",\n    \"postalCode\": \"682025\",\n    \"addressCountry\": \"IN\"\n  },\n  \"contactPoint\": [\n    {\n      \"@type\": \"ContactPoint\",\n      \"telephone\": \"+91-484-4061611\",\n      \"contactType\": \"customer support\",\n      \"areaServed\": \"IN\",\n      \"availableLanguage\": \"en\"\n    },\n    {\n      \"@type\": \"ContactPoint\",\n      \"telephone\": \"+91-860-6061612\",\n      \"contactType\": \"sales\",\n      \"areaServed\": \"IN\",\n      \"availableLanguage\": \"en\"\n    }\n  ],\n  \"email\": \"mail@emigonetworks.com\",\n  \"sameAs\": [\n    \"https://www.instagram.com/_emigo_cochin_\",\n    \"https://www.linkedin.com/company/emigonetworks/\",\n    \"https://www.facebook.com/emigonetwork/\"\n  ]\n}\n</script>\n', 'Home', '', '', '', '', '0', '0', 'home', '', 'IT Certification Training, Cloud Certification Training Institute, Networking Certification Training Institute', 'Emigo offers  IT, cloud and Networking certification training with expert instructors, hands-on labs, and career-focused learning to help you achieve your goals.', 1, '2025-03-31 05:39:04', 0),
(2, 0, 'product', 'http://localhost/codeigniter/emigo-website/product', 'Product', 'Product', 'Product1', 'Product1', 'uploads/page_product/img_692692228fb34.jpg', '', '0', '0', 'product', '', 'Product', 'Product', 2, '2025-03-31 05:39:04', 0),
(3, 0, 'Contact Us', 'https://emigonetworks.com/contact-us', '', 'Contact', 'Contact Us', 'Contact us', 'uploads/page_contact/img_6926af3de34ba.jpg', '', '0', '0', 'contact', '', 'meta keywords', 'Contact', 7, '2025-03-31 07:02:05', 0),
(9, 0, 'About Us', 'http://localhost/codeigniter/emigo-website/about-us', '', 'About-us', 'Metro Agencies , a company dedicated to steel trading and distribution.', 'The story of Metro Agencies is not just about distribution — it is about a legacy that began nearly five decades ago, rooted in Kerala’s entrepreneurial spirit, craftsmanship, and commitment to quality.\n\nOur journey in the steel industry dates back to 1976, when we started our very first steel furniture manufacturing unit under the name Modern Furniture in Kottakkal. This was not only our entry into the world of steel but also the foundation of a vision — to serve people and industries with durable, innovative, and accessible steel solutions.', 'uploads/about_us/img_6921617ea5f16.jpg', 'About us', '100+', '10+', 'about-us', '', 'meta keywords', 'about-us', 6, '2025-06-03 04:39:14', 0),
(7, 0, 'Manufacturing Units', 'https://emigonetworks.com/corporate-training', '', 'Manufacturing Units', 'Manufacturing Units', 'Get your Employees Trained and back to work faster and more efficiently with EMIGO’s accelerated courses', './uploads/page_manfacture/img_69294542e24c9.jpg', 'Corporate Training', '0', '0', 'manufacturing-units', '', 'meta keywords', 'Empower your workforce with our custom corporate training programs in Emigo. Build real-world IT, cloud, and cybersecurity skills | Transform your team today.', 3, '2025-05-14 06:24:21', 0),
(8, 0, 'Infrastructure & Logistics', 'https://emigonetworks.com/support', '', 'Infrastructure & Logistics', 'Infrastructure & Logistics', 'Get expert help for our training and IT solutions divisions. Fast, reliable support is here to empower your success!', './uploads/page_infrastructure/img_69294450d5525.jpg', 'Training & Tech  Support', '0', '0', 'infrastructure', '', 'meta keywords', 'Access learner support and assistance at Emigo Networks. Get help with course access, technical issues, exam preparations, and more | Reach out for help today!', 5, '2025-05-14 06:24:21', 0),
(11, 1, 'Careers', 'canonical', '', 'Careers', 'Join Our Team', 'Build Your Career with Elite Steel & Aluminium Construction', './uploads/page_product/img_6926c6bd70dc0.jpg', '', '0', '0', 'careers', '', 'careers', 'careers', 0, '2025-10-07 09:45:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_aboutus`
--

DROP TABLE IF EXISTS `page_aboutus`;
CREATE TABLE IF NOT EXISTS `page_aboutus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_img_alt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_aboutus`
--

INSERT INTO `page_aboutus` (`id`, `title`, `image`, `about_img_alt`, `content`, `title2`, `content2`) VALUES
(1, 'EMIGO NETWORKS — Built by Experts. Driven by Innovation. Trusted Worldwide.', 'uploads/page_images/img_686cc424a2642.webp', 'About us Image', 'At EMIGO NETWORKS, our vision is bold and transformative — to seamlessly bridge the divide between exceptional talent and cutting-edge technology. A proud venture of EMIGO NETWORK EXPERTS PRIVATE LIMITED, we began our journey in 2009, founded by a consortium of industry veterans from the internetworking domain and duly registered under the Companies Act of India. From inception, our focus has extended beyond mere service delivery — we are architects of meaningful transformation. Today, EMIGO NETWORKS stands as a trusted brand in the realms of IT Solutions, IT Outsourcing, Software Development, and Corporate Training, earning the confidence of clients and professionals across India. Our expertise lies in crafting role-specific, industry-relevant training programs in Networking, Cyber Security, and Cloud Computing, each meticulously designed to meet the ever-evolving demands of the global technology landscape.\n\nIn 2023, we proudly expanded our presence to Dubai, UAE, cementing our foot hold in the Middle East. This strategic expansion enabled us to diversify our offerings to include Corporate Training & Certification, Network Consulting, and Global IT Outsourcing Services. Our operations in Dubai reflect our relentless pursuit of excellence and our commitment to delivering world-class solutions — wherever innovation is needed. At EMIGO NETWORKS, we believe that true success is achieved through agility, precision, and purpose-driven learning. Our programs are not just educational courses — they are immersive, high-impact experiences curated by leading industry experts. Each session is practical, streamlined, and focused on real-world results, empowering learners with both the knowledge and the confidence to lead. Anchored by our core values of quality, innovation, and measurable success, EMIGO NETWORKS continues to be the preferred partner for individuals, enterprises, and government entities seeking future-ready talent and next-generation technology solutions.', 'Our Service Verticalss', 'We empower businesses through expert IT Outsourcing, industry-leading Certifications, tailored Corporate Training, and innovative IT Solutions (Products). Drive your growth with Emigo\'s commitment to excellence and digital transformation. Followings are our Service verticals.');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metatitle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `canonical` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeywords` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadescription` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_schema` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL COMMENT 'if 1=active 0=inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `metatitle`, `canonical`, `metakeywords`, `metadescription`, `page_schema`, `category_title`, `category_description`, `category_image`, `category_link`, `is_active`) VALUES
(28, 'CR (Cold Rolled) Coils', 'CR (Cold Rolled) Coils', 'CR (Cold Rolled) Coils', 'CR (Cold Rolled) Coils', 'CR (Cold Rolled) Coils', '', 'CR (Cold Rolled) Coils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'hr-coils1.jpg', '0', 0),
(29, 'gp-galvanized-plain-sheets-coils', 'GP (Galvanized Plain) Sheets & Coils', 'gp-galvanized-plain-sheets-coils', 'GP (Galvanized Plain) Sheets & Coils', 'GP (Galvanized Plain) Sheets & Coils', 'gp coil schema', 'GP (Galvanized Plain) Sheets & Coils test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'gp-coil.jpg', '0', 0),
(27, 'HR (Hot Rolled) Coils', 'HR (Hot Rolled) Coils', 'HR (Hot Rolled) Coils', 'HR (Hot Rolled) CoilsHR (Hot Rolled) Coils', 'HR (Hot Rolled) CoilsHR (Hot Rolled) Coils', '', 'HR (Hot Rolled) CoilsHR (Hot Rolled) Coils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'hr-coils.jpg', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

DROP TABLE IF EXISTS `tbl_career`;
CREATE TABLE IF NOT EXISTS `tbl_career` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `experience` varchar(255) NOT NULL,
  `location` varchar(2255) NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`id`, `job`, `description`, `experience`, `location`, `is_active`) VALUES
(1, 'software developer', '<p class=\"\">we are looking for software developer with 2+ year experience</p><ul><li><span style=\"color: rgb(85, 85, 85); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(248,=\"\" 249,=\"\" 250);\"=\"\">Bachelor\'s degree in Civil or Mechanical Engineering</span></li><li><span style=\"color: rgb(85, 85, 85); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(248,=\"\" 249,=\"\" 250);\"=\"\">Strong knowledge of steel fabrication techniques and standards</span></li><li><span style=\"color: rgb(85, 85, 85); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(248,=\"\" 249,=\"\" 250);\"=\"\">Proficiency in AutoCAD and other design software</span></li></ul>', '2+ year', 'malapuram', 0),
(2, 'Manager', '<p>temporary post&nbsp;</p><ul><li><span style=\"color: rgb(85, 85, 85); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(248,=\"\" 249,=\"\" 250);\"=\"\">ITI or Diploma in relevant field</span></li><li><span style=\"color: rgb(85, 85, 85); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(248,=\"\" 249,=\"\" 250);\"=\"\">&nbsp;Proven track record in managing large-scale projects</span></li></ul>', '1+ year', 'kochi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_template`
--

DROP TABLE IF EXISTS `tbl_form_template`;
CREATE TABLE IF NOT EXISTS `tbl_form_template` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_side_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'client side url(controller link)',
  `server_side_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Server side url(controller link)',
  `remarks` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infrastructure`
--

DROP TABLE IF EXISTS `tbl_infrastructure`;
CREATE TABLE IF NOT EXISTS `tbl_infrastructure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `metakeyword` varchar(255) NOT NULL,
  `metadescription` varchar(255) NOT NULL,
  `page_schema` varchar(255) NOT NULL,
  `infrastructure_title` varchar(255) NOT NULL,
  `infrastructure_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `infrastructure_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_infrastructure`
--

INSERT INTO `tbl_infrastructure` (`id`, `slug`, `metatitle`, `metakeyword`, `metadescription`, `page_schema`, `infrastructure_title`, `infrastructure_description`, `infrastructure_image`, `is_active`) VALUES
(1, 'world-class-infrastructure', 'world class infrastructure', 'world class infrastructure', 'world class infrastructure', '', 'world class infrastructure', '<p class=\"\"><span style=\"font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; font-size: 16.8px;\">Our state-of-the-art infrastructure spans across 75,000 square feet of modern facilities designed to support large-scale production and efficient logistics operations. We have invested heavily in creating an ecosystem that ensures seamless operations from manufacturing to delivery.</span></p>', 'photo-1586528116311-ad8dd3c8310d.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_management`
--

DROP TABLE IF EXISTS `tbl_management`;
CREATE TABLE IF NOT EXISTS `tbl_management` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `short_bio` varchar(255) NOT NULL,
  `management_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_management`
--

INSERT INTO `tbl_management` (`id`, `name`, `designation`, `short_bio`, `management_image`, `is_active`) VALUES
(1, 'saumya', 'Sales manager', 'Sales manager', 'testimg.jpg', 0),
(2, 'vishnu', 'Assistant Salesmanager', 'Test name test Test name', 'hero-slide4-xs.webp', 0),
(3, 'Arjun', 'Designer', 'Designer', 'Testimonial-pic.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form_template_id` int NOT NULL,
  `menu_name` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `remarks` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `metakeyword` varchar(255) NOT NULL,
  `metadescription` varchar(255) NOT NULL,
  `page_schema` varchar(255) NOT NULL,
  `product_category` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_brodhure` varchar(255) NOT NULL,
  `product_link` varchar(255) NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `slug`, `metatitle`, `canonical`, `metakeyword`, `metadescription`, `page_schema`, `product_category`, `product_name`, `product_description`, `product_image`, `product_brodhure`, `product_link`, `is_active`) VALUES
(1, 'producttest', 'producttest', 'producttest', 'producttest', 'producttest', 'schema ', 27, 'producttestt', '<p><span style=\"color: rgb(85, 85, 85); font-family: \" segoe=\"\" ui\",=\"\" tahoma,=\"\" geneva,=\"\" verdana,=\"\" sans-serif;=\"\" font-size:=\"\" 16.8px;\"=\"\">High-quality steel frameworks designed for warehouses, factories, and commercial buildings. Our steel structures are engineered for maximum strength, durability, and longevity using premium-grade materials and advanced fabrication techniques</span></p><ul><li><font color=\"#555555\" face=\"Segoe UI, Tahoma, Geneva, Verdana, sans-serif\"><span style=\"font-size: 16.8px;\">High tensile strength steel (IS 2062 Grade)</span></font></li><li><font color=\"#555555\" face=\"Segoe UI, Tahoma, Geneva, Verdana, sans-serif\"><span style=\"font-size: 16.8px;\">Corrosion-resistant coating with 20+ years warranty</span></font></li><li><font color=\"#555555\" face=\"Segoe UI, Tahoma, Geneva, Verdana, sans-serif\"><span style=\"font-size: 16.8px;\">Custom designs available as per requirements</span></font></li><li><font color=\"#555555\" face=\"Segoe UI, Tahoma, Geneva, Verdana, sans-serif\"><span style=\"font-size: 16.8px;\">Seismic zone compliant structures</span></font></li><li><font color=\"#555555\" face=\"Segoe UI, Tahoma, Geneva, Verdana, sans-serif\"><span style=\"font-size: 16.8px;\">Pre-engineered and pre-fabricated options</span></font></li></ul>', 'ppgl-coil.png', 'Yellow_and_Blue_Modern_Professional_We_are_Hiring_Poster_1.pdf', 'producttestt', 0),
(2, 'producttest-1', 'producttest-1', 'producttest-1', 'producttest1', 'producttest1', 'producttest1', 28, 'producttest1', 'producttest1', 'rolling-shutter.jpeg', 'woodsberg_website_payment_customers_(1).xlsx', 'producttest1', 0),
(3, 'test-product', 'Test product', 'test-product', 'Test product', 'Test product', 'Test product', 28, 'Test product', 'Test product', 'banner_image2.jpg', 'Arjun_Vt_pdf_(1).pdf', 'Test product', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recruitment`
--

DROP TABLE IF EXISTS `tbl_recruitment`;
CREATE TABLE IF NOT EXISTS `tbl_recruitment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_recruitment`
--

INSERT INTO `tbl_recruitment` (`id`, `name`, `email`, `address`, `phone`, `file`, `designation`, `remarks`, `status`, `date`) VALUES
(1, 'Arjun Vt', 'Arjunvt004@gmail.com', 'Theruvath(h), kizhathiri p. o, ramapuram, kottayam(dist)', '7510949135', 'Arjun_Vt_pdf_(1).pdf', 'Manager', 'resume viewed', 'communicated', '2025-11-27'),
(6, 'Arjun Vt', 'Arjunvt004@gmail.com', 'Theruvath(h), kizhathiri p. o, ramapuram, kottayam(dist)', '7510949135', 'Produce_Chauffeur(circle)RED1.pdf', 'software developer', 'resume viewed', 'viewed', '2025-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `address`, `phone_no`, `email`, `working_hours`, `is_active`) VALUES
(1, 'Metro Agencies Kottakkal, Kerala', '+91 9645 00 00 96', 'info@metroagencies.in', '9:00 AM - 6:00 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `description`, `image`, `is_active`) VALUES
(26, 'Kerala’s Trusted Name in Steel Since 1977', 'Kerala’s Trusted Name in Steel Since 1977', 'slider_image7.jpg', 0),
(27, 'Kerala’s Trusted Name in Steel Since 1976', 'Kerala’s Trusted Name in Steel Since 1976', 'slider1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userName`, `userPassword`, `is_active`) VALUES
(1, 'metro', '97a66bfcad63e43e94e764d19d557257', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `title`, `slug`, `short_description`, `description`, `link`, `img_alt`, `image`, `banner_image`, `banner_description`) VALUES
(1, 'Introduction', 'Crafting Network futures for over 15 Years', 'introduction-home', '', 'We empower individuals and organizations worldwide to develop future-ready skills through industry-recognized, instructor-led training delivered in a dynamic and interactive live learning environment. Our expertise spans Networking, Cybersecurity, Cloud Computing, Network Virtualization, and Data Center Networking.', 'about-us', '', 'introduction-image.webp', NULL, ''),
(2, 'Trainings Section', 'Certifications Training', 'certifications-training', 'Our training sessions are meticulously crafted by our expert trainers. Mastery of the subject. Every detail is designed to maximize efficiency, ensuring t hat you get the most value out of your time. ', 'Our training sessions are meticulously crafted by our expert trainers. Mastery of the subject. Every detail is designed to maximize efficiency, ensuring t hat you get the most value out of your time. Increased productivity. Faster troubleshooting. Better decision making and job performance. Sound like things you want? Then get certified.', 'certification-training', 'Test alt', 'certification-training-image2.webp', NULL, 'Potential benefits to getting a certification can include improved job  performance and increased competitiveness in the job market'),
(3, '', 'Corporate Training', 'corporate-training', '', 'Our Corporate training offers several benefits, including improved employee skills, increased productivity, enhanced job satisfaction, and a more adaptable workforce. It can also contribute to employee retention and overall organizational success by keeping the workforce updated.', 'corporate-training', 'Test alt', 'corporate-training-image.webp', NULL, ''),
(4, 'Gallery', 'We empower candidates with hands on labs', 'gallery-widget-caption', '', 'Our training sessions are meticulously crafted by our expert trainers. Every detail is designed to maximize efficiency, ensuring that you get the most value out of your time.', '#', '', '', NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
