-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3310
-- Время создания: Ноя 12 2019 г., 09:18
-- Версия сервера: 5.6.43
-- Версия PHP: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `samauto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_start` int(10) UNSIGNED DEFAULT NULL COMMENT 'дата публикации',
  `date_end` int(10) UNSIGNED DEFAULT NULL COMMENT 'дата публикации',
  `created_at` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL COMMENT 'изображение баннер',
  `link` varchar(256) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text,
  `status` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `date_start`, `date_end`, `created_at`, `image`, `link`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`, `status`) VALUES
(1, 1554066000, 1554152400, 1553492536, '1553493228.jpg', 'akciya-nomer-1', 'акция номер 1', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius atque illum est magni delectus ex, veniam quia repellendus quod voluptates quos reprehenderit repudiandae quis perferendis nisi sed corporis deserunt. Nulla, at hic possimus vitae id est nemo non ab ut optio dolorum quod corrupti veritatis placeat, quis consectetur beatae minima ipsa et officiis quibusdam tempora eius maiores. Accusamus consectetur qui adipisci enim tempore nulla, neque autem ab sit culpa aut maiores, ipsum quos hic molestias asperiores nam tempora fugiat? Maiores ducimus cum necessitatibus quisquam iure, aliquam doloremque soluta perspiciatis nobis quasi. Perferendis laboriosam molestiae non tenetur, magnam ipsum modi deserunt autem voluptatem voluptate velit iure porro dicta, in est nulla mollitia provident aperiam, veritatis dignissimos odit. Perspiciatis nam impedit amet, doloribus laborum minima cum, aliquid ex ducimus est placeat, odit modi autem nemo beatae officiis quos nihil! Quasi nihil ipsum, impedit magni ad doloribus. Voluptas deserunt laborum deleniti dolor fuga, beatae eligendi dolore, repudiandae omnis maiores necessitatibus porro modi nisi ipsam, asperiores consectetur quia similique quos quasi error dolorum adipisci hic. Ut velit, voluptates deserunt voluptas ipsa earum nam facilis vel asperiores officia repellat a dolorum itaque quis, neque, reprehenderit soluta. Porro laborum, error doloremque quo quisquam ipsam! Iusto ad quos consectetur nisi eveniet neque minima vitae. Natus sequi aperiam, eius, quas voluptatum blanditiis in adipisci aliquam maxime? Voluptas, eveniet. Dolorem nihil ea voluptate? Culpa architecto hic ad eius corrupti cumque voluptates dolor laboriosam dignissimos deleniti, suscipit omnis, ex alias ea libero corporis debitis provident ab ullam quo, sit totam accusantium sequi. Voluptate aliquid modi distinctio corporis ipsum fugit laboriosam delectus ullam aliquam fuga saepe rem, impedit tenetur tempora ducimus, earum beatae qui expedita consequuntur eligendi ad! Voluptate, laborum. Officiis aut quam vel id inventore assumenda maiores, saepe facilis aliquam aliquid vero corrupti voluptatum consectetur nobis rem dolore unde vitae atque praesentium. Aut voluptatibus sapiente, officiis culpa recusandae? Iusto ut, deserunt accusantium similique, vero fuga, perspiciatis possimus in, veritatis maiores adipisci ad optio illo dicta! Voluptates porro amet esse ipsa quisquam delectus nisi ipsam molestiae tempora facilis necessitatibus, quo, sed minus reprehenderit maiores laudantium et praesentium nemo mollitia officia a ab illo eligendi. Porro assumenda nesciunt aperiam enim quis temporibus dolore non sunt delectus eius molestias ad consequatur atque quibusdam qui eum, voluptatibus possimus, illo voluptatum beatae! Omnis quia, alias quo, similique facere aspernatur necessitatibus labore explicabo aliquid dolor quae fugiat delectus, ex beatae numquam vero. Cumque cum quis magnam aperiam repudiandae est dicta dignissimos eaque voluptatum quas enim voluptas expedita labore commodi soluta, vel culpa alias ex, esse perspiciatis aut ipsa quam. Ipsum, dolores consequatur asperiores cumque? Esse modi aspernatur quibusdam mollitia sed, quas perferendis, optio dignissimos repellendus blanditiis porro, vero minus. Earum pariatur veniam magni quae non deleniti voluptates sequi tempore cumque! Itaque molestias odio commodi quis in ipsum, numquam magnam unde eveniet soluta. Est, debitis. Optio dolores minima, ducimus, quo iste nisi. Sunt iusto, cupiditate, placeat aliquid quia labore asperiores temporibus fugiat ullam quaerat eius, porro adipisci ducimus voluptatum. Nam a ducimus, sit amet incidunt ex. Impedit pariatur, alias, quam suscipit iure odio recusandae cum veniam sapiente commodi voluptatibus quis doloremque quisquam itaque eveniet delectus quidem molestias accusamus praesentium, fuga dolores. Aspernatur laborum, cupiditate eum iusto asperiores, similique et dolores facilis voluptatum officia architecto dicta totam nesciunt nisi pariatur porro soluta consequuntur itaque placeat ipsum eveniet doloribus tenetur at tempore! Reprehenderit similique assumenda fugit perspiciatis praesentium fuga. Expedita cum a aspernatur optio id, unde maxime fugiat sit dignissimos assumenda exercitationem asperiores aperiam laboriosam, hic, quam quas! Nulla mollitia quos fugiat voluptate, ea architecto sed blanditiis quae neque at optio perferendis dignissimos excepturi eos nostrum, facilis amet rerum incidunt quasi maiores necessitatibus facere laborum inventore accusantium libero. Labore sint voluptas illum consequuntur quidem dolores error, magni soluta unde dicta id doloribus possimus quasi temporibus impedit. Maiores ipsa, optio asperiores neque sit sed facilis quibusdam blanditiis nobis sequi ducimus aliquid quam temporibus nisi veritatis repellendus id. Consequuntur cumque, pariatur ipsum deserunt odio possimus, voluptates. Inventore, cumque ratione, rerum quis perspiciatis quae laborum molestias sequi incidunt facere earum ipsam, perferendis ipsa. Reiciendis dolorem ea, neque. Nobis hic nihil quisquam, perspiciatis qui dignissimos mollitia eos sequi. Adipisci autem quis eius quod suscipit officia odit molestiae soluta provident excepturi sed minima ut quisquam tenetur expedita tempore earum, enim? Recusandae, voluptatem, quibusdam? Corporis sint placeat eveniet, itaque quaerat blanditiis obcaecati natus sequi quam ducimus, consectetur aperiam expedita veritatis, voluptatibus! Minus rem blanditiis animi explicabo dicta error asperiores amet est, maxime laboriosam! Alias quaerat necessitatibus quidem dolore eum ex ratione non dolor ullam nam incidunt, nihil debitis cumque similique itaque quia distinctio, esse recusandae et atque. Earum facere eum adipisci unde, autem fugiat, ullam officia perferendis. Nulla soluta assumenda eveniet culpa aliquid provident inventore eum itaque cum aspernatur animi quas delectus consectetur sint est, id, hic sit quis ex temporibus non blanditiis facere quae recusandae. Animi, eos, nam. Aliquid nam corporis rem perspiciatis, ipsum cupiditate, itaque incidunt sunt quos et sint similique voluptates at voluptatum sequi tempora minus suscipit non. Nisi possimus cumque nobis nulla illum numquam voluptas repellendus tempora, earum, in reprehenderit dolore consequuntur modi aut! Aut, voluptatibus perspiciatis quibusdam in eos laborum, dicta beatae, numquam voluptates minima eveniet. Consequatur, quia sunt reprehenderit, recusandae incidunt veniam repudiandae nostrum eligendi tempore odit a, molestias sapiente. Eos modi itaque quibusdam asperiores molestias, mollitia eius minus voluptas ab nostrum quidem autem iusto, labore laboriosam, facilis libero exercitationem! Exercitationem asperiores inventore optio perspiciatis, nobis, ducimus ratione odit. Sapiente, nihil, placeat. Ipsum enim aspernatur sint provident, eum, quidem illum cum blanditiis quas repellat iste. Voluptatibus quaerat obcaecati illo culpa nulla quidem, ullam facere, explicabo molestiae ab nostrum. Doloremque, deserunt, tenetur! Quisquam fuga, soluta voluptates eligendi provident nobis perferendis delectus. Deleniti excepturi consequuntur ut harum, rerum, quas est velit, delectus dolor doloribus rem, quia in mollitia nesciunt enim! Sed exercitationem quam ipsum, id eligendi nihil quae, et incidunt quidem ullam repudiandae odio delectus ipsa deserunt blanditiis recusandae excepturi aut tempore! Laborum repellendus repellat, at in dolor optio, assumenda labore vel ipsam nulla quo laboriosam dolorem dolores facere reprehenderit nisi?', '', '', 1),
(2, 1540155600, 1542402000, 1553493268, '1555670857.jpg', '1-ya-akciya-servis-klinik-v-uzbekistane', '1-я акция "Сервис Клиник" в Узбекистане', '', '', 'В Узбекистане прервые проводится акция «Сервис Клиник», организуемая совместно ISUZU Motors Ltd. и Самаркандским Автомобильным Заводом. \r\nАкция будет проводиться на территории 4 дилерских центров сети ООО «СамАвто». \r\nВ рамках акции «Service Clinic – 2018» будет проведена полная диагностика технического состояния автомобиля специалистами сервисного центра. Акция проводится при поддержке японских специалистов, которые осуществляют контроль за соблюдением стандартов ISUZU по техническому обслуживанию. \r\nТакже участникам акции в подарок будут бесплатно заменены сменные фильтры, масла и смазочные материалы двигателя, коробки передач и заднего моста. Данная акция позволяет автовладельцам оценить качество обслуживания в официальном дилерском центре. \r\nК участию в акции были приглашены владельцы автомобилей ISUZU, которые не являются постоянными клиентами официальных дилерских центров.\r\n\r\nГрафик проведения акции: \r\n22 - 27 октября - ООО «Turtkul Best Auto» (г.Турткуль, Республика Каракалпакстан);\r\n29 октября - 3 ноября - ООО «Kokand Truck-Bus» (г. Коканд, Ферганская область);\r\n5 - 9 ноября - ООО «Parvoz Trans Invest» (Сырдарьинская область)\r\n12 - 17 ноября - ООО «BUXORO AVTOTEXXIZMAT» (г.Бухара)', '', '', 1),
(3, 1546290000, 1577739600, 1570003762, '1570003762.jpg', 'strahovanie-kasko-limit-v-podarok-ot-samavto', 'Страхование "КАСКО Лимит" в подарок от СамАвто ', '', '', 'При покупке автобусов SAZ и грузовых автомобилей на базе шасси ISUZU Вы получаете страховой полис "КАСКО Лимит" на 19 миллионов сумов!\r\n\r\nАкция распространяется на грузовые автомобили со следующими видами кузова:\r\n- бортовой кузов;\r\n- бортовой кузов с тентом;\r\n- фургон (закрытый металлический;\r\n- фургон изотермический;\r\n- фургон с холодильной установкой (рефрижератор).\r\n\r\nМы заботимся о наших клиентах! \r\nПриобретая грузовые автомобили и автобусы, участвующие в акции, Вы сэкономите на страховании и будете спокойны за своё транспортное средство. \r\n\r\nCall-центр +998 78 140 80 00', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cars_slider`
--

