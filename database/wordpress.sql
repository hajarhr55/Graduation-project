-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 أبريل 2025 الساعة 14:11
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- بنية الجدول `comment_table`
--

CREATE TABLE `comment_table` (
  `Comment_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comment_table`
--

INSERT INTO `comment_table` (`Comment_id`, `Customer_id`, `message`, `product_id`) VALUES
(109, 68, 'لذيذ', 5336),
(111, 68, 'لذيذ', 5326);

-- --------------------------------------------------------

--
-- بنية الجدول `customer_table`
--

CREATE TABLE `customer_table` (
  `Customer_id` int(11) NOT NULL,
  `First_name` varchar(255) DEFAULT NULL,
  `Last_name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `customer_table`
--

INSERT INTO `customer_table` (`Customer_id`, `First_name`, `Last_name`, `Email`, `Address`, `username`, `password`) VALUES
(68, 'سارة', 'محمد', 'sara@gmail.com', 'خيبر', 'sara', '$P$BnbsZDDC0aDgJ8Qj/W1.YS0bjnIS4a0'),
(73, 'جوري', 'الاحمدي', 'juri34@gmail.com', 'خيبر', 'joory', '$P$Bw5/apLU3tQDQ08ATNXlYIMzTQm1wv1');

-- --------------------------------------------------------

--
-- بنية الجدول `order_table_new`
--

CREATE TABLE `order_table_new` (
  `order_id` int(11) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Product_total_price` decimal(10,2) NOT NULL,
  `Quantity_product` int(11) NOT NULL,
  `Family_ID` int(11) NOT NULL,
  `customer_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_table_new`
--

INSERT INTO `order_table_new` (`order_id`, `Order_Date`, `Product_id`, `Customer_id`, `Product_total_price`, `Quantity_product`, `Family_ID`, `customer_phone`) VALUES
(6, '2024-12-14 23:06:34', 5324, 68, 30.00, 1, 63, '0503654763'),
(7, '2024-12-14 23:06:34', 5330, 68, 28.00, 1, 63, '0503654763'),
(8, '2024-12-14 23:06:34', 5336, 68, 27.00, 1, 63, '0503654763'),
(9, '2024-12-14 23:09:07', 5326, 68, 27.00, 1, 64, '0503654763'),
(10, '2024-12-14 23:10:48', 5324, 68, 30.00, 1, 63, '0503654763'),
(11, '2024-12-15 09:33:50', 5347, 70, 23.00, 1, 65, '84373'),
(12, '2024-12-15 11:19:10', 5326, 73, 54.00, 2, 64, '054678435'),
(13, '2024-12-15 11:19:10', 5334, 73, 36.00, 1, 65, '054678435');

-- --------------------------------------------------------

--
-- بنية الجدول `productive_family`
--

CREATE TABLE `productive_family` (
  `Family_id` int(11) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Address_Family` varchar(255) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `productive_family`
--

INSERT INTO `productive_family` (`Family_id`, `First_Name`, `Last_Name`, `Phone`, `Address_Family`, `user_login`, `user_password`, `user_id`, `Email`) VALUES
(63, 'مطبخ', 'ام محمد', 551810355, 'خيبر', 'Om_M', '$P$BylO/5tY5nzO1uZJsljTKcEDtLRIGq.', 63, 'om_m@gmail.com'),
(64, 'مطبخ', 'خيبر الشمالية', 532256263, 'خيبر', 'KCook', '$P$B79111RwSkp1NRmSmQIDFji7PdNYG4.', 64, 'KCook@gmail.com'),
(65, 'مطبخ', 'عوافي', 553357196, 'خيبر', 'Awafi', '$P$BNbR5UU7KMGZsKfIoSY4TN.GC4WG8a/', 65, 'Awafi@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `product_table`
--

CREATE TABLE `product_table` (
  `Product_name` varchar(255) NOT NULL,
  `Price_unit` int(255) NOT NULL,
  `Quantity_Available` int(255) NOT NULL,
  `Product_Type` varchar(255) NOT NULL,
  `Product_Description` text DEFAULT NULL,
  `Product_image` longblob NOT NULL,
  `Family_id` int(255) NOT NULL,
  `Product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `product_table`
--

INSERT INTO `product_table` (`Product_name`, `Price_unit`, `Quantity_Available`, `Product_Type`, `Product_Description`, `Product_image`, `Family_id`, `Product_id`) VALUES
('مكرونة بالبشاميل', 30, 20, 'المالحة', 'وصفة غنية تتكون من طبقات المكرونة المطهية مع حشوة من اللحم المفروم المتبل والبشاميل الكريمي. تُخبز في الفرن حتى تصبح الطبقة العلوية ذهبية اللون، لتقدم كوجبة دسمة وشهية تلائم جميع المناسبات.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e31392e35372d504d2e6a706567, 63, 5324),
('جيب التاجر', 27, 22, 'المالحة', 'وجبة خفيفة وشهية تتكون من خبز التوست المحشو بحشوات متنوعة مثل الدجاج المتبل، الجبن الذائب، أو الخضروات، ويتم قليه أو خبزه للحصول على قرمشة ذهبية. مثالي كطبق جانبي أو وجبة خفيفة تناسب جميع الأذواق.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e31392e35382d504d2d362e6a706567, 64, 5326),
('مكرونة', 34, 33, 'المالحة', 'طبق مميز يجمع بين المكرونة الطازجة وصوص كريمي يجمع بين الطماطم والكريمة، ليمنحها لونًا برتقاليًا جذابًا ونكهة غنية. تُضاف التوابل المميزة لتعزيز الطعم، ويمكن تقديمها مع الدجاج المشوي للحصول على وجبة لذيذة ومتكاملة.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e31392e35382d504d2d312d312e6a706567, 65, 5328),
('قطايف محشوة', 28, 22, 'الحلويات', 'قطايف مصنوعة من عجين طري وحشوات مميزة مثل الجبن والفستق والمكسرات، لتقدم تجربة طعام فاخرة وممتعة. يمكن تناولها مقلية أو مشوية حسب الرغبة، مما يتيح لك اختيار الطعم المثالي. تعدّ هذه القطايف خيارًا مثاليًا للوجبات الخفيفة أو المناسبات الخاصة، حيث تجمع بين النكهة الغنية والمذاق اللذيذ الذي يناسب جميع الأذواق.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e32302e30302d504d2d312e6a706567, 63, 5330),
('ملفوف محشي', 35, 20, 'المالحة', 'يتميز ملفوفنا المحشي بحشوة لذيذة من الأرز والتوابل المختارة بعناية، ويقدم مع مزيج من الخضروات الطازجة. يتم لفه بعناية داخل أوراق الملفوف الطرية ليتم طهيه بأسلوب تقليدي يضمن نكهة غنية ومرغوبة. يمكن تقديمه كوجبة رئيسية أو كطبق جانبي لذيذ، ويعد خيارًا مثاليًا للأذواق التي تفضل الطعام الصحي والمغذي.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e32302e30302d504d2d312d312e6a706567, 64, 5332),
('ورق عنب محشي', 36, 24, 'المالحة', 'ورق عنب محشي بحشوة غنية من الأرز والتوابل المختارة بعناية، مع لمسة من عصير الليمون وزيت الزيتون لإضفاء نكهة مميزة. يتم لفه بعناية داخل أوراق العنب الطرية، ليتم طهيه بأسلوب تقليدي يحافظ على طعمه اللذيذ والمميز. يعتبر ورق العنب المحشي خيارًا مثاليًا كطبق رئيسي أو جانبي، ويجمع بين الطعم الشهي والفوائد الصحية.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e32302e30312d504d2e6a706567, 65, 5334),
('تبولة', 27, 19, 'المالحة', 'تبولة طازجة وشهية تُحضَّر من البرغل الناعم، البقدونس المفروم، الطماطم، والنعناع، مع لمسة من عصير الليمون وزيت الزيتون البكر. تمتاز بنكهتها الخفيفة والمنعشة، مما يجعلها خيارًا مثاليًا كطبق جانبي صحي ومليء بالنكهات الطبيعية.', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31312d32342d61742d352e32302e31392d504d2d382e6a706567, 63, 5336),
('سينبون', 34, 20, 'الحلويات', '\\\"لفائف السينبون الشهية تجمع بين العجين الطري المحشو بخليط القرفة والسكر البني، ومغطاة بصوص كريمي غني يمنحها طعمًا لا يُقاوم. مثالية لتُقدم دافئة كوجبة خفيفة أو تحلية مميزة.\\\"', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31322d31352d61742d372e35302e34302d414d2e6a706567, 64, 5345),
('بسبوسة', 23, 20, 'الحلويات', '\\\"بسبوسة شهية تُحضّر من سميد ناعم ممزوج بالحليب والسكر، تُخبز حتى تُصبح ذهبية اللون وتُسقى بالشيرة (القطر) لتعطيها قوامًا طريًا وطعمًا غنيًا. تُزين غالبًا بالمكسرات لتضفي عليها لمسة فاخرة. مثالية لعشاق الحلويات الشرقية الأصيلة.\\\"', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31322d31352d61742d372e35302e34322d414d2e6a706567, 65, 5347),
('معمول بالتمر', 28, 23, 'الحلويات', '\\\"معمول بالتمر حلوى تقليدية مصنوعة من عجين السميد الطري المحشو بحشوة التمر الغنية. يتميز بنكهته الحلوة وقوامه الطري.\\\"', 0x687474703a2f2f6c6f63616c686f73742f576f726450726573732f77702d636f6e74656e742f75706c6f6164732f323032342f31322f57686174734170702d496d6167652d323032342d31322d31352d61742d372e35302e34302d414d2d312e6a706567, 63, 5349);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `fk_customer_comment` (`Customer_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `order_table_new`
--
ALTER TABLE `order_table_new`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_family_id` (`Family_ID`);

--
-- Indexes for table `productive_family`
--
ALTER TABLE `productive_family`
  ADD PRIMARY KEY (`Family_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `fk_family` (`Family_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `order_table_new`
--
ALTER TABLE `order_table_new`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productive_family`
--
ALTER TABLE `productive_family`
  MODIFY `Family_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `Product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5357;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `fk_customer_comment` FOREIGN KEY (`Customer_id`) REFERENCES `customer_table` (`Customer_id`);

--
-- قيود الجداول `order_table_new`
--
ALTER TABLE `order_table_new`
  ADD CONSTRAINT `fk_family_id` FOREIGN KEY (`Family_ID`) REFERENCES `productive_family` (`Family_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- قيود الجداول `product_table`
--
ALTER TABLE `product_table`
  ADD CONSTRAINT `fk_family` FOREIGN KEY (`Family_id`) REFERENCES `productive_family` (`Family_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
