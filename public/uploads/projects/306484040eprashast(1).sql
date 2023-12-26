-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2023 at 12:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eprashast`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulk_orders`
--

CREATE TABLE `bulk_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulk_orders`
--

INSERT INTO `bulk_orders` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Cruz Gray', 'bywyzi@mailinator.com', 'Dolorem sit nulla q', 'Deserunt atque incid', '2023-12-06 07:19:36', '2023-12-06 07:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Rhonda Long', 'husolako@mailinator.com', 'Duis nostrum asperio', 'Placeat quia ullam', '2022-07-12 22:26:11', '2022-07-12 22:26:11'),
(2, 'Lesley Reyes', 'jarodisa@mailinator.com', 'Eu explicabo Autem', 'Eos eius magnam cupi', '2023-12-06 07:02:12', '2023-12-06 07:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `value` int(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `slug`, `value`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'RAKHI', 'rakhi', 20, NULL, 1, 1, '2022-07-20', '2023-01-31'),
(7, 'AXSD', 'axsd', 14, NULL, 1, 1, '2022-07-20', '2022-07-21'),
(8, 'asdasf', 'asdasf', 20, NULL, 1, 1, '2022-07-20', '2022-07-21'),
(9, 'Color', 'color', 10, NULL, 1, 1, '2022-07-21', '2022-07-22'),
(10, 'CFDVG12', 'cfdvg12', 12, NULL, 0, 1, '2022-07-21', '2022-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `desiners`
--

CREATE TABLE `desiners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desiners`
--

INSERT INTO `desiners` (`id`, `name`, `slug`, `description`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Larissa Mckay', 'larissa-mckay', '<p>Desiner Description</p>', '1947492629Bag Sample Photo 2.jpg', '2022-03-11 12:49:52', '2022-03-11 12:49:52'),
(3, 'Colette Whitley', 'colette-whitley', '<p>Colette Whitley</p>', '1695911858Bag Sample Photo 2.jpg', '2022-04-05 16:57:42', '2022-04-05 16:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_15_044309_create_products_table', 1),
(6, '2021_12_15_044526_create_product_categories_table', 1),
(7, '2021_12_15_105301_create_brands_table', 1),
(8, '2021_12_15_105932_create_orders_table', 1),
(9, '2021_12_15_110323_create_orderdetails_table', 1),
(10, '2021_12_17_040237_create_product_attribute_links_table', 1),
(11, '2021_12_17_040316_create_product_variances_table', 1),
(12, '2021_12_17_131223_create_pages_table', 1),
(13, '2021_12_24_091954_create_desiners_table', 1),
(14, '2021_12_25_054727_create_product_subcategories_table', 1),
(15, '2021_12_27_110021_create_payments_table', 1),
(16, '2022_04_15_012535_create_vendors_table', 2),
(17, '2022_04_15_012614_create_bulk_orders_table', 2),
(18, '2022_04_15_012657_create_contacts_table', 2),
(19, '2022_04_21_070410_create_wishlists_table', 3),
(20, '2022_05_13_073148_create_schedule_a_purchases_table', 4),
(21, '2022_07_20_073305_create_coupons_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_sku` int(11) DEFAULT NULL,
  `order_product_id` int(11) DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_price` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `order_id` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `product_details` longtext DEFAULT NULL,
  `transaction_details` longtext DEFAULT NULL,
  `pincode` varchar(191) DEFAULT NULL,
  `couponname` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `created_at` varchar(191) DEFAULT NULL,
  `updated_at` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `order_id`, `name`, `phone`, `email`, `address`, `country`, `state`, `product_details`, `transaction_details`, `pincode`, `couponname`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '399.00', 'ORDER_1676002003', 'Mansi', '9999196102', 'mansi.mahajan1705@gmail.com', 'C-98, Ground Floor, Sector 10, NOIDA, Uttar Pradesh-201301', 'India', 'Uttar Pradesh', '[{\"name\":\"UDAYGIRI\",\"sku\":\"#P-AC\\/77\",\"pqty\":\"1\",\"pprice\":\"399\"}]', '112791475248', '201301', '', NULL, '2023-02-10 04:07:42', '2023-02-10 04:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `content` longtext DEFAULT NULL,
  `extra` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `extra`, `created_at`, `updated_at`) VALUES
(1, 'About ePrashast', 'about-prashast', '<p>The products are designed and produced indigenously by workers and artisans belonging to an underprivileged socio-economic background, living in remote rural or urban slum settings. The primary motive of this platform is to act as a bridge between artisans and buyers, and bring better livelihood opportunities to the creators of these products. The primary groups from which the products shall be sourced are female workers and artisans or groups of female workers and artisans.</p>', NULL, '2022-04-05 15:06:36', '2022-06-15 02:36:52'),
(2, 'FAQs', 'faqs', '<p><strong>ACCOUNT</strong></p><p><strong>How does ePrashast work?</strong></p><p>ePrashast is a Business-to-Business marketplace that connects and supports karigars from different parts of India with interested sellers for handicraft products.</p><p>ePrashast is an eMartkeplace for art enthusiasts to buy handicrafts and home décor items from karigars in a user-friendly and reasonably priced manner.</p><p><strong>Do I have to register in order to shop from ePrashast?</strong></p><p>ePrashast allows you to browse through our products without registering, but in order to purchase any product/s you will need to register with us.</p><p><strong>Can I delete my account?</strong></p><p>Yes, you can delete your account anytime. However, if you wish to purchase something from ePrashast again, you will need to register with us.&nbsp;</p><p><strong>Where can I contact if I need any assistance for account registration?</strong></p><p>You can email us at <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a> for any kind of assistance related to account registration.</p><p><strong>PAYMENT</strong></p><p><strong>What are the payment methods available on ePrashast?</strong></p><p>ePrashast offers a wide range of payment terms to ensure that Karigars and Buyers at ePrashast can conclude the transactions in a way that best suits their business needs.</p><p>The available payment terms include Credit Card, Debit Cards, Bank transfer, and payment gateways.</p><p><strong>What payment information do you store?</strong></p><p>You can be assured that we do not store your credit or debit card information or any information related to your online bank account.</p><p><strong>Is COD payment method available?</strong></p><p>Currently<strong> </strong>ePrashast does not offer Cash on Delivery payment method.&nbsp;</p><p><strong>ORDER</strong></p><p><strong>How do I place an order?</strong></p><p>To place an order on ePrashast, you need to follow the following simple steps-</p><p>STEP 1: Select the product/s you wish to purchase</p><p>STEP 2: Add the desired product/s to cart</p><p>STEP 3: Fill in your shipping details</p><p>STEP 4: Pay for your order through your desired payment method</p><p>STEP 5: Get intimated about the confirmation of your purchase and estimated delivery date&nbsp;</p><p>STEP 6: Sit back, relax, and wait for your order to reach you soon!</p><p><strong>Can I contact you and place an order?</strong></p><p>You can visit our Instagram page or website to place an order.</p><p><strong>How do I track my order?</strong></p><p>Tracking details will be sent via email.</p><p><strong>What if my order is incomplete after receiving it?</strong></p><p>You may please contact us <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a> if you receive damage product/s or if some product/s are missing from the order. We will need a video of you opening the order for considering any complaints in this regard.</p><p><strong>DELIVERY</strong></p><p><strong>What is the standard delivery time for delivery of the products?</strong></p><p>The delivery time depends on a lot of factors varying from which state you are ordering from and mode of shipping that is applicable.</p><p>However, the estimated delivery time is nearly 7-10 working days.</p><p><strong>What should I do if my order does not arrive on the delivery date?</strong></p><p>You can track your order using the tracking details shared via email, however if there is a delay you can kindly contact us at <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a> for an update.</p><p><strong>What if I have entered the wrong delivery address?</strong></p><p>You can update your order within 12 hours of order placement.</p><p><strong>MISCELLANEOUS</strong></p><p><strong>How do I file a service complaint?</strong></p><p>To file a service complaint, you can contact us on <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a></p><p><strong>Where do I seek customer support?</strong></p><p>For any kind of assistance, queries, and feedback, you may contact on <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a></p>', NULL, '2022-05-13 10:26:58', '2022-05-13 14:20:05'),
(3, 'Terms and Conditions', 'terms-conditions', '<p>OVERVIEW</p><p>This website is operated by Prashast Innovations Private Limited Throughout the site, the terms “we”, “us” and “our” refer to Prashast Innovations Private Limited. Prashast Innovations Private Limited offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p><p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p><p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p><p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p><p>SECTION 1 - ONLINE STORE TERMS</p><p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p><p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p><p>You must not transmit any worms or viruses or any code of a destructive nature.</p><p>A breach or violation of any of the Terms will result in an immediate termination of your Services.</p><p>SECTION 2 - GENERAL CONDITIONS</p><p>We reserve the right to refuse service to anyone for any reason at any time.</p><p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p><p>You agree not to reproduce, duplicate, copy, sell, resell, or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</p><p>The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p><p>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p><p>We are not responsible if information made available on this site is not accurate, complete, or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete, or more timely sources of information. Any reliance on the material on this site is at your own risk.</p><p>This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p><p>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</p><p>Prices for our products are subject to change without notice.</p><p>We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</p><p>We shall not be liable to you or to any third-party for any modification, price change, suspension, or discontinuance of the Service.</p><p>SECTION 5 - PRODUCTS OR SERVICES (if applicable)</p><p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.</p><p>We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor\'s display of any color will be accurate.</p><p>We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region, or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at any time without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.</p><p>We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p><p>SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</p><p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. If we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p><p>You agree to provide current, complete, and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p><p>For more detail, please review our Returns Policy.</p><p>SECTION 7 - OPTIONAL TOOLS</p><p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.</p><p>You acknowledge and agree that we provide access to such tools “as is” and “as available” without any warranties, representations, or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.</p><p>Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</p><p>We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p><p>SECTION 8 - THIRD-PARTY LINKS</p><p>Certain content, products, and services available via our Service may include materials from third parties.</p><p>Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third parties.</p><p>We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party\'s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p><p>SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p><p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, \'comments\'), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate, and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.</p><p>We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene, or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.</p><p>You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive, or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p><p>SECTION 10 - PERSONAL INFORMATION</p><p>Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.</p><p>SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</p><p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies, or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).</p><p>We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p><p>SECTION 12 - PROHIBITED USES</p><p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p><p>SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p><p>We do not guarantee, represent, or warrant that your use of our service will be uninterrupted, timely, secure, or error-free.</p><p>We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.</p><p>You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.</p><p>You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided \'as is\' and \'as available\' for your use, without any representation, warranties, or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.</p><p>In no case shall Prashast Innovations Private Limited, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p><p>SECTION 14 - INDEMNIFICATION</p><p>You agree to indemnify, defend and hold harmless Prashast Innovations Private Limited and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p><p>SECTION 15 - SEVERABILITY</p><p>If any provision of these Terms of Service is determined to be unlawful, void, or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p><p>SECTION 16 - TERMINATION</p><p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.</p><p>These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.</p><p>If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p><p>SECTION 17 - ENTIRE AGREEMENT</p><p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.</p><p>These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications, and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service). Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p><p>SECTION 18 - GOVERNING LAW</p><p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of Noida, Uttar Pradesh 201301.</p><p>SECTION 19 - CHANGES TO TERMS OF SERVICE</p><p>You can review the most current version of the Terms of Service at any time at this page.</p><p>We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p><p>SECTION 20 - CONTACT INFORMATION</p><p>Questions about the Terms of Service should be sent to us at <a href=\"mailto:hello@eprashast.co.in\">hello@eprashast.co.in</a></p>', NULL, '2022-05-13 13:14:05', '2022-05-13 14:19:30'),
(4, 'Privacy Policy', 'privacy', '<p>ePrashast is committed to protecting all the information you share with us. We follow stringent procedures to help protect the confidentiality, security, and integrity of data stored on our systems. Our website encrypts your credit card number and other personal information using Secure Socket Layer (SSL) technology to provide for the secure transmission of all data. Only those employees who need access to your information in order to perform their duties are allowed such access. Any employee who violates our privacy and/or security policies is subject to disciplinary action, including possible termination and civil and/or criminal prosecution.</p><p>PLEASE READ THIS PRIVACY POLICY CAREFULLY BY ACCESSING OR USING OUR WEBSITE, YOU ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTAND, AND AGREE TO BE BOUND TO ALL THE TERMS OF THIS PRIVACY POLICY AND OUR WEBSITE TERMS OF USE. IF YOU DO NOT AGREE TO THESE TERMS, EXIT THIS PAGE AND DO NOT ACCESS OR USE THE WEBSITE.</p><p>We use encryption technology and secure commerce servers, and authentication to ensure that your personal information is secure online.</p><p>&nbsp;</p><p>YOUR EMAIL ADDRESS AND PERSONAL INFORMATION</p><p>ePrashast keeps track of your information to offer you the best possible shopping experience. Before completing your purchase, we ask you for your name, phone number, email, billing, and shipping addresses. This information, along with your payment method, is necessary to fulfill your order. This information may be disclosed to specific members of our staff and to select third parties (such as our credit card processor and shipping provider) involved in the completion of your transaction and delivery of your order. We may also need your email address or phone numbers to contact you if we have questions about your order. We or our associate companies may also use your email address to notify you about new services or special promotional programs, or send you offers or information if you have opted in. Emails are sent only to ePrashast members who have chosen to receive them (opted-in) or who have made a purchase on our website. At any time, you can notify us that you wish to stop receiving these emails. In addition, we keep a record of your past purchases, returns, and credits. We may also ask you for information regarding your personal preferences and demographics to help us better meet your needs.</p><p>&nbsp;</p><p>DATA TRACKING COOKIES</p><p>To facilitate and customize your experience with the website, we store cookies on your computer. A cookie is a small text file that is stored on a user’s computer for record-keeping purposes which contains information about that User. We use cookies to save your time while using the Website, remind us who you are, and track and target User interests in order to provide a customized experience. Cookies also allow us to collect Non-Personally Identifiable Information from you, like which pages you visited and what links you clicked on. Use of this information helps us to create a more user-friendly experience for all visitors. In addition, we may use Third Party Advertising Companies to display advertisements on our website. As part of their service, they may place separate cookies on your computer. We have no access to or control over these cookies. This Privacy Policy covers the use of cookies by our website only and does not cover the use of cookies by any Advertiser. Most browsers automatically accept cookies, but you may be able to modify your browser settings to decline cookies. Please note that if you decline or delete these cookies, some parts of the Website may not work properly.</p><p>&nbsp;</p><p>SERVER LOGS</p><p>To make our website as effective and enjoyable as possible, the computers that operate it collect certain information each time you visit. We store these statistics in server logs. Once again, these statistics do not identify you personally, but provide us information regarding the type of user who is accessing our website and certain browsing activities of that user. This data may include: the IP address of the user accessing our website (i.e., the unique I.D. number of the user\'s computer), the type of browser (Internet Explorer, Firefox, etc.) and the operating system (Windows, Mac OS, etc.), the Website the user last visited before linking to our website, how long the user accessed our website in any given session, and the date and time of access. We may make extensive use of this data at an aggregated level in order to understand how our website is being used. We may share some of the aggregate findings (not the specific data) with advertisers, sponsors, investors, strategic partners, and others in order to help grow our business.</p><p>&nbsp;</p><p>PRIVACY POLICIES OF THIRD-PARTY WEBSITES</p><p>This Privacy Policy only addresses the use and disclosure of information we collect from you. Other websites that may be accessible through this Website have their own privacy policies and data collection, use and disclosure practices. If you link to any such website, we urge you to review the respective website’s privacy policy. We are not responsible for the policies or practices of third parties.</p><p>&nbsp;</p><p>CHANGES IN POLICY</p><p>We may change this Privacy Policy at any time by posting the revised Privacy Policy in the “Privacy Policy” section of the Website. The revised Privacy Policy is effective immediately when posted on the Website. It is the responsibility of each User to review the Website and the Privacy Policy periodically to learn of any revisions to this Privacy Policy. Your continued use of the Website after the effectiveness of such revisions will constitute your acknowledgment and acceptance of the terms of the revised Privacy Policy. We stand behind the promises we make, however, and will never materially change our policies and practices to make them less protective of customer information collected in the past without the consent of affected customers.</p>', NULL, '2022-05-13 13:14:32', '2022-05-13 14:18:51'),
(5, 'Return and Cancellation Policy', 'refund-returns', '<p><strong>Can I cancel my order?</strong></p><p>Yes, you can cancel your order within 12 hours of order placement.</p><p><strong>Can I update my order after placing it?</strong></p><p>Yes, you can update your order within 12 hours of order placement.</p><p><strong>Can I return a product after receiving it?</strong></p><p>No, returning of products is not offered at our website - since all our products are especially handcrafted by ‘karigars’ from different parts of the country and we uphold the value of their hard work.</p><p>However, all our products do get screened at various levels for quality-check, ensuring our customers get the best of products each time!</p><p><strong>Can I exchange a product after receiving it?</strong></p><p>Yes, you can exchange a product for another product of same or higher price. This can be done within 3 days after the delivery has been completed. Extra shipping costs may apply.</p><p><strong>What is the exchange policy for items bought in sale?</strong></p><p>Items that are bought in sale may not be treated as regular products under the exchange policy. The return policy on sale products may vary from case to case. To know more you can write to <a href=\"mailto:customercare@eprashast.co.in\">customercare@eprashast.co.in</a> along with your product SKU and Order ID.</p>', NULL, '2022-05-13 13:14:47', '2022-05-13 14:18:05'),
(6, 'Shipping Policy', 'shipping-policy', '<p><strong>Shipping Policy</strong>&nbsp;</p><p>&nbsp;</p><p><strong>What is the time frame to process an order?</strong></p><p>The shipping of your order will be done within 3 working days from the date of processing to your registered shipping address. The delivery of the order will be done within 7-10 days, depending upon the location.&nbsp; We will make effort to delivery your order to you as soon as possible!&nbsp;</p><p><strong>What if I put incorrect address?</strong></p><p>We would recommend you to carefully check your current shipping address before confirming your order. Our team will not take responsibility if the delivery address provided is incorrect. &nbsp;If the&nbsp;package is returned to us because the address is incorrect/outdated, the order status will be considered closed from our end. &nbsp;</p><p><br><strong>What is the correct address format that I should use?</strong>&nbsp;</p><p>The correct address format is as follows:&nbsp;</p><p>House/apartment number&nbsp;</p><p>Society/Apartment/Street/Block Name/Number&nbsp;</p><p>City Name&nbsp;</p><p>State &nbsp;</p><p>Pin Code&nbsp;</p><p>If the delivery agent is not able to reach your address due to incorrect/incomplete/wrong address&nbsp;the order shall not be processed and we will consider the order status as closed.&nbsp;</p><p><br><strong>What if the gift I sent to someone refused to accept the order?</strong></p><p>&nbsp;If the order package is a gift that you are sending to someone and they refuse to accept it, the package will be returned to us as deliverable, and the order will be considered closed. If you are planning on gifting, please inform the recipient that they should expect a package. This will ensure that they receive your gift.</p>', NULL, '2022-06-07 02:17:52', '2022-06-07 02:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('prateekk898@gmail.com', '$2y$10$s4haEKtFVqwaULs/Vd62l.wuXA8wx9XJH8WSlYNLUGTg7klfNumtW', '2022-07-02 01:03:54'),
('prateek@gmail.com', '$2y$10$cUUI./CQFpYBe6QiU5SxuuDeLchMQPD0aj8.YP6fguJN0yPRT398G', '2022-07-02 02:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_payment_id` varchar(191) NOT NULL,
  `product_id` varchar(191) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `sku` varchar(191) DEFAULT NULL,
  `product_type` varchar(191) DEFAULT NULL,
  `regular_price` varchar(191) DEFAULT NULL,
  `sale_price` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `height` varchar(191) DEFAULT NULL,
  `width` varchar(191) DEFAULT NULL,
  `length` varchar(191) DEFAULT NULL,
  `desiner_id` varchar(191) DEFAULT NULL,
  `show_in_featuredproduct` int(11) DEFAULT 0,
  `product_categories` varchar(191) DEFAULT NULL,
  `product_subcategories` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `publish_datetime` datetime DEFAULT NULL,
  `featured_image` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `cannonical_link` varchar(191) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => InActive, 1 => Published, 2 => Draft, 3 => Scheduled',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `product_type`, `regular_price`, `sale_price`, `weight`, `height`, `width`, `length`, `desiner_id`, `show_in_featuredproduct`, `product_categories`, `product_subcategories`, `quantity`, `publish_datetime`, `featured_image`, `description`, `meta_title`, `cannonical_link`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Utility Pouch in Green and Red', '#P-AC/01', 'simple_product', '1000', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"15\"]', NULL, NULL, '[\"1581551454Utility Pouch in Green _ Red 1.jpg\",\"160768415Utility Pouch in Green _ Red 2.jpg\",\"370636314Utility Pouch in Green _ Red 3.jpg\",\"2105963773Utility Pouch in Green _ Red 4.jpg\",\"1425897551Utility Pouch in Green _ Red 5.jpg\"]', '<p>This simple yet beautiful utility pouch made by our women from a remote village in Dadri, Uttar Pradesh is perfect for your simple storage needs! Carry your stationery, your cosmetics, or just anything everyday in this hand-block printed utility pouch!</p>', 'Storage', NULL, NULL, 'utility-pouch-in-green-and-red', NULL, NULL, 0, 1, NULL, '2022-03-10 16:03:47', '2023-02-05 21:57:07'),
(3, 'Utility Pouch in Beige and Pink', '#P-AC/03', 'simple_product', '1000', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"3\"]', NULL, NULL, '[\"992234297Utility Pouch in Beige and Pink 1.jpg\",\"1364067627Utility Pouch in Beige and Pink 2.jpg\",\"1682920694Utility Pouch in Beige and Pink 3.jpg\",\"130027576Utility Pouch in Beige _ Pink 4.jpg\",\"795781765Utility Pouch in Beige _ Pink 5.jpg\"]', '<p>This simple yet beautiful utility pouch made by our women from a remote village in Dadri, Uttar Pradesh is perfect for your simple storage needs! Carry your stationery, your cosmetics, or just anything everyday in this hand-block printed utility pouch!</p>', 'Storage', NULL, NULL, 'utility-pouch-in-beige-and-pink', 'Utility Pouch in Beige and Pink', 'Utility Pouch in Beige and Pink', 0, 1, NULL, '2022-03-10 16:09:41', '2022-05-17 23:42:27'),
(4, 'Plain Bamboo Table Mats Set of 6', '#P-HL/06', 'simple_product', '999', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Bamboo', NULL, '0', 1, '[\"3\"]', '[\"20\",\"21\"]', -1, NULL, '[\"1464823564Bamboo Table Mats 1.jpg\",\"1481001666Bamboo Table Mats 2.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this set of 6 handmade bamboo table mats is perfect for your dining table! It brings a whole earthy vibe while allowing you to be a mindful purchaser! The eco-friendly raw materials used to create this beautiful peace keeps you happy and our planet healthy!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions -</strong></td><td>&nbsp; 12x18 inches</td></tr></tbody></table></figure>', 'Handmade', NULL, NULL, 'plain-bamboo-table-mats-set-of-6', 'Bamboo Table Mats Set of 6', 'Bamboo Table Mats Set of 6', 0, 1, NULL, '2022-03-10 17:07:55', '2023-01-31 22:27:03'),
(5, 'Bamboo Table Mats in Pink and Yellow Set of 6', '#P-HL/07', 'simple_product', '1559', NULL, NULL, '12x18 inches', 'Bamboo', NULL, '0', 0, '[\"3\"]', '[\"20\",\"21\"]', NULL, NULL, '[\"46872385Bamboo Table Mats Coloured 1.jpg\",\"543883941Bamboo Table Mats Coloured 2.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this handmade set of 3 round utility boxes. Use these eco-friendly boxes in your kitchen or on your dining table, or use these to store your precious knick-knacks! Either way, these boxes will lift up your home\'s decor!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions </strong>-&nbsp;</td><td>12x18 inches</td></tr></tbody></table></figure>', 'Handmade', NULL, NULL, 'bamboo-table-mats-in-pink-and-yellow-set-of-6', NULL, NULL, 0, 1, NULL, '2022-03-10 17:10:07', '2022-06-07 20:00:53'),
(8, 'Plain Bamboo Utility Boxes Round Set of 3', '#P-HL/08', 'simple_product', '999', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.\r\nDo not put it directly on fire or heat.', 'Bamboo', NULL, '0', 0, '[\"3\"]', '[\"19\",\"21\"]', -1, NULL, '[\"1321472992Round Utility Boxed Original-Bamboo 1.jpg\",\"1843893555Round Utility Boxed Original-Bamboo 2.jpg\",\"1688064410Round Utility Boxed Original-Bamboo 3.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this handmade set of 3 round utility boxes. Use these eco-friendly boxes in your kitchen or on your dining table, or use these to store your precious knick-knacks! Either way, these boxes will lift up your home\'s decor!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> -&nbsp;</td><td>8x5 inches; 6x4 inches; 3x3 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'plain-bamboo-utility-boxes-round-set-of-3', NULL, NULL, 0, 1, NULL, '2022-03-16 16:59:08', '2023-02-05 22:08:17'),
(9, 'Bamboo utility Boxes Round in Pink and Yellow Set of 3', '#P-HL/09', 'simple_product', '1299', NULL, NULL, 'Bamboo utility Boxes Round in Pink and Yellow Set of 3', 'Bamboo', NULL, '0', 1, '[\"3\"]', '[\"19\",\"21\"]', -1, NULL, '[\"1449000356Round Utility Boxed Coloured 1.jpg\",\"1248153944Round Utility Boxed Coloured 2.jpg\",\"1359064084Round Utility Boxed Coloured 3.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this handmade set of 2 oval utility boxes. Use these eco-friendly boxes in your kitchen or on your dining table, or use these to store your precious knick-knacks! Either way, these boxes will lift up your home\'s decor!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> - &nbsp;8x5 inches; 6x4 inches; 3x3 inches</td><td>&nbsp;</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'bamboo-utility-boxes-round-in-pink-and-yellow-set-of-3', NULL, NULL, 0, 1, NULL, '2022-03-16 18:27:57', '2023-01-31 22:14:37'),
(10, 'Bamboo Utility Boxes Oval Set of 2', '#P-HL/10', 'simple_product', '799', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.\r\nDo not put it directly on fire or heat.', 'Bamboo', NULL, '0', 1, '[\"3\"]', '[\"19\",\"21\"]', -1, NULL, '[\"997708705Oval Utility Boxes Original Bamboo 1.jpg\",\"1708372728Oval Utility Boxes Original Bamboo 2.jpg\",\"1222399659Oval Utility Boxes Original Bamboo 3.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this handmade set of 2 oval utility boxes. Use these eco-friendly boxes in your kitchen or on your dining table, or use these to store your precious knick-knacks! Either way, these boxes will lift up your home\'s decor!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> -&nbsp;</td><td>8x5 inches; 6x4 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'bamboo-utility-boxes-oval-set-of-2', NULL, NULL, 0, 1, NULL, '2022-03-16 19:21:54', '2023-02-05 22:03:52'),
(11, 'Bamboo Utility Boxes Oval in Pink and Yellow Set of 2', '#P-HL/11', 'simple_product', '999', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.\r\nDo not put it directly on fire or heat.', 'Bamboo', NULL, '0', 0, '[\"3\"]', '[\"19\",\"21\"]', -1, NULL, '[\"894019479Oval Utility Boxes Coloured 1.jpg\",\"19242499Oval Utility Boxes Coloured 2.jpg\",\"2009636541Oval Utility Boxes Coloured 3.jpg\"]', '<p>Bamboo artisans from Ranchi, Jharkhand bring to you this handmade set of 2 oval utility boxes. Use these eco-friendly boxes in your kitchen or on your dining table, or use these to store your precious knick-knacks! Either way, these boxes will lift up your home\'s decor!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> - &nbsp;</td><td>8x5 inches; 6x4 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'bamboo-utility-boxes-oval-in-pink-and-yellow-set-of-2', NULL, NULL, 0, 1, NULL, '2022-03-16 19:26:36', '2023-02-05 22:06:12'),
(12, 'Bamboo Coaster in Pink and Yellow Set of 6', '#P-HL/17', 'simple_product', '599', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Bamboo', NULL, '0', 0, '[\"3\"]', '[\"20\",\"21\"]', -1, NULL, '[\"2019839168Bamboo Coasters Set Coloured 1.jpg\",\"1842449216Bamboo Coasters Set Coloured 2.jpg\",\"176588087Bamboo Coasters Set Coloured 3.jpg\"]', '<p>Take another step to mindful shopping. This set of handcrafted bamboo coasters will bring you closer to being an environment champion and uplift the look of your tables!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimesions</strong> -&nbsp;</td><td>4x4 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'bamboo-coaster-in-pink-and-yellow-set-of-6', NULL, NULL, 0, 1, NULL, '2022-03-16 19:34:36', '2023-02-05 21:38:44'),
(14, 'Bamboo Pineapple Lamp', '#P-HL/19', 'simple_product', '1', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Bamboo', NULL, '0', 0, '[\"3\",\"4\"]', '[\"21\"]', 0, NULL, '[\"2029239714Pineapple Lamp Original 1.jpg\",\"123140685Pineapple Lamp Original 2.jpg\",\"2024571438Pineapple Lamp Original 3.jpg\",\"368820136Pineapple Lamp Original 4.jpg\"]', '<p>This handcrafted bamboo pineapple lamp is a masterpiece you definitely need for your homes! The bamboo brings the subtle bliss of beauty in the day and the woven architecture of its body lights up your room like stars at night!</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> -&nbsp;</td><td>11x5 inches</td></tr></tbody></table></figure>', NULL, NULL, '3869878424Pineapple Lamp Original 1.jpg', 'bamboo-pineapple-lamp', NULL, NULL, 1, 1, NULL, '2022-03-16 19:47:09', '2023-12-07 03:30:15'),
(15, 'Clay Kulhad Set of 6', '#P-HL/20', 'simple_product', '1199', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"19\"]', NULL, NULL, '[\"1552631236Kulhad Set of 6 - 1.jpg\",\"100564507Kulhad Set of 6 - 2.jpg\",\"150448046Kulhad Set of 6 - 3.jpg\",\"1527688926Kulhad Set of 6 - 4.jpg\"]', '<p>Handcrafted by artisans from Ranchi, this clay kulhad set will bring back the simple joy of being closer to earth in your home. Serve your water, lassi, drinks, or sweet somethings in this kulhad and allow yourself to get loast in the nostalgia of a simpler time.</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> -&nbsp;</td><td>4 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'clay-kulhad-set-of-6', NULL, NULL, 0, 1, NULL, '2022-03-16 19:57:02', '2022-06-06 21:55:06'),
(16, 'Clay Jug', '#P-HL/21', 'simple_product', '1199', NULL, NULL, NULL, NULL, NULL, '0', 1, '[\"3\"]', '[\"19\"]', NULL, NULL, '[\"285987598Handcrafted Clay Jug 1.jpg\",\"659857256Handcrafted Clay Jug 2.jpg\",\"110753014Handcrafted Clay Jug 3.jpg\"]', '<p>This clay jug defines \'simple beauty\'. This jug will bring back the beauty of simpler times to your home just by sitting on your dining table. The benefit of comin.</p><figure class=\"table\"><table><tbody><tr><td><strong>Capacity</strong> -&nbsp;</td><td>1 Litre</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'clay-jug', NULL, NULL, 0, 1, NULL, '2022-03-16 20:38:18', '2022-06-06 21:55:21'),
(17, 'Clay Bottle', '#P-HL/22', 'simple_product', '1199', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"15\",\"18\"]', NULL, NULL, '[\"1804921491Clay Bottle 1.jpg\",\"1551381322Clay Bottle 2.jpg\",\"1581742797Clay Bottle 3.jpg\"]', '<p>Come back closer to the source of it all - the earth by bringing this earth-made clay botthle to your home. Enjoy the bliss of earthly-water everyday.</p><figure class=\"table\"><table><tbody><tr><td><strong>Capacity</strong> -&nbsp;</td><td>1 Litre</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'clay-bottle', NULL, NULL, 0, 1, NULL, '2022-03-16 20:43:58', '2022-06-06 21:55:37'),
(18, 'Clay Tortoise Trinket Bowl', '#P-HL/23', 'simple_product', '599', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Handmade', NULL, '0', 0, '[\"3\",\"4\"]', '[\"22\"]', NULL, NULL, '[\"425691673Handmade Tortoise Trinket Tray 1 - 1.jpg\",\"197620224Handmade Tortoise Trinket Tray 1 - 2.jpg\",\"1969569693Handmade Tortoise Trinket Tray 1 - 3.jpg\"]', '<p>This handcrafted trinket tray is the cutest piece that our karigars from Ranchi, Jharkhand have designed. Bring this tiny piece of pure beauty to your home, and store your precious knick-knacks in it.</p><figure class=\"table\"><table><tbody><tr><td><strong>Dimensions</strong> -&nbsp;</td><td>Tray (Circle): 9 cm; Full Piece: 12 cm</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'clay-tortoise-trinket-bowl', NULL, NULL, 1, 1, NULL, '2022-03-16 20:54:37', '2023-12-07 03:13:08'),
(19, 'Handmade Teapot', '#P-HL/26', 'simple_product', '719', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"18\"]', NULL, NULL, '[\"1951733750Handmade Teapot 1.jpg\",\"225230178Handmade Teapot 2.jpg\",\"680106842Handmade Teapot 3.jpg\"]', '<p>Use this handcrafted earth-made clay teapot for your next high-tea or as a simple show-piece to decorate your home! It serves both purposes!</p><figure class=\"table\"><table><tbody><tr><td><strong>Height</strong> -&nbsp;</td><td>5.5 inches height</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'handmade-teapot', NULL, NULL, 0, 1, NULL, '2022-03-16 21:02:23', '2022-06-06 22:03:49'),
(20, 'Handmade Flowerpot', '#P-HL/27', 'simple_product', '839', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"18\"]', NULL, NULL, '[\"1030726617Handmade Flowerpot 1.jpg\",\"1400145266Handmade Flowerpot 2.jpg\",\"1975631178Handmade Flowerpot 3.jpg\"]', '<p>Who doesn\'t love some fresh flowers in their homes every morning? What could be better to store flowers than a beautiful pot made from their source - the earth!</p>', NULL, NULL, NULL, 'handmade-flowerpot', NULL, NULL, 0, 1, NULL, '2022-03-16 21:05:52', '2022-06-06 22:04:04'),
(21, 'Handmade Utility Wall Mounted Holder', '#P-HL/28', 'simple_product', '839', NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"3\"]', '[\"18\"]', NULL, NULL, '[\"1335224299Handmade Wall Mount Utility Holder 1.jpg\",\"493356542Handmade Wall Mount Utility Holder 2.jpg\",\"2109437971Handmade Wall Mount Utility Holder 3.jpg\",\"1210694018Handmade Wall Mount Utility Holder 4.jpg\",\"634728531Handmade Wall Mount Utility Holder 5.jpg\"]', '<p>Store your keys or just add another decor piece with this earth-made handcrafted utility holder from our karigars in Ranchi, Jharkhand.</p>', NULL, NULL, NULL, 'handmade-utility-wall-mounted-holder', NULL, NULL, 0, 1, NULL, '2022-03-16 21:14:35', '2022-06-06 22:04:35'),
(22, 'Handmade Utility Holder for Desk', '#P-HL/29', 'simple_product', '499', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Handmade', NULL, '0', 0, '[\"3\"]', '[\"18\",\"22\"]', 10, NULL, '[\"435834975Utility Holder_ Desk Organiser 1.jpg\",\"245842240Utility Holder_ Desk Organiser 2.jpg\",\"338563838Utility Holder_ Desk Organiser 3.jpg\"]', '<p>This beautiful earth-made handcrafted utility holder/desk organizer will bring an earthly look to your desk. Simply store your stationery or decorate your desk with this piece.</p><figure class=\"table\"><table><tbody><tr><td>Dimensions :-</td><td>5 inches</td></tr></tbody></table></figure>', NULL, NULL, NULL, 'handmade-utility-holder-for-desk', NULL, NULL, 0, 1, NULL, '2022-03-16 21:19:05', '2023-02-05 21:41:48'),
(23, 'Clay Tortoise Trinket Tray', '#P-HL/30', 'simple_product', '499', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Handmade', NULL, '0', 0, '[\"2\",\"4\"]', '[\"22\"]', NULL, NULL, '[\"1128185263Handmade Tortoise Trinket Tray 2 - 1.jpg\",\"724886678Handmade Tortoise Trinket Tray 2 - 2.jpg\",\"1804182669Handmade Tortoise Trinket Tray 2 - 3.jpg\",\"934738324Handmade Tortoise Trinket Tray 2 - 4.jpg\",\"643432023Handmade Tortoise Trinket Tray 2 - 5.jpg\",\"1947703121Handmade Tortoise Trinket Tray 2 - 6.jpg\"]', '<figure class=\"table\"><table><tbody><tr><td><p>This handcrafted trinket tray is the cutest piece that our karigars from Ranchi, Jharkhand have designed. Bring this tiny piece of pure beauty to your home, and store your precious knick-knacks in it.</p><figure class=\"table\"><table><tbody><tr><td>Dimensions :-</td><td>4 inches</td></tr></tbody></table></figure></td></tr></tbody></table></figure>', NULL, NULL, NULL, 'clay-tortoise-trinket-tray', NULL, NULL, 1, 1, NULL, '2022-03-16 21:21:40', '2023-12-07 03:13:56'),
(24, 'Utility Pouch in Blue', 'utility00011', 'simple_product', '1000', '1000', NULL, NULL, NULL, NULL, '1', 1, '[\"3\"]', '[\"3\"]', NULL, NULL, '[\"633639011Utility Pouch in Blue 1.jpg\",\"1970260215Utility Pouch in Blue 2.jpg\",\"1974772181Utility Pouch in Blue 3.jpg\",\"1043202769Utility Pouch in Blue 4.jpg\",\"214682239Utility Pouch in Blue 5.jpg\"]', '<p>Utility Pouch in Blue Utility Pouch in Blue</p>', 'meta', NULL, NULL, 'utility-pouch-in-blue', 'sdfsdf', 'saree', 0, 1, NULL, '2022-04-05 11:49:57', '2022-05-17 23:56:37'),
(26, 'Bamboo Globe Lamp', '#P-HL/18', 'simple_product', '1999', NULL, NULL, 'Handle with care.\r\nKeep away from water.\r\nDo not put too much pressure.', 'Bamboo', NULL, '0', 1, '[\"3\",\"4\"]', '[\"21\"]', -1, NULL, '[\"174334700Big Globe Lamp 1.jpg\",\"1528515759Big Globe Lamp 2.jpg\",\"382442768Big Globe Lamp 3.jpg\"]', '<p>This handcrafted bamboo globe lamp is a masterpiece you definitely need for your homes! The original-bamboo colour brings the subtle bliss of beauty in the day and the woven architecture of its body lights up your room like stars at night!</p>', 'meta', NULL, NULL, 'bamboo-globe-lamp', 'Pineapple Lamp Pineapple Lamp', 'saree', 1, 1, NULL, '2022-04-05 11:53:44', '2023-12-07 03:12:15'),
(58, 'Taarak Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"715119614Untitled design.png\"]', NULL, NULL, NULL, NULL, 'taarak-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-08 04:32:22', '2023-02-05 21:54:55'),
(59, 'Chameli Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"739286047Chameli .png\"]', NULL, NULL, NULL, NULL, 'chameli-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 00:29:25', '2023-02-05 21:54:43'),
(60, 'Nargis Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"996686094Nargis.png\"]', NULL, NULL, NULL, NULL, 'nargis-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 00:43:04', '2023-02-05 21:54:31'),
(61, 'Surajmukhi Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"1402639077Surajmukhi.png\"]', NULL, NULL, NULL, NULL, 'surajmukhi-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 00:53:05', '2023-02-05 21:54:02'),
(62, 'Harshringar Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"1666582707HARSHRINGAR.png\"]', NULL, NULL, NULL, NULL, 'harshringar-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 03:34:32', '2023-02-05 21:52:37'),
(63, 'Mogra Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"853817822Mogra.png\"]', NULL, NULL, NULL, NULL, 'mogra-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 03:48:16', '2023-02-05 21:52:24'),
(64, 'Gulbahar Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"1407522533Gulbahar.png\"]', NULL, NULL, NULL, NULL, 'gulbahar-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 03:53:58', '2023-02-05 21:52:10'),
(65, 'Raat Rani Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"80328203Raat Rani.png\"]', NULL, NULL, NULL, NULL, 'raat-rani-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 04:19:55', '2023-02-05 21:51:53'),
(66, 'Laabh Swastik Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"483069599Laabh Swastik.png\"]', NULL, NULL, NULL, NULL, 'laabh-swastik-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 04:25:24', '2023-02-05 21:51:39'),
(67, 'Nazar Battu Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"287304687Nazar Battu.png\"]', NULL, NULL, NULL, NULL, 'nazar-battu-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 04:38:32', '2023-02-05 21:51:22'),
(68, 'Indra Dhanush Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"268000989Indra Dhanush.png\"]', NULL, NULL, NULL, NULL, 'indra-dhanush-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 04:45:23', '2023-02-05 21:51:02'),
(69, 'Gulmohar Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"1431534311Gulmohar.png\"]', NULL, NULL, NULL, NULL, 'gulmohar-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 05:05:13', '2023-02-05 21:50:33'),
(70, 'Saanjh Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"866585928Saanjh.png\"]', NULL, NULL, NULL, NULL, 'saanjh-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 05:17:55', '2023-02-05 21:50:18'),
(71, 'Shubh Swastik Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"1672913203Shubh Swastik.png\"]', NULL, NULL, NULL, NULL, 'shubh-swastik-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 05:23:47', '2023-02-05 21:50:06'),
(72, 'Genda Eco-friendly Rakhi', NULL, 'variable_product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"4\"]', '[\"25\"]', NULL, NULL, '[\"138592846Genda.png\"]', NULL, NULL, NULL, NULL, 'genda-eco-friendly-rakhi', NULL, NULL, 0, 1, NULL, '2022-07-09 05:31:06', '2023-02-05 21:49:53'),
(78, 'Alappuzha', '#P-AC/66', 'simple_product', '499', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 10, NULL, '[\"104242319465.png\"]', '<p>This piece of beautiful jewellery is inspired by the mesmerizing city of Alappuzha in Kerala. Just as the city, this necklace depicts the bright blue colour of endless waters.</p>', NULL, NULL, NULL, 'alappuzha', NULL, NULL, 1, 1, NULL, '2023-02-05 21:49:14', '2023-12-07 02:45:19'),
(79, 'Tawang', '#P-AC/75', 'simple_product', '299', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 0, NULL, '[\"180549727674.png\"]', '<p>The city of Tawang in Arunachan Pradesh is decorated in beautiful flags of yellow, green, red, and blue! This dainty piece in yellow and deep green is inspired by some of these bright colours from this city!</p>', NULL, NULL, NULL, 'tawang', NULL, NULL, 1, 1, NULL, '2023-02-05 21:58:34', '2023-12-07 02:45:34'),
(80, 'Pichola', '#P-AC/63', 'simple_product', '499', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 10, NULL, '[\"20023639662.png\"]', '<p>This necklace is inspired by the bright golden colour that the lake of Pichola shines with in the dark of the night! Inspired by this beauty, this necklace is handcrafted the depict brightness in darkness.</p>', NULL, NULL, NULL, 'pichola', NULL, NULL, 1, 1, NULL, '2023-02-05 22:00:15', '2023-12-07 02:45:55'),
(81, 'Gulmarg', '#P-AC/57', 'simple_product', '599', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 10, NULL, '[\"18908626718.png\",\"1937706469.png\",\"43351594956.png\"]', '<p>This necklace takes inspiration from the great blend of colours that the flowers that bloom in Gulmarg (Kashmir) during the summers bring to the city.</p>', NULL, NULL, NULL, 'gulmarg', NULL, NULL, 1, 1, NULL, '2023-02-05 22:01:47', '2023-12-07 02:46:17'),
(82, 'Deodar', '#P-AC/60', 'simple_product', '499', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', -1, NULL, '[\"131204656659.png\"]', '<p>This raani-haar (necklace) is inspired by the deep red that the forests of city Deodar turn into during the autumn season. This necklace is designed to emit energy yet have a soothing effect!</p>', NULL, NULL, NULL, 'deodar', NULL, NULL, 1, 1, NULL, '2023-02-05 22:04:08', '2023-12-07 02:46:35'),
(83, 'Udaygiri', '#P-AC/77', 'simple_product', '399', NULL, NULL, NULL, NULL, NULL, NULL, 0, '[\"2\"]', '[\"25\"]', -1, NULL, '[\"175711816228.png\",\"146132158529.png\",\"178606732776.png\"]', '<p>This handcrafted piece of beautiful bead jewellery is designed with an inspiration drawn from the grey-golden shades of the majestic caves of Udaygiri.</p>', NULL, NULL, NULL, 'udaygiri', NULL, NULL, 0, 1, NULL, '2023-02-05 22:39:15', '2023-02-09 20:07:42'),
(84, 'Golkonda', '#P-AC/59', 'simple_product', '499', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 10, NULL, '[\"125258287410.png\",\"203381189811.png\",\"144543034158.png\"]', '<p>The grey walls of the majestic fortified citadel of Golkonda Fort is reflected in grey and silver beads of the necklace. The necklace depicts pride of the sultanate, and their striking citadels.</p>', NULL, NULL, NULL, 'golkonda', NULL, NULL, 1, 1, NULL, '2023-02-05 22:42:25', '2023-12-07 02:46:49'),
(85, 'Awadh', '#P-AC/67', 'simple_product', '499', NULL, NULL, 'Clean with dry cloth.\r\nStay away from perfumes, water or moisture in general.', NULL, NULL, '0', 0, '[\"2\",\"4\"]', '[\"25\"]', 10, NULL, '[\"39389382426.png\",\"159330251727.png\",\"157921060266.png\"]', '<p>This beautiful pearl handcrafted necklace is a reminder of the royal courts of Awadh. Each pearl emits the shine of \"Awadhi shaan\" which will definitely help brighten you attire of the day.</p>', NULL, NULL, NULL, 'awadh', NULL, NULL, 1, 1, NULL, '2023-02-05 22:44:19', '2023-12-07 02:47:04'),
(87, 'Wayne Valentine', 'Velit quia commodo p', 'simple_product', '325', '524', NULL, 'Est et aute in do ut', 'Quia rerum velit ten', NULL, '3', 0, '[\"4\"]', '[\"21\"]', NULL, NULL, '[\"10072434024Pineapple Lamp Original 1.jpg\"]', NULL, 'Sit rerum non quia p', NULL, '6021348474Pineapple Lamp Original 1.jpg', 'wayne-valentine', 'Eos amet numquam re', 'Impedit sapiente sa', 1, 1, NULL, '2023-12-07 03:35:08', '2023-12-07 03:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_links`
--

CREATE TABLE `product_attribute_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_links`
--

INSERT INTO `product_attribute_links` (`id`, `name`, `description`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Attributes', 'With Box|Without Box', '58', NULL, '2022-07-08 04:33:00', '2022-07-08 04:33:00'),
(2, 'Variants', 'With Box |Without Box', '59', NULL, '2022-07-09 00:30:30', '2022-07-09 00:30:30'),
(3, 'Variants', 'With Box|Without Box', '60', NULL, '2022-07-09 00:43:27', '2022-07-09 00:43:27'),
(4, 'Variants', 'With Box|Without Box', '61', NULL, '2022-07-09 00:53:32', '2022-07-09 00:53:32'),
(5, 'Variants', 'With Box|Without Box', '62', NULL, '2022-07-09 03:36:48', '2022-07-09 03:36:48'),
(6, 'Variants', 'With Box|Without Box', '63', NULL, '2022-07-09 03:48:37', '2022-07-09 03:48:37'),
(7, 'Variants', 'With Box|Without Box', '64', NULL, '2022-07-09 03:54:33', '2022-07-09 03:54:33'),
(8, 'Variants', 'With Box|Without Box', '65', NULL, '2022-07-09 04:20:17', '2022-07-09 04:20:17'),
(9, 'Variants', 'With Box|Without Box', '66', NULL, '2022-07-09 04:25:44', '2022-07-09 04:25:44'),
(10, 'Variants', 'With Box|Without Box', '67', NULL, '2022-07-09 04:38:51', '2022-07-09 04:38:51'),
(11, 'Variants', 'With Box|Without Box', '68', NULL, '2022-07-09 04:56:26', '2022-07-09 04:56:26'),
(12, 'Variants', 'With Box|Without Box', '69', NULL, '2022-07-09 05:05:28', '2022-07-09 05:05:28'),
(13, 'Variants', 'With Box|Without Box', '70', NULL, '2022-07-09 05:18:12', '2022-07-09 05:18:12'),
(14, 'Variants', 'With Box|Without Box', '71', NULL, '2022-07-09 05:24:05', '2022-07-09 05:24:05'),
(15, 'Variants', 'With Box|Without Box', '72', NULL, '2022-07-09 05:31:26', '2022-07-09 05:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(191) NOT NULL,
  `description` longtext DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `status`, `slug`, `description`, `featured_image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Accessories', 1, 'accessories', '<p>Accessories</p>', '1110417035Utility Pouch in Green _ Red 5.jpg', 1, 1, '2022-03-10 15:47:44', '2022-05-17 23:28:58'),
(3, 'Home & Lifestyle', 1, 'home-lifestyle', '<p>Home &amp; Lifestyle</p>', '104568537Utility Holder_ Desk Organiser 1.jpg', 1, 1, '2022-03-10 15:48:39', '2022-05-17 23:32:10'),
(4, 'Collections', 1, 'collections', '<p>Collections</p>', '1014763149Pineapple Lamp Coloured 1.jpg', 1, 1, '2022-04-05 11:36:12', '2022-05-17 23:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategories`
--

CREATE TABLE `product_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_subcategories`
--

INSERT INTO `product_subcategories` (`id`, `name`, `status`, `parent_id`, `slug`, `description`, `featured_image`, `background_image`, `icon_image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(15, 'Utility Pouches', 1, '2', 'utility-pouches', NULL, '595793732Utility Pouch in Beige and Pink 3.jpg', NULL, NULL, 1, NULL, '2022-05-17 23:35:37', '2022-05-17 23:35:37'),
(18, 'Home Décor', 1, '3', 'home-decor', NULL, '310625227bambooglobe.jpg', NULL, NULL, 1, 1, '2022-05-17 23:38:52', '2022-06-15 03:02:12'),
(19, 'Storage', 1, '3', 'storage', NULL, '1830248649Clay Bottle 1.jpg', NULL, NULL, 1, NULL, '2022-05-17 23:39:21', '2022-05-17 23:39:21'),
(20, 'Kitchen & Dining', 1, '3', 'kitchen-dining', NULL, '173909254Bamboo Coasters Set Coloured 1.jpg', NULL, NULL, 1, NULL, '2022-05-17 23:39:49', '2022-05-17 23:39:49'),
(21, 'Baans', 1, '4', 'baans', NULL, '194337726baans.png', NULL, NULL, 1, 1, '2022-05-17 23:41:09', '2023-12-07 00:53:37'),
(22, 'Maati', 1, '4', 'maati', NULL, '1943433537maati.png', NULL, NULL, 1, 1, '2022-05-17 23:41:41', '2023-12-07 00:55:53'),
(25, 'Zevar', 1, '4', 'zevar', NULL, '478824286zevar.png', NULL, NULL, 1, 1, '2022-06-03 05:48:12', '2023-12-07 00:56:12'),
(26, 'Soot', 1, '4', 'soot', NULL, '832748619soot.png', NULL, '2042808643cat-icon.png', 1, 1, '2023-12-07 00:56:54', '2023-12-07 04:13:04'),
(27, 'Kala', 1, '4', 'kala', NULL, '509651620kala.png', NULL, NULL, 1, NULL, '2023-12-07 00:57:14', '2023-12-07 00:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_variances`
--

CREATE TABLE `product_variances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `sku` varchar(191) DEFAULT NULL,
  `selected_values` varchar(191) DEFAULT NULL,
  `regular_price` varchar(191) DEFAULT NULL,
  `sale_price` varchar(191) DEFAULT NULL,
  `stock_status` varchar(191) DEFAULT NULL,
  `height` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `width` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variances`
--

INSERT INTO `product_variances` (`id`, `product_id`, `sku`, `selected_values`, `regular_price`, `sale_price`, `stock_status`, `height`, `quantity`, `width`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, '58', '#P-AC/05', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/138019967903581902Untitled design (2).png', 'Inspired by the cooling hues of the taarak pushpa (star flower), this handcrafted rakhi is designed to bring a calm and content feeling much like what is felt in the presence of a dear sibling.', '2022-07-08 04:33:00', '2022-07-12 02:23:42'),
(2, '58', '#P-AC/29', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/18106135131644158968Untitled design (1).png', 'Inspired by the cooling hues of the taarak pushpa (star flower), this handcrafted rakhi is designed to bring a calm and content feeling much like what is felt in the presence of a dear sibling.', '2022-07-08 04:33:00', '2022-07-12 02:23:55'),
(3, '59', '#P-AC/06', '[\"With Box \"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/172089290Chameli  (2).png', 'Chameli brings the essence of the softness and charm of a jasmine flower surrounded by lush green leaves. The green and white of this rakhi represent the calm and liveliness of sibling relationship.', '2022-07-09 00:30:30', '2022-07-12 00:03:18'),
(4, '59', '#P-AC/30', '[\"Without Box\"]', '1', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1096310921Chameli  (1).png', 'Chameli brings the essence of the softness and charm of a jasmine flower surrounded by lush green leaves. The green and white of this rakhi represent the calm and liveliness of sibling relationship.', '2022-07-09 00:30:30', '2022-07-12 00:03:43'),
(5, '60', '#P-AC/07', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/832741034Nargis (2).png', 'Nargis brings to you the sunshin-y and festive feeling that Indian celebrations represnt. This beautiful handcrafted rakhi goes perfectly with the celebration of love and prosperity.', '2022-07-09 00:43:27', '2022-07-12 00:15:02'),
(6, '60', '#P-AC/31', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1456881353Nargis (1).png', 'Nargis brings to you the sunshin-y and festive feeling that Indian celebrations represnt. This beautiful handcrafted rakhi goes perfectly with the celebration of love and prosperity.', '2022-07-09 00:43:27', '2022-07-12 00:15:31'),
(7, '61', '#P-AC/08', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1215841508Surajmukhi (3).png', 'Sunflowers have to be one of the happiest looking flowers - all bright and shiny. This hancrafted rakhi is designed to spread smiles and festivity for rakshabandhan!', '2022-07-09 00:53:32', '2022-07-12 00:28:42'),
(8, '61', '#P-AC/32', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1344344565Surajmukhi (2).png', 'Sunflowers have to be one of the happiest looking flowers - all bright and shiny. This hancrafted rakhi is designed to spread smiles and festivity for rakshabandhan!', '2022-07-09 00:53:32', '2022-07-12 00:29:07'),
(9, '62', '#P-AC/09', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/280231365HARSHRINGAR (1).png', 'The combination of red and white is considered holy and auspicious in countless Indian cultures. This rakhi is inspired from the flower harshringar, representing life, love, and peace.', '2022-07-09 03:36:48', '2022-07-12 00:36:14'),
(10, '62', '#P-AC/33', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1887348291HARSHRINGAR (2).png', 'The combination of red and white is considered holy and auspicious in countless Indian cultures. This rakhi is inspired from the flower harshringar, representing life, love, and peace.', '2022-07-09 03:36:48', '2022-07-12 00:36:32'),
(11, '63', '#P-AC/10', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/601578729Mogra (2).png', 'This rakhi is inspired by the beauteous flower of mogra - famously used in the Indian culture in festivals, celebrations, and religious processes. It is also used by women as part of their \'shringar\' (dressing up) on celebratory days.', '2022-07-09 03:48:37', '2022-07-12 00:59:51'),
(12, '63', '#P-AC/34', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1606188328Mogra (1).png', 'This rakhi is inspired by the beauteous flower of mogra - famously used in the Indian culture in festivals, celebrations, and religious processes. It is also used by women as part of their \'shringar\' (dressing up) on celebratory days.', '2022-07-09 03:48:37', '2022-07-12 01:00:13'),
(13, '64', '#P-AC/11', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1790055689Gulbahar (2).png', 'This rakhi , inspired by white daisies represent the emotion of \'new beginnings\'. Rakshabandhan is a festival of celebrating sibling memories and to step towards a new year of new times together.', '2022-07-09 03:54:33', '2022-07-12 01:13:24'),
(14, '64', '#P-AC/35', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1579044419Gulbahar (1).png', 'This rakhi , inspired by white daisies represent the emotion of \'new beginnings\'. Rakshabandhan is a festival of celebrating sibling memories and to step towards a new year of new times together.', '2022-07-09 03:54:33', '2022-07-12 01:13:49'),
(15, '65', '#P-AC/12', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/344456287Raat Rani (2).png', 'The night jasmine symbolises amiability in Indian cultures. This rakhi is designed and handcrafted by karigars from the rural India to bring the magic of festivities to your celebration.', '2022-07-09 04:20:17', '2022-07-12 01:21:36'),
(16, '65', '#P-AC/36', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/236010621Raat Rani (1).png', 'The night jasmine symbolises amiability in Indian cultures. This rakhi is designed and handcrafted by karigars from the rural India to bring the magic of festivities to your celebration.', '2022-07-09 04:20:17', '2022-07-12 01:21:55'),
(17, '66', '#P-AC/13', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1472375540Laabh Swastik (2).png', 'swastik is the eternal symbol of holy celebrations in hindu cultures across the country. This rakhi represents the spirit of auspicious relationships such as of siblings.', '2022-07-09 04:25:44', '2022-07-12 01:36:57'),
(18, '66', '#P-AC/37', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1905092398Laabh Swastik (1).png', 'swastik is the eternal symbol of holy celebrations in hindu cultures across the country. This rakhi represents the spirit of auspicious relationships such as of siblings.', '2022-07-09 04:25:44', '2022-07-12 01:37:14'),
(19, '67', '#P-AC/14', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1517649769Nazar Battu (2).png', 'Superstition is as much a part of the Indian celebrations as anything else. People have all sorts of beliefs around how to ward of the evil eye, different \'nazarbattus\' are the most popular one.', '2022-07-09 04:38:51', '2022-07-12 01:44:41'),
(20, '67', '#P-AC/38', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/66407730Nazar Battu (1).png', 'Superstition is as much a part of the Indian celebrations as anything else. People have all sorts of beliefs around how to ward of the evil eye, different \'nazarbattus\' are the most popular one.', '2022-07-09 04:38:51', '2022-07-12 01:45:00'),
(21, '68', '#P-AC/15', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/417798058Indra Dhanush (2).png', 'If we had to describe the festivals in India, colourful would be close to the perfect word for it! This rakhi, inspired by the \'indradhanush\' (rainbow) depicts the vibrancy of indian celebrations.', '2022-07-09 04:56:26', '2022-07-12 01:51:07'),
(22, '68', '#P-AC/39', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/489086056Indra Dhanush (1).png', 'If we had to describe the festivals in India, colourful would be close to the perfect word for it! This rakhi, inspired by the \'indradhanush\' (rainbow) depicts the vibrancy of indian celebrations.', '2022-07-09 04:56:26', '2022-07-12 01:51:23'),
(23, '69', '#P-AC/16', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 7, 'Rakhi', 'attribute_image/242950628Gulmohar (2).png', 'The exquisite combination of hues of red, orange, and yellow - inspired by the Gulmohar (Delonix Regia) flower depicts the emotions of happiness, enthusiasm, and celebration.', '2022-07-09 05:05:28', '2023-01-31 09:11:55'),
(24, '69', '#P-AC/40', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1064631610Gulmohar (1).png', 'The exquisite combination of hues of red, orange, and yellow - inspired by the Gulmohar (Delonix Regia) flower depicts the emotions of happiness, enthusiasm, and celebration.', '2022-07-09 05:05:28', '2022-07-12 01:56:26'),
(25, '70', '#P-AC/17', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 9, 'Rakhi', 'attribute_image/669710908Saanjh (2).png', 'This handcrafted rakhi is inspired by a glimpse of a beautiful tropical sunset. The mix of blue and pink sky with a tinge of yellow represents the beauty that indian cultures are made of.', '2022-07-09 05:18:12', '2023-01-31 09:16:55'),
(26, '70', '#P-AC/41', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/444617603Saanjh (1).png', 'This handcrafted rakhi is inspired by a glimpse of a beautiful tropical sunset. The mix of blue and pink sky with a tinge of yellow represents the beauty that indian cultures are made of.', '2022-07-09 05:18:12', '2022-07-12 02:14:36'),
(27, '71', '#P-AC/18', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 9, 'Rakhi', 'attribute_image/162660619Shubh Swastik (1).png', 'Swastik represents the beginning of anything pure and auspicious, much like the festival of rakshabandhan. The colours red and yellow create a soothing yet exciting feeling.', '2022-07-09 05:24:05', '2023-02-03 04:38:31'),
(28, '71', '#P-AC/42', '[\"Without Box\"]', '199', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/1660631627Shubh Swastik (2).png', 'Swastik represents the beginning of anything pure and auspicious, much like the festival of rakshabandhan. The colours red and yellow create a soothing yet exciting feeling.', '2022-07-09 05:24:05', '2022-07-12 02:15:53'),
(29, '72', '#P-AC/19', '[\"With Box\"]', '349', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 10, 'Rakhi', 'attribute_image/621918787Genda (1).png', 'Genda phool is the first thing that makes the list of things needed for any celebration in an Indian household. This rakhi is inpired by the feeling that a genda phool brings to your home and how it is an integral part of any Indian celebration.', '2022-07-09 05:31:26', '2022-07-12 02:22:42'),
(30, '72', '#P-AC/43', '[\"Without Box\"]', '1', NULL, NULL, 'Handle with care Keep away from warm water .Not suitable for toddlers', 8, 'Rakhi', 'attribute_image/826738592Genda (2).png', 'Genda phool is the first thing that makes the list of things needed for any celebration in an Indian household. This rakhi is inpired by the feeling that a genda phool brings to your home and how it is an integral part of any Indian celebration.', '2022-07-09 05:31:26', '2022-07-21 21:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_a_purchases`
--

CREATE TABLE `schedule_a_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `start_date` varchar(191) DEFAULT NULL,
  `end_date` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_a_purchases`
--

INSERT INTO `schedule_a_purchases` (`id`, `name`, `address`, `email`, `phone`, `start_date`, `end_date`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kerry Cooley', 'saqyvyxy@mailinator.com', 'herotyv@mailinator.com', '+1 (195) 671-7362', '2003-12-03', '1972-08-07', NULL, NULL, '2022-05-13 11:51:42', '2022-05-13 11:51:42'),
(2, 'Heidi Yang', 'gikonyze@mailinator.com', 'vasagi@mailinator.com', '+1 (589) 506-2712', '2021-01-18', '1970-11-30', 'Aut labore omnis bea', NULL, '2022-05-13 12:57:01', '2022-05-13 12:57:01'),
(3, 'Elton Kaufman', 'cipycef@mailinator.com', 'hidelerigu@mailinator.com', '+1 (552) 128-7292', '1991-07-23', '1982-02-09', 'Dolores rerum accusa', NULL, '2022-07-12 22:25:43', '2022-07-12 22:25:43'),
(4, 'Noelani Bass', 'Voluptate aliqua Al', 'bimi@mailinator.com', '+1 (349) 352-2594', '1987-06-06', '1990-05-23', 'Nihil aut culpa cor', NULL, '2023-12-06 07:20:10', '2023-12-06 07:20:10'),
(5, 'Darryl England', 'Consectetur volupta', 'nysyzoniq@mailinator.com', '+1 (252) 612-4339', '2003-11-22', '1979-10-04', 'Delectus reprehende', NULL, '2023-12-06 07:20:34', '2023-12-06 07:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'admin', '77018 60046', '$2y$10$ytQHRaOvnMNiSHUyHarf/uBzLmz40OaQbHaHPKChgTUzR8mBM9vAi', 'xnTcLVhRopYfrBFH8tg4u7x8Jr30CnOQenVvMxydbpakkThTZrauWzHop5uI', '2022-07-12 21:50:58', '2022-07-12 21:50:58'),
(2, 'amit', 'amit@prayatnaworld.org', NULL, 'customer', '7210223687', '$2y$10$x6vr6RLGsC/CKur03DhnUe9Gvh/tmsrX5A0IpyVxnHocknFixqwI.', NULL, '2022-07-12 22:53:15', '2022-07-12 22:53:15'),
(3, 'prateek', 'prateekk898@gmail.com', NULL, 'customer', '7210223675', '$2y$10$UFtzwoNkR3CjDRyE5ElLg.QVtA0M5GKz3v9tgKkWcVdPFjoOFYpT2', NULL, '2022-07-21 21:19:44', '2022-07-21 21:19:44'),
(6, 'hetkumar', 'rathiya.het3061@gmail.com', NULL, 'customer', '7974215071', '$2y$10$/DVTPaHv71HdPMxVoBJvbuRt95gHFRRnDuGEhXiWf6oZkdjL0LY3y', NULL, '2023-01-09 22:32:37', '2023-01-09 22:32:37'),
(7, 'Showkat Ahmad Sheerwani', 'shokatahmad69@gmail.com', NULL, 'customer', '9906504629', '$2y$10$AW0fgIWuOuXM7kSd8gvFmuZvo43C6sVagG6oB1kZoLK4s1rp2ayS2', NULL, '2023-01-11 06:59:28', '2023-01-11 06:59:28'),
(8, 'AJAY KUMAR DINKAR', 'dinkarajay30@gmail.com', NULL, 'customer', '8797318937', '$2y$10$iO/n3DAmEWlKgjQJgYBmIuE8kJbNQnYZv0EbrRZ1ZEwNpHYBLfZjy', NULL, '2023-01-23 18:08:40', '2023-01-23 18:08:40'),
(9, 'Navreet Singh', 'navreetbrar07@gmail.com', NULL, 'customer', '7889018347', '$2y$10$HjOYBIcB3rZpBb6uvrQmWOcWBPpnp2aSZrForISNarQv5ZPRp2g02', NULL, '2023-03-21 00:18:11', '2023-03-21 00:18:11'),
(10, 'ANAMIKA', 'anakvbhu919@gmail.com', NULL, 'customer', '9608236787', '$2y$10$eSpp5UYAAO01sQ9yILR14OsYi3tDpIGv0VSjvWorbuwZ7jNLbV7dS', NULL, '2023-04-09 03:37:07', '2023-04-09 03:37:07'),
(11, 'VIPUL N.RATHOD', 'ansumarpada@gmail.com', NULL, 'customer', '81404629000', '$2y$10$zcQOiDxVUKnZOBbYDXJwVe21qiqaYP2K5DLXzW958ioFBzkP5xB7G', NULL, '2023-04-11 20:22:17', '2023-04-11 20:22:17'),
(12, 'Pratima Rudra', 'pratimarudra2@gmail.com', NULL, 'customer', '9434162528', '$2y$10$9oVTZXTTpxmchpr3bWs7j.QkZdg4dAg0F5bsznJsHAJO2QdWKYzqS', NULL, '2023-04-16 00:22:35', '2023-04-16 00:22:35'),
(13, 'kirankumar c solanki', 'kiran2master@gmail.com', NULL, 'customer', '9427456326', '$2y$10$O9IiuohrIzDejhBIsj7ZT.vVuSRVNFzzrMMoGn05DH49zvVu6zF2a', NULL, '2023-04-19 18:18:56', '2023-04-19 18:18:56'),
(14, 'MISING KONENG M E SCHOOL', 'misingkmes2021@gmail.com', NULL, 'customer', '6000416851', '$2y$10$xMrDeaQGylG.YGMT3TSaXOqus.NbChxgd5.P6g.zcHD6lthSCMehq', NULL, '2023-04-21 03:33:20', '2023-04-21 03:33:20'),
(15, 'Jungpang Lepcha', 'jungpanglepcha@gmail.com', NULL, 'customer', '9647776454', '$2y$10$QNZxQJg2PikfRY1HTuKd3eYtwm.76NECnBFINxry8ctbXxK/54A1q', 'M9sPwgnZvpe9teCMtNlpcnxH8cV0ulq9Dmu3UJg3Oc067R4coiPlKu7cK8Nf', '2023-04-21 23:27:22', '2023-04-21 23:27:22'),
(16, 'DIPAKKUMAR R VASAVA', 'deepsvasava117@gmail.com', NULL, 'customer', '9687760033', '$2y$10$8/IP.b4sSdNoo/d.ORDKr.v/XZ6chAmdbefKKK1tAA6uBD.WFzrue', NULL, '2023-04-27 20:32:16', '2023-04-27 20:32:16'),
(17, 'Hss Kharpora', 'hsskharpora@gmail.com', NULL, 'customer', '8899014385', '$2y$10$9lCziYQSv83lJK9NKihqlOwabN3EtVYVUHOBNNhC35JOUA0z6k2S2', NULL, '2023-04-27 21:37:12', '2023-04-27 21:37:12'),
(18, 'pitamber prasad nagwanshi', 'msamapali5003@gmail.com', NULL, 'customer', '9165001530', '$2y$10$iyjS9UYco1v2merc.qmXH.rqeXqbHwLM7293jS4d3cEOHMxg0gD.i', NULL, '2023-06-06 07:56:41', '2023-06-06 07:56:41'),
(20, 'mohmad maqbool rather', 'rathermaqbool1977@gmail.com', NULL, 'customer', '9906469054', '$2y$10$3VXVeD0mJoWtlSCHJBwLve2HFcRK2yAPafKJWr4aqvolsi5Kq.G4i', NULL, '2023-07-01 23:17:16', '2023-07-01 23:17:16'),
(21, 'PRISCA BARWA', 'barwa2409@gmail.com', NULL, 'customer', '9693674519', '$2y$10$U30o1U8Q9749RuPfaKgr3e42eFO.5/rvdgZgy/lizxqBYzRfYm5du', NULL, '2023-07-07 21:59:50', '2023-07-07 21:59:50'),
(22, 'Mudasir Ahmad Shah', 'shahmudasir7874@gmail.com', NULL, 'customer', '09906531580', '$2y$10$Il/hztZ186QLOXG1/F2FAulILQHUf0yvnlqIviqYowmaWHKDr4xQ2', NULL, '2023-07-13 00:27:56', '2023-07-13 00:27:56'),
(23, 'Rukhsar Muhammad Dar', 'boyspryschool4304@gmail.com', NULL, 'customer', '9858893096', '$2y$10$EqI2fwWwvAQLmcqALsCmXu1nRWVtoKXVWO6U97wtDG3hYKb7JUGPS', NULL, '2023-07-18 00:15:44', '2023-07-18 00:15:44'),
(24, 'rathva chunilal m', 'tasschool04@gmail.com', NULL, 'customer', '9726860743', '$2y$10$3Kl5w3Ue8S1zV/T6z60gOe3lc6Rr8LN1ZzFDR/963HjYYcw3OSeVa', 'mityaHg997FR01o1bV9wH8tDScsPN0rVShcaFwHuCLaAfSe4SHJEpVdvMovp', '2023-07-18 00:52:12', '2023-07-18 00:52:12'),
(25, 'V.CHAKRADHARA RAO', 'zphs.kamanagaruvu@gmail.com', NULL, 'customer', '9949391725', '$2y$10$/.4JIZy1CmIVQeeZ1Deb4ukabNDrYQB6e3/aIgPSJ8i95GTNqK/Ny', NULL, '2023-07-20 00:09:27', '2023-07-20 00:09:27'),
(27, 'sreixo', 'sreixo@sreixo.sreixo', NULL, 'customer', NULL, '$2y$10$tbx756LiUArENS9gB/OCPu16hvjCEz7qYKGODRONHt7tBQPEEfgL2', NULL, '2023-07-28 03:23:51', '2023-07-28 03:23:51'),
(28, 'rajesh baitha', '620769666geetadive@gmail.com', NULL, 'customer', '6206398702', '$2y$10$94UmWFc763RZ4Ik/zJhfHeGQ9RVjzb2ZPgrpi0JFcn/OYy8KlRqjG', NULL, '2023-08-11 06:12:43', '2023-08-11 06:12:43'),
(29, 'kgbv murhu', 'kgbvmurhu@gmail.com', NULL, 'customer', '7909052528', '$2y$10$bsTGM0HpSxakVLiu61KEdO0lPbMb2K85gPF10g26d4c.R1o8460Mi', NULL, '2023-08-18 00:58:38', '2023-08-18 00:58:38'),
(30, 'malatesh kammar', 'malateshiert@gmail.com', NULL, 'customer', '9886118660', '$2y$10$e3NKH8k9nid/4tLFiWRsb.38Etb6Ul4pNiPfoxNYOxXALqjdwdoKm', NULL, '2023-08-20 08:11:06', '2023-08-20 08:11:06'),
(31, 'Brajesh Trivedi', 'brajeshtrivedi1234@gmail.com', NULL, 'customer', '08602299507', '$2y$10$F30QpqJpUpOT6CcARbcieOQuj5j9uvxEWUiq3M7Q26RGg6dBFp4oi', NULL, '2023-08-24 01:56:45', '2023-08-24 01:56:45'),
(32, 'Ganesh Parte', 'ganeshparte@218gmail', NULL, 'customer', '9669120814', '$2y$10$ZYrgWUn.G2e8/T3vKu/Ma.Lgnk72ffnhXeYfmsZTJf5/kW.Ko4qSq', NULL, '2023-08-27 08:32:30', '2023-08-27 08:32:30'),
(33, 'DINESH KUMAR DHAKAR', 'dkdhakar061@gmail.com', NULL, 'customer', '8368951132', '$2y$10$4vlorLu9WKqdG4Qb2u6kJ.Ev69gaSo4HpuAAYPQpNpjgpFnRX3aw2', NULL, '2023-08-28 19:11:37', '2023-08-28 19:11:37'),
(34, 'PRAGILAL KUSHWAH', 'govtprimaryschoolmatbai@gmail.com', NULL, 'customer', '9752707903', '$2y$10$WOfIbQp1mWSuXzOZYVKUE.ivJhI5oanFBF18Ywl1en1qJ8Y3fXSzq', NULL, '2023-08-28 23:06:24', '2023-08-28 23:06:24'),
(35, 'Shewali dangi', 'shewalidangi@gmail.com', NULL, 'customer', '9504744104', '$2y$10$XUdOVl6h/FlxU5JSxOBgw.rg14igaHIQBur9pKulezs3Q2nQhiuFW', NULL, '2023-08-29 18:53:20', '2023-08-29 18:53:20'),
(36, 'Kadlimatti H P', 'hucheshpk@gmail.com', NULL, 'customer', '+919844025347', '$2y$10$tmnfkMqB5FuXi50tMUudaOGsXrJf3FKUxkU64oF9JKhfgOP2KYoCu', NULL, '2023-09-01 03:23:41', '2023-09-01 03:23:41'),
(37, 'Kailashchand Sand', 'hssgulawad107@gmail.com', NULL, 'customer', '9424040370', '$2y$10$4FG38C.3OguoxNqJjCQFJeXwcjri6sWjFoEfOQGX9AAUoC2.yhbe2', NULL, '2023-09-05 01:05:59', '2023-09-05 01:09:15'),
(38, 'Jagdish Gadage', 'jagdishgadge59@gmail.com', NULL, 'customer', '9754136858', '$2y$10$Joe3R1L6c3IkLaUrE1tsGeC0MUdBLrJ0NuIeJLNBuU3bn/h5i4s0.', NULL, '2023-09-05 23:27:36', '2023-09-05 23:27:36'),
(39, 'Manoj Kumar Saxena', 'manojsaxena111262@gmail.com', NULL, 'customer', '9009239105', '$2y$10$OlgHFCSZetJ3g4/1jihq/uWWf61dVvAM7Qxd.T8JQg8RuNJj4rdhS', NULL, '2023-09-09 07:55:21', '2023-09-09 07:55:21'),
(40, 'Natwar singh nayak', 'principalhsjhayada@gmail.com', NULL, 'customer', '9424521459', '$2y$10$l9ppKS4.NsWYFbK2RZmaVu3VTzIAHCBsJub/zJXu8qcMI0Z3IVdF2', NULL, '2023-09-12 23:21:39', '2023-09-12 23:21:39'),
(41, 'pappu amliyar', 'pappulal631@gmail.com', NULL, 'customer', '9755064631', '$2y$10$ejrW35t0rHKtjXUb46xdxeTUIT3IMajM9B5Fgn2f0VvI57eHJ12wO', NULL, '2023-09-13 05:08:03', '2023-09-13 05:08:03'),
(42, 'ANITA GONTIYA', 'emsbhikhampur@gmail.com', NULL, 'customer', '9407063304', '$2y$10$w7bIhgnofCW44CO6CHtupuJFP7JBDil4yQ7gTsQF.o6WNHRaFj1j6', NULL, '2023-09-16 06:26:40', '2023-09-16 06:26:40'),
(43, 'Ram Chandra Patil', 'ramchandrapatil07081992@gmail.com', NULL, 'customer', '9516860080', '$2y$10$TjfFpgijOeEPw5FtOxipS.SRDX./lGrgbEBJCrAmbHAM./uj38WcW', NULL, '2023-09-18 01:16:17', '2023-09-18 01:16:17'),
(44, 'Pravin Nigwal', 'prnnigwal@gmail.com', NULL, 'customer', '8889880566', '$2y$10$JE.044siIOxx0LUfXNdm7uoIhbwqQalZyDwEQimXwLio8ATJ68SF2', NULL, '2023-09-18 06:10:41', '2023-09-18 06:10:41'),
(45, 'Preeti surya', 'preeti221991@gmail.com', NULL, 'customer', '9999678214', '$2y$10$5yqrx4eRZehaGAphP6//venp.O.9uyFJ5J0t2CAWRYHGGTod7jP8i', NULL, '2023-09-19 23:04:18', '2023-09-19 23:04:18'),
(46, 'Pooja sahu', 'poojasahu21oct@gmail.com', NULL, 'customer', '8815550328', '$2y$10$vl.sZ3VXYJdKw6hqM4DPPOayCr9tnz7B9qUSZjlCvxOymepvOUX/2', NULL, '2023-09-19 23:13:37', '2023-09-19 23:13:37'),
(47, 'PRADEEP SWAMI', 'pradeep.swami2020@gmail.com', NULL, 'customer', '9649088838', '$2y$10$SmfXHwX1TRlKX0zcgHoHRe1hrXegrTtC73y16LBh7tcXX6Y2Ujy9q', NULL, '2023-09-21 18:41:55', '2023-09-21 18:41:55'),
(48, 'Gitai Wagh Kanya Vidyalaya Bhausaheb Nagar', 'disp-gitaibnagar@kkwagh.edu.in', NULL, 'customer', '243663', '$2y$10$mNhrVpSnQyDSPZD8Y/VyOuUzL3IhKcTA1.8KAd9nF2Lx3fUrnr1rG', NULL, '2023-09-24 19:22:34', '2023-09-24 19:22:34'),
(49, 'KUMARI SUNITA', 'ksunita301@gmail.com', NULL, 'customer', '+919102723105', '$2y$10$yoIoytuANAE.bpovkxqrZ.xn6AekrLY2IoJJ96xRhVpmMxLM47aFm', NULL, '2023-09-28 17:40:25', '2023-09-28 17:40:25'),
(50, 'gopiram jatav', 'gopiram9893@gmail.com', NULL, 'customer', '9893775912', '$2y$10$GK5Q8TJGyyGwyQq8JxO61OHhgV1D/reC.ck.KatG076ilGbCqJVB.', NULL, '2023-09-30 19:41:36', '2023-09-30 19:41:36'),
(51, 'ZPBOYSCHINCHANI', 'Zpboyschinchani@gmail.com', NULL, 'customer', '+917743998734', '$2y$10$AXcGXznlt/j6ZbG.dhtYXOP5BDa7gii4hYcsf3sqe9Fv17cx0OIPq', NULL, '2023-10-01 05:58:56', '2023-10-01 05:58:56'),
(52, 'Ramswaroop Singh thakur', 'pskodaraskhurd@gmail.com', NULL, 'customer', '9098718051', '$2y$10$GhVq4KsD3EeQGygycglnquc2miPyXdk3C4BKWFvfjw7rjHEeGzv9m', NULL, '2023-10-03 00:54:52', '2023-10-03 00:54:52'),
(53, 'sadhna verma', 'vermasadhna158@gmail.com', NULL, 'customer', '8966836651', '$2y$10$FAvTQty4X6QrUtT1rQ9p5OlEZFKh19R5Ri0wTKydFwmdztqzmbP1S', NULL, '2023-10-04 00:31:40', '2023-10-04 00:31:40'),
(54, 'Vijaya Maheshwari', 'gmsreshammill525802@gmail.com', NULL, 'customer', '9425109764', '$2y$10$lgzZVvTjEtWRS2Gs0K0ENOpuj/ad2YNXQcWPRm5IbkM79njy0Jaoe', NULL, '2023-10-07 01:44:38', '2023-10-07 01:44:38'),
(55, 'bhujalsing evnati', 'psmarkadol06604@gmail.com', NULL, 'customer', '9617234828', '$2y$10$QTPy4b0LoPZtx/icYUsdxuglqjlNi6USbI/39cvh6h2eYjhlzoUH.', NULL, '2023-10-10 04:17:19', '2023-10-10 04:17:19'),
(56, 'alok pouranik', 'rdmsgpatharia@gmail.com', NULL, 'customer', '9993013530', '$2y$10$9SlaObMd9DJLS7HpdQvzcOzf2J/eSKkxdHU07MY.pLyD0KXpfT2BW', NULL, '2023-10-10 22:01:38', '2023-10-10 22:01:38'),
(57, 'ATUL KUMAR BISEN', 'gpsmurjhad@gmail.com', NULL, 'customer', '7879582495', '$2y$10$h1SQiMexloDKxsZe9d8Mu.ZCd32ZaBYQ4nCxORJFb3aoieXTZl9N.', NULL, '2023-10-11 07:05:14', '2023-10-11 07:05:14'),
(58, 'Abhayraj singh raghuwanshi', 'gpskhaijrakhurd@gmail.com', NULL, 'customer', '9179764667', '$2y$10$LuCYeUSTuZOoinxQYY4T3OYtgJMlXlMrFmtjACSrJ4PujMbWRIgOq', NULL, '2023-10-12 06:55:12', '2023-10-12 06:55:12'),
(59, 'Pramod  kumar sahu', 'pramodsahu4511@gmail.com', NULL, 'customer', '7489326925', '$2y$10$iPbZ8o1Q.z5dyg9qKo0pG..NaAM3Pp4hTDru2Tamw6g5Z8jEeigse', NULL, '2023-10-14 00:51:12', '2023-10-14 00:51:12'),
(60, 'anup dhanotiya', 'govtmsdhankhedi@gmail.com', NULL, 'customer', '9907030112', '$2y$10$ls6FBhWf/hUGrnFpgzkCNe1Nu2X62ElOXtoTPj1pwIGj3A6MS2qc2', NULL, '2023-10-14 21:40:04', '2023-10-14 21:40:04'),
(61, 'Pankajesh Mishra', 'pankajesh1984@gmail.com', NULL, 'customer', '9200461058', '$2y$10$k/XT/0Or5Dv1.alEKXllhONJnZQVsYbXy4FIAQhSmQvX3hd5lndja', NULL, '2023-10-16 05:24:37', '2023-10-16 05:24:37'),
(62, 'PAWAN KUMAR PRAJAPATI', 'pawanprajapati262@gmail.com', NULL, 'customer', '9479069388', '$2y$10$tkX1RnIzHr2Pe7Az3k6Hoe3CuKlew8Z0Vwhy.qnEvv2OvM1YM3wyS', NULL, '2023-10-16 19:31:20', '2023-10-16 19:31:20'),
(63, 'Siraj khan', 'sirajkhan565833@gmail.com', NULL, 'customer', '9893565833', '$2y$10$58exB/VUJR4pWpQlbefSyeU1V83gtwsowVf5P6qtJwmbY.ket4sES', NULL, '2023-10-16 22:11:11', '2023-10-16 22:11:11'),
(64, 'Sukhdew singh Dhurwey', 'ssdhurwey21567@gmail.com', NULL, 'customer', '9424975996', '$2y$10$YFwS.ORZXWBEpdB61q339uln0T3XRWF7u7c6Tp2CasIeKRuc21zG2', NULL, '2023-10-20 21:53:56', '2023-10-20 21:53:56'),
(65, 'Nazir Ahmad khan', 'bhstirch901@gmail.com', NULL, 'customer', '7889376242', '$2y$10$5f2WVzQ1DapD0QFC76pS9em6Rm4xwD.dES3bZZYmX/DA3/pDZ7AUO', NULL, '2023-10-21 07:25:52', '2023-10-21 07:25:52'),
(66, 'Bharat singh', 'bharat.singh9088@gmail.com', NULL, 'customer', '9981215346', '$2y$10$pnTim9vbdaHukr9aknbmt.nYnMJ8LOvbingpGwFPb4Q.pyhBFto2q', NULL, '2023-10-24 06:30:22', '2023-10-24 06:30:22'),
(67, 'MANWWAR HUSAIN', 'husainmmmec@gmail.com', NULL, 'customer', '7992217268', '$2y$10$ipOIBS4tOtYA4uACk2WSrekJF3c4vRRMLCWStPieZ9Ebf6hd4OZua', NULL, '2023-10-25 00:38:35', '2023-10-25 00:38:35'),
(68, 'Shabnum Afzal', 'rizvimahoor2006@gmail.com', NULL, 'customer', '7006587855', '$2y$10$5Jl6BLDvtvqoXnhWHblKoO6jcwsejYh5t41DRm35m3QbeBwy9sW7G', NULL, '2023-10-26 20:15:21', '2023-10-26 20:15:21'),
(69, 'Kuber singh solanki', 'kubersolanki@4545gmail.com', NULL, 'customer', '6260339846', '$2y$10$Qt09lpE2kfqXAUUyjjZgPukKovBggMBjjDDjBQODV.TgWdqTH/Bd.', 'P4epmIhj7eDxBDPOndajyej2zNnWA8K55cUKZY5MZD9pGHZXWTilCI6Y1Dbm', '2023-10-26 22:38:31', '2023-10-26 22:38:31'),
(70, 'MAHABIR MUNDA', 'mahabirmunda1970@gmail.com', NULL, 'customer', '8002104412', '$2y$10$12PiegTJraEEN8.BOazNL.9HA/LbJBCqnOhGTVW6for9vUJEb6T/K', NULL, '2023-10-27 22:28:58', '2023-10-27 22:28:58'),
(71, 'Bhavna', 'bhavnasharma360@gmail.com', NULL, 'customer', '8285737160', '$2y$10$NTB/0dzM7txwR/aP7QJr6eJ64Hh1aX2syNlo.SLSfEfqAr1hiPB0S', NULL, '2023-10-29 01:14:03', '2023-10-29 01:14:03'),
(72, 'Reshma K', 'reshmakvs@gmail.com', NULL, 'customer', '9037379966', '$2y$10$NdhdwAMNa07VNz/wz509VeFpEFrccY9pznNL85lSyTK5qh7i9zKnq', NULL, '2023-10-30 06:37:51', '2023-10-30 06:37:51'),
(73, 'Ravi Singh', 'manjuaravi1991@gmail.com', NULL, 'customer', '8318570192', '$2y$10$2Bmx2Cg3ftfwcerPYnRCDuW6Izw3IWfbV/UKTLQslFlavBRx.2RVm', NULL, '2023-10-30 21:40:16', '2023-10-30 21:40:16'),
(74, 'M UMASELVI', 'UMAPGTCS@GMAIL.COM', NULL, 'customer', '9476077306', '$2y$10$KPJaZ61MGIXIs6MPCZI/G.aGrCfrQbRO7/dNas5lL8H/YY2.k/jY6', NULL, '2023-11-01 18:20:32', '2023-11-01 18:20:32'),
(75, 'dal pratap', 'cmrisemjgprimary@gmail.com', NULL, 'customer', '9425886169', '$2y$10$D.M641AHcHUF/OHGFnckKuQtiBqHOL6IJvUgbKOuRI8KBZYB5Z9.O', NULL, '2023-11-01 21:09:22', '2023-11-01 21:09:22'),
(76, 'Omkar singh patel', 'apatel0745@gmail.com', NULL, 'customer', '8989946151', '$2y$10$kUSbh.ogmYAcuGWCl.1TjubNMaH4ADlQkWHQJ08Rt6RURkxoDYRLS', NULL, '2023-11-02 23:58:15', '2023-11-02 23:58:15'),
(77, 'josphin  lakra', 'josphinlakra24@gmail.com', NULL, 'customer', '9406378304', '$2y$10$nxrjXtuBef0dz1OgZVVeLuqBXCHz5z9uRNQA.7mUINvl4o89Lq2w2', NULL, '2023-11-03 06:44:41', '2023-11-03 06:44:41'),
(78, 'ADARSH YADAV', 'ADARSHKVIDUKKI@KVSERNAKULAMREGION.IN', NULL, 'customer', '08787091712', '$2y$10$mV2k2j./pzlQ8PXeUzPrzuASL9rsEL0QZI1bzOjd7LRSmvMMWr9fy', NULL, '2023-11-05 20:12:44', '2023-11-05 20:12:44'),
(79, 'HS NAGSARI KALAROOS', 'syednabiul7@gmail.com', NULL, 'customer', '9596323906', '$2y$10$OSj9yqedOfL88oXm.mWdN.WiFbIkqo8zs7VTBX/0QJq7ZBVgUHsQa', NULL, '2023-11-06 01:21:33', '2023-11-06 01:21:33'),
(80, 'MAHAVIR GHINTALA', 'mghintala537@gmail.com', NULL, 'customer', '8617384724', '$2y$10$BQMVgXaUrNMyKj/A48esWeTKIOHpOWfBu2pzHKdZzkTmuzpckd0um', NULL, '2023-11-06 07:06:18', '2023-11-06 07:06:18'),
(81, 'Dilbahadur Singh', 'kv1udaipur@gmail.com', NULL, 'customer', '8617036966', '$2y$10$1iB2fH6bBZ/AypDBUKC0zeDQ0vUq3vX0gJ3ZWrruWkkE6ZhiK9Wke', NULL, '2023-11-06 18:21:42', '2023-11-06 18:21:42'),
(82, 'PM SHRI KENDRIYA VIDYALAYA HARDOI', 'kvhardoi2014@GMAIL.COM', NULL, 'customer', '9335382563', '$2y$10$y15x0mI0S6qfeHD22A2QIulA.QVJz.FQMOcFVpYLDgdHwmXJ/cNSi', NULL, '2023-11-06 20:39:37', '2023-11-06 20:39:37'),
(83, 'VIPIN KUMAR TYAGI', 'kvbaoli@gmail.com', NULL, 'customer', '09410578969', '$2y$10$w..d3HVQLs3h1lav/q6GwefP0wprnc8b.xIkkYkzMbmCPsFXPR/Ay', NULL, '2023-11-06 23:50:39', '2023-11-06 23:50:39'),
(84, 'PRABHAKAR SHARMA', 'prabhakar.gzb@gmail.com', NULL, 'customer', '9719730007', '$2y$10$Wz85C0koRIEcw25Ma.srTuhE1xESWUorUkltCmsZQqdKXruUMBIne', NULL, '2023-11-07 23:21:00', '2023-11-07 23:21:00'),
(85, 'Kendriya Vidyalaya AFS Wadsar', 'kvvadsar@gmail.com', NULL, 'customer', '9429557111', '$2y$10$KLU3o63v6WPhYEG42WlhT.zil36N52KxaAin3OLYwyzVpjElWueIe', NULL, '2023-11-08 22:22:20', '2023-11-08 22:22:20'),
(86, 'KV BSF CAMP CHHAWLA', 'kvchhawlachhawla@gmail.com', NULL, 'customer', '9873660401', '$2y$10$wpG1hILy5SyLAy/nxYN2MOow0gWRLIWn0RvroFQCNwyhy6h4tljoG', NULL, '2023-11-08 23:35:56', '2023-11-08 23:35:56'),
(87, 'Nigar Ahmad', 'nigarahamada@gmail.com', NULL, 'customer', '9993118440', '$2y$10$sdkxc/.NvMS1rS.DywffBOuoGuxQLuI9I86GrGXweIwjzBweKiAeG', NULL, '2023-11-09 20:19:41', '2023-11-09 20:19:41'),
(88, 'Suttamsaha555@gmail.com', 'suttamsaha555@gmail.com', NULL, 'customer', '9435831120', '$2y$10$9Q0SKPusvrv8.iuudV9NGOC7pOFxFrabL/TslzkQ3v9t9N4JGtWL6', NULL, '2023-11-11 07:16:57', '2023-11-11 07:16:57'),
(89, 'PRITI SHARMA', 'pritidabas000@gmail.com', NULL, 'customer', '09739664221', '$2y$10$MwRSFDB1hUo6stmSM7zSO.A.z5lMHX7Vjc5ea8oVzizushopGQFKi', NULL, '2023-11-12 21:59:02', '2023-11-12 21:59:02'),
(90, 'Sayyada Aiman Hashmi (India)', 'aiman.hashmi3@gmail.com', NULL, 'customer', '+919999332572', '$2y$10$aYfFzxDveqS9LlWVZksEzuLgcAkkOCk.RVd6duiMaXupsE1fIsOaa', NULL, '2023-11-13 20:29:26', '2023-11-13 20:29:26'),
(91, 'R RAJANI NADAR', 'RAJNINADAR1@GMAIL.COM', NULL, 'customer', '09402005311', '$2y$10$7jYf91sNfpjTQzo0Ntzr4.7khbowqHrcJry67bm6B4yxnvpLfFC7a', NULL, '2023-11-21 09:34:19', '2023-11-21 09:34:19'),
(92, 'ESWARA RAO KINTALI', 'eswar.k17@gmail.com', NULL, 'customer', '07204700173', '$2y$10$emBS8HcL4egCgG4osO62DubTzZ3a1OFG0gLqSunJU9zXSg0sGZR6G', NULL, '2023-11-22 05:33:58', '2023-11-22 05:33:58'),
(93, 'vandana katari', 'vandana949@gmail.com', NULL, 'customer', '07827567107', '$2y$10$rLQSq3yIS0vqGML7r2tavuKptsL1ANc0QQYPD4oa/pRviSOSGipkC', NULL, '2023-11-23 18:06:45', '2023-11-23 18:06:45'),
(94, 'SUSHIIL KUMAR BUDDHIA', 'sushilkv333@gmail.com', NULL, 'customer', '8328813488', '$2y$10$JnsQM3oLeAq2ZmHAd1UUMuZhSslL9MyDdI5AxVU1l1PYfOh44yYea', NULL, '2023-11-23 21:42:19', '2023-11-23 21:42:19'),
(95, 'asha soni', 'ashasonipsror@gmail.com', NULL, 'customer', '9200053339', '$2y$10$QpvTwzwf6ECxkzOask9tWOhUlq6Tupzq7mAOp4weF/fiVIVBVgtOa', NULL, '2023-11-23 23:01:56', '2023-11-23 23:01:56'),
(96, 'sumit', 'sbansal0207@gmail.com', NULL, 'customer', '9728773322', '$2y$10$i3jqhzM.P5ctMuMo/pWKIu2bknwWIPQ4IvMqRwW0gk6XPaoIq21qO', NULL, '2023-11-24 18:25:34', '2023-11-24 18:25:34'),
(97, 'MOHD YOUSUF DAR', 'neeloyousuf@gmail.com', NULL, 'customer', '9906491554', '$2y$10$laXTivNvNmJHJ3xD5mz.aetkkWa0bIPXD.XtNuuHVCnAeKE8RirIS', NULL, '2023-11-27 06:04:45', '2023-11-27 06:04:45'),
(98, 'Birender Singh', 'brienyadav@gmail.com', NULL, 'customer', '9416981977', '$2y$10$J53LnESvC3GJJ3D5ukQNFuA1LPj7rF4ZwSIwqHyK84Yh3SNyP5j7O', NULL, '2023-11-29 21:15:56', '2023-11-29 21:15:56'),
(99, 'SANGEETA YADAV', 'yadavsangeeta571@gmail.com', NULL, 'customer', '+919919745261', '$2y$10$M78PeURhlbfV7iz9cB8Ieemfffr8TS0BAt.QL.Q3kfA01VSYYQjdu', NULL, '2023-12-02 07:45:57', '2023-12-02 07:45:57'),
(100, 'NARENDRA YADAV', 'narendrayadavalld@gmail.com', NULL, 'customer', '08794190019', '$2y$10$fqbYtdpZ415WyVZde711KuRzdZGf9nCW8KzCL0nIHJj/buNNslG6S', NULL, '2023-12-02 21:22:30', '2023-12-02 21:22:30'),
(101, 'NAND LAL SONI', 'nandlal.soni@gmail.com', NULL, 'customer', '7984401363', '$2y$10$gYqwa5UIoEhcv./uGc7oU.TZL71GpxdOZ2oIy6A3bDUAs/38hjWR.', NULL, '2023-12-04 20:42:47', '2023-12-04 20:42:47'),
(102, 'Mercedes Gallegos', 'kavuhif@mailinator.com', NULL, 'customer', '+1 (255) 193-1059', '$2y$10$yTaP6ZVob/x0FbsOCiYeCe6hJCIxuK0VyPIqOHzMySYFsH29ohae2', NULL, '2023-12-06 10:19:13', '2023-12-06 10:19:13'),
(103, 'prateek', 'prateek@gmail.com', NULL, 'customer', '7210223675', '$2y$10$KmhwQ0Mu0XflMqYOCzjYiec/v.6cIYo2O43AzOlkqsxsJMl3L4IEu', NULL, '2023-12-06 10:27:18', '2023-12-06 10:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `sku` varchar(191) DEFAULT NULL,
  `product_type` varchar(191) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `name`, `quantity`, `price`, `image`, `user_id`, `sku`, `product_type`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 'Clay Tortoise Trinket Tray', '1', '499', 'product/1128185263Handmade Tortoise Trinket Tray 2 - 1.jpg', '1', '#P-HL/30', 'simple23', 23, '2023-12-07 06:00:41', '2023-12-07 06:00:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_orders`
--
ALTER TABLE `bulk_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `desiners`
--
ALTER TABLE `desiners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `desiners_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_links`
--
ALTER TABLE `product_attribute_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`);

--
-- Indexes for table `product_subcategories`
--
ALTER TABLE `product_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_subcategories_slug_unique` (`slug`);

--
-- Indexes for table `product_variances`
--
ALTER TABLE `product_variances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_a_purchases`
--
ALTER TABLE `schedule_a_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulk_orders`
--
ALTER TABLE `bulk_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `desiners`
--
ALTER TABLE `desiners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product_attribute_links`
--
ALTER TABLE `product_attribute_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_subcategories`
--
ALTER TABLE `product_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_variances`
--
ALTER TABLE `product_variances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `schedule_a_purchases`
--
ALTER TABLE `schedule_a_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