CREATE TABLE `cars_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `frames` int(11) NOT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='слайдер разделов авто';

--
-- Дамп данных таблицы `cars_slider`
--

INSERT INTO `cars_slider` (`id`, `category_id`, `frames`, `status`, `image`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`) VALUES
(1, 12, 24, 1, '1559286623.jpg', 'Автобусы', 'Avtobuslar', 'Buses ', 'Мы производим автобусы городского и пригородного типа.  \r\nОсобое место в модельном ряде нашей продукции занимает городской низкопольный автобус SAZ LE60.\r\nВсе автобусы, производимые нашим заводом, оснащены двигателями ISUZU.', '', 'We produce buses for city and intercity transportation of passengers. \r\nSpecial place in our model line has low-floor city bus SAZ LE60.\r\nAll buses, produced in our factory, are equipped with ISUZU engines. '),
(3, 13, 24, 1, '1559287002.jpg', 'Грузовики', '', 'Trucks', 'Модельный ряд грузовых автомобилей включает фургоны разных модификаций, бортовые автомобили, самосвалы.\r\nГрузоподъёмность автомобилей составляет от 4 до 8 тонн.  \r\nДвигатели ISUZU, устанавливаемые на автомобили, в качестве топлива используют дизель или сжатый природный газ (CNG). ', '', 'Model line of trucks consists of vans, cargo and dump trucks. \r\nPayload of trucks varies from 4 000 up to 8 000 kg.  \r\nISUZU engines, installed to the trucks, uses diesel or condensed natural gas (CNG) fuel. '),
(4, 14, 16, 1, '1562674903.jpg', 'Спецтехника', '', '', 'Также мы производим специализированную технику: пожарные машины, мусоровозы, автомобили скорой медицинской помощи, телескопические вышки, автомобили для коммунального хозяйства. В модельном ряде есть и линейка автомобилей с цистернами предназначенными для транспортировки пищевых жидкостей, технической воды, осуществления поливочных или ассенизационных работ.  ', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `car_cabine`
--

CREATE TABLE `car_cabine` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='тип кабины одноместная многоместная и тд';

-- --------------------------------------------------------

--
-- Структура таблицы `car_capacity`
--

CREATE TABLE `car_capacity` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='грузоподъемность';

-- --------------------------------------------------------

--
-- Структура таблицы `car_direct`
--

CREATE TABLE `car_direct` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `value` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='направление загрузки';

-- --------------------------------------------------------

--
-- Структура таблицы `car_options`
--

CREATE TABLE `car_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `car_id` int(11) UNSIGNED DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='опции авто';

-- --------------------------------------------------------

--
-- Структура таблицы `car_power`
--

CREATE TABLE `car_power` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `value` float UNSIGNED NOT NULL DEFAULT '0' COMMENT 'мощность двигателя',
  `engine` varchar(64) NOT NULL COMMENT 'марка двигателя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='мощности двигателей';

-- --------------------------------------------------------

--
-- Структура таблицы `car_type`
--

CREATE TABLE `car_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='типы авто для данного бортовой, рефрежератор, самосвал и тд';

-- --------------------------------------------------------

--
-- Структура таблицы `car_volume`
--

CREATE TABLE `car_volume` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `value` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='объем платформы';

-- --------------------------------------------------------

--
-- Структура таблицы `car_wheels`
--

CREATE TABLE `car_wheels` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='колесная формула';

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='категории для локализации';

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`) VALUES
(1, 0, NULL, 'Электрика', NULL, NULL, 'electrika', NULL, NULL),
(2, 0, NULL, 'Кузов', NULL, NULL, 'kuzov', NULL, NULL),
(3, 0, NULL, 'Двигатель', '', '', 'dvigatel', '', ''),
(4, 0, NULL, 'Салон', '', '', 'salon', '', ''),
(5, 2, NULL, 'Подвеска', '', '', 'podveska', '', ''),
(6, 2, NULL, 'Осветительные приборы', '', '', 'osvetitelnye-pribory', '', ''),
(7, 4, NULL, 'ЗИП комплект', '', '', 'zip-komplekt', '', ''),
(8, 3, NULL, 'Система выпуска выхлопных газов', '', '', 'sistema-vypuska-vyhlopnyh-gazov', '', ''),
(9, 4, NULL, 'Приборы', '', '', 'pribory', '', ''),
(10, 4, NULL, 'Рулевое управления', '', '', 'rulevoe-upravleniya', '', ''),
(11, 4, NULL, 'Система открывания дверей', '', '', 'sistema-otkryvaniya-dverey', '', ''),
(12, 2, NULL, 'Зеркала', '', '', 'zerkala', '', ''),
(13, 2, NULL, 'Замки', '', '', 'zamki', '', ''),
(14, 1, NULL, 'Система стеклоочистителя', '', '', 'sistema-stekloochistitelya', '', ''),
(15, 1, NULL, 'Вентиляция и кондицонер', '', '', 'ventilyaciya-i-kondiconer', '', ''),
(16, 2, NULL, 'Система тормоза', '', '', 'sistema-tormoza', '', ''),
(17, 2, NULL, 'Детали багажа', '', '', 'detali-bagazha', '', ''),
(18, 1, NULL, 'Система отопления салона', '', '', 'sistema-otopleniya-salona', '', ''),
(19, 2, NULL, 'Профили', '', '', 'profili', '', ''),
(20, 2, NULL, 'Резина техничекие изделия', '', '', 'rezina-tehnichekie-izdeliya', '', ''),
(21, 2, NULL, 'Детали крепления рамы шасси', '', '', 'detali-krepleniya-ramy-shassi', '', ''),
(22, 2, NULL, 'Метизная группа', '', '', 'metiznaya-gruppa', '', ''),
(23, 2, NULL, 'Штампованные детали кабины ', '', '', 'shtampovannye-detali-kabiny', '', ''),
(24, 3, NULL, 'Система подачи топлива', '', '', 'sistema-podachi-topliva', '', ''),
(25, 3, NULL, 'Система охлаждения двигателя', '', '', 'sistema-ohlazhdeniya-dvigatelya', '', ''),
(26, 2, NULL, 'Педали', '', '', 'pedali', '', ''),
(27, 3, NULL, 'Карданная передача', '', '', 'kardannaya-peredacha', '', ''),
(33, 4, NULL, 'Салон', '', '', 'salons', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `categories_cars`
--

CREATE TABLE `categories_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='категория для типовк авто' ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `categories_cars`
--

INSERT INTO `categories_cars` (`id`, `parent_id`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`) VALUES
(12, 0, NULL, 'Автобусы', '', '', '', '', ''),
(13, 0, NULL, 'Грузовые автомобили', '', '', '', '', ''),
(14, 0, NULL, 'Спецтехника', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `categories_parts`
--

CREATE TABLE `categories_parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='категория для запчастей' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(6) DEFAULT NULL,
  `name_ru` varchar(24) DEFAULT NULL,
  `name_uz` varchar(24) DEFAULT NULL,
  `name_en` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Города\r\n';

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `region_id`, `name_ru`, `name_uz`, `name_en`) VALUES
(1, 1, 'Ахунбабаев', NULL, NULL),
(2, 1, 'Андижан', NULL, NULL),
(3, 1, 'Асака', NULL, NULL),
(4, 1, 'Ханабад', NULL, NULL),
(5, 1, 'Ходжаабад', NULL, NULL),
(6, 1, 'Кургантепа', NULL, NULL),
(7, 1, 'Пахтаабад', NULL, NULL),
(8, 1, 'Пайтуг', NULL, NULL),
(9, 1, 'Шахрихан', NULL, NULL),
(10, 2, 'Алат', NULL, NULL),
(11, 2, 'Бухара', NULL, NULL),
(12, 2, 'Галаасия', NULL, NULL),
(13, 2, 'Газли', NULL, NULL),
(14, 2, 'Гиждуван', NULL, NULL),
(15, 2, 'Каган', NULL, NULL),
(16, 2, 'Каракуль', NULL, NULL),
(17, 2, 'Ромитан', NULL, NULL),
(18, 2, 'Шафиркан', NULL, NULL),
(19, 2, 'Вабкент', NULL, NULL),
(20, 3, 'Даштобод', NULL, NULL),
(21, 3, 'Дустлик', NULL, NULL),
(22, 3, 'Джизак', NULL, NULL),
(23, 3, 'Гагарин', NULL, NULL),
(24, 3, 'Галляарал', NULL, NULL),
(25, 3, 'Марджанбулак', NULL, NULL),
(26, 3, 'Пахтакор', NULL, NULL),
(27, 4, 'Беруни', NULL, NULL),
(28, 4, 'Бустан', NULL, NULL),
(29, 4, 'Чимбай', NULL, NULL),
(30, 4, 'Ходжейли', NULL, NULL),
(31, 4, 'Кунград', NULL, NULL),
(32, 4, 'Мангит', NULL, NULL),
(33, 4, 'Муйнак', NULL, NULL),
(34, 4, 'Нукус', NULL, NULL),
(35, 4, 'Шуманай', NULL, NULL),
(36, 4, 'Тахиаташ', NULL, NULL),
(37, 4, 'Турткуль', NULL, NULL),
(38, 5, 'Бешкент', NULL, NULL),
(39, 5, 'Чиракчи', NULL, NULL),
(40, 5, 'Дехканабад', NULL, NULL),
(41, 5, 'Гузар', NULL, NULL),
(42, 5, 'Камаши', NULL, NULL),
(43, 5, 'Карши', NULL, NULL),
(44, 5, 'Касан', NULL, NULL),
(45, 5, 'Касби', NULL, NULL),
(46, 5, 'Китаб', NULL, NULL),
(47, 5, 'Миришкор', NULL, NULL),
(48, 5, 'Мубарек', NULL, NULL),
(49, 5, 'Нишан', NULL, NULL),
(50, 5, 'Шахрисабз', NULL, NULL),
(51, 5, 'Талимарджан', NULL, NULL),
(52, 5, 'Яккабаг', NULL, NULL),
(53, 6, 'Кызылтепа', NULL, NULL),
(54, 6, 'Навои', NULL, NULL),
(55, 6, 'Нурата', NULL, NULL),
(56, 6, 'Учкудук', NULL, NULL),
(57, 6, 'Янгиарат', NULL, NULL),
(58, 6, 'Зарафшан', NULL, NULL),
(59, 7, 'Чартак', NULL, NULL),
(60, 7, 'Чуст', NULL, NULL),
(61, 7, 'Хакулабад', NULL, NULL),
(62, 7, 'Наманган', NULL, NULL),
(63, 7, 'Пап', NULL, NULL),
(64, 7, 'Туракурган', NULL, NULL),
(65, 7, 'Учкурган', NULL, NULL),
(66, 8, 'Акташ', NULL, NULL),
(67, 8, 'Булунгур', NULL, NULL),
(68, 8, 'Чилек', NULL, NULL),
(69, 8, 'Джамбай', NULL, NULL),
(70, 8, 'Джума', NULL, NULL),
(71, 8, 'Иштыхан', NULL, NULL),
(72, 8, 'Каттакурган', NULL, NULL),
(73, 8, 'Нурабад', NULL, NULL),
(74, 8, 'Самарканд', NULL, NULL),
(75, 8, 'Ургут', NULL, NULL),
(76, 8, 'Зиадин', NULL, NULL),
(77, 9, 'Байсун', NULL, NULL),
(78, 9, 'Денау', NULL, NULL),
(79, 9, 'Джакурган', NULL, NULL),
(80, 9, 'Кизирик', NULL, NULL),
(81, 9, 'Кумкурган', NULL, NULL),
(82, 9, 'Музрабад', NULL, NULL),
(83, 9, 'Шаргунь', NULL, NULL),
(84, 9, 'Шерабад', NULL, NULL),
(85, 9, 'Шурчи', NULL, NULL),
(86, 9, 'Термез', NULL, NULL),
(87, 10, 'Бахт', NULL, NULL),
(88, 10, 'Гулистан', NULL, NULL),
(89, 10, 'Ширин', NULL, NULL),
(90, 10, 'Сырдарья', NULL, NULL),
(91, 10, 'Янгиер', NULL, NULL),
(92, 11, 'Ахангаран', NULL, NULL),
(93, 11, 'Аккурган', NULL, NULL),
(94, 11, 'Алмалык', NULL, NULL),
(95, 11, 'Ангрен', NULL, NULL),
(96, 11, 'Алмалык', NULL, NULL),
(97, 11, 'Ангрен', NULL, NULL),
(98, 11, 'Бекабад', NULL, NULL),
(99, 11, 'Бука', NULL, NULL),
(100, 11, 'Чиназ', NULL, NULL),
(101, 11, 'Чирчик', NULL, NULL),
(102, 11, 'Дустабад', NULL, NULL),
(103, 11, 'Эшангузар', NULL, NULL),
(104, 11, 'Газалкент', NULL, NULL),
(105, 11, 'Гульбахор', NULL, NULL),
(106, 11, 'Келес', NULL, NULL),
(107, 11, 'Кибрай', NULL, NULL),
(108, 11, 'Красногорск', NULL, NULL),
(109, 11, 'Паркент', NULL, NULL),
(110, 11, 'Пскент', NULL, NULL),
(111, 11, 'Ташкент', NULL, NULL),
(112, 11, 'Тойтепа', NULL, NULL),
(113, 11, 'Янгибазар', NULL, NULL),
(114, 11, 'Янгиюль', NULL, NULL),
(115, 11, 'Зафар', NULL, NULL),
(116, 12, 'Бешарык', NULL, NULL),
(117, 12, 'Фергана', NULL, NULL),
(118, 12, 'Коканд', NULL, NULL),
(119, 12, 'Кува', NULL, NULL),
(120, 12, 'Кувасай', NULL, NULL),
(121, 12, 'Маргилан', NULL, NULL),
(122, 12, 'Риштан', NULL, NULL),
(123, 12, 'Хамза', NULL, NULL),
(124, 13, 'Багат', NULL, NULL),
(125, 13, 'Багат', NULL, NULL),
(126, 13, 'Гурлен', NULL, NULL),
(127, 13, 'Питнак', NULL, NULL),
(128, 13, 'Ургенч', NULL, NULL),
(129, 13, 'Ханка', NULL, NULL),
(130, 13, 'Хива', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) NOT NULL,
  `name_ru` varchar(128) DEFAULT NULL,
  `name_uz` varchar(128) DEFAULT NULL,
  `name_en` varchar(128) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL,
  `address_ru` varchar(512) DEFAULT NULL,
  `address_uz` varchar(512) DEFAULT NULL,
  `address_en` varchar(512) DEFAULT NULL,
  `days_ru` varchar(512) DEFAULT NULL,
  `days_uz` varchar(512) DEFAULT NULL,
  `days_en` varchar(512) DEFAULT NULL,
  `doljnost_ru` varchar(255) DEFAULT NULL,
  `doljnost_uz` varchar(255) DEFAULT NULL,
  `doljnost_en` varchar(255) DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `site` varchar(512) DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='о компании - руководство';

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `region_id`, `name_ru`, `name_uz`, `name_en`, `text_ru`, `text_uz`, `text_en`, `address_ru`, `address_uz`, `address_en`, `days_ru`, `days_uz`, `days_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `email`, `site`, `image`, `status`) VALUES
(1, 0, 'Иванов Иван иванович', '', '', 'Директор', '', '', 'wqeeryty', '', '', '+998-91-364\r\n+998-90-365', '', '', 'Директор', '0', '0', '234234', 'wer@werer.ww', NULL, '1542889516.png', 1),
(2, 0, 'Петров Петр Петрович', '', '', '', '', '', 'erq', '', '', 'wer', '', '', 'Зам. Директора', '', '', '', '', NULL, '1542889505.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `company_users`
--

CREATE TABLE `company_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'для подчинения',
  `doljnost_id` int(10) UNSIGNED DEFAULT '0' COMMENT 'должность',
  `doljnost_ru` varchar(255) DEFAULT NULL,
  `doljnost_uz` varchar(255) DEFAULT NULL,
  `doljnost_en` varchar(255) DEFAULT NULL,
  `type` tinyint(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'тип пользователя 0-работник 5- менеджер 9-директор',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'вкл или откл',
  `name_ru` varchar(64) DEFAULT NULL,
  `name_uz` varchar(64) DEFAULT NULL,
  `name_en` varchar(64) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `site` varchar(64) DEFAULT NULL,
  `days_ru` varchar(512) DEFAULT NULL,
  `days_uz` varchar(512) DEFAULT NULL,
  `days_en` varchar(512) DEFAULT NULL,
  `contacts` varchar(512) DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='сотрудники компании \r\n';

--
-- Дамп данных таблицы `company_users`
--

INSERT INTO `company_users` (`id`, `company_id`, `parent_id`, `doljnost_id`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `type`, `status`, `name_ru`, `name_uz`, `name_en`, `phone`, `email`, `site`, `days_ru`, `days_uz`, `days_en`, `contacts`, `image`) VALUES
(3, 0, 0, 0, 'Генеральный директор', 'Bosh Director', 'General Director', 1, 1, 'Юлдашев Ульмас Давлатович', 'Yuldashev Ulmas Davlatovich', 'YULDASHEV Ulmas', '(+998 78) 140 64 64', 'info@samauto.uz', '', 'среда 10:00-12:00 (на заводе, в г. Самарканд); понедельник 10:00-12:00 (в Ташкентском офисе)', '', '', '2222', '1560947470.jpg'),
(4, 0, 3, 0, 'Заместитель генерального директора', 'Bosh direktor o\'rinbosari', 'Deputy General Director (Production & Planning)', 1, 1, 'Ганиев Муртазо Мустафакулович', 'Ganiev Murtazo Mustafakulovich ', 'GANIEV Murtazo ', '(+998 66) 230 87 00', 'saminfo@samauto.uz', '', 'понедельник-вторник 10:00-12:00 (на заводе, в г. Самарканд)', '', '', '23434', '1560947565.jpg'),
(8, 0, 3, 0, 'Заместитель генерального директора (Технический директор)', 'Bosh Direktor o\'rinbosari', 'Deputy General Director (Technical Director)', 1, 1, 'Кобилов Хусен Самиевич', 'Kobilov Husen', 'KOBILOV Khusen', '(+998 66) 230 87 00', 'saminfo@samauto.uz', '', 'четверг 10:00-12:00 (на заводе, в г. Самарканд)', '', '', NULL, '1560947561.jpg'),
(9, 0, 3, 0, 'Заместитель генерального директора', 'Bosh direktor o\'rinbosari', 'Deputy General Director (Financial Director)', 1, 1, 'Умаров Бахтиер Шавкатович', 'Umarov Baxtiyor Shavkatovich', 'UMAROV Bakhtiyor', '(+998 66) 230 87 00', 'saminfo@samauto.uz', '', 'пятница 10:00-12:00 (на заводе, в г. Самарканд)', '', '', NULL, '1560947555.jpg'),
(10, 0, 3, 0, 'Заместитель генерального директора', 'Bosh direktor o\'rinbosari', 'Deputy General Director (Marketing & Sales)', 1, 1, 'Ярашев Илхомжон Туркманбоевич', 'Yarashev Ilhomjom Turkmanboevich', 'YARASHEV Ilkhomjon', '(+998 78) 140 64 64', 'info@samauto.uz', '', 'вторник-пятница 10:00-12:00 (в Ташкентском офисе)', '', '', NULL, '1560947547.jpg'),
(11, 0, 10, 0, 'Директор Департамента стратегического планирования и маркетинга ', '', 'Head of Strategic Planning and Marketing Department', 1, 1, 'Исраилова Мунисхон Рустамовна', 'Israilova Munisxon Rustamovna', 'ISRAILOVA Muniskhon', '(+998 78) 140 64 64', 'marketing@samauto.uz', '', '', '', '', NULL, '1560947687.jpg'),
(13, 0, 10, 0, 'Директор Департамента продаж и послепродажного обслуживания', '', 'Head of Sales and After-sales Service Department', 1, 1, 'Сайдахмедов Акмальхон Бахромович', 'Saydaxmedov Akmalxon Baxromovich', 'SAYDAKHMEDOV Akmal ', '(+998 78) 140 64 64', 'info@samauto.uz', '', '', '', '', NULL, '1560947527.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `dillers`
--

CREATE TABLE `dillers` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `link_ru` varchar(255) DEFAULT NULL,
  `link_uz` varchar(255) DEFAULT NULL,
  `link_en` varchar(255) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL,
  `address_ru` varchar(512) DEFAULT NULL,
  `address_uz` varchar(512) DEFAULT NULL,
  `address_en` varchar(512) DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `site` varchar(128) DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  `file_cert` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='диллеры';

--
-- Дамп данных таблицы `dillers`
--

INSERT INTO `dillers` (`id`, `region_id`, `status`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`, `text_ru`, `text_uz`, `text_en`, `address_ru`, `address_uz`, `address_en`, `phone`, `email`, `site`, `image`, `file_cert`) VALUES
(1, 16, 1, 'ТОО «YZ TRADE COMPANY»', '', '', 'too-yz-trade-company', '', '', 'Продажа автобусов и запасных частей ', '', '', 'Республика Казахстан, г. Алматы, пр.Суюнбая, 211', '', '', '+7 (777) 017-18-14', 'isuzu-truckandbus@mail.ru', '', '1553065351.jpg', ''),
(3, 1, 1, 'ООО "Андижон Авто Ишонч"', '', '', 'ooo-andizhon-avto-ishonch', '', '', 'Продажа автомобилей, сервисное обслуживание, ремонт автомобилей, 	запасные части', '', '', 'г. Андижан, ул. Индустриальная, 4', '', '', '(998 93) 410-15-15', 'andijanirmash@mail.ru', '', '1563183769.jpg', ''),
(4, 11, 1, 'ООО "Grand motors"', '', '', 'ooo-grand-motors', '', '', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', 'г. Ташкент, Мирадабский р-н, ул. Янги Куйлюк, 28', '', '', '(+998 71) 290-06-95', 'isuzu-uz@mail.ru', 'www.grandmotors.uz', '1554296482.jpg', 'banner1.jpg'),
(5, 11, 1, 'ООО “НУРАФШОН АВТОЦЕНТР”', '', '', 'ooo-nurafshon-avtocentr', '', '', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', 'Ташкенткий область, город Нурафшон, ул. Ташкент йули, Бирлик МФЙ', '', '', ' +99899 817 77 27', 'fyoldoshev@list.ru.', '', '1554362152.jpg', ''),
(16, 12, 1, 'ООО "ФерганаСам Автотех Сервис"', '', '', 'ooo-ferganasam-avtoteh-servis', '', '', '', '', '', 'г. Фергана, ул. Фергана, 6А', '', '', '(+998 90) 561 44 33', 'fergana.samauto@mail.ru', 'rty123', NULL, ''),
(17, 15, 1, 'ОсОО "ДТ Техник"', '', '', 'osoo-dt-tehnik', '', '', 'ОсОО "ДТ Техник"', '', '', 'Кыргызская Республика, г. Бишкек, ул. Садыгалиева, 1А', '', '', '+996 555 96 95 51', 'info@lkwservice.kg', '', '1553066991.jpg', ''),
(18, 1, 1, ' ООО "Сулим Авто Созлаш"', '', '', 'ooo-sulim-avto-sozlash', '', '', 'Продажа автомобилей, сервисное обслуживание, ремонт автомобилей, 	запасные части', '', '', 'Андижан р-н, ул. Асака Йули д 123', '', '', '(+998 90) 210-90-55', 'autosozlash@mail.ru', '', '1563189216.jpg', ''),
(19, 11, 1, 'ООО "Imagine"', '', '', 'ooo-imagine', '', '', 'Продажа автомобилей, сервисное обслуживание, ремонт автомобилей, запасные части', '', '', 'г. Ташкент, Юнусабадский район, ул. И.Ахмада, 12', '', '', '(+998 71) 231-72-51, (+998 93) 502-17-05', 'info@imagine-group.uz', 'www.imagine-group.uz', '1557897860.jpg', ''),
(20, 11, 1, 'ООО "Mega Oil Biznes"', '', '', 'ooo-mega-oil-biznes', '', '', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', 'г. Ташкент, ул. Янги Тошкент Халка Йули, 120', '', '', '(+998 97) 428- 27-04', 'megaoilbiznes@mail.ru', '', '1563269853.jpg', ''),
(21, 11, 1, 'OOO "FLAGMAN TRUCKS BUSINESS"', '', '', 'ooo-flagman-trucks-business', '', '', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', 'г. Ташкент, Сергелийский р-н, ул. Сайфи Олимова, д. 24', '', '', '(+998 90) 951-00-24', '', 'www.flagman-avto.uz', '1556012297.jpg', ''),
(26, 11, 1, 'ООО "TURON AVTO LEASING"', '', '', 'ooo-turon-avto-leasing', '', '', '', '', '', 'Ташкентская область, Зангиотинский р-н, ул. беларик 713', '', '', '(+998 90) 229-21-73', 'turon_avto_leasing@mail.ru', '', '1563189268.jpg', ''),
(27, 11, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, ''),
(28, 11, 1, 'OOO "LION MOTORS"', '', '', 'ooo-lion-motors', '', '', '', '', '', 'Ташкентская область, г. Ангрен, ул. Ахангаран, 27а', '', '', '(+998 97) 760-57-17', '', 'www.lionmotors.uz', '1563188327.jpg', ''),
(29, 2, 1, 'ООО "TRUCK SERVICE CENTER"', '', '', 'ooo-truck-service-center', '', '', '', '', '', 'Бухарская область, г. Бухара, ул. гиждуванская 69', '', '', '(+998 90) 298-99-19', '', '', NULL, ''),
(30, 2, 1, 'ООО "Автоленд-Сервис"', '', '', 'ooo-avtolend-servis', '', '', '', '', '', 'г. Каган ул. Бухарская, шоссе 17', '', '', '(+365) 228-78-24', 'avtolend-servis@mail.ru', '', '1563184051.jpg', ''),
(31, 2, 1, 'ООО "BUXARA AVTO MAGNAT"', '', '', 'ooo-buxara-avto-magnat', '', '', '', '', '', 'г. Бухара, ул. Саноатчилар и Каганское шоссе', '', '', '(+998 97) 304-07-47', '', '', NULL, ''),
(32, 3, 1, 'ООО "Asia Auto Trade"', '', '', 'ooo-asia-auto-trade', '', '', '', '', '', 'г.Джизак, ул.Промзона - Б', '', '', '(+998 90) 298-99-19', 'asiaauto.trade@mail.ru', '', '1563185154.png', ''),
(33, 5, 1, 'OOO "Muborak - Yaguar"', '', '', 'ooo-muborak---yaguar', '', '', '', '', '', 'Мубарекский р-он, 1 м/р Промзона 4', '', '', '(+998 90) 444-00-55', 'yaguar_5656@mail.ru', '', NULL, ''),
(34, 5, 1, 'ООО "Автосалтанат Сервис"', '', '', 'ooo-avtosaltanat-servis', '', '', '', '', '', 'г. Карши, ул. А.Навои, 5', '', '', '(+998 97) 488-06-05', 'avtosaltanatservis@mail.ru', '', NULL, ''),
(35, 6, 1, 'ООО "Avto Servis Sakura"', '', '', 'ooo-avto-servis-sakura', '', '', '', '', '', 'г.Навои, поселок Спутник, ул.Победа, 818', '', '', '(+436) 226-44-45', 'avto_navoi@mail.ru', '', '1563189308.jpg', ''),
(36, 6, 1, 'ООО «Asia Auto Trak Bus Service»', '', '', 'ooo-asia-auto-trak-bus-service', '', '', '', '', '', 'г.Навои , ул Южная д 6', '', '', '(+998 97) 911-59-99', 'navoi-truck-bus@mail.ru', '', NULL, ''),
(37, 7, 1, 'ООО "Avto Markaz Fayz"', '', '', 'ooo-avto-markaz-fayz', '', '', '', '', '', 'г.Наманган, ул. Косонсой д. 41', '', '', '(+998 90) 561-44-33', 'sherzod-73@mail.ru', '', '1563184385.jpg', ''),
(38, 7, 1, 'OOO "SERVICE CENTER NAMANGAN"', '', '', 'ooo-service-center-namangan', '', '', '', '', '', 'г. Наманган, ул. Кукумбай 5', '', '', '(+998 91) 357-05-55', 'i_kamaz_center@mail.ru', '', '1563272594.jpg', ''),
(39, 8, 1, 'ООО "Prof Sale Auto Diesel"', '', '', 'ooo-prof-sale-auto-diesel', '', '', '', '', '', 'г.Самарканд, ул.Узбекистан 20', '', '', '(+366) 233-05-14', 'profsaleautodiesel@mail.ru', '', '1563184988.jpg', ''),
(40, 8, 1, 'ООО"Авто ЗАЗ"', '', '', 'oooavto-zaz', '', '', '', '', '', 'г. Самарканд, узбекский тракт, 3', '', '', '(+366) 234-48-34', 'avtozaz.uz@mail.ru', '', '1563184472.jpg', ''),
(41, 9, 1, 'ООО \'\'Файз-транс-инвест"', '', '', 'ooo-fayz-trans-invest', '', '', '', '', '', 'г. Термез, Ибн Сино ул.Зерновая, 1', '', '', '(+998 90) 247-43-34', 'fayz-trans-invest@mail.ru', '', '1563184687.jpg', ''),
(42, 10, 1, 'ООО " Парвоз Транс Инвест"', '', '', 'ooo--parvoz-trans-invest', '', '', '', '', '', 'г.Гулистан, ул. Тошкент 49', '', '', '(+998 90) 943-40-05', 'parvoztrans@list.ru', '', NULL, ''),
(43, 12, 1, 'ООО "Kokand Truck Bus"', '', '', 'ooo-kokand-truck-bus', '', '', '', '', '', 'г. Коканд, ул. Массив А.Бутаев', '', '', '(+998 98) 558-85-15', 'kokandtrans@mail.ru', '', '1563188945.jpg', ''),
(44, 12, 1, 'ООО "ФерганаСам Автотех Сервис"', '', '', 'ooo-ferganasam-avtoteh-servis', '', '', '', '', '', 'г. Фергана, ул. Фергана 6А', '', '', '(+998 90) 274-05-44', 'fergana@samauto.uz', '', NULL, ''),
(45, 12, 1, ' ООО "Marg\'ilon Samavto Servis Centre"', '', '', 'ooo-margilon-samavto-servis-centre', '', '', '', '', '', 'г. Маргилан ул.Саккокий 7', '', '', '(+998 91) 123-45-75', 'margilan.samauto@gmail.com', '', NULL, ''),
(46, 13, 1, 'ЧП "Амин - Мулла"', '', '', 'chp-amin---mulla', '', '', '', '', '', 'г. Ургенч, ул. Файазова, 10', '', '', '(+998 62) 229-41-51', 'aminmulla@mail.ru', '', '1563188814.jpg', ''),
(47, 4, 1, 'ООО "Nukus Isuzu Servis"', '', '', 'ooo-nukus-isuzu-servis', '', '', '', '', '', 'г. Нукус, ул. Абдамбетова', '', '', '(+61) 780-02-95', 'omirbayturdyev@rambler.ru', '', '1563271002.jpg', ''),
(48, 4, 1, 'ООО "TURTKUL BEST AUTO"', '', '', 'ooo-turtkul-best-auto', '', '', '', '', '', 'г.Турккул ул.Беруни', '', '', '(+998 95) 303-45-55', 'turtkulbestauto@mail.ru', '', '1563272332.jpg', ''),
(49, 4, 1, 'OOO "QQ AUTO INVEST"', '', '', 'ooo-qq-auto-invest', '', '', '', '', '', 'г. Нукус, ул. Каракалпакстан д 25, кв 2', '', '', '(+998 95) 601-88-11', 'qq.autoinvest@mail.ru', '', NULL, ''),
(50, 18, 1, 'Urban Motors ', 'Urban Motors ', 'Urban Motors', 'urban-motors', 'urban-motors', 'urban-motors', '', '', '', 'Республика Грузия, г. Тбилиси, 0131, поворот на Ботанический институт, 8-км аллеи Агмашенебели ', '', '8-KM. D.AGMASHENEBELI ALLEY, BOTANIC INSTITUTE TURN, 0131 TBILISI, GEORGIA', '', 'info@urbanmotors.ge', 'http://urbanmotors.ge', '1559024986.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `dillers_office`
--

CREATE TABLE `dillers_office` (
  `id` int(10) UNSIGNED NOT NULL,
  `diller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `username_ru` varchar(255) DEFAULT NULL,
  `username_uz` varchar(255) DEFAULT NULL,
  `username_en` varchar(255) DEFAULT NULL,
  `doljnost_ru` varchar(255) DEFAULT NULL,
  `doljnost_uz` varchar(255) DEFAULT NULL,
  `doljnost_en` varchar(255) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL,
  `phones` varchar(255) DEFAULT NULL,
  `fax` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `site` varchar(128) DEFAULT NULL,
  `lat` varchar(32) DEFAULT NULL,
  `lon` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='офисы диллеров' ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `dillers_office`
--

INSERT INTO `dillers_office` (`id`, `diller_id`, `status`, `title_ru`, `title_uz`, `title_en`, `username_ru`, `username_uz`, `username_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `text_ru`, `text_uz`, `text_en`, `phones`, `fax`, `email`, `site`, `lat`, `lon`) VALUES
(1, 1, 1, 'ТОО "YZ Trade Company"', '', '', 'Золотарёв Юрий', '', '', 'Директор', '', '', '', 'Республика Казахстан, г. Алматы, пр.Суюнбая, 211', '', '', '+7 (777) 017-18-14', '', 'isuzu-truckandbus@mail.ru', '', '43.315066', '76.9551419'),
(4, 3, 1, 'ООО "Андижон Авто Ишонч"', '', '', 'Базаров Ахмаджон Исакович', '', '', 'Руководитель предприятия', '', '', '(998 93) 410-15-15', '', '', '', '(+998 98) 570-72-22', '', 'andijanirmash@mail.ru', '', '42.3012', '69.02356'),
(5, 4, 1, 'ООО "Grand motors"', '', '', 'Шерипбаев Умидбек', '', '', 'Руководитель предприятия', '', '', '(+998 71) 290-06-95', 'Продажа автомобилей, сервисное обслуживание, ремонт автомобилей, запасные части', '', '', ' (+998 99) 883-10-02, (+998 90) 176-18-85', '', 'isuzu-uz@mail.ru', 'www.grandmotors.uz', '42.3012', '69.02356'),
(6, 5, 1, 'ООО “НУРАФШОН АВТОЦЕНТР”', '', '', 'ЮЛДОШЕВ ФАРРУХ МАХМУДЖОН УГЛИ', '', '', 'Менеджер по продажам автомобилей', '', '', '+998998177727', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', '+998909369966', '', 'fyoldoshev@list.ru.', '', '42.3012', '69.02356'),
(9, 8, 0, 'erkjrrkj', '', '', 'juyhjg', '', '', 'фыыыввыыыввы', '', '', '', 'tttttt', '', '', '', '', '', '', '42.3012', '69.02356'),
(16, 17, 1, 'ОсОО "ДТ Техник" (LKW Service)', '', '', 'Бахаутдинов Бахадыр ', '', '', 'Руководитель отдела продаж', '', '', '', 'Кыргызская Республика, г. Бишкек, ул. Садыгалиева, 1А', '', '', '+996 555 96 95 51', '', 'info@lkwservice.kg', '', '42.867608', '74.524931'),
(18, 20, 1, 'ООО "Mega Oil Biznes"', '', '', 'Исламов Окилхон Зарибжанович', '', '', 'Руководитель предприятия', '', '', '(+998 97) 428- 27-04', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', '(+998 97) 428-27-08 ', '', 'megaoilbiznes@mail.ru', '', '', ''),
(19, 21, 1, 'OOO "FLAGMAN TRUCKS BUSINESS"', '', '', 'Хидоятов Низомжон Рахимович', '', '', 'Руководитель предприятия', '', '', '(+998 90) 951-00-24', 'Продажа автомобилей,сервисное обслуживание,ремонт автомобилей,запасные частей', '', '', '', '', '', 'www.flagman-avto.uz', '69.02356', '42.3012'),
(20, 23, 0, 'Офис дилера Test 1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 19, 1, 'ООО "Imagine"', '', '', 'Исаходжаев Уткир Бахтиярович', '', '', '', '', '', '(+998 71) 231-72-51', '', '', '', '(+998 93) 502-17-05', '', 'info@imagine-group.uz', 'www.imagine-group.uz', '', ''),
(23, 26, 1, 'ООО "TURON AVTO LEASING"', '', '', 'Мухаммедов Альберт Сарабекович', '', '', 'Руководитель предприятия', '', '', '(+998 90) 229-21-73', '', '', '', '', '', 'turon_avto_leasing@mail.ru', '', '', ''),
(24, 27, 1, 'OOO "NURAFSHON AVTOCENTR"', '', '', 'Шамсиев Музаффар Мукимджанович', '', '', 'Руководитель предприятия', '', '', '(+998 71) 232-34-55', '', '', '', '(+ 998 90) 323-27-00', '', 'nurafshon_avtocentr@mail.ru', '', '', ''),
(25, 28, 1, 'OOO "LION MOTORS"', '', '', 'Джахангиров Равшан Рустамович', '', '', 'Руководитель предприятия', '', '', '(+998 97) 760-57-17', '', '', '', '', '', '', 'www.lionmotors.uz', '', ''),
(26, 18, 1, ' ООО "Сулим Авто Созлаш"', '', '', 'Кичикбеков Неъматилло Махмудович', '', '', 'Руководитель предприятия', '', '', '(+998 90) 210-90-55', '', '', '', '(+998 98) 570-06-04', '', 'auto@mail.ru', '', '', ''),
(27, 29, 1, 'ООО "TRUCK SERVICE CENTER"', '', '', 'Хабибов Т.И.', '', '', 'Руководитель предприятия', '', '', '(+998 90) 298-99-19', '', '', '', '(+998 91) 409-11-22', '', '', '', '', ''),
(28, 30, 1, 'ООО "Автоленд-Сервис"', '', '', 'Эргашев Эльер Бахтиерович', '', '', 'Руководитель предприятия', '', '', '(+365) 228-78-24', '', '', '', '(+998 97) 301-33-66', '', 'avtolend-servis@mail.ru', '', '', ''),
(29, 31, 1, 'ООО "BUXARA AVTO MAGNAT"', '', '', 'Камолов Юнус Ярашевич', '', '', 'Руководитель предприятия', '', '', '(+998 97) 304-07-47', '', '', '', '', '', '', '', '', ''),
(30, 32, 1, 'ООО "Asia Auto Trade"', '', '', 'Мавлонов Озод', '', '', '', '', '', '(+998 90) 298-99-19', '', '', '', '(+998 90) 229-70-55', '', 'asiaauto.trade@mail.ru', '', '', ''),
(31, 33, 1, 'OOO "Muborak - Yaguar"', '', '', 'Абдуллаев Шохрух', '', '', 'Руководитель предприятия', '', '', '(+998 90) 444-00-55', '', '', '', '(+998 94) 337-65-25', '', 'yaguar_5656@mail.ru', '', '', ''),
(32, 34, 1, 'ООО "Автосалтанат Сервис"', '', '', 'Шарифов Бобир Миржанович', '', '', 'Руководитель предприятия', '', '', '(+998 97) 488-06-05', '', '', '', '(+998 94) 329-07-07', '', 'avtosaltanatservis@mail.ru', '', '', ''),
(33, 35, 1, 'ООО "Avto Servis Sakura"', '', '', 'Пулатов Йигитали Исмоилович', '', '', 'Руководитель предприятия', '', '', '(+436) 226-44-45', '', '', '', '(+998 93) 312-41-00', '', 'avto_navoi@mail.ru', '', '', ''),
(34, 36, 1, 'ООО «Asia Auto Trak Bus Service»', '', '', 'Махмудов Дилшод Амонович', '', '', 'Руководитель предприятия', '', '', '(+998 97) 911-59-99', '', '', '', '(+998 97) 228-55-15', '', 'navoi-truck-bus@mail.ru', '', '', ''),
(35, 37, 1, 'ООО "Avto Markaz Fayz"', '', '', 'Шакиров Шерзод Юсупович ', '', '', 'Руководитель предприятия', '', '', '(+998 90) 561-44-33', '', '', '', '', '', 'sherzod-73@mail.ru', '', '', ''),
(36, 38, 1, 'OOO "SERVICE CENTER NAMANGAN"', '', '', 'Джураев Анвар Ахадович', '', '', 'Руководитель предприятия', '', '', '(+998 91) 357-05-55', '', '', '', '(+998 90) 552-77-47', '', 'i_kamaz_center@mail.ru', '', '', ''),
(37, 39, 1, 'ООО "Prof Sale Auto Diesel"', '', '', 'Насимов Акобир Акбарович', '', '', 'Руководитель предприятия', '', '', '(+366) 233-05-14', '', '', '', '(+998 98) 200-77-99', '', 'profsaleautodiesel@mail.ru', '', '', ''),
(38, 40, 1, 'ООО"Авто ЗАЗ"', '', '', 'Алиев Алимхан Нариманович', '', '', 'Руководитель предприятия', '', '', '(+366) 234-48-34', '', '', '', '(+998 93) 330-14-78', '', 'avtozaz.uz@mail.ru', '', '', ''),
(39, 41, 1, 'ООО \'\'Файз-транс-инвест"', '', '', 'Холтураев Фирдавс Абдунабиевич', '', '', 'Руководитель предприятия', '', '', '(+998 90) 247-43-34', '', '', '', '(+998 91) 573-08-08', '', 'fayz-trans-invest@mail.ru', '', '', ''),
(40, 42, 1, 'ООО " Парвоз Транс Инвест"', '', '', 'Бозоралиев Акмалжон Анваржанович', '', '', '', '', '', '(+998 90) 943-40-05', '', '', '', '(+998 95) 511-66-33', '', 'parvoztrans@list.ru', '', '', ''),
(41, 43, 1, 'ООО "Kokand Truck Bus"', '', '', 'Абдурахманов Бахтияр Садыкович', '', '', 'Руководитель предприятия', '', '', '(+998 98) 558-85-15', '', '', '', '(+998 97) 966-33-55', '(+373) 552-10-34', 'kokandtrans@mail.ru', '', '', ''),
(42, 44, 1, 'ООО "ФерганаСам Автотех Сервис"', '', '', 'Нурматов Акмал Акрамович', '', '', 'Руководитель предприятия', '', '', '(+998 90) 274-05-44', '', '', '', '(+998 93) 372-33-37', '', 'fergana@samauto.uz', '', '', ''),
(43, 45, 1, ' ООО "Marg\'ilon Samavto Servis Centre"', '', '', 'Касимов Гафур', '', '', 'Руководитель предприятия', '', '', '(+998 91) 123-45-75', '', '', '', '(+998 94) 385-00-20', '', 'margilan.samauto@gmail.com', '', '', ''),
(44, 46, 1, 'ЧП "Амин - Мулла"', '', '', 'Кутлиев Рахимбой Имомиддинович', '', '', 'Руководитель предприятия', '', '', '(+998 62) 229-41-51', '', '', '', '(+998 91) 422-08-88', '', 'aminmulla@mail.ru', '', '', ''),
(45, 47, 1, 'ООО "Nukus Isuzu Servis"', '', '', 'Турдиев Омирбай Утипбергенович', '', '', 'Руководитель предприятия', '', '', '(+61) 780-02-95', '', '', '', '(+998 91) 390-10-01', '', 'omirbayturdyev@rambler.ru', '', '', ''),
(46, 48, 1, 'ООО "TURTKUL BEST AUTO"', '', '', 'Дурдиев Зокир Борматович', '', '', 'Руководитель предприятия', '', '', '(+998 95) 303-45-55', '', '', '', '(+998 90) 574-98-26', '', 'turtkulbestauto@mail.ru', 'bestauto.uz', '', ''),
(47, 49, 1, 'OOO "QQ AUTO INVEST"', '', '', 'Каримов Диержон Бозорбоевич', '', '', 'Руководитель предприятия', '', '', '(+998 95) 601-88-11', '', '', '', '(+998 97) 741-92-98', '', 'qq.autoinvest@mail.ru', '', '', ''),
(48, 50, 1, 'Urban Motors', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'info@urbanmotors.ge', 'http://urbanmotors.ge/', '41.77526', '44.768278,18');

-- --------------------------------------------------------

--
-- Структура таблицы `dillers_services`
--

CREATE TABLE `dillers_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `diller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `office_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `username_ru` varchar(255) DEFAULT NULL,
  `username_uz` varchar(255) DEFAULT NULL,
  `username_en` varchar(255) DEFAULT NULL,
  `doljnost_ru` varchar(255) DEFAULT NULL,
  `doljnost_uz` varchar(255) DEFAULT NULL,
  `doljnost_en` varchar(255) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL,
  `phones` varchar(255) DEFAULT NULL,
  `fax` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `site` varchar(128) DEFAULT NULL,
  `lat` varchar(32) DEFAULT NULL,
  `lon` varchar(32) DEFAULT NULL,
  `image` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='сервисы диллеров';

--
-- Дамп данных таблицы `dillers_services`
--

INSERT INTO `dillers_services` (`id`, `diller_id`, `office_id`, `status`, `title_ru`, `title_uz`, `title_en`, `username_ru`, `username_uz`, `username_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `text_ru`, `text_uz`, `text_en`, `phones`, `fax`, `email`, `site`, `lat`, `lon`, `image`) VALUES
(5, 4, 5, 1, 'ООО "Grand motors"', '', '', 'Джалилов Ботыр', '', '', ' Менеджер по сервисному обслуживанию', '', '', ' (+998 99) 883-10-02, (+998 90) 176-18-85', 'г. Ташкент Мирабадский р-н. ул. Янги Куйлюк 28 Ориентир: массив Куйлюк 3-5', '', '', '', '', 'isuzu-uz@mail.ru', 'www.grandmotors.uz', '41.327130', ' 69.247471', '1554359843.jpg'),
(6, 5, 6, 0, 'rrrrttt', '', '', '434547iy', '', '', 'yiiiuu', '', '', '', 'yuyiiouio', '', '', '', '', '', '', '42.43434', '69.0364', ''),
(9, 8, 9, 0, 'rrrrttt', '', '', 'ggg', '', '', 'yiiiuu', '', '', '', 'dfdgghr', '', '', '', '', '', '', '42.43434', '69.0364', ''),
(16, 19, 21, 1, 'ООО «IMAGINE»', '', '', 'Камалов Алмас Аблаевич', '', '', 'Менеджер по продажам автомобилей ', '', '', '+99893 502-17-04', 'Ташкентская область, Зангиатинский район, посёлок Эркин, махалля Тарик Тешар.', '', '', '(71) 230-04-16 ', '', 'service@imagine-group.uz', 'www.imagine-group.uz', '', '', '1554363053.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(2) UNSIGNED DEFAULT NULL COMMENT 'тип 0-фото 1-файл',
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `file` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='документы';

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `type`, `status`, `title_ru`, `title_uz`, `title_en`, `file`) VALUES
(5, 0, 1, 'Guvohnoma', 'Guvohnoma', 'Guvohnoma', '1551793778.jpg'),
(6, 0, 1, 'Диплом об участии в Выставке в Туркменистане (март 2018 г.)', '', '', '1551793866.png'),
(10, 1, 1, 'Программное обеспечение маршрутоуказателя', '', '', NULL),
(11, 1, 1, 'Скачать руководство по эксплуатации маршрутоуказателя', '', '', NULL),
(12, 1, 1, 'Процедура локализации', '', '', NULL),
(13, 0, 1, 'Сертификат ISO 9001 (на рус.яз)', '1', 'ISO 9001 certificate (Russian language)', '1553080383.jpg'),
(14, 0, 1, 'Сертификат BUSWORLD 2019 (Казахстан, Алматы)', '', '', '1562154861.jpg'),
(15, 0, 1, 'Диплом участника выставки AUTOTRANS 2012 (Россия, Москва)', '', 'Exhibition participant certificate AUTOTRANS 2012 (Russia, Moscow)', '1562155517.jpg'),
(16, 0, 1, 'Диплом участника выставки 2012 (Туркменистан, Ашхабад)', '', '', '1562155737.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `doljnost`
--

CREATE TABLE `doljnost` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ru` varchar(32) DEFAULT NULL,
  `name_uz` varchar(32) DEFAULT NULL,
  `name_en` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='должности';

--
-- Дамп данных таблицы `doljnost`
--

INSERT INTO `doljnost` (`id`, `name_ru`, `name_uz`, `name_en`) VALUES
(1, 'Руководитель', '', ''),
(2, 'Менеджер', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `download_price`
--

CREATE TABLE `download_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='скачанные прайсы';

--
-- Дамп данных таблицы `download_price`
--

INSERT INTO `download_price` (`id`, `date`, `username`, `email`, `company`, `phone`, `status`) VALUES
(1, 1549949133, 'Сергей', 'titov_sv@mail.ru', 'GM', ' 998 90 952xxxx', 0),
(2, 1549949169, 'Сергей', 'titov_sv@mail.ru', 'GM', ' 998 90 952xxxx', 0),
(3, 1549949659, 'Сергей', 'titov_sv@mail.ru', 'GM', '999-99-99', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(255) NOT NULL DEFAULT '0',
  `title_uz` varchar(255) NOT NULL DEFAULT '0',
  `title_en` varchar(255) NOT NULL DEFAULT '0',
  `text_ru` varchar(512) NOT NULL DEFAULT '0',
  `text_uz` varchar(512) NOT NULL DEFAULT '0',
  `text_en` varchar(512) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='вопросы и ответы';

--
-- Дамп данных таблицы `faqs`
--

INSERT INTO `faqs` (`id`, `type`, `status`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`) VALUES
(1, 1, 1, 'Можно ли купить продукцию напрямую с завода?', '', '', 'Продукцию завода можно приобрести только у региональных дилеров. Дилерские центры СамАвто есть во всех областях Узбекистана.', '', ''),
(2, 1, 1, 'Можно ли приобрести грузовик/автобус за наличный расчёт?', '', '', 'Продукцию ООО «СамАвто» можно приобрести как за наличный расчёт, так и перечислением.', '', ''),
(3, 1, 1, 'Хочу приобрести грузовик/автобус. К кому мне обратиться? ', '', '', 'Для получения информации о продукции или заключения договора Вам необходимо обратиться в Дилерский центр ООО "СамАвто".', '', ''),
(4, 1, 1, 'Можно ли приобрести грузовик/автобус в лизинг или в кредит?', '', '', 'Конечно продукцию ООО «СамАвто» можно приобрести в кредит или в лизинг. Вы можете выбрать банк или лизинговую компанию, которая предложит Вам более выгодные условия. \r\n', '', ''),
(5, 1, 1, 'Можно ли купить машину у дилера, находящегося в другом регионе?', '', '', 'Приобрести продукцию  можно у любого официального дилера ООО «СамАвто». Однако, как завод-производитель рекомендуем приобретать у дилера, который находится в Вашем регионе, чтобы было удобнее проходить сервисное обслуживание в гарантийный период.', '', ''),
(6, 1, 1, 'Какой сейчас срок поставки продукции?', '', '', 'Срок поставки зависит от выбранной Вами модели автомобиля, наличия у него дополнительных опций, поэтому срок поставки конретного автомобиля можно уточнить у дилера.', '', ''),
(7, 1, 1, 'Я не из Узбекистана, хочу приобрести вашу продукцию. К кому мне обратиться? ', '', '', 'Вы можете направить свой запрос отделу реализации на внешнем рынке на эл.почту export@samauto.uz', '', ''),
(8, 1, 1, 'Как можно узнать цену на продукцию ООО «СамАвто»?', '', '', 'Узнать цену на нашу продукцию можно обратившись к дилеру, который работает в Вашем регионе. Контакты региональных дилеров можно найти на сайте в разделе Дилеры.', '', ''),
(9, 1, 1, 'Одинаковая ли цена на продукцию у дилера в Самарканде и других региональных дилеров?', '', '', 'Цена на готовую продукцию ООО «СамАвто» одинаковая во всех областях Узбекистана.', '', ''),
(10, 1, 1, 'Какую гарантию дает завод на свою продукцию?', '', '', '50 000 км или 1 год, в зависимости от того, что наступит ранее.', '', ''),
(11, 2, 1, 'Почему стоит обращаться в дилерские центры, ведь можно найти мастеров, которые выполнят работу дешевле?', '', '', 'Мастера (механики, электрики и др.) работающие в сети дилерских центров ООО "СамАвто" проходят специальное обучение по продукции в соответствии со стандартами ISUZU, регулярно повышают свою квалификацию на заводе. При диагностике или ремонте автомобилей используют специальное оборудование и инструменты.  ', '', ''),
(12, 2, 1, 'Что такое BVP запасные части?', '', '', 'BVP (сокр. от Best Value Parts) - это оригинальные запасные части Isuzu, произведенные на заводах, которые прошли сертификацию качества Isuzu Motors. Их основное отличие от деталей, созданных на заводах в Японии, более низкая стоимость при одинаковом уровне качества.', '', ''),
(13, 1, 1, 'Какую продукцию производит завод?', '', '', 'Самаркандский Автомомбльный Завод производит городские и пригородные автобусы, грузовые (грузоподъёмностью от 2,5 до 20 тонн) и специализированные автомобили (пожарные машины, для коммунального хозяйства, автомобили скорой помощи) на базе шасси ISUZU', '', ''),
(14, 2, 1, 'Какой уровень локализации продукции?', '', '', 'Локализация продукции составляет более 20% (21,8% автобусы и 21% грузовики по методу ГПЛ и Министерства экономики; 30,1% автобусы и 26,7% грузовики - по методу СТ-1)', '', ''),
(15, 2, 1, 'Где можно узнать о технических характеристиках автомобилей более подробно?', '', '', 'Более подробные технические характеристики Вы можете найти на сайте, выбрав интересующий Вас автобус/грузовик.', '', ''),
(16, 1, 1, 'Хочу приобрести продукцию (специальный заказ), к кому мне обратиться?', '', '', 'Чтобы приобрести нестандартную продукцию, Вам необходимо обратиться с письмом к региональному дилеру.', '', ''),
(17, 2, 1, 'Какой ресурс двигателя ISUZU?', '', '', 'Ресурс двигателя ISUZU составляет не менее 1 миллиона километров', '', ''),
(18, 1, 1, 'Можно ли купить на заводе автомобиль, переоборудованный на газ?', '', '', 'Если рассматривать по типу используемого двигателем топлива, то завод производит 2 вида автомобилей: 1) работающие только на дизельном топливе; 2) работающие только на сжатом природном газе (метан, CNG). Самаркандский Автомобильный Завод не занимается переоборудованием топливной системы автомобилей с использования дизеля на газ. ', '', ''),
(19, 2, 1, 'Какие двигатели устанавливаются на ваши автомобили?', '', '', 'На всю продукцию, производимую Самаркандским Автомобильным Заводом устанавливаются японские двигатели ISUZU', '', ''),
(20, 2, 1, 'Производите ли вы автомобили с кондиционером?', '', '', 'На сегодняшний день кондиционер является опцией для автобусов и грузовых автомобилей. Комплектация кондиционером осуществляется за дополнительную оплату. ', '', ''),
(21, 2, 1, 'Почему почти все автобусы в Ташкенте окрашены в один цвет?', '', '', 'Окраска автобусов в комбинированный цвет (зеленый с белой полосой под углом) является требованием покупателя - АО "Тошшахартрансхизмат", который управляет городским пассажирским транспортом. ', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(4) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='история';

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `year`, `status`) VALUES
(1, 2018, 1),
(2, 2019, 1),
(4, 2009, 1),
(5, 2010, 1),
(6, 2011, 1),
(7, 2012, 1),
(8, 2013, 1),
(9, 2014, 1),
(10, 2015, 1),
(11, 2016, 1),
(12, 2017, 1),
(13, 2008, 1),
(14, 2007, 1),
(15, 2006, 1),
(16, 2005, 1),
(17, 2004, 1),
(18, 2003, 1),
(19, 2002, 1),
(20, 2001, 1),
(21, 1999, 1),
(22, 1996, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `history_events`
--

CREATE TABLE `history_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `history_id` int(10) UNSIGNED DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='события в истории';

--
-- Дамп данных таблицы `history_events`
--

INSERT INTO `history_events` (`id`, `history_id`, `date`, `status`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`) VALUES
(1, 1, '2018-01-01', 1, '2018', '', '', 'Апрель - сентябрь - поставка в Афганистан 108 ед. автомобилей скорой помощи ISUZU NKR 55 E2;\r\n\r\nАвгуст - участие в выставке в Караколе (Кыргызстан);\r\n\r\n27 октября - поставка первой партии 80 ед. низкопольных городских автобусов LE60 автопаркам Ташкента;\r\n\r\n22 октября - 17 ноября - проведение первой в Узбекистане акции "Сервис Клиник", при поддержке ISUZU Motors Ltd.\r\n\r\nНоябрь - демонстрация городского низкопольного автобуса SAZ LE60 в Шымкенте (Казахстан) в рамках Первого форума межрегионального сотрудничества между Республикой Узбекистан и Республикой Казахстан;\r\n\r\n27-30 ноября - представление обновленной линейки грузовых автомобилей ISUZU поколения 700P на выставке Made in Uzbekistan ;', '', ''),
(11, 3, '1999-12-11', 1, '2000', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '', ''),
(12, 4, '2009-01-01', 1, '2009', '', '', 'Начата работа по созданию собственной модели низкопольного городского автобуса, проведена презентация прототипа автобуса;\r\n\r\nПервая продажа автобуса (междугородный модели SAZ NP 21) на рынок Афганистана;', '', ''),
(14, 5, '2010-01-01', 1, '2010', '', '', 'Выход на рынок Казахстана, Грузии;\r\n\r\nНачало производства пожарных автомобилей;', '', ''),
(15, 6, '2011-01-01', 1, '2011', '', '', 'Начаты работы по освоению производства грузовых автомобилей на сжатом природном газе (СПГ), осуществлена поставка шасси Исузу для опытного образца, изготовлен опытный образец грузового автомобиля;\r\n\r\nОсвоено производство грузовых автомобилей на базе нового шасси «ISUZU» NPS с колёсной формулой 4х4;\r\n\r\nВыход на рынок Туркменистана;', '', ''),
(19, 7, '2012-01-01', 1, '2012', '', '', 'Проведение сертификационных испытаний низкопольного городского автобуса LE 60;\r\n\r\nМай  – выпуск юбилейной 10-тысячной единицы продукции, произведённой на базе шасси «ISUZU» (городской автобус SAZ NP37);\r\n\r\nСентябрь - участие в выставке в выставке AUTOTRANS/2012 (г. Москва, Российская Федерация);\r\n\r\n1 городской низкопольный автобус LE60 реализован в Российскую Федерацию (г. Москва);\r\n\r\nВпервые за год заводом было произведено и реализовано больше грузовых автомобилей, чем автобусов;', '', ''),
(24, 8, '2013-01-01', 1, '2013', '', '', 'В Узбекистане впервые проведено техническое соревнование "Автомеханик", в котором приняли участие мастера сервисных станций дилерской сети ООО "СамАвто";\r\n\r\nАпрель 2013г. - 1-я продажа  автобуса LE60 в Узбекистане (покупатель - Международный аэропорт г.Бухара);\r\n\r\nПолучение первого ОТТС (Одобрения Типа Транспортного средства) Российской Федерации на низкопольный городской автобус LE60;\r\n\r\nОсвоено производство грузовых автомобилей на базе нового малотоннажного шасси ISUZU NKR;\r\nначало производства и реализации автомобилей модели ISUZU NPR82 с двигателем работающем на сжатом природном газе (CNG);\r\n\r\nКоманда СамАвто впервые принимает участие в международном соревновании ISUZU I-1 Grand Prix в Японии;', '', ''),
(30, 9, '2014-01-01', 1, '2014', '', '', 'Начало сотрудничества с Esmak Makine (Турция) в качестве дистрибьютора;\r\n\r\nАпрель – участие СамАвто в выставке Bus World Turkey;\r\n\r\n375 мусоровозов ISUZU NPR82 с двигателем работающем на сжатом природном газе (CNG) реализовано в Узбекистане специализированным организациям санитарной очистки (ПКМ №315 от 03.12.13г);\r\n\r\nСентябрь – демонстрация автобуса LE60 в Венгрии на заводе Allison Transmission;\r\n\r\nКоличество автомобилей СамАвто в Казахстане достигло 590 ед.;\r\n\r\nКоманда СамАвто занимает 3е место в группе B на международном техническом соревновании ISUZU I-1 Grand Prix в Японии;', '', ''),
(36, 10, '2015-01-01', 1, '2015', '', '', '20 февраля – с конвейера завода  сошел  20 000й автомобиль (мусоровоз CNG на базе шасси ISUZU NPR82);\r\n\r\nАпрель - выход на рынок Таджикистана, первый покупатель  - ГУП «Таджикская алюминиевая компания» (TALCO) ;\r\n\r\n29 июля – ISUZU Motors становится одним из учредителей СамАвто (приобретая 8% у АК "Узавтосаноат");\r\n\r\n30 июля – презентация прототипа автобуса с двигателем, работающем на сжатом природном газе (CNG);\r\n\r\n', '', ''),
(40, 11, '2016-01-01', 1, '2016', '', '', 'Март - на Самаркандском Автомобильном заводе запущена линия катафорезного грунтования (EDP);\r\n\r\nМай-июнь - поставка в Туркменистан 50 грузовых автомобилей ISUZU NQR 71PL с кузовом фургон для перевозки хлеба;\r\n\r\n30 июня – 25 000й автомобиль сошел с конвейера завода (городской низкопольный автобус SAZ LE60);', '', ''),
(44, 12, '2017-03-01', 1, '2017', '', '', 'Март 2017 г. - продан первый автобус HD50, покупатель - профессиональный футбольный клуб "Сугдиёна" (Джизак);\r\n\r\nВыход на рынок Ирака, Кыргызстана и Армении, продажа первой партии продукции на данные рынки;\r\n\r\nУчастие в выставке в Астане (Казахстан) и Душанбе (Таджикистан);\r\n\r\n24 ноября – 30 000-й автомобиль сошел с конвейера завода (автобус SAZ HC45 – с CNG двигателем);\r\n\r\nДекабрь - демонстрация продукции завода в г.Бишкек (Кыргызстан);', '', ''),
(49, 13, '2008-01-01', 1, '2008', '', '', 'Начато освоение производства новой модели автобуса SAZ NP 26, 4 моделей грузовых автомобилей «ISUZU» серии F (FTR33H, FVR33GLD, FVR33PL, FVR23K) с грузоподъемностью 7-10 тонн, освоено производство 6 видов спец. кузовов к ним, а также тяжелой серии С (СYZ 51 KLD) и Е (EXZ 51 KL) -  самосвалы грузоподъёмностью 25 тонн и тягачи грузоподъёмностью  20-25 тонн;\r\n\r\nФевраль 2008г. - первая продажа самосвала ISUZU CYZ, покупатель -  Алмалыкский горно - металлургический комбинат;\r\n\r\nСентябрь 2008г. - первая продажа тягача ISUZU EXZ, покупатель - международный аэропорт Навои;\r\n\r\nЗа 2008 год реализовано более 100 единиц продукции на экспорт;', '', ''),
(50, 14, '2007-01-01', 1, '2007', '', '', '22.01.2007г. - торжественное подписание «Соглашения о техническом содействии» между ISUZU Motors Ltd (Япония) и Самаркандским Автомобильного Заводом, в соответствии с которым завод получил право на серийное производство автобусов и грузовиков среднего класса с использованием шасси и силовых агрегатов «ISUZU», выпуск первого автобуса, произведенного на базе шасси ISUZU;\r\n\r\nАпрель 2007г. - в состав учредителей ООО "СамАвто" вошла первая иностранная компания - японская «Itochu Corporation» (с долей 8%);\r\n\r\nВнедрена интегрированная система менеджмента (ИСМ) по международным стандартам ISO 9001, ISO 14001, OHSAS 18001;\r\n\r\nМодельный ряд продукции состоит из 2 моделей автобусов (городской SAZ NP 37 и междугородний SAZ NP 21) и 3 модели грузовых автомобилей (NQR 71 PL, NPR 66 LL, NPR 66 PL) грузоподъемностью до 5 тонн;\r\n\r\nПервая партия городских автобусов NP37 поставлена в Ташкент, с июня начата реализация грузовых автомобилей;\r\n\r\nЗа 1-й год деятельности произведено и реализовано 1247 ед. продукции;\r\n\r\n1я реализация на экспорт – 26 автобусов в Азербайджан;\r\n\r\nС конвейера завода сошёл юбилейный 1 000й автомобиль;', '', ''),
(51, 15, '2006-01-01', 1, '2006', '', '', 'Усилился экономический кризис на автозаводах «Отойол» и «Ивеко» (Турция), являющихся основными производителями комплектующих частей для производства автобусов и грузовиков в городе Самарканд;\r\n\r\nСентябрь 2006г. - группа компаний «КОЧ» реализовала АК «Узавтосаноат» принадлежавший турецкой стороне пакет акций СП «СамКочавто» (в размере 50%). Предприятие реорганизовано в ООО "СамАвто". В декабре в состав учредителей ООО "СамАвто" вошел банк «Асака» (26%);\r\n\r\nЗакуплены 12 пилотных авто комплектов японских шасси «ISUZU», поставленных компанией «Itochu Corporation» (Япония);', '', ''),
(52, 16, '2005-01-01', 1, '2005', '', '', 'Поиск Самаркандским автозаводом альтернативных поставщиков комплектующих частей для производства коммерческой техники. Проведены переговоры с поставщиками стран Индии, Китая, России, Японии. \r\n', '', ''),
(53, 18, '2003-01-01', 1, '2003', '', '', 'Продукция завода продается на рынки Украины, Казахстаан и Таджикистана;', '', ''),
(54, 19, '2002-01-01', 1, '2002', '', '', 'Узбекские автобусы "Узотойол" обслуживали участников и гостей международного теннисного турнира "Кубок Кремля" в Москве;<br />\r\n\r\nОбъем производства на СП "СамКочАвто" составил 414 автомобилей;<br />\r\n\r\nЭкспортировано 102 автобуса "УзОтойол" в Украину, 4 автобуса в Афганистан и 3 - в Таджикистан;', '', ''),
(55, 20, '2001-01-01', 1, '2001', '', '', 'Объем производства за 2001 год составил 400 автомобилей;\r\n\r\n102 автобуса "УзОтойол" экспортировано в Россию;', '', ''),
(56, 21, '1999-01-01', 1, '1999', '', '', '16 марта 1999 года - открытие завода. На церемонии выпуска с конвейера первого автобуса  присутствовали первый президент Узбекистана И.А. Каримов и президент Турции Сулейман Демирель;\r\n\r\nУставной капитал АО "СамКачавто" - 64,118 миллиона долларов США. Акционеры: крупнейшая турецкая компания "Коч-холдинг" и ассоциация "Узавтосаноат" (по 50% каждая сторона);\r\n\r\nНачато производство автобусов и грузовых автомобилей на шасси и с силовым агрегатом "ИВЕКО", производства турецкой компании "Отойол-ИВЕКО";\r\n\r\n167 автобусов "УзОтойол" экспортировано в Россию;', '', ''),
(57, 22, '1996-01-01', 1, '1996', '', '', '"Подписано Постановление о создании завода (первоначальное название предприятия ""СамКОЧавто"") по производству автобусов и грузовиков (ПКМ РУз №381 от 05.11.1996 г.). Новый завод создавался на базе Самаркандского АООТ ""АвтоВАЗагрегат"". Проект осуществлялся совместно с турецкой компанией "КОЧ Холдинг А.Ш";\r\n', '', ''),
(58, 2, '2019-03-16', 1, '2019', '', '', '16 марта - Самаркандский Автомобильный Завод отметил 20 лет с начала своей деятельности;\r\n\r\n27-29 марта - участие в выставке "UzSecureExpo-2019 " совместно с Rosenbauer, демонстрация 2 пожарных машин;', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `history_gallery`
--

CREATE TABLE `history_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `history_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='галерея для событий истории';

--
-- Дамп данных таблицы `history_gallery`
--

INSERT INTO `history_gallery` (`id`, `history_id`, `image`) VALUES
(25, 9, '1540987291.png'),
(26, 10, '1541566274.png'),
(27, 10, '1541566275.png'),
(28, 11, '1541571354.png'),
(29, 11, '1541571355.png'),
(30, 11, '1541571356.png'),
(31, 58, '1554121689.jpg'),
(39, 44, '1556019502.jpg'),
(40, 44, '1556023767.jpg'),
(42, 40, '1556025194.jpg'),
(43, 40, '1556025232.jpg'),
(45, 36, '1556025581.jpg'),
(46, 36, '1556025956.jpg'),
(47, 30, '1556026416.jpg'),
(48, 30, '1556026752.jpg'),
(50, 58, '1556027026.jpg'),
(51, 1, '1556091062.jpg'),
(52, 1, '1556091114.jpg'),
(53, 1, '1556091168.jpg'),
(54, 1, '1556091420.jpg'),
(56, 1, '1556091760.jpg'),
(57, 1, '1556091790.jpg'),
(58, 1, '1556091810.jpg'),
(59, 1, '1556091828.jpg'),
(60, 44, '1556092490.jpg'),
(61, 36, '1556104316.jpg'),
(62, 36, '1556104549.jpg'),
(63, 30, '1556109647.jpg'),
(65, 30, '1556193738.jpg'),
(69, 24, '1556198608.jpg'),
(70, 24, '1556198623.jpg'),
(71, 19, '1556199876.jpg'),
(72, 19, '1556199907.jpg'),
(73, 15, '1556200289.jpg'),
(74, 14, '1556200700.jpg'),
(75, 12, '1556200913.jpg'),
(76, 49, '1556201148.jpg'),
(77, 49, '1556201328.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `missions`
--

CREATE TABLE `missions` (
  `id` int(10) UNSIGNED NOT NULL,
  `num` varchar(4) NOT NULL DEFAULT '0',
  `file` varchar(16) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `image` varchar(16) NOT NULL,
  `data` mediumtext COMMENT 'инфо о мисии'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='миссия компании';

--
-- Дамп данных таблицы `missions`
--

INSERT INTO `missions` (`id`, `num`, `file`, `title_ru`, `title_uz`, `title_en`, `image`, `data`) VALUES
(1, '', '1560944403.jpg', 'Общая информация', 'sdfdf', 'Mission', '', '[{"title_ru":"Общие сведения о компании","text_ru":"Самаркандский Автомобильный Завод (ранее СП \\"СамКочавто\\", сейчас СП ООО \\"СамАвто\\") - предприятитие производящее коммерческую технику: автобусы, грузовые и специализированные автомобили.  Производственный комплекс завода располагается в городе Самарканд, Республика Узбекистан. \\r\\nОткрытие завода состоялось 16 марта 1999 года.  ","title_uz":"","text_uz":"Biz yo’lovchilarning qulay harakatlanishi va yuklarni tezkor yetkazib berish uchun eng maqbul yechimlar yaratamiz. Biz ishonchli, xavfisiz va mustahkam mahsulotlar bilan shahar va qishloq infratuzilmasini rivojlanishiga ko’maklashamiz.","title_en":"Mission","text_en":"We create optimal solutions for the comfortable transportation of passengers and prompt delivery of goods. We contribute to the development of urban and rural infrastructures, providing reliable, safe and durable products."},{"title_ru":"Учредители","text_ru":"В настоящее время учредителями Самаркандского Автомобильного Завода являются АО \\"Узавтосаноат\\" (Узбекистан) - 58%, банк \\"Асака\\" (Узбекистан) - 26%, Itochu Corporation (Япония) - 8%, ISUZU Motors Ltd. (Япония) - 8%. \\r\\nСотрудничество с японскими компаниями было начато в 2007 году. ","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"Общая площадь завода - 155 625 км.м\\r\\nв  т.ч. производственная площадь - 37 305 км.м\\r\\nКоличество сотрудников - 1042 (апрель 2019г.)\\r\\n\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
(2, '', '1560944939.jpg', 'Миссия и видение', '', '', '', '[{"title_ru":"Миссия","text_ru":"Создаем оптимальные решения для комфортного передвижения пассажиров и оперативной доставки грузов. Способствуем развитию городской и сельской инфраструктуры, обеспечивая надежными, безопасными и долговечными продуктами.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Видение","text_ru":"Наша мечта – стать признанным лидером стран СНГ на рынке производства автобусов и грузовиков.","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
(3, '', '1560945984.jpg', 'Интегрированная Система Менеджмента', '', '', '', '[{"title_ru":"Политика в области ИСМ","text_ru":"Главная бизнес-цель - реализация Миссии и Видения Компании методами и способами, обеспечивающими максимальное удовлетворение требований и ожиданий потребителей и других ключевых заинтересованных сторон; \\r\\nснижение неблагоприятного воздействия на окружающую среду; \\r\\nсоздание безопасных условий труда для сотрудников предприятия и других лиц, находящихся под его управлением; \\r\\nобеспечение устойчивого экономического положения предприятия \\r\\nи на основе этого – рост благосостояния сотрудников.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области системы менеджмента качества:","text_ru":"- осуществление деятельности предприятия на основе общепризнанных принципов менеджмента качества и риск-ориентированного мышления для достижения устойчивого успеха предприятия;\\r\\n- выпуск продукции стабильного качества при соблюдении всех установленных требований к продукции;\\r\\n- эффективное планирование и достижение установленных в бизнес-планах показателей;\\r\\n- обеспечение взаимовыгодных отношений с потребителями, оптимизация взаимоотношений с поставщиками и партнерами;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области системы менеджмента качества:","text_ru":"- применение эффективной рекламной политики для исследования потребительского спроса и продвижения продукции, проведение маркетинговых исследований, организация результативной обратной связи с потребителями;\\r\\n- расширение рынка сбыта продукции с последующим обеспечением гарантийных обязательств и послепродажного сервисного обслуживания; освоение новых видов продукции с учетом потребностей рынка сбыта;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области системы менеджмента качества:","text_ru":"- эффективное управление кадрами, создание условий для мотивации и заинтересованности персонала в обеспечении качества и результативности своего труда;\\r\\n- систематизация и накопление внутрифирменных знаний, их использование для поддержания высокого профессионального уровня персонала предприятия;\\r\\n- совершенствование системы информационного, нормативно-методического и технического обеспечения деятельности предприятия;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области системы менеджмента качества:","text_ru":"- улучшение производственной инфраструктуры, рациональное использование возможностей имеющегося производственного оборудования;\\r\\n- создание условий для более высокого уровня контроля качества продукции;\\r\\n- снижение производственных потерь.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны окружающей среды:","text_ru":"- защита окружающей среды, включая предупреждение загрязнения;\\r\\n- освоение автомобилей с двигателями нового поколения Евро-4 и Евро-5, в том числе на сжатом природном газе метан с целью значительного снижению вредных выбросов в атмосферу в течение периода их эксплуатации;\\r\\n- использование технологий, оборудования и материалов, имеющих меньшее негативное воздействие на окружающую среду;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны окружающей среды:","text_ru":"- оптимизация производственных процессов, снижение удельного потребления природных ресурсов и энергии на единицу производимой продукции;\\r\\n- сокращение отходов производства и потребления, более эффективное их использование и утилизация;\\r\\n- минимизация рисков возникновения аварийных, либо других непредвиденных ситуаций, смягчение воздействия их последствий на окружающую среду;\\r\\n- мониторинг экологического воздействия предприятия на окружающую среду в процессе производства;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны окружающей среды:","text_ru":"- разработка, реализация и контроль исполнения мероприятий по снижению выявленных существенных воздействий на окружающую среду;\\r\\n- обучение персонала подразделений вопросам охраны окружающей среды.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны здоровья и обеспечения безопасности труда:","text_ru":"- уменьшение неблагоприятного воздействия производства на работоспособность и здоровье работников, а также лиц сторонних организаций, выполняющих работы и находящихся на территории предприятия;\\r\\n- создание и поддержание высокой культуры безопасности производства;\\r\\n- минимизация рисков возникновения чрезвычайных, либо других непредвиденных ситуаций, смягчение воздействия их последствий на здоровье и безопасность персонала при осуществлении производственной деятельности и внедрении изменений;\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны здоровья и обеспечения безопасности труда:","text_ru":"- мониторинг условий труда;\\r\\n- разработка, реализация и контроль исполнения мероприятий по снижению выявленных существенных опасностей и рисков для здоровья сотрудников предприятия и лиц, находящих под его управлением;\\r\\n- обеспечение работников средствами индивидуальной и коллективной защиты, санитарно-бытовыми помещениями и устройствами, лечебно-профилактическими средствами;\\r\\n\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Основные направления деятельности в области охраны здоровья и обеспечения безопасности труда:","text_ru":"- содействие общественному контролю соблюдения прав и законных интересов работников;\\r\\n- профилактика производственного травматизма и профессиональных заболеваний.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Политика в области энергоменеджмента","text_ru":"ООО «Самаркандский Автомобильный Завод», являясь одним из флагманов автомобилестроения и крупным потребителем энергоресурсов в Республике Узбекистан, берёт на себя обязательства по безусловному соблюдению законодательных требований в области энергопотребления и будет непрерывно повышать свою энергетическую эффективность путем сокращения потребления энергоресурсов.","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Приоритетные направления и задачи в области энергетического менеджмента:","text_ru":"- разработка, обеспечения выполнения и пересмотр целей и задач в области Энергоменеджмента;\\r\\n- полное и надежное энергетическое обеспечение производственного процесса;\\r\\n- снижение удельного расхода топливно-энергетических ресурсов при производстве автомобильной продукции за счёт внедрения энергосберегающих технологий и оборудования;\\r\\n- приоритетные закупки энергосберегающего оборудования;\\r\\n- ввод в эксплуатацию новых альтернативных источников энергии;","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Приоритетные направления и задачи в области энергетического менеджмента:","text_ru":"- коренное улучшение структуры управления всем энергетическим комплексом на основе использования современных информационных технологий, систем учета и мониторинга энергопотребления;\\r\\n- усиление оснащенности энергоэффективными техническими средствами и технологиями;\\r\\n- улучшение систем учёта и потребления энергоресурсов.\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Руководство предприятия берет на себя обязательство обеспечить реализацию заявленных намерений и направлений деятельности путем:","text_ru":"- соблюдения и оценки соответствия законодательных требований, а также требований международных, государственных, отраслевых и корпоративных документов в области качества, охраны окружающей среды, охраны здоровья и безопасности труда, применяемых в деятел\\r\\n- выделения необходимых ресурсов для достижения поставленных целей и задач;\\r\\n- содействия пониманию каждым членом коллектива о важности его вклада в деле снижения уровня энергопотребления и повышения энергоэффективности;","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Руководство предприятия берет на себя обязательство обеспечить реализацию заявленных намерений и направлений деятельности путем:","text_ru":"- сообразуясь со своими техническими и финансовыми возможностями обеспечения всеми необходимыми ресурсами и информацией для результативного внедрения и постоянного улучшения системы энергетического менеджмента;\\r\\n- поддержания персонала, вносящего свой вклад в снижение уровня энергопотребления и повышение энергоэффективности;\\r\\n- обеспечения информированности персонала о целях и задачах системы Энергоменеджмента и результатах ее функционирования;","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Руководство предприятия берет на себя обязательство обеспечить реализацию заявленных намерений и направлений деятельности путем:","text_ru":"- оказания поддержки всеми методами, и повышения заинтересованности персонала, так как экономия всех видов энергоресурсов дело каждого члена коллектива;\\r\\n- выполнения действий в отношении рисков и возможностей и корректирующих действий;\\r\\n- ведения честного и конструктивного диалога с заинтересованными сторонами, путем предоставления информации и своевременного реагирования на их обращения;","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"Руководство предприятия берет на себя обязательство обеспечить реализацию заявленных намерений и направлений деятельности путем:","text_ru":"- периодического анализа Политики ИСМ и Энергоменеджмента на предмет поддержания её пригодности;\\r\\n- привлечения всех сотрудников для выполнения поставленных обязательств и целей;\\r\\n- поддержания соответствия интегрированной системы менеджмента требованиям международных стандартов ISO 9001:2015, ISO 14001:2015, OHSAS 18001:2007 и Энергоменеджмента ISO 50001:2011 и постоянного улучшения их результативности.\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
(12, '', '1560946217.jpg', 'Комплаенс ', '', '', '1544077528.png', '[{"title_ru":"","text_ru":"","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"\\r\\n","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"","text_ru":"","title_uz":"","text_uz":"","title_en":"","text_en":""}]');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED DEFAULT NULL,
  `hit` tinyint(1) UNSIGNED DEFAULT NULL COMMENT 'показат на главной',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `link_ru` varchar(255) DEFAULT NULL,
  `link_uz` varchar(255) DEFAULT NULL,
  `link_en` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text,
  `status` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='новости';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `hit`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`, `text_ru`, `text_uz`, `text_en`, `status`) VALUES
(1, 1477256400, 0, '1545136898.jpg', 'Участие СамАвто в 10-й Международной Промышленной Ярмарке и Кооперационной Бирже.', '', '', 'uchastie-samavto-v-10-y-mezhdunarodnoy-promyshlennoy-yarmarke-i-kooperacionnoy-birzhe', '', '', '<p>\r\n\r\n</p><div>В период с 24 по 31 октября в Ташкенте на территории НВК «Узэкспоцентр» проводится ежегодная 10-я Международная промышленная ярмарка и Кооперационная биржа. ООО «Самаркандский Автомобильный Завод», входящий в состав АК «Узавтосаноат», принимает участие в данной ярмарке со своей продукцией.</div><div><br></div><div>В рамках данной выставки завод СамАвто, специализирующийся на производстве автобусов, грузовых и специализированных автомобилей, выставляет для экспозиции 6 единиц своей продукции.</div><div><br></div><div>Наряду с низкопольным городским автобусом LE60, автомобилем скорой помощи на базе шасси ISUZU NKR и малотоннажным автофургоном серии NKR в рамках данной выставки заводом будет демонстрироваться и спецтехника: пожарная машина NQR и мусоровоз NPR 82L с двигателем, работающим на сжатом природном газе (метане).</div><div><br></div><div>Также экспозиция автомобилей производства СамАвто включает и новый автобус SAZ HD 50. Пассажировместимость данного автобуса - 44 человека, в том числе имеется 29 мест для сидения пассажиров. Оборудован автобус дизельным двигателем ISUZU экологического стандарта Евро-4.</div>\r\n\r\n<br><p></p>', '', '', 1),
(2, 1424372400, 1, '1545136385.jpg', 'Торжественный выпуск юбилейного 20 000 автомобиля ISUZU NPR82', '', '', 'torzhestvennyy-vypusk-yubileynogo-20-000-avtomobilya-isuzu-npr82', '', '', '<p>\r\n\r\n20 февраля на Самаркандском Автомобильном Заводе прошел торжественный выпуск юбилейного 20 000 автомобиля – им стал автомобиль марки ISUZU NPR82, работающий на сжатом природном газе (СПГ). Японская Isuzu Motors и компания «Узавтосаноат» подписали 29 июля в Ташкенте соглашение о реализации 8% доли в уставном капитале Самаркандского автомобильного завода. Самаркандский автомобильный завод («СамАвто») представил первый автобус с двигателем, работающим на сжатом природном газе (CNG). Презентация автобуса состоялась 30 июля в рамках официального визита в Узбекистан делегации во главе с президентом Isuzu Motors Сусуму Хосои\r\n\r\n</p>', '', '', 1),
(3, 1539543600, 1, '1545139258.jpg', 'Автобус производства ООО «СамАвто» курсирует по маршруту в Московской области', '', '', 'avtobus-proizvodstva-ooo-samavto-kursiruet-po-marshrutu-v-moskovskoy-oblasti', '', '', '<p>\r\n\r\n\r\n\r\n\r\n\r\nВ г.Химки Московской области начались испытания городского автобуса SAZ LE60, произведенного Самаркандским Автомобильным Заводом. В ходе испытаний потенциальные покупатели ознакомятся с характеристиками автобуса, особенностями его эксплуатации, а также проверят, как узлы и агрегаты реагируют на различные погодные условия.<br><br>Низкопольный городской автобус SAZ LE60 был разработан специалистами Самаркандского Автомобильного Завода при поддержке компании «Эрмисбус». Общая пассажировместимость автобуса - 56 человек, из них - 25 мест для сидения. Автобус комплектуется двигателем ISUZU мощностью 190 л.с. (140кВт) экологического стандарта Евро-5, а автоматическая коробка переключения передач «Allison» делает более комфортной для водителя езду в городском цикле.<br><br>Также автобус оснащен аппарелью, при помощи которой обеспечивается доступ для маломобильных граждан на инвалидных колясках. Система ECAS позволяет управлять пневматической подвеской автобуса, регулируя высоту кузова от дороги.<br><br>С учетом климата в Российской Федерации в автобусе установлен предпусковой подогреватель двигателя и стеклопакеты. Также дополнительную устойчивость кузова автобуса к воздействию внешней среды обеспечивает технология катафорезного грунтования, применяемая в процессе производства автобусов SAZ LE60.<br><br>В качестве опций на автобусе SAZ LE60 установлены видеорегистратор, автоинформатор, громкоговоритель, электронные маршрутоуказатели. Кроме того, данный городской автобус оснащен системой ГЛОНАСС. При необходимости, в автобус может быть установлен и валидатор – электронное устройство для оплаты проезда.<br><br>По результатам испытаний, потенциальным покупателем будет принято решение о закупе партии низкопольных городских автобусов производства Самаркандского Автомобильного Завода.\r\n\r\n\r\n\r\n<br></p>', '', '', 1),
(4, 1540753200, 1, '1545137028.jpg', 'Первая партия автобусов LE60 передана автопаркам Ташкента', '', '', 'pervaya-partiya-avtobusov-le60-peredana-avtoparkam-tashkenta', '', '', '<p>\r\n\r\n27 октября АО «Тошшахартрансхизмат» была передана первая партия из 20 низкопольных городских автобусов модели SAZ LE60, произведенных Самаркандским Автомобильным Заводом. <br><br>По договору общее количество низкопольных городских автобусов SAZ LE60 для города Ташкент составляет 80 ед. Новые автобусы будут распределены по маршрутам столицы. Решение о закупке городских автобусов новой модели было принято АО "Тошшахартрансхизмат" с целью обновления парка подвижного состава своих предприятий. <br><br>Общая пассажировместимость нового автобуса 56 человек при наличии 25 мест для сидения пассажиров. На автобус SAZ LE60 устанавливается двигатель ISUZU мощностью 190 л.с., по уровню эмиссии двигатель соответствует экологическому стандарту Евро-4. <br>Для пассажиров основным отличием будет наличие кондиционера, а также отсутствие ступенек – автобус низкопольный. Также данная модель автобуса оборудована аппарелью – устройством аналогичным пандусу, это позволяет обеспечить доступ в салон пассажира на инвалидном кресле. Специальное крепление поможет зафиксировать инвалидное кресло на накопительной площадке автобуса.<br><br>Для водителей главное отличие автобуса – оснащенность автоматической коробкой переключения передач (АКПП), что должно быть более удобным для езды по городу при наличии большого количества остановок на маршруте.\r\n\r\n<br></p>', '', '', 1),
(5, 1538074800, 1, '1545137146.jpg', 'Автомобили скорой помощи для Афганистана', '', '', 'avtomobili-skoroy-pomoschi-dlya-afganistana', '', '', '<p>\r\n\r\nООО «Самаркандский автомобильный завод» осуществил отгрузку автомобилей скорой помощи (Ambulance) для нужд Министерства здравоохранения Исламской Республики Афганистан. Автомобили были переданы в рамках исполнения договоренностей, достигнутых в ходе официального визита президента Афганистана в Узбекистан. На сегодняшний день из запланированного количества 121 единицы, афганской стороне уже передано отдельными партиями 90% от общего количества.<br><br>Автомобили скорой помощи производства ООО «СамАвто» являются современным, специализированными транспортными средствами, которые могут эксплуатироваться не только в Узбекистане. <br>Автомобиль «Ambulance» оснащен базовым оборудованием для оказания экстренной медицинской помощи бригадой до приезда в пункт назначения. Приобретая автомобиль «Ambulance» произведенный ООО «СамАвто», покупатель может заказать оборудование для полной доукомплектации в соответствии со своими требованиями. Кузов автомобиля, производимого ООО «СамАвто», отличается увеличенной высотой салона, что позволит медицинским работникам стоять в полный рост при необходимости.<br><br>Базовая комплектация салона кузова автомобиля условно можно разделить на следующие части: <br>- место для пациента (где размещаются и крепятся носилки с пациентом);<br>- кресло для медработника;<br>- место для сидения 3 человек;<br><br>Для обеспечения работы медицинского персонала в салоне имеются следующее оборудование и приспособления: <br>- тележка-каталка;<br>- мягкие носилки;<br>- медицинская мебель и шкафы;<br>- приспособление для крепления капельницы;<br>- место для кислородных баллонов;<br>- место для хранения оборудования (под сидениями);<br>- сейф для медикаментов;<br>- светодиодная лампа с возможностью поворота;<br>- рация (для связи с водителем);<br>- монитор и камеры;<br><br>Учитывая климатические условия среднеазиатского региона, в комплектацию автомобиля включены вентилятор и кондиционер. Механизм для фиксации открытых дверей и подсветка ступеней необходимы для обеспечения удобства и безопасности пассажиров автомобиля.<br><br>Для обеспечения оперативной и аккуратной транспортировки пациента в кабине водителя установлены камера заднего вида, сигнально-громкоговорящее устройство, рация для связи с кабиной.\r\n\r\n<br></p>', '', '', 1),
(6, 1552683600, 0, '1555911743.jpg', '20 лет деятельности Самаркандского Автомобильного Завода', '', '', '20-let-deyatelnosti-samarkandskogo-avtomobilnogo-zavoda', '', '', '<p>\r\n\r\n16 марта Самаркандский Автомобильный Завод отметил 20 лет со дня начала своей деятельности.\r\n\r\n<br></p>', '', '', 1),
(7, 1550523600, 0, '1568877932.jpg', '20 февраля выездная приёмная в дилерском центре OOO «Grand Motors»', '', '', '20-fevralya-vyezdnaya-priёmnaya-v-dilerskom-centre-ooo-grand-motors', '', '', '<p></p><p>20 февраля с 10:00 до 16:00 в\r\nташкентском дилерском <b>ООО «Grand Motors»</b> (по адресу ул. Янги Куйлюк 28,\r\nориентир - массив Куйлюк 3-5) состоится выездная приёмная встреча с\r\nруководством ООО «СамАвто». В рамках указанного мероприятия покупатели\r\nпродукции производимой ООО «СамАвто» могут встретиться с руководством завода и\r\nзадать интересующие вопросы. &nbsp;</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(8, 1550523600, 0, '1568877895.jpg', 'Выездная приёмная в дилерском центре ООО «Imagine»', '', '', 'vyezdnaya-priёmnaya-v-dilerskom-centre-ooo-imagine', '', '', '<p></p><p>19 февраля руководство ООО «СамАвто»\r\nорганизовало выездную приёмную в ташкентском дилерском центре <b>ООО «lmagine»</b>. В\r\nрамках данного мероприятия покупатели продукции производства ООО «СамАвто»\r\nсмогли встретиться с руководством завода и задать интересующие вопросы.</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(9, 1554066000, 0, '1568878116.jpg', 'САМАРКАНДСКИЙ АВТОМОБИЛЬНЫЙ ЗАВОД проводит открытые конкурсные торги', '', '', 'samarkandskiy-avtomobilnyy-zavod-provodit-otkrytye-konkursnye-torgi', '', '', '<p></p><p>Предмет\r\nконкурса:<br></p>\r\n\r\n<p>Разработка\r\nпроектно-сметной документации по объекту «Пристройка сборочного цеха к\r\nсуществующему корпусу, строительства складских помещений и цеха по\r\nметаллообработке на территории завода СамАвто» согласно техническому заданию\r\nзаказчика.</p>\r\n\r\n<p>Финансирование:</p>\r\n\r\n<p>За\r\nсчет собственных средств ООО\r\n«Самаркандский автомобильный завод»</p>\r\n\r\n<p><b>Требования к участникам:</b></p>\r\n\r\n<p>1.\r\nИметь опыт работы по разработке ПСД .</p>\r\n\r\n<p>2.\r\nСвоевременное и качественное выполнение работ, согласно условиям заключаемого\r\nдоговора.</p>\r\n\r\n<p>3.\r\nТребуется лицензия по выполнению вышеуказанных видов работ</p>\r\n\r\n<p>4. <b>Условия\r\nоплаты:</b></p>\r\n\r\n<p>Предоплата\r\n– 15% после подписания договора.</p>\r\n\r\n<p>Остальные\r\n85% оплаты производится по акту выполненных работ.</p>\r\n\r\n<p><b>Гарантийный срок:</b></p>\r\n\r\n<p>Требуемый\r\nминимальный гарантийный срок – 1 год.</p>\r\n\r\n<p>По\r\nпросьбе заинтересованных организаций техническое задание на выполнение работ\r\nбудет выслана через электронную почту.</p>\r\n\r\n<p>Конкурсные\r\nпредложения принимаются до 17:00 30 апреля 2019г по адресу: Узбекистан, 140160,\r\nг.Самарканд, ул. с.Бухорий 5.</p>\r\n\r\n<p>За\r\nдополнительной информацией</p>\r\n\r\n<p>Обращаться\r\nпо телефону</p>\r\n\r\n<p>(+99866)\r\n230-87-00;</p>\r\n\r\n<p>Факс (+998 66) 222-38-39</p>\r\n\r\n<p>E-mail: <a target="_blank" rel="nofollow">alishers@samauto.uz</a></p>\r\n\r\n<p>Контактное\r\nлицо:</p>\r\n\r\n<p>Сафаров\r\nИльхом Жураевич</p>\r\n\r\n<p>Шакаров Алишер\r\nМадаминович </p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(10, 1554325200, 0, '1568878612.jpg', 'Выездная приемная в Ургенче', '', '', 'vyezdnaya-priemnaya-v-urgenche', '', '', '<p><p>4 - 5 апреля руководство ООО\r\n«СамАвто» организует выездную приёмную в хорезмском дилерском центре <b>ЧП\r\n"AMIN-MULLA" </b>(по адресу - г. Ургенч, ул. Фаязова,10). В рамках\r\nуказанного мероприятия покупатели продукции производимой ООО «СамАвто» могут\r\nвстретиться с руководством завода и задать интересующие вопросы.</p></p>', '', '', 1),
(11, 1556139600, 0, '1568886753.jpg', 'Юридическая служба СамАвто награждена дипломом', '', '', 'yuridicheskaya-sluzhba-samavto-nagrazhdena-diplomom', '', '', '<p></p><p>Юридическая служба Самаркандского\r\nАвтомобильного Завода награждена дипломом <b>III степени</b> в номинации <b>«Лучшая\r\nкорпоративная юридическая служба»</b>. Организатором Республиканского конкурса\r\nявляется Министерством Юстиции Республики Узбекистан, церемония награждения\r\nпобедителей состоялась 25 апреля в рамках Международного юридического форума\r\n«Tashkent Law Spring». Также поздравляем юридические службы ООО «ЛУКОЙЛ\r\nУзбекистан Оперейтинг Компани» (1 место) и АКБ «Саноат Курилиш банк» (2 место).\r\nВсего в конкурсе принимали участие более 100 компаний Узбекистана.</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(12, 1557090000, 0, '1568879701.jpg', 'СамАвто продолжает поставлять технику в Афганистан', '', '', 'samavto-prodolzhaet-postavlyat-tehniku-v-afganistan', '', '', '<p></p><p>Самаркандский\r\nАвтомобильный Завод в период с марта по май экспортировал <b>78 единиц автомобилей\r\nв Исламскую Республику Афганистан</b>. Сотрудничество между заводом «СамАвто» и\r\nНациональным органом по закупкам Афганистана началось в 2018 году с заключения\r\nдоговора на поставку 121 машины скорой помощи (амбуланс). В новом году\r\nноменклатура поставляемой техники была расширена и кроме 11 единиц амбулансов в\r\nАфганистан были отгружены и самосвалы, молоковозы, кран-манипулятор,\r\nполивомоечные и комбинированные поливоуборочные подметательные машины.<br>\r\n<br>\r\nНовая техника после прибытия на территорию Афганистана была\r\nпередана в эксплуатацию - 65 единиц получил муниципалитет Кабула, 2 молоковоза\r\nнаправлены для обслуживания детских садов.<br>\r\n<br>\r\nС целью продвижения продукции в Афганистане между ООО\r\n«СамАвто» и компанией <b>Ahmad Samir Ahmadi Ltd.</b> подписано дилерское соглашение,\r\nсогласно которому данная компания может реализовывать технику на территории\r\nАфганистана, осуществлять гарантийное и сервисное обслуживание транспортных\r\nсредств, осуществлять поставку запасных частей. Также техника, производимая\r\nСамаркандским Автомобильным Заводом, доступна для ознакомления потенциальным\r\nпокупателям из Афганистана на территории «Термез-Карго», где организована экспозиция\r\nузбекских товаров. &nbsp;</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(13, 1558472400, 0, '1568885969.jpg', 'Выездная приёмная в Самарканде', '', '', 'vyezdnaya-priёmnaya-v-samarkande', '', '', '<p></p><p>23 мая с 14:00 руководство ООО\r\n«СамАвто» организует выездную приёмную в самаркандском дилерском центре <b>OOO\r\n«АвтоЗАЗ»</b> (по адресу Узбекский Тракт 3). В рамках указанного мероприятия\r\nпокупатели продукции производимой ООО «СамАвто» могут встретиться с\r\nруководством завода и задать интересующие вопросы. &nbsp;</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(14, 1563829200, 0, '1568886539.jpg', 'СамАвто объявляет тендер', '', '', 'samavto-obyavlyaet-tender', '', '', '<p></p><p>Самаркандский Автомобильный\r\nЗавод объявляет конкурс по выбору партнера на выполнение работ «под ключ» по\r\nнаписанию и внедрению комплексной информационной системы, согласно технического\r\nзадания.<br>\r\nЦель:<br>\r\nСоздание в ООО «Самаркандский Автомобильный\r\nЗавод» комплексной информационной системы, охватывающей всю деятельность\r\nпредприятия.<br>\r\nОписание, состав и сроки выполнения работ\r\nопределены в техническом задании по проекту.<br><br></p><p>Для получения технического задания по проекту\r\nнеобходимо обратится к организатору по адресу: <a target="_blank" rel="nofollow">namir@samauto.uz</a><br><br></p><p>\r\nКомпания-участник должна обладать всеми\r\nнеобходимыми документами, указанными в техническом задании. Квалификация\r\nкомпании-участника или команды компании-участника должна быть не менее 3-х лет.<br><br></p><p>\r\nФинансирование: За счет собственных средств ООО\r\n«Самаркандский Автомобильный Завод».<br><br></p><p>\r\nФорма подачи заявки: Конкурсные предложения\r\nпринимаются на электронный адрес <a target="_blank" rel="nofollow">namir@samauto.uz</a>&nbsp;или по адресу: Узбекистан, 140160, г.Самарканд,\r\nул. С.Бухорий 5.<br><br></p><p>\r\nПоследний срок подачи предложений — 12 августа\r\n2019 года. За дополнительной информацией обращаться по телефону: +998 66\r\n2308700, +998 66 222 3839.<br>\r\n<br>\r\nКонтактное лицо: Насруллаев Амир.</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1),
(17, 1567544400, 0, '1568887072.jpg', 'Тендер по строительству подпорной стены территории завода "СамАвто"', '', '', 'tender-po-stroitelstvu-podpornoy-steny-territorii-zavoda-samavto', '', '', '<p>Финансирование: за счет собственных средств ООО\r\n"Самаркандский автомобильный завод".<br><br></p><p>Условия участия<br></p><p>\r\nДля подтверждения соответствия участника\r\nвышеуказанным требованиям в состав предложения должны быть включены следующие\r\nдокументы:<br>\r\n• &nbsp; &nbsp;Нотариально заверенная\r\nкопия Свидетельства о регистрации;<br>\r\n• &nbsp; &nbsp;Нотариально заверенная\r\nкопия Лицензии на осуществление данного вида деятельности;<br>\r\n• &nbsp; &nbsp;лицензия на данный вид\r\nуслуг<br>\r\n• &nbsp; &nbsp;Предприятия и\r\nорганизации, выступающие в качестве претендентов, должны соответствовать\r\nследующим требованием:<br>\r\n• &nbsp; &nbsp;Иметь оборотные\r\nсредства в размере не менее 20% от стоимости предмета конкурсных торгов или\r\nпоручительства банка на предоставление кредита указанных средств,\r\nпроизводственную базу;<br>\r\n• &nbsp; &nbsp;Трудовые ресурсы,\r\nспециалистов, спецтехнику и механизмы,необходимые для выполнения работ;<br>\r\n• &nbsp; &nbsp;Обладать опытом работы\r\nна объектах, аналогичных конкурсному, гражданской правоспособностью и\r\nполномочиями на заключение договора.</p><p><br>\r\nПроведение технического аудита со стороны\r\nтехнических специалистов ООО "Самаркандский автомобильный завод".<br>\r\nСумма строительства составляет (с учетом НДС) 2\r\n442 929 571 &nbsp;сум<br><br></p><p>\r\nСрок подачи об участии в тендере до 05.10.2019г.<br>\r\nКонкурсные предложения принимаются по адресу:<br>\r\n140160 г. Самарканд, ул. С. Бухорий 5<br>\r\n<br>\r\nЗа дополнительной информацией обращаться по\r\nтелефону +998 66 2308700<br>\r\n+998 66 222 3839 (факс)<br>\r\nEmail: <a target="_blank" rel="nofollow">Stroy@samauto.uz</a><br>\r\nКонтактное лицо: Сафаров Ильхом и Шакаров\r\nАлишер &nbsp;\r\n\r\n\r\n\r\n<br></p>', '', '', 1),
(18, 1567803600, 0, '1568890554.jpg', 'Итоги 7-го технического соревнования «Автомеханик-2019»', '', '', 'itogi-7-go-tehnicheskogo-sorevnovaniya-avtomehanik-2019', '', '', '<p>\r\n\r\nМероприятие ежегодно проводится среди дилерских центров - для проверки знаний и повышения уровня специалистов.<br>⠀<br>По итогам соревнования:<br>⠀<br><b>1-е место</b> заняла команда дилерского центра из Ташкента - <b>ООО «IMAGINE»</b>;<br>⠀<br><b>2-е место</b> завоевала команда дилерского центра из Самарканда - <b>ООО «АвтоЗАЗ»</b>;<br>⠀<br><b>3-е место</b> впервые получила команда из Сырдарьинской области – <b>ООО «Parvoz Trans Invest»</b>.<br>⠀<br>Кроме призовых мест участники были отмечены в номинациях за высокие показатели по определенным направлениям.<br>⠀<br><b>Лучший результат в теоретическом задании</b> - <b>Иноётуллоев Анзор</b>, участник команды Каршинского дилерского центра <b>OOO «Avtosaltanat Servis»</b>.<br>⠀<br><b>Лучший результат</b> в практическом задании <b>«инспекция автомобиля»</b> - <b>Мелиев Жамшид (ООО «Asia Auto Trade», Джизак) и Хайитов Шерзод (ЧП «Amin Mulla», г.Ургенч).</b><br>⠀<br><b>Лучший результат</b> в практическом задании <b>«ремонт агрегатов»</b> у <b>Головизина Василия</b> представителя команды <b>ООО «Asia Auto Trade» из Джизака.</b><br>⠀<br><b>Лучшим специалистом по части электрики </b>автомобилей стал <b>Туйбоев Ортик </b>из дилерского центра <b>OOO "Авто Сервис Сакура" Навоийской области.</b><br>⠀<br>Победители соревнования проходят в следующий этап и будут бороться за место в сборной команде автомехаников, которая представит Узбекистан на Международном техническом соревновании ISUZU I-1 Grand-Prix в Японии 30 октября этого года.\r\n\r\n<br></p>', '', '', 1),
(19, 1552856400, 0, '1568891258.jpg', 'СамАвто участвует в выставке продукции товаропроизводителей стран Центральной Азии', '', '', 'samavto-uchastvuet-v-vystavke-produkcii-tovaroproizvoditeley-stran-centralnoy-azii', '', '', '<p></p><h3>15 - 17\r\nмарта в Ташкенте был проведен первый Центрально-азиатский экономический форум (ЦАЭФ), в котором приняли участие заместители премьер-министров\r\nстран Центральной Азии: Республики Казахстан, Республики Таджикистан,\r\nРеспублики Туркменистан, Республики Узбекистан и Кыргызской Республики.</h3>\r\n\r\n<p>В рамках форума также была организована\r\nвыставка стран-производителей на территории НВК «Узэкспоцентр». В экспозиции выставки\r\nбыла представлена продукция металлургической, нефтехимической,\r\nфармацевтической, текстильной, кожевенно-обувной, пищевой отраслей,\r\nэлектротехнической, автомобилестроительной и машиностроительной промышленности,\r\nнародно-прикладного искусства. ООО «Самаркандский Автомобильный Завод»\r\nпредставил 7 единиц техники: городской низкопольный автобус SAZ LE60, пригородный автобус SAZ NP26, фургоны (грузоподъёмностью 4 и\r\n8 тонн), самосвал, мусоровоз (на CNG топливе), поливомоечную машину.</p><p></p>', '', '', 1),
(20, 1553806800, 0, '1568892565.jpg', 'Участие в выставке UzSecure Expo', '', '', 'uchastie-v-vystavke-uzsecure-expo', '', '', '<p>СамАвто совместно с автрийской компанией Rosenbauer приняли участи в 9й международной выставке технологий безопасности, противопожарной защиты. Выставка проходила 27-29 марта на территории НВК "Узэкспоцентр" в Ташкенте.&nbsp; В рамках данной выставки были представлены пожарные машины, которые производятся заводом в сотрудничестве с&nbsp;компанией Rosenbauer.&nbsp;</p>', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED DEFAULT NULL,
  `type` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'название фото или ссылка youtube '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_gallery`
--

INSERT INTO `news_gallery` (`id`, `news_id`, `type`, `image`) VALUES
(19, 5, 1, 'https://www.youtube.com/embed/TPnqegyGE2A'),
(20, NULL, 0, '1544000776.jpg'),
(21, NULL, 0, '1544001191.jpg'),
(22, 8, 0, '1568877402.jpg'),
(23, 10, 0, '1568878650.jpg'),
(24, 11, 0, '1568879209.jpg'),
(25, 12, 0, '1568885630.jpg'),
(26, 16, 0, '1568887105.jpg'),
(27, 16, 0, '1568887114.jpg'),
(28, 16, 0, '1568887124.jpg'),
(29, 16, 0, '1568887135.jpg'),
(30, 16, 0, '1568887149.jpg'),
(31, 16, 0, '1568887158.jpg'),
(32, 16, 0, '1568887167.jpg'),
(33, 12, 0, '1568887204.jpg'),
(34, 19, 0, '1568891347.jpg'),
(35, 19, 0, '1568891379.jpg'),
(36, 19, 0, '1568891465.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(32) NOT NULL DEFAULT '0',
  `data` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='информация о страницах';

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `page`, `data`) VALUES
(1, 'contacts', '{"sam_address_ru":"СП ООО «Самаркандский Автомобильный Завод» Республика Узбекистан, 140160, г.Самарканд, ул. Бухорий, 5","sam_phone1_ru":"+ 998 66 230 87 00","sam_phone2_ru":"+ 998 78 141 87 00","sam_fax_ru":"+ 998 66 222 38 39","sam_email_ru":"saminfo@samauto.uz","sam_site_ru":"samauto.uz","sam_address_uz":"MChJ QK, O\'zbekiston Respublikasi, 140160, Samarqand shahri, Buhoriy ko\'chasi, 5","sam_phone1_uz":"+ 998 66 230 87 00","sam_phone2_uz":"+ 998 78 141 87 00","sam_fax_uz":"+ 998 66 222 38 39","sam_email_uz":"saminfo@samauto.uz","sam_site_uz":"samauto.uz","sam_address_en":"JV LLC \'Samarkand Automobile Factory\',  5, Bukhoriy str., 140160, Samarkand city, Republic of Uzbekistan","sam_phone1_en":"+ 998 66 230 87 00","sam_phone2_en":"+ 998 78 141 87 00","sam_fax_en":"+ 998 66 222 38 39","sam_email_en":"saminfo@samauto.uz","sam_site_en":"samauto.uz","sam_lat":"39.648095","sam_lon":"66.910189","tash_address_ru":"Ташкентский офис СП ООО «Самаркандский Автомобильный Завод»  Республика Узбекистан, 100000, г.Ташкент, ул. Амира Темура, 13 ru","tash_phone1_ru":"+ 998 78 140 80 00","tash_phone2_ru":"+ 998 78 140 64 64","tash_fax_ru":"","tash_email_ru":"info@samauto.uz","tash_site_ru":"samauto.uz","tash_address_uz":"Ташкентский офис СП ООО «Самаркандский Автомобильный Завод»  Республика Узбекистан, 100000, г.Ташкент, ул. Амира Темура, 13 uz","tash_phone1_uz":"+ 998 78 140 80 00","tash_phone2_uz":"+ 998 78 140 64 64","tash_fax_uz":"","tash_email_uz":"info@samauto.uz","tash_site_uz":"samauto.uz","tash_address_en":"Ташкентский офис СП ООО «Самаркандский Автомобильный Завод»  Республика Узбекистан, 100000, г.Ташкент, ул. Амира Темура, 13 en","tash_phone1_en":"+ 998 78 140 80 00","tash_phone2_en":"+ 998 78 140 64 64","tash_fax_en":"","tash_email_en":"info@samauto.uz","tash_site_en":"samauto.uz","tash_lat":"41.305927","tash_lon":"69.278291","facebook":"http:\\/\\/Facebook.com\\/samauto.uz","telegram":"https:\\/\\/t.me\\/samauto_uz","insta":"https:\\/\\/www.instagram.com\\/samauto.uz\\/","youtube":"https:\\/\\/www.youtube.com\\/channel\\/UC0VyoMOV-sG0YDRFrcrE6Sw"}'),
(2, 'symbols', '{"flag_ru":"<p>\\r\\n\\r\\n<\\/p><p>Закон \\"О Государственном флаге Республики Узбекистан\\" принят 18 ноября 1991 года на восьмой сессии Верховного Совета Республики Узбекистан.<\\/p><p>Символика Государственного флага Республики Узбекистан продолжает лучшие традиции, свойственные флагам могущественных держав, существовавших на территории нашей страны, одновременно отражает природные особенности республики, национальную и культурную самобытность народа.<\\/p><p>Небесно-голубой цвет на флаге - символ голубого неба и чистой воды. Лазурный цвет почитаем на Востоке, его избрал когда-то для своего флага и великий Амир Темур.<\\/p><p>Белый цвет - символ мира и чистоты. Молодое независимое государство должно преодолеть на своем пути высокие перевалы. Белый цвет на флаге означает доброе пожелание, чтобы путь был чист и светел.<\\/p><p>Зеленый цвет - олицетворение благодатной природы. В настоящее время во всем мире ширится движение по охране окружающей среды, символом которого тоже является зеленый цвет.<\\/p><p>Красные полосы - это жизненные силы, пульсирующие в каждом живом существе, символ жизни.<\\/p><p>Полумесяц соответствует многовековой традиции народа Узбекистана. Полумесяц и звезды - символ безоблачного неба мира. На нашем флаге 12 звезд. Число12 считается знаком совершенства.<\\/p><p>Расцветка цветного изображения герба такова: птица Хумо серебрянным цветом; солнце, колосья, коробочки хлопка и надпись “Узбекистан” золотым цветом; ветки и листья гузапои (хлопкового стебля), долина зелёным цветом; горы небесным цветом; хлопок в коробочках, реки, полумесяц и звезды белым цветом; ленты государственного флага Республики Узбекистан четырьмя цветами.<\\/p><p>Герб используется в качестве символа нашего суверенного государства в общественно-политической жизни Республики. Изображение герба ставится на соглашениях и договорах подписанных с зарубежными странами, на документах о межгосударственном сотрудничестве и дипломатии. Так же изображение государственного герба можно видеть и на нашей валюте – сум.<\\/p>\\r\\n\\r\\n<br><p><\\/p>","flag_uz":"","flag_en":"","gerb_ru":"<p>\\r\\n\\r\\n<\\/p><p>Закон “О Государственном гербе Республики Узбекистан” принят 2 июля 1992 года на десятой сессии Верховного Совета Республики Узбекистан.<\\/p><p>В центре герба изображена птица Хумо с раскрытыми крыльями – символ счастья и свободолюбия. Наш великий предок Алишер Навои характе-ризовал птицу Хумо как самое доброе из всех живых существ.<\\/p><p>В верхней части герба находится восьмигранник, символизирующий знак утверждения республики, внутри -полумесяц со звездой.<\\/p><p>Изображение солнца – пожелание, чтобы путь нашего государства был озарен ярким светом. Одновременно оно указывает на уникальные природно-климатические условия республики.<\\/p><p>Колосья – символ хлеба насущного, стебли с раскрывающимися коробочками хлопка – главное богатство нашей солнечной Земли, прославившее ее во всем мире. Колосья и коробочки хлопка, перевитые лентой Государственного флага, означают консолидацию народов, проживающих в республике.<\\/p><p>Расцветка цветного изображения герба такова: птица Хумо серебрянным цветом; солнце, колосья, коробочки хлопка и надпись “Узбекистан” золотым цветом; ветки и листья гузапои (хлопкового стебля), долина зелёным цветом; горы небесным цветом; хлопок в коробочках, реки, полумесяц и звезды белым цветом; ленты государственного флага Республики Узбекистан четыремя цветами.<\\/p><p>Герб широко используется в качестве символа нашего суверенного государства в общественно-политической жизни Республики. Изображение герба ставится на соглашения и договорах подписанных с зарубежными странами, на документах о межгосударственном сотрудничестве и дипломатии. Вместе с этим изображение герба отображаетя и на имеющих государственную важность внутренних документах, на печатях государственных предприятий и организаций, на официальных документах. Так же изображение государственного герба можно видеть и на нашей валюте – сум.<\\/p>\\r\\n\\r\\n<br><p><\\/p>","gerb_uz":"","gerb_en":"","gimn_title_ru":"Государственный гимн является одним из основных символов государственной независимости и будит в гражданах Узбекистана патриотические чувства.\\r\\n\\r\\nВо время исполнения Государственного гимна Республики Узбекистан перед общественностью, участники должны его петь и слушать стоя, положа правую руку на сердце.","gimn_ru":"<p><i><\\/i>\\r\\n\\r\\n<\\/p><p>Закон \\"О Государственном гимне Республики Узбекистан\\" принят 10 декабря 1992 года на одиннадцатой сессии Верховного Совета Республики Узбекистан.<\\/p><p><br><\\/p><p>Серкуёш, хур ўлкам, элга бахт, нажот, <br>Сен ўзинг дўстларга йўлдош, мехрибон! <br>Яшнагай то абад илму фан, ижод, <br>Шухратинг порласин токи бор <b><\\/b>жахон! <b><\\/b><br><br>Олтин бу водийлар — жон Ўзбекистон, <br>Аждодлар мардона рухи сенга ёр! <br>Улуг халк кудрати жўш урган замон, <br>Оламни махлиё айлаган диёр! <br><br>Багри кенг ўзбекнинг ўчмас иймони, <br>Эркин, ёш авлодлар сенга зўр канот! <br>Истиклол машъали, тинчлик посбони, <br>Хаксевар, она юрт, мангу бўл обод! <br><br>Олтин бу водийлар — жон Ўзбекистон, <br>Аждодлар мардона рухи сенга ёр! <br>Улуг халк кудрати жўш урган замон, <br>Оламни махлиё айлаган диёр!<\\/p><p><\\/p>","gimn_author_ru":"Слова Абдуллы Арипова\\r\\nМузыка Мутала Бурханова","gimn_title_uz":"","gimn_uz":"","gimn_author_uz":"","gimn_title_en":"","gimn_en":"","gimn_author_en":""}'),
(3, 'files', '{"file_price":"b3b8bd6006591562f19cb5b8b7.jpg","file_catalog":"katalog-produkcii-samavto-2017.pdf","file_diller_sert":"b3b8bd6006591562f19cb5b8b7.jpg"}'),
(4, 'localization-about', '{"text_ru":"<p>Локализации комплектующих деталей автомобилей является важным процессом, который позволяет уменьшить зависимость от импортных поставщиков. Самаркандский Автомобильный завод ведет непрерывную работу, направленную на повышения уровня локализации производимой продукции.<br><\\/p><p>Так например, в настоящее время уровень локализации городского автобуса модели SAZ HC45 составляет 38,6% по методу СТ1 и 22,3% по методу ГПЛ, а фургона на базе шасси ISUZU NQR71PL - 27,8% по СТ1 и 13,6% по ГПЛ.&nbsp;<\\/p><p>Приглашаем местные компании-производителей к сотрудничеству. Свое коммерческое предложение или вопросы относительно локализации можно направить на электронную почту <b>\\r\\n\\r\\ndavlat@samauto.uz&nbsp;&nbsp;<\\/b><\\/p>","text_uz":"","text_en":""}'),
(5, 'services-warranty', '{"text_ru":"<p><\\/p><p><\\/p><p>При покупке транспортного средства произведенного Самаркандским Автомобильным Заводом, на автомобиль распространяется <b>гарантия<\\/b>&nbsp;завода-производителя.&nbsp;&nbsp;<\\/p><p><u><\\/u>Чтобы гарантия начала своё действие \\r\\n\\r\\nавтомобиль\\r\\n\\r\\nнеобходимо <b>зарегистрировать на\\r\\nУполномоченной \\r\\n\\r\\nсервисной станции<\\/b>\\r\\n\\r\\nООО «СамАвто» в течение первой 1000 километров пробега.&nbsp;<\\/p><p><\\/p><p>ООО «СамАвто»\\r\\nзаинтересовано в том, что бы Ваш автомобиль обслуживался на соответствующем\\r\\nтехническом уровне квалифицированным персоналом. Для этого ООО «СамАвто»\\r\\nпроводит мероприятия по обучению персонала сервисных станций, повышению\\r\\nтехнического уровня станций, оценивает способность сервисных станций проводить\\r\\nтехническое обслуживание на надлежащем уровне. По результатам оценки ООО\\r\\n«СамАвто» дает <b>полномочия<\\/b> сервисной\\r\\nстанции проводить гарантийное обслуживание транспортных средств, заключая с ней\\r\\n<b>Договор<\\/b>. Убедитесь, что Ваша\\r\\nсервисная станция является <b>Уполномоченной<\\/b>\\r\\nстанцией технического обслуживания.<\\/p><p><\\/p><p><b>Гарантия ООО «СамАвто» не\\r\\nраспространяется<\\/b> <b>на<\\/b>:&nbsp;<\\/p><p><\\/p><ul><li>Какие-либо\\r\\nрасходные материалы (топливо, смазочные материалы, фильтры и т.д )&nbsp;<\\/li><li>Внеплановое\\r\\nтехническое обслуживание по инициативе владельца<\\/li><li>Любого рода\\r\\nтехническое обслуживание и ремонт, требуемые в результате аварии или\\r\\nнеправильного использования.<\\/li><li>На охлаждающие жидкости системы охлаждения двигателя<\\/li><li>На фрикционные детали\\r\\nтормозной системы и механизма сцепления, а также на приводные ремни.<\\/li><li>На агрегаты, узлы и детали,\\r\\nповрежденные в результате внешнего воздействия.<\\/li><li>На агрегаты, узлы и детали, подвергнутые демонтажу и разборке на не\\r\\nуполномоченных Производителем Сервисных станциях.<\\/li><li>На узлы и детали, подвергнутые разборке без присутствия уполномоченных\\r\\nпредставителей Производителя.<\\/li><li>На транспортные средства,\\r\\nспидометры которых заменены (счетчик пройденного пути) или на которых не возможно\\r\\nопределить действительный пробег транспортного средства.<\\/li><li>На детали и узлы транспортного средства, подверженные влиянию\\r\\nнормального износа  и старении в\\r\\nрезультате работы, а именно: фильтры различных типов, накладки тормозные и сцепления,\\r\\nприводные ремни, свечи накаливания, провода зажигания, диски сцепления, стекла\\r\\nи изделия из стекла (стеклопластик), щетки стеклоочистителя, контакты\\r\\nзажигания, щетки стартера и генератора, лампочки, предохранители, уплотнители\\r\\nокон и дверей, корпуса осветительных приборов, лампы, резинотехнические\\r\\nизделия, автомобильные шины, сальники, распылители, плунжерная пара, форсунки,\\r\\nамортизаторы. <\\/li><li>На повреждения, полученные в результате воздействия природных явлений,\\r\\nтаких как падение снега, льда,  града,\\r\\nнаводнение, молния, ураган, сель, шторм, воздействия экстремальных температур\\r\\n(ниже минус 40С и свыше плюс 50С).<\\/li><\\/ul><p><\\/p><p><\\/p><p><\\/p>","text_uz":"","text_en":"","file":"garantiynaya-knizhka-dlya-publikacii.pdf","file2":""}'),
(6, 'services-centres', '{"text_ru":"<p>Обслуживание автомобилей, произведенных Самаркандским Автомобильным Заводом, осуществляют дилерские центры.&nbsp;\\r\\n\\r\\nОфициальные дилерские центры имеются во всех регионах Узбекистана. \\r\\n\\r\\n<\\/p><p><b>Уполномеченная сервисная станция <\\/b>дилерского центра имеет право осуществлять обслуживание автомобилей в гарантийный&nbsp; период, а также оказывать услуги по сервисному обслуживанию и ремонту в постгарантийный период.&nbsp;<\\/p><p>Также завод-производитель рекомендует обращаться в&nbsp; официальные дилерские центры для приобретения оригинальных запасных частей.&nbsp;<br><\\/p>","text_uz":"","text_en":""}'),
(8, 'services-faq', '{"text_ru":"<p>asdsd<\\/p>","text_uz":"<p>yty<\\/p>","text_en":""}'),
(9, 'services-parts', '{"text_ru":"<p>ОРИГИНАЛЬНЫЕ ЗАПАСНЫЕ ЧАСТИ И АКСЕССУАРЫ ISUZU Качество, безопасность и эксплуатационные качества: Оригинальные Запасные части ISUZU гарантируют Вам отличный опыт вождения независимо от времени и расстояния. Экологически безопасное, ультрасовременное оборудование, специально созданное для Вашего автомобиля ISUZU, доступно у любого официального дилера SamAuto. Вы всегда можете доверить нам заботу о Вашем автомобиле.<br><\\/p>","text_uz":"","text_en":"","gallery":["1554121567.jpg","1554121568.png","1554121569.png","1554121570.png","1554121571.jpg"]}'),
(10, 'admin-options', '{"rows_count":"50"}');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'категория - локализация',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `hit` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'в слайдер',
  `title_ru` varchar(255) NOT NULL DEFAULT '0',
  `title_uz` varchar(255) NOT NULL DEFAULT '0',
  `title_en` varchar(255) NOT NULL DEFAULT '0',
  `text_ru` text NOT NULL,
  `text_uz` text NOT NULL,
  `text_en` text NOT NULL,
  `num` varchar(128) NOT NULL COMMENT 'номер детали',
  `model` varchar(128) NOT NULL,
  `quantity` varchar(8) NOT NULL COMMENT 'кол-во на 1 авто',
  `mass` varchar(12) NOT NULL,
  `material_ru` varchar(128) NOT NULL,
  `material_uz` varchar(128) NOT NULL,
  `material_en` varchar(128) NOT NULL,
  `length` varchar(12) NOT NULL,
  `width` varchar(12) NOT NULL,
  `height` varchar(12) NOT NULL,
  `weight` varchar(12) NOT NULL,
  `image` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='локализация\r\nтовары, комплектующие';

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `status`, `hit`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`, `num`, `model`, `quantity`, `mass`, `material_ru`, `material_uz`, `material_en`, `length`, `width`, `height`, `weight`, `image`) VALUES
(1, 0, 1, 1, 'Сервис', '', '', 'В гарантийный и постгарантийный период рекомендуется обращаться за обслуживанием автомобилей только в авторизованные центры', '', '', '1', 'е23', '1', '', '', '', '', '12', '122', '12', '12', '1555671307.jpg'),
(2, 0, 1, 1, 'Гарантия', '', '', 'Работа подвески заключается в преобразовании удара при наезде на неровности дороги в перемещение упругого элемента. Упругий элемент уменьшает силу удара, передаваемую на кузов, и в результате плавность хода и комфорт увеличиваются. Упругим элементом в авто являются пружины подвески или рессоры. Однако мало смягчить удар, надо еще погасить колебания, которые создают упругие элементы, а этим занимаются амортизаторы. Не будь последних, автомобиль, наехав на неровность, долго бы раскачивался, ухудшая сцепление колес с дорогой и создавая предпосылки «улететь» с неё.', '', '', '2', 'test', '2', '', 'Кожа', '', '', '122', '123', '2222', '34', '1544010839.jpg'),
(3, 0, 1, 1, 'Запасные части', '', '', 'Тормозная система предназначена для снижения скорости движения и полной остановки (экстренной) автомобиля, а также для удержания на месте неподвижно стоящего автомобиля.\r\nПроцесс торможения движущегося автомобиля заключается в создании искусственного сопротивления этому движению. Обычно уменьшение скорости автомобиля вплоть до полной его остановки осуществляется путем создания тормозных сил в контакте колес с дорогой, направленных в сторону, противоположную движению. Тормозные силы необходимы и для удерживания автомобиля на месте.', '', '', '3', 'модель 1', '4', '', 'пластмасс', '', '', '23', '22', '33', '43', '1544010851.jpg'),
(4, 33, 1, 0, 'Панель верхняя ', '', '', 'Панель верхняя \r\n', '', '', '8974196835', '8974196835', '1', '', 'Пластмасса (PP)', '', '', '1700', '200', '60', '', '1556517830.jpg'),
(5, 33, 1, 0, 'Панель для приборов ', '', '', 'Панель для приборов \r\n', '', '', '8974060044', '8974060044', '1', '', 'Пластмасса (PP) ', '', '', '1100', '280', '220', '', '1556518249.jpg'),
(6, 33, 1, 0, 'Крышка  бардачка', '', '', 'Крышка  бардачка', '', '', '8974297021', '8974297021', '1', '', 'Пластмасса (PP)', '', '', '570', '260', '150', '', '1556518330.jpg'),
(7, 33, 1, 0, 'Решетка воздуховода', '', '', 'Решетка воздуховода', '', '', '8980285612', '8980285612', '1', '', '', '', '', '115', '90', '60', '', '1556518394.jpg'),
(8, 33, 1, 0, 'Решетка воздуховода боковая', '', '', 'Решетка воздуховода боковая', '', '', '8980285622', '8980285622', '1', '', 'Пластмасса (PP)', '', '', '115', '90', '60', '', '1556518448.jpg'),
(9, 33, 1, 0, 'Решетка воздуховода', '', '', 'Решетка воздуховода', '', '', '8980285632', '8980285632', '2', '', 'Пластмасса (PP)', '', '', '100', '80', '50', '', '1556518614.jpg'),
(10, 33, 1, 0, 'Крышка маслинного бочка', '', '', 'Крышка маслинного бочка', '', '', '8974060031', '8974060031', '1', '', 'Пластмасса (PP)', '', '', '170', '1230', '50', '', '1556518693.jpg'),
(11, 33, 1, 0, 'Заглушка ', '', '', 'Заглушка ', '', '', '8974078962 ', '8974078962 ', '1', '', 'Пластмасса (PP)', '', '', '185', '95', '50', '', '1556518759.jpg'),
(12, 33, 1, 0, 'Карман панели ', '', '', 'Карман панели ', '', '', '8974088643                                        ', '8974088643', '1', '', 'Пластмасса (PP)', '', '', '185', '105', '60', '', '1556518816.jpg'),
(13, 33, 1, 0, 'Отсек панели ', '', '', 'Отсек панели ', '', '', '897408869*', '897408869*', '1', '', 'Пластмасса (PP)', '', '', '185', '90', '70', '', '1556518900.jpg'),
(14, 33, 1, 0, 'Карман панели', '', '', 'Карман панели', '', '', '8974071293                                        ', '8974071293', '1', '', 'Пластмасса (PP)', '', '', '190', '110', '100', '', '1556519455.jpg'),
(15, 33, 1, 0, 'Крышка блока предохранителей', '', '', 'Крышка блока предохранителей', '', '', '8974236590', '8974236590', '1', '', 'Пластмасса (PP)', '', '', '500', '250', '10', '', '1556519512.jpg'),
(16, 33, 1, 0, 'Обшивка ', '', '', 'Обшивка', '', '', '8974052582', '8974052582', '1', '', 'Пластмасса (PP)', '', '', '600', '500', '30', '', '1556519560.jpg'),
(17, 33, 1, 0, 'Заглушка ', '', '', 'Заглушка', '', '', '8980259541', '8980259541', '16', '', 'Пластмасса (PP)', '', '', '70', '40', '25', '', '1556519608.jpg'),
(18, 33, 1, 0, 'Панель', '', '', 'Панель', '', '', '8974236571', '8974236571', '1', '', 'Пластмасса (PP)', '', '', '760', '420', '60', '', '1556519673.jpg'),
(19, 33, 1, 0, 'Сопло бортового размораживателя', '', '', 'Сопло бортового размораживателя', '', '', '8980404984', '8980404984', '1', '', 'Пластмасса (PP)', '', '', '200', '190', '90', '', '1556519820.jpg'),
(20, 33, 1, 0, 'Сопло бортового размораживателя', '', '', 'Сопло бортового размораживателя\r\n', '', '', '8980404971', '8980404971', '1', '', 'Пластмасса (PP)', '', '', '220', '100', '90', '', '1556519902.jpg'),
(21, 0, 1, 0, ' Вентиляционный трубопровод', '', '', ' Вентиляционный трубопровод', '', '', '8982855860', '8982855860', '1', '', 'Пластмасса (PP)', '', '', '1030', '210', '150', '', '1556520006.jpg'),
(22, 1, 1, 0, ' Вентиляционный трубопровод средний', '', '', ' Вентиляционный трубопровод средний', '', '', '8980404903', '8980404903', '1', '', 'Пластмасса (PP)', '', '', '1320', '180', '90', '', '1556520067.jpg'),
(23, 33, 1, 0, ' Вентиляционный трубопровод', '', '', ' Вентиляционный трубопровод', '', '', '8982855840 ', '8982855840 ', '1', '', 'Пластмасса (PP)', '', '', '600', '200', '110', '', '1556520146.jpg'),
(24, 33, 1, 0, 'Панель', '', '', 'Панель', '', '', '897406004', '897406004', '1', '', 'Пластмасса (PP)', '', '', '1100', '250', '120', '', '1556520224.jpg'),
(25, 33, 1, 0, 'Фиксатор', '', '', 'Фиксатор', '', '', '897408063*', '897408063*', '2', '', 'Пластмасса (PP)', '', '', '25', '10', '10', '', '1556520339.jpg'),
(26, 33, 1, 0, 'Пластина', '', '', 'Пластина', '', '', '897410276*', '897410276*', '1', '', 'Пластмасса (PP)', '', '', '200', '150', '10', '', '1556520393.jpg'),
(27, 33, 1, 0, 'Обшивка', '', '', 'Обшивка', '', '', '897406002*', '897406002*', '1', '', 'Пластмасса (PP)', '', '', '250', '220', '175', '', '1556520494.jpg'),
(28, 33, 1, 0, 'Обшивка', '', '', 'Обшивка', '', '', '897406000*', '897406000*', '1', '', 'Пластмасса (PP)', '', '', '250', '220', '175', '', '1556520532.jpg'),
(29, 33, 1, 0, 'Фиксатор', '', '', 'Фиксатор', '', '', '897408927*', '897408927*', '1', '', 'Пластмасса (PP)', '', '', '30', '10', '10', '', '1556520576.jpg'),
(30, 33, 1, 0, 'Фиксатор', '', '', 'Фиксатор\r\n', '', '', '897419968*', '897419968*', '2', '', 'Пластмасса (PP)', '', '', '25', '10', '10', '', '1556520621.jpg'),
(31, 33, 1, 0, 'Фиксатор', '', '', 'Фиксатор\r\n', '', '', '897408817*', '897408817*', '2', '', 'Пластмасса (PP)', '', '', '15', '15', '15', '', '1556520667.jpg'),
(32, 33, 1, 0, 'Фиксатор', '', '', 'Фиксатор', '', '', '894279804*', '894279804*', '2', '', 'Пластмасса (PP)', '', '', '20', '15', '15', '', '1556520720.jpg'),
(33, 33, 1, 0, 'Заглушка', '', '', 'Заглушка', '', '', '898029914*', '898029914*', '1', '', 'Пластмасса (PP)', '', '', '40', '30', '20', '', '1556520768.jpg'),
(34, 33, 1, 0, 'Заглушка', '', '', 'Заглушка', '', '', '897407898*', '897407898*', '1', '', 'Пластмасса (PP)', '', '', '200', '30', '25', '', '1556520812.jpg'),
(35, 33, 1, 0, 'Заглушка', '', '', 'Заглушка', '', '', '898070401', '898070401', '1', '', 'Пластмасса (PP)', '', '', '30', '30', '10', '', '1556520855.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_gallery`
--

CREATE TABLE `products_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='галерея для товара';

--
-- Дамп данных таблицы `products_gallery`
--

INSERT INTO `products_gallery` (`id`, `product_id`, `image`) VALUES
(1, 1, '1538995408.jpg'),
(2, 1, '1538995409.png'),
(3, 1, '1539065977.jpg'),
(4, 1, '1539065978.jpg'),
(5, 1, '1539065979.png'),
(6, 1, '1539065980.jpg'),
(7, 1, '1539065981.png'),
(8, 1, '1539065982.png'),
(9, 1, '1539065983.png'),
(10, 1, '1539065984.png'),
(11, 2, '1539082677.jpg'),
(12, 2, '1539082678.jpg'),
(13, 2, '1539082680.jpg'),
(14, 2, '1539082729.jpg'),
(15, 2, '1539082730.jpg'),
(16, 2, '1539082731.jpg'),
(17, 2, '1539082733.jpg'),
(18, 2, '1539082734.png'),
(19, 3, '1539082801.jpg'),
(20, 3, '1539082803.jpg'),
(21, 3, '1539082804.jpg'),
(22, 3, '1539082805.jpg'),
(23, 3, '1539082806.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `text` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `date`, `status`, `username`, `subject`, `company`, `email`, `phone`, `text`) VALUES
(1, 3, 1543993462, NULL, 'tryey', 'tryery', 'efewrerewt', 'info@test.we', '546346', 'eyeryey'),
(16, 3, 1544002378, 0, 'reyty22', 'rtyey22', 'eryery22', 'info22@test.we', '4564564622', 'eryry22');

-- --------------------------------------------------------

--
-- Структура таблицы `receptions`
--

CREATE TABLE `receptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `text` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `receptions`
--

INSERT INTO `receptions` (`id`, `user_id`, `date`, `status`, `username`, `subject`, `company`, `email`, `phone`, `text`) VALUES
(1, 3, 1544002081, 1, 'ert', 'werer', 'ert', 'werewr', '45345', ''),
(2, 4, 1544002401, 0, 'ghfh1', 'ewrer1', 'gfdhdfh1', 'werwer1', '453451', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE `regions` (
  `id` int(6) UNSIGNED NOT NULL,
  `name_ru` varchar(32) DEFAULT NULL,
  `name_uz` varchar(32) DEFAULT NULL,
  `name_en` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name_ru`, `name_uz`, `name_en`) VALUES
(1, 'Андижанская область', 'Andijon viloyati', 'Andijan region'),
(2, 'Бухарская область', '', ''),
(3, 'Джизакская область', '', ''),
(4, 'Республика Каракалпакстан', '', ''),
(5, 'Кашкадарьинская область', '', ''),
(6, 'Навоийская область', '', ''),
(7, 'Наманганская область', '', ''),
(8, 'Самаркандская область', '', ''),
(9, 'Сурхандарьинская область', '', ''),
(10, 'Сырдарьинская область', '', ''),
(11, 'г.Ташкент и Ташкентская область', 'Toshkent shahar va Toshkent vil.', 'Tashkent city & Tashkent region'),
(12, 'Ферганская область', '', ''),
(13, 'Хорезмская область', '', ''),
(15, 'Кыргызстан', '', ''),
(16, 'Казахстан', '', ''),
(18, 'Грузия', '', 'Republic of Georgia '),
(19, 'Туркменистан', '', 'Turkmenistan'),
(20, 'Афганистан', '', 'Afghanistan');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `file` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `date`, `name`, `status`, `file`) VALUES
(1, 1552977515, 'wers', 0, 'about.html'),
(2, 1552996853, 'dfgdfg', 0, 'orig.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `transport`
--

CREATE TABLE `transport` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL COMMENT 'статус',
  `pos` int(10) DEFAULT '0',
  `type` tinyint(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'тип авто автобус, грузовик',
  `type_id` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название типа авто Бортовой, тягач...',
  `model` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `title_uz` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `title_en` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `file_title_ru` varchar(255) DEFAULT NULL,
  `file_title_uz` varchar(255) DEFAULT NULL,
  `file_title_en` varchar(255) DEFAULT NULL,
  `image` varchar(16) NOT NULL DEFAULT '0',
  `data` text COMMENT 'опции'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='информация об авто, а также несколько комплектов для 1 авто';

--
-- Дамп данных таблицы `transport`
--

INSERT INTO `transport` (`id`, `status`, `pos`, `type`, `type_id`, `model`, `category_id`, `title_ru`, `title_uz`, `title_en`, `file_title_ru`, `file_title_uz`, `file_title_en`, `image`, `data`) VALUES
(3, 1, 100, 0, '0', 'SAZ LE60', 0, 'Городской низкопольный автобус SAZ LE60', '', 'Low-floor city bus SAZ LE60', '', '', '', '1570009266.jpg', '{"complect":{"destination":"городской","class":"I","engine_model":"ISUZU 4HK1-TCC","engine_volume":"5 193","max-power":"190","power-rotate":"2600","cilinders":"1","type":"0","drive":"1","gearbox":"1","gearbox_count":"5","podves-front":"пневматическая","podves-back":"пневматическая","gearstop-front":"0","gearstop-back":"0","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 470 ","length":"8 065 ","height":"2 750","base":"4 540","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"дизельное ","fuel-size":"140","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"80","doors":"две служебные двери по правому борту кузова","count":"56 + 1","count_branch":"25","volume":"","mass":"10 200","mass-max":"","abs":"","file":"1555684867.pdf"}}'),
(4, 1, 80, 0, '0', 'SAZ HD50', 0, 'Междугородний автобус SAZ HD50', '', 'Intercity bus SAZ HD50', 'Каталог автобуса HD50', '', '', '1570008915.jpg', '{"complect":{"destination":"междугородний","class":"М3","engine_model":"ISUZU 4HK1-TCN ","engine_volume":"5 193","max-power":"150","power-rotate":"2600","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"6","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"1 869 ","base_back":"внутренних колёс - 1 650 , наружных колёс - 2 260 ","width":"2 320","length":"8 010","height":"2 800 (3 250 с кондиционером)","base":"4 475","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"150","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"80","doors":"две служебные двери по правому борту кузова, дверь водителя по левому борту","count":"44","count_branch":"29","volume":"","mass":"9 500","mass-max":"","abs":"имеется","file":"1555676854.pdf"}}'),
(5, 1, 70, 0, '0', 'SAZ NP26', 0, 'Междугородний автобус SAZ NP26', '', 'Intercity bus SAZ NP26', '', '', '', '1551785774.png', '{"complect":{"destination":"междугородний","class":"М3","engine_model":"ISUZU 4HF1","engine_volume":"4 334","max-power":"104","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"","base_front":"","base_back":"","width":"2 250","length":"6 920","height":"2 880","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"90","doors":"одна служебная дверь складного типа и одна аварийная дверь по правому борту кузова, дверь водителя по левому борту","count":"26","count_branch":"24","volume":"","mass":"6 500","mass-max":"","abs":"нет"}}'),
(6, 1, 90, 0, '0', 'SAZ HC40', 0, 'Городской автобус SAZ HC40', '', 'City bus SAZ HC40', '', '', '', '1554286506.png', '{"complect":{"destination":"городской (city)","class":"М3","engine_model":"ISUZU 4HF1","engine_volume":"4 334","max-power":"104","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 240","length":"6 920","height":"2 880","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"90","doors":"две служебные двери по правому борту кузова, дверь водителя по левому борту","count":"38","count_branch":"16","volume":"","mass":"7 000","mass-max":"","abs":"нет"}}'),
(7, 1, 210, 1, '0', 'ISUZU NQR 71 PL', 0, 'Автофургон <BR> ISUZU NQR 71 PL <BR> (г/п 4 000 кг)', '', '', 'Инструкция', '', '', '1551785344.png', '{"complect":{"destination":"бортовой автофургон","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 210","length":"6 730","height":"3 098","base":"3 815","radius":"","width_trucks":"2 155","length_trucks":"4 850","height_trucks":"1 980","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"8 000","mass-max":"3 995","abs":"имеется","file":"1554369298.pdf"}}'),
(8, 1, 98, 1, '0', 'ISUZU NPR 82 L (CNG)', 0, 'Бортовой тентовый <BR> ISUZU NPR 82 L (CNG) <BR> (г/п 3500 кг)', '', '', '', '', '', '1551784995.png', '{"complect":{"destination":"бортовой с каркасно-тентовой платформой","class":"N2","engine_model":"ISUZU 4HV1","engine_volume":"4 570","max-power":"130","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"6","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 300","length":"6 795","height":"3 000","base":"3 845","radius":"","width_trucks":"2 300","length_trucks":"4 860","height_trucks":"1 950","fuel-type":"2","fuel-model":"","fuel-size":"2 х 150","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"7 500","mass-max":"3 550","abs":"имеется"}}'),
(9, 1, 1000, 2, '0', 'NKR 55 E2', 0, 'Автомобиль скорой медицинской<BR>помощи NKR 55 E2', '', '', '', '', '', '1551784809.png', '{"complect":{"destination":"скорая медицинская помощь","class":"N2","engine_model":"ISUZU 4JB1","engine_volume":"2 771","max-power":"80","power-rotate":"3600","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"1 950","length":"5 110","height":"2 660","base":"2 460","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"75","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"1 + 4","count_branch":"","volume":"","mass":"4 000","mass-max":"","abs":"нет"}}'),
(10, 1, 950, 2, '0', 'NQR 71 PL', 0, 'Мусоровоз NQR 71 PL', '', '', '', '', '', '1551785436.png', '{"complect":{"destination":"мусоровоз","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 240","length":"7 130","height":"2 700","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"8 000","mass-max":"3 000","abs":"имеется"}}'),
(11, 1, 95, 1, '0', 'ISUZU NQR 71 PL', 0, 'Самосвал <BR> ISUZU NQR 71 PL  <BR> (г/п 4 000 кг)', '', '', NULL, NULL, NULL, '1551785513.png', '{"complect":{"destination":"самосвал","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 150","length":"6 214","height":"2 454","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"8 000","mass-max":"4 000","abs":"имеется"}}'),
(12, 1, 970, 2, '0', 'FTR 33 HLX', 0, 'Автомобиль пожарный<BR> FTR 33 HLX', '', '', '', '', '', '1551790325.png', '{"complect":{"destination":"пожарная","class":"N3","engine_model":"ISUZU 4HH1-S","engine_volume":"8 226","max-power":"200","power-rotate":"2850","cilinders":"2","type":"0","drive":"1","gearbox":"0","gearbox_count":"6","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 440","length":"7 750","height":"3 232","base":"4 250","radius":"","width_trucks":"2 440","length_trucks":"7 750","height_trucks":"3 232","fuel-type":"1","fuel-model":"","fuel-size":"200","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2 + 4","count_branch":"","volume":"","mass":"13 300","mass-max":"4 000","abs":""}}'),
(13, 1, 0, 2, '0', 'NQR 71 PL', 0, 'Комбинированная вакуумная подметально-поливомоечная машина NQR 71 PL', '', '', NULL, NULL, NULL, '1551781695.png', '{"complect":{"destination":"комбинированная","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 210","length":"6 730","height":"3 098","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"1","count_branch":"","volume":"","mass":"8 000","mass-max":"","abs":"имеется"}}'),
(14, 1, 97, 1, '0', 'ISUZU FVR 33 PLX', 0, 'Бортовой тентовый  <BR> ISUZU FVR 33 PLX <BR>  (г/п 8 000 кг) ', '', '', '', '', '', '1551786419.png', '{"complect":{"destination":"бортовой с каркасно-тентовой платформой","class":"N3","engine_model":"ISUZU 6HH1-S","engine_volume":"8 226","max-power":"200","power-rotate":"2850","cilinders":"2","type":"0","drive":"1","gearbox":"0","gearbox_count":"6","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 490","length":"9 330","height":"3 490","base":"5 550","radius":"","width_trucks":"2 400","length_trucks":"6 900","height_trucks":"2 000","fuel-type":"1","fuel-model":"","fuel-size":"200","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"15 100","mass-max":"7 580","abs":"нет"}}'),
(15, 1, 790, 2, '0', 'NQR 71 PL', 0, 'Ассенизатор NQR 71 PL', '', '', '', '', '', '1551785228.png', '{"complect":{"destination":"ассенизатор","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 200","length":"7 060","height":"2 560","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"8 000","mass-max":"","abs":"имеется"}}'),
(16, 1, 0, 2, '0', 'NQR 71PL', 0, 'Автовышка NQR 71PL', '', '', 'test', 'еуые', '', '1551790917.jpg', '{"complect":{"destination":"телескопическая вышка","class":"","engine_model":"","engine_volume":"","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2320","length":"7740","height":"3070","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"","mass-max":"","abs":"","file":""}}'),
(17, 1, 800, 2, '0', 'NQR 71PL', 0, 'Водовоз NQR 71PL', '', 'Автомобиль с кузовом водовоз', '', '', '', '1551790560.png', '{"complect":{"destination":"водовоз","class":"N2","engine_model":"ISUZU 4HG1","engine_volume":"4 554","max-power":"121","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"5","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 180","length":"6 700","height":"2 560","base":"3 815","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"1","fuel-model":"","fuel-size":"100","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"8 000","mass-max":"","abs":"имеется"}}'),
(18, 1, 940, 2, '0', 'NPR 82 L (CNG)', 0, 'Мусоровоз NPR 82 L (CNG)', '', '', '', '', '', '1551784895.png', '{"complect":{"destination":"мусоровоз","class":"N2","engine_model":"ISUZU 4HV1","engine_volume":"4 570","max-power":"130","power-rotate":"3200","cilinders":"1","type":"0","drive":"1","gearbox":"0","gearbox_count":"6","podves-front":"","podves-back":"","gearstop-front":"1","gearstop-back":"1","gears":"4х2 \\/ задние","base_front":"","base_back":"","width":"2 240","length":"7 300","height":"2 840","base":"3 845","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"2","fuel-model":"","fuel-size":"2 х 150","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"2","count":"2","count_branch":"","volume":"","mass":"7 500","mass-max":"1 140","abs":"имеется"}}'),
(19, 1, 120, 1, '0', 'ISUZU FVR 33 PLX', 0, 'Автофургон ISUZU FVR 33 PLX <BR> (г/п 8 000 кг)', '', '', '', '', '', '1551786831.png', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(20, 1, 205, 1, '0', 'ISUZU NPR 82 L (CNG)', 0, 'Автофургон <BR> ISUZU NPR 82 (CNG) <BR> (г/п 3 500 кг)', '', '', '', '', '', '1554296962.png', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(21, 1, 100, 1, '0', 'ISUZU NQR 71 PL', 0, 'Бортовой тентовый  <BR> ISUZU NQR 71 PL <BR>  (г/п 4 000 кг) ', '', '', NULL, NULL, NULL, '1554296693.png', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(23, 1, 90, 1, '0', '', 0, 'Самосвал ISUZU CYZ (г/п 20 000 кг)', '', '', '', '', '', '1558614822.png', '{"complect":{"destination":"самосвал","class":"N3","engine_model":"ISUZU 6WF1-TCC","engine_volume":"14 256","max-power":"390","power-rotate":"1800","cilinders":"2","type":"0","drive":"1","gearbox":"0","gearbox_count":"7","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"6х4","base_front":"","base_back":"","width":"2 470","length":"8 315","height":"2 990","base":"5 550","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(24, 1, 980, 2, '0', 'ISUZU NQR 71 PL', 0, 'Пожарная машина', '', '', '', '', '', '1558673065.png', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(25, 1, 208, 1, '0', 'ISUZU NMR', 0, 'Автофургон <BR> ISUZU NMR', '', '', '', '', '', '1558674430.jpg', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(26, 1, 105, 1, '0', '', 0, 'Автофургон <BR> ISUZU F', '', '', '', '', '', '1558674722.jpg', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(27, 1, 92, 1, '0', '', 0, 'Самосвал <BR> ISUZU  FVR33GLD <BR> (г/п 8 000 кг)', '', '', '', '', '', '1558675109.png', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}'),
(28, 1, 80, 1, '0', 'ISUZU NQR 71 PL', 0, 'Хлебовоз', '', '', '', '', '', '1558675349.jpg', '{"complect":{"destination":"","class":"","engine_model":"","engine_volume":"","max-power":"","power-rotate":"","cilinders":"0","type":"0","drive":"0","gearbox":"0","gearbox_count":"","podves-front":"","podves-back":"","gearstop-front":"0","gearstop-back":"0","gears":"","base_front":"","base_back":"","width":"","length":"","height":"","base":"","radius":"","width_trucks":"","length_trucks":"","height_trucks":"","fuel-type":"0","fuel-model":"","fuel-size":"","expense_city":"","expence_out":"","expense_both":"","accel_time":"","speed":"","doors":"","count":"","count_branch":"","volume":"","mass":"","mass-max":"","abs":""}}');

-- --------------------------------------------------------

--
-- Структура таблицы `transport_gallery`
--

CREATE TABLE `transport_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='галерея авто';

--
-- Дамп данных таблицы `transport_gallery`
--

INSERT INTO `transport_gallery` (`id`, `transport_id`, `image`) VALUES
(16, 1, '1543819165.png'),
(17, 1, '1543819166.jpg'),
(18, 1, '1543819168.jpg'),
(35, 6, '1545126195.jpg'),
(36, 6, '1545126196.jpg'),
(37, 6, '1545126197.jpg'),
(38, 6, '1545126198.jpg'),
(81, 19, '1545221717.jpg'),
(82, 19, '1545221718.jpg'),
(83, 13, '1551781696.png'),
(84, 13, '1551781704.png'),
(85, 13, '1551781706.png'),
(86, 13, '1551781713.png'),
(87, 9, '1551784817.png'),
(88, 9, '1551784821.png'),
(89, 9, '1551784826.png'),
(90, 18, '1551784903.png'),
(91, 18, '1551784905.png'),
(92, 8, '1551785003.png'),
(93, 8, '1551785005.png'),
(94, 15, '1551785229.png'),
(95, 15, '1551785232.png'),
(96, 15, '1551785237.png'),
(97, 7, '1551785345.png'),
(98, 7, '1551785352.png'),
(99, 10, '1551785438.png'),
(100, 10, '1551785439.png'),
(101, 10, '1551785445.png'),
(102, 11, '1551785515.png'),
(103, 11, '1551785518.png'),
(104, 11, '1551785523.png'),
(105, 3, '1551785599.png'),
(106, 3, '1551785603.png'),
(107, 3, '1551785608.png'),
(108, 5, '1551785776.png'),
(109, 5, '1551785781.png'),
(110, 5, '1551785786.png'),
(111, 14, '1551786423.png'),
(112, 14, '1551786425.png'),
(113, 19, '1551786837.png'),
(114, 19, '1551786841.png'),
(115, 12, '1551790331.png'),
(116, 12, '1551790335.png'),
(117, 17, '1551790562.png'),
(118, 17, '1551790566.png'),
(119, 17, '1551790573.png'),
(120, 17, '1551790575.png'),
(121, 16, '1551790918.jpg'),
(122, 16, '1551790919.jpg'),
(123, 16, '1551790920.jpg'),
(124, 16, '1551790922.jpg'),
(125, 4, '1551792493.png'),
(126, 4, '1551792496.png'),
(127, 4, '1551792500.png'),
(128, 4, '1551792504.png'),
(129, 20, '1554296963.jpg'),
(130, 4, '1555676576.jpg'),
(131, 4, '1555676650.jpg'),
(132, 4, '1555676701.jpg'),
(133, 3, '1555684646.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '0',
  `role` tinyint(1) UNSIGNED DEFAULT '0' COMMENT 'роли  1-менеджер 5-админ',
  `created_at` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '$2y$13$eRsZxKLsM5URak3rUBQVcOXener2LqXVP6YhHOzsTLUHPtFOv2c22', NULL, 'admin@info.ru', NULL, 1, 9, NULL, NULL),
(3, 'Elena', 'hGx2ZJ_12w5MEtzfZbSLxc8ByEEw1DRG', '$2y$13$FNzrbmII/j6XTxBrZeCJo.JXfCMPkF5/mHf6LPpqt/9v8cDuhUKKO', NULL, 'elena@mail.ru', NULL, 1, 9, 1543468873, 1554202993),
(5, 'User2', 'JFUX4nljcpzGEHvG2B6YvUMmf63UAQsu', '$2y$13$aE8ARVhr/REzqPHdWHsIbeoFCsZImA/zi20dYc42i3yUYUxMkFlym', NULL, 'user2@mail.ru', NULL, 1, 9, 1554202995, 1554202997);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text,
  `status` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='вакансии';

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id`, `category_id`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`, `status`) VALUES
(1, 1, 'Механик настройщик', '', '', '<p>\r\n\r\n</p><p>Samauto хочет сотрудничать с тобой, если ты обладаешь:</p><ul><li>- Уверенными знаниями в WordPress;</li><li>- HTML5/CSS3 на профессиональном уровне;</li><li>- Базовые знания php;</li><li>- Хорошими знаниями Javascript, bootstrap;</li><li>- Понятиями адаптивной верстки;</li><li>- Высшим, Средним либо средне-специальным образованием;</li><li>- Базовые знания английского языка;</li><li>- Angular, React будет плюсом;</li><li>- Умением пользоваться современными технологиями front-end разработки (less, sass, gulp, grunt...) Прикрепи к резюме примеры верстки и укажи вакансию - front-end разработчик!</li></ul><p>Мы обещаем:</p><ul><li>- Рабочий день <b>09:00-18:00</b>&nbsp;с часовым перерывом на обед;</li><li>- Дружный и приветливый коллектив;</li><li>- Работа в команде увлеченных своим делом профессионалов;</li><li>- Заработную плату от <b>5 000 000 сум;</b></li><li>- Кофе, чай и диван<b>!</b></li></ul>\r\n\r\n<br><p></p>', '', '', 0),
(2, 1, 'Механик - электронщик', '', '', '<p></p>\r\n\r\n<p>Samauto хочет сотрудничать с тобой, если ты обладаешь:</p><ul><li>- Уверенными знаниями в WordPress;</li><li>- HTML5/CSS3 на профессиональном уровне;</li><li>- Базовые знания php;</li><li>- Хорошими знаниями Javascript, bootstrap;</li><li>- Понятиями адаптивной верстки;</li><li>- Высшим, Средним либо средне-специальным образованием;</li><li>- Базовые знания английского языка;</li><li>- Angular, React будет плюсом;</li><li>- Умением пользоваться современными технологиями front-end разработки (less, sass, gulp, grunt...) Прикрепи к резюме примеры верстки и укажи вакансию - front-end разработчик!</li></ul><p></p>', '', '', 0),
(3, 4, 'Специалист по гарантии и развитию сервиса на внешнем рынке ', '', '', '<p><b>Должностные обязанности:</b><br><br>- Анализировать статистические данные закупок, определять наличие и потребность в запасных частях на текущий момент и на будущие периоды. <br>- Прогнозировать и открывать заказы на запасные части для технического обслуживания и ремонта автомобилей, производимых Предприятием.<br>- Анализировать потребительский рынок запасных частей. <br>- На основе анализа складских остатков и потребительского рынка составлять заказы на запасные части.<br>- Контролировать состояние заказов, участвовать в составлении контрактов.<br>- Обеспечивать наличие товара на складе по своим товарным группам в оптимальном количестве и ассортименте.<br>- Определять минимальный складской остаток товаров на складе Предприятия. <br>- Обеспечивать плановые показатели по оборачиваемости товарных групп.<br>- Обеспечивать постоянное наличие товаров повышенного спроса, регулярно проводить мониторинг наличия и продаж по товарам повышенного спроса с целью недопущения появления их дефицита.<br>- Принимать заявки на запасные части от дилеров, уполномоченных сервисных станций и центров, клиентов; изучать и по согласованию с начальником отдела давать подтверждение на предмет их наличия или отсутствия на складе и возможности их поставки.<br>- На основании заявок составлять накладные на реализацию запасных частей, и согласовывать их с руководством.<br>- Отслеживать поступление денежных средств по отгруженным запасным частям, состояние взаиморасчетов с клиентами, дилерами; принимать меры по своевременному и полному осуществлению взаиморасчетов за запасные части.<br>- Ежемесячно анализировать план-факт реализации и добиваться выполнения плана продаж запасных частей для каждого клиента.<br><br><b>Требования:</b><br><br>- Технические наклонности.<br>- Письменная грамотность.<br>- Умение вести переговоры (в офисе, в телефонном режиме, средствами эл. почты).<br>- Коммуникабельность.<br>- Доброжелательность в общении с клиентами и внутри коллектива.<br>- Дисциплинированность.<br>- Умение организовать работу.<br>- Лояльность к руководству и требовательность к подчиненным.<br>- Английский язык базовый, узбекский язык базовый, русский язык базовый.<br>- Водительские права категории B,C.<br><br><b>Условия:</b><br><br>Полный рабочий день.<br>На территории работодателя Ташкент ул,Амира Темруа , 13.<br><br><b>Контактное лицо:</b><br><br>Павлова Дания Наримановна<br>+99(890) 9540107<br>dpavlova@samauto.uz<br></p><p><br></p>', '', '', 1),
(4, 4, 'Специалист по гарантии и развитию сервиса на внутреннем рынке', '', '', '<p><b>Должностные обязанности:</b><br><br>- Анализировать статистические данные закупок, определять наличие и потребность в запасных частях на текущий момент и на будущие периоды. <br>- Прогнозировать и открывать заказы на запасные части для технического обслуживания и ремонта автомобилей, производимых Предприятием.<br>- Анализировать потребительский рынок запасных частей. <br>- На основе анализа складских остатков и потребительского рынка составлять заказы на запасные части.<br>- Контролировать состояние заказов, участвовать в составлении контрактов.<br>- Обеспечивать наличие товара на складе по своим товарным группам в оптимальном количестве и ассортименте.<br>- Определять минимальный складской остаток товаров на складе Предприятия. <br>- Обеспечивать плановые показатели по оборачиваемости товарных групп.<br>- Обеспечивать постоянное наличие товаров повышенного спроса, регулярно проводить мониторинг наличия и продаж по товарам повышенного спроса с целью недопущения появления их дефицита.<br>- Принимать заявки на запасные части от дилеров, уполномоченных сервисных станций и центров, клиентов; изучать и по согласованию с начальником отдела давать подтверждение на предмет их наличия или отсутствия на складе и возможности их поставки.<br>- На основании заявок составлять накладные на реализацию запасных частей, и согласовывать их с руководством.<br>- Отслеживать поступление денежных средств по отгруженным запасным частям, состояние взаиморасчетов с клиентами, дилерами; принимать меры по своевременному и полному осуществлению взаиморасчетов за запасные части.<br>- Ежемесячно анализировать план-факт реализации и добиваться выполнения плана продаж запасных частей для каждого клиента.<br><br><b>Требования:</b><br><br>- Технические наклонности.<br>- Письменная грамотность.<br>- Умение вести переговоры (в офисе, в телефонном режиме, средствами эл. почты).<br>- Коммуникабельность.<br>- Доброжелательность в общении с клиентами и внутри коллектива.<br>- Дисциплинированность.<br>- Умение организовать работу.<br>- Лояльность к руководству и требовательность к подчиненным.<br>- Английский язык базовый, узбекский язык базовый, русский язык базовый.<br>- Водительские права категории B,C.<br><br><b>Условия:</b><br><br>Полный рабочий день.<br>На территории работодателя Ташкент ул,Амира Темруа, 13.<br><br><b>Контактное лицо:</b><br><br>Павлова Дания Наримановна<br>+99(890) 9540107<br>dpavlova@samauto.uz</p><p><br></p>', '', '', 1),
(5, 4, 'Помощник генерального директора', '', '', '<p><b>Должностные обязанности:</b><br><br>Планирование и контроль рабочего дня руководителя:<br>&nbsp; - встреча посетителей руководителя;<br>&nbsp; - ведение деловой переписки;<br>&nbsp; - организация совещаний и переговоров и участие в них, протоколирование;<br>&nbsp; - организация деловых поездок, командировок и участие в них;<br>&nbsp; - подготовка аналитических и справочных материалов, презентаций;<br>&nbsp; - выполнение письменных и устных переводов;<br>&nbsp; - курирование и контроль исполнения поручений руководителя.<br><br><b>Требования:</b><br><br>Опыт работы 1 год.<br>Высшее образование.<br>Компьютерная грамотность.<br>Знание русского, узбекского, английского и др.языков свободное владение.<br>Водительские права категории B.<br><br><b>Условия:</b><br><br>Полный день.<br>Пять дней в неделю с 9.00 до 18.00 ч.<br>Соц.пакет. <br>Корпоративная связь.<br>На территории работодателя (г. Ташкент, ул. Амира Темура, 13).<br><br><b>Контактное лицо:</b><br><br>Павлова Дания Наримановна<br>+99(890) 9540107<br>dpavlova@samauto.uz<br><br></p>', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy_category`
--

CREATE TABLE `vacancy_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='категории для вакансий';

--
-- Дамп данных таблицы `vacancy_category`
--

INSERT INTO `vacancy_category` (`id`, `title_ru`, `title_uz`, `title_en`, `status`) VALUES
(1, 'Механик', '', '', 0),
(2, 'Повар', '', '', 0),
(3, 'Водитель', '', '', 0),
(4, 'Вакансии в Ташкентском офисе', '', '', 1),
(5, 'Вакансии на заводе в г.Самарканд', '', '', 1),
(6, 'Стажировка', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `workers_questions`
--

CREATE TABLE `workers_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `worker_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'кому сообщение',
  `date` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `fullname` varchar(128) DEFAULT NULL COMMENT 'фио в строке',
  `organization` varchar(255) DEFAULT NULL COMMENT 'организация',
  `subject` varchar(255) DEFAULT NULL COMMENT 'тема',
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `msg` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='вопросы сотрудникам';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars_slider`
--
ALTER TABLE `cars_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_cabine`
--
ALTER TABLE `car_cabine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_capacity`
--
ALTER TABLE `car_capacity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_direct`
--
ALTER TABLE `car_direct`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_options`
--
ALTER TABLE `car_options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_power`
--
ALTER TABLE `car_power`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_volume`
--
ALTER TABLE `car_volume`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_wheels`
--
ALTER TABLE `car_wheels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link` (`link_ru`),
  ADD KEY `link_uz` (`link_uz`),
  ADD KEY `link_en` (`link_en`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `categories_cars`
--
ALTER TABLE `categories_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link` (`link_ru`),
  ADD KEY `link_uz` (`link_uz`),
  ADD KEY `link_en` (`link_en`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `categories_parts`
--
ALTER TABLE `categories_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link` (`link_ru`),
  ADD KEY `link_uz` (`link_uz`),
  ADD KEY `link_en` (`link_en`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_users`
--
ALTER TABLE `company_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `doljnost_id` (`doljnost_id`);

--
-- Индексы таблицы `dillers`
--
ALTER TABLE `dillers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `dillers_office`
--
ALTER TABLE `dillers_office`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diller_id` (`diller_id`);

--
-- Индексы таблицы `dillers_services`
--
ALTER TABLE `dillers_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_id` (`office_id`),
  ADD KEY `dillers_id` (`diller_id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doljnost`
--
ALTER TABLE `doljnost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `download_price`
--
ALTER TABLE `download_price`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year` (`year`);

--
-- Индексы таблицы `history_events`
--
ALTER TABLE `history_events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history_gallery`
--
ALTER TABLE `history_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_gallery`
--
ALTER TABLE `products_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transport_gallery`
--
ALTER TABLE `transport_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`transport_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancy_category`
--
ALTER TABLE `vacancy_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers_questions`
--
ALTER TABLE `workers_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `cars_slider`
--
ALTER TABLE `cars_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `car_cabine`
--
ALTER TABLE `car_cabine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_capacity`
--
ALTER TABLE `car_capacity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_direct`
--
ALTER TABLE `car_direct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_options`
--
ALTER TABLE `car_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_power`
--
ALTER TABLE `car_power`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_volume`
--
ALTER TABLE `car_volume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `car_wheels`
--
ALTER TABLE `car_wheels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `categories_cars`
--
ALTER TABLE `categories_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `categories_parts`
--
ALTER TABLE `categories_parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `company_users`
--
ALTER TABLE `company_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `dillers`
--
ALTER TABLE `dillers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `dillers_office`
--
ALTER TABLE `dillers_office`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `dillers_services`
--
ALTER TABLE `dillers_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `doljnost`
--
ALTER TABLE `doljnost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `download_price`
--
ALTER TABLE `download_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `history_events`
--
ALTER TABLE `history_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT для таблицы `history_gallery`
--
ALTER TABLE `history_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT для таблицы `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `products_gallery`
--
ALTER TABLE `products_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `transport_gallery`
--
ALTER TABLE `transport_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `vacancy_category`
--
ALTER TABLE `vacancy_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `workers_questions`
--
ALTER TABLE `workers_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
