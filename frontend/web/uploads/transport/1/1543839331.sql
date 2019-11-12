

-- Дамп структуры для таблица samauto.cars_slider
CREATE TABLE IF NOT EXISTS `cars_slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` varchar(512) DEFAULT NULL,
  `text_uz` varchar(512) DEFAULT NULL,
  `text_en` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='слайдер разделов авто';

-- Дамп данных таблицы samauto.cars_slider: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `cars_slider` DISABLE KEYS */;
INSERT INTO `cars_slider` (`id`, `category_id`, `status`, `image`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`) VALUES
	(1, 13, 1, '1539775527.jpg', 'Грузовые', '', '', 'Грузовые авто', '', ''),
	(2, 11, 1, '1539776735.png', 'Легковые', '', '', 'Легковые авто', '', ''),
	(3, 12, 1, '1539776761.png', 'Автобусы', '', '', 'Автобусная техника', '', ''),
	(4, 14, 1, '1539776784.png', 'Спецтехника', '', '', 'Техника специального назначения', '', '');
/*!40000 ALTER TABLE `cars_slider` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_cabine
CREATE TABLE IF NOT EXISTS `car_cabine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='тип кабины одноместная многоместная и тд';

-- Дамп данных таблицы samauto.car_cabine: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_cabine` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_cabine` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_capacity
CREATE TABLE IF NOT EXISTS `car_capacity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(11) DEFAULT NULL,
  `value` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='грузоподъемность';

-- Дамп данных таблицы samauto.car_capacity: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_capacity` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_capacity` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_direct
CREATE TABLE IF NOT EXISTS `car_direct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `value` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='направление загрузки';

-- Дамп данных таблицы samauto.car_direct: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_direct` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_direct` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_options
CREATE TABLE IF NOT EXISTS `car_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(11) unsigned DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='опции авто';

-- Дамп данных таблицы samauto.car_options: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_options` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_power
CREATE TABLE IF NOT EXISTS `car_power` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned NOT NULL DEFAULT '0',
  `value` float unsigned NOT NULL DEFAULT '0' COMMENT 'мощность двигателя',
  `engine` varchar(64) NOT NULL COMMENT 'марка двигателя',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='мощности двигателей';

-- Дамп данных таблицы samauto.car_power: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_power` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_power` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_type
CREATE TABLE IF NOT EXISTS `car_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='типы авто для данного бортовой, рефрежератор, самосвал и тд';

-- Дамп данных таблицы samauto.car_type: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_type` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_volume
CREATE TABLE IF NOT EXISTS `car_volume` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `value` float unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='объем платформы';

-- Дамп данных таблицы samauto.car_volume: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_volume` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_volume` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.car_wheels
CREATE TABLE IF NOT EXISTS `car_wheels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='колесная формула';

-- Дамп данных таблицы samauto.car_wheels: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `car_wheels` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_wheels` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link` (`link_ru`),
  KEY `link_uz` (`link_uz`),
  KEY `link_en` (`link_en`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='категории для локализации';

-- Дамп данных таблицы samauto.categories: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`) VALUES
	(1, 0, NULL, 'Электрика', '', '', 'elektrika', '', ''),
	(2, 0, NULL, 'Кузов', '', '', 'kuzov', '', ''),
	(3, 0, NULL, 'Двигатель', '', '', 'dvigatel', '', ''),
	(4, 0, NULL, 'Салон', '', '', 'salon', '', ''),
	(5, 1, NULL, 'Проводка', '', '', 'provodka', '', ''),
	(6, 3, NULL, 'Коленвал', '', '', 'kolenval', '', ''),
	(7, 3, NULL, 'Карбюратор', '', '', 'karbyurator', '', ''),
	(8, 4, NULL, 'Сиденья', '', '', 'sidenya', '', ''),
	(9, 2, NULL, 'Фары', '', '', 'fary', '', ''),
	(10, 10, NULL, 'ыцу', '', '', 'ycu', '', '');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.categories_cars
CREATE TABLE IF NOT EXISTS `categories_cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link` (`link_ru`),
  KEY `link_uz` (`link_uz`),
  KEY `link_en` (`link_en`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='категория для типовк авто';

-- Дамп данных таблицы samauto.categories_cars: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `categories_cars` DISABLE KEYS */;
INSERT INTO `categories_cars` (`id`, `parent_id`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`) VALUES
	(11, 0, NULL, 'Легковые', '', '', 'legkovye', '', ''),
	(12, 0, NULL, 'Автобусы', '', '', 'avtobusy', '', ''),
	(13, 0, NULL, 'Грузовые', '', '', 'gruzovye', '', ''),
	(14, 0, NULL, 'Спецтехника', '', '', 'spectehnika', '', '');
/*!40000 ALTER TABLE `categories_cars` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.categories_parts
CREATE TABLE IF NOT EXISTS `categories_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(16) DEFAULT NULL,
  `title_ru` varchar(128) DEFAULT NULL,
  `title_uz` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `link_ru` varchar(128) DEFAULT NULL,
  `link_uz` varchar(128) DEFAULT NULL,
  `link_en` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link` (`link_ru`),
  KEY `link_uz` (`link_uz`),
  KEY `link_en` (`link_en`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='категория для запчастей';

-- Дамп данных таблицы samauto.categories_parts: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `categories_parts` DISABLE KEYS */;
INSERT INTO `categories_parts` (`id`, `parent_id`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`) VALUES
	(11, 0, NULL, 'Лобовое стекло', '', '', 'lobovoe-steklo', '', '');
/*!40000 ALTER TABLE `categories_parts` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(6) DEFAULT NULL,
  `name_ru` varchar(24) DEFAULT NULL,
  `name_uz` varchar(24) DEFAULT NULL,
  `name_en` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COMMENT='Города\r\n';

-- Дамп данных таблицы samauto.cities: ~130 rows (приблизительно)
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='о компании - руководство';

-- Дамп данных таблицы samauto.companies: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name_ru`, `name_uz`, `name_en`, `text_ru`, `text_uz`, `text_en`, `address_ru`, `address_uz`, `address_en`, `days_ru`, `days_uz`, `days_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `email`, `site`, `image`, `status`) VALUES
	(1, 'Иванов Иван иванович', '', '', 'Директор', '', '', 'wqeeryty', '', '', '+998-91-364\r\n+998-90-365', '', '', 'Директор', '0', '0', '234234', 'wer@werer.ww', NULL, '1542889516.png', 1),
	(2, 'Петров Петр Петрович', '', '', '', '', '', 'erq', '', '', 'wer', '', '', 'Зам. Директора', '', '', '', '', NULL, '1542889505.png', 1);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.company_users
CREATE TABLE IF NOT EXISTS `company_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'для подчинения',
  `doljnost_id` int(10) unsigned DEFAULT '0' COMMENT 'должность',
  `doljnost_ru` varchar(64) DEFAULT NULL,
  `doljnost_uz` varchar(64) DEFAULT NULL,
  `doljnost_en` varchar(64) DEFAULT NULL,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT 'тип пользователя 0-работник 5- менеджер 9-директор',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'вкл или откл',
  `name_ru` varchar(64) DEFAULT NULL,
  `name_uz` varchar(64) DEFAULT NULL,
  `name_en` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `site` varchar(64) DEFAULT NULL,
  `days_ru` varchar(512) DEFAULT NULL,
  `days_uz` varchar(512) DEFAULT NULL,
  `days_en` varchar(512) DEFAULT NULL,
  `contacts` varchar(512) DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `parent_id` (`parent_id`),
  KEY `doljnost_id` (`doljnost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='сотрудники компании \r\n';

-- Дамп данных таблицы samauto.company_users: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `company_users` DISABLE KEYS */;
INSERT INTO `company_users` (`id`, `company_id`, `parent_id`, `doljnost_id`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `type`, `status`, `name_ru`, `name_uz`, `name_en`, `phone`, `email`, `site`, `days_ru`, `days_uz`, `days_en`, `contacts`, `image`) VALUES
	(1, 1, 3, 1, 'Бухгалтер', '', '', 0, 1, 'Алиса', '', '', '23432345', 'aads@sdd.sd', NULL, 'sasdf', NULL, NULL, 'asdf', '1542889671.png'),
	(2, 2, 4, 2, 'Гл. бухгалтер', '', '', 0, 1, 'Анна', '', '', '23434345', 'aads@sdd.sd', NULL, 'Пн-Пт', NULL, NULL, 'ул, Мустакиллик', '1542889749.png'),
	(3, 0, 0, 0, 'Директор', '', '', 1, 1, 'Иван Иванович Иванов', '', '', '+998902354665', 'aads@sdd.sd', NULL, 'пн-ср с 9 до 21', NULL, NULL, '2222', '1542969307.png'),
	(4, 0, 0, 0, 'Зам. Директора', '', '', 1, 1, 'Петров Петр сергеевич', '', '', '+998902354665', 'aads@sdd.sd', NULL, 'укцук', NULL, NULL, '23434', '1543488379.png'),
	(5, 0, 3, 0, 'Почтовик', '', '', 0, 1, 'Василий Васильевич Алибабаев', '', '', '234234234', 'aads@sdd.sd', NULL, '', '', '', 'уцкук', '1543490652.png'),
	(6, 0, 3, 0, 'Начальник отдела УБОП', '', '', 0, 1, 'Анатолий Максимович петькин', '', '', '234345345', 'aads@sdd.sd', NULL, '', '', '', '', '1543494578.png'),
	(7, 0, 6, 0, 'Ведущий механик', '', '', 0, 1, 'Арсений Николай Спаржа', '', '', '32432434', 'aads@sdd.sd', NULL, '', '', '', '', '1543490878.png');
/*!40000 ALTER TABLE `company_users` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.dillers
CREATE TABLE IF NOT EXISTS `dillers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(10) unsigned DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='диллеры';

-- Дамп данных таблицы samauto.dillers: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `dillers` DISABLE KEYS */;
INSERT INTO `dillers` (`id`, `region_id`, `status`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`, `text_ru`, `text_uz`, `text_en`, `address_ru`, `address_uz`, `address_en`, `phone`, `email`, `site`, `image`) VALUES
	(1, 11, 1, '8568', '', '', '8568', '', '', '85', '', '', '6', '', '', '7477', 'tuyu@rtert.ret', 'rty', '1541759918.png'),
	(2, 2, 1, 'Новый диллер', '', '', 'novyy-diller', '', '', '', '', '', '', '', '', '43545', 'erewr@wewe.we', 'erwer.we', '1542784507.jpg');
/*!40000 ALTER TABLE `dillers` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.dillers_office
CREATE TABLE IF NOT EXISTS `dillers_office` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diller_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id`),
  KEY `diller_id` (`diller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='офисы диллеров';

-- Дамп данных таблицы samauto.dillers_office: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `dillers_office` DISABLE KEYS */;
INSERT INTO `dillers_office` (`id`, `diller_id`, `status`, `title_ru`, `title_uz`, `title_en`, `username_ru`, `username_uz`, `username_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `text_ru`, `text_uz`, `text_en`, `phones`, `fax`, `email`, `site`, `lat`, `lon`) VALUES
	(1, 1, 1, 'Головной офис', '', '', 'wer', '', '', 'wer', '', '', '4345', 'rwer', '', '', '32453245', '32432', 'ertre@erwe.er', 'werer', '42.3012', '69.02356'),
	(2, 2, 1, 'Новый офис', '', '', '', '', '', '', '', '', '', '', '', '', '234', '', '', '', '', '');
/*!40000 ALTER TABLE `dillers_office` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.dillers_services
CREATE TABLE IF NOT EXISTS `dillers_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diller_id` int(10) unsigned NOT NULL DEFAULT '0',
  `office_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`),
  KEY `dillers_id` (`diller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='сервисы диллеров';

-- Дамп данных таблицы samauto.dillers_services: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `dillers_services` DISABLE KEYS */;
INSERT INTO `dillers_services` (`id`, `diller_id`, `office_id`, `status`, `title_ru`, `title_uz`, `title_en`, `username_ru`, `username_uz`, `username_en`, `doljnost_ru`, `doljnost_uz`, `doljnost_en`, `phone`, `text_ru`, `text_uz`, `text_en`, `phones`, `fax`, `email`, `site`, `lat`, `lon`) VALUES
	(1, 1, 1, 1, 'Центральный сервис-центр', '', '', 'ФИО сервиса', '', '', 'rteyetyet eryy', '', '', 'wret', 'tyurtu tyuru', '', '', '45345', '3454', 'ett', 'ert', '34', '33'),
	(2, 2, 2, 1, 'Центральный сервис-центр №2', '', '', '', '', '', '', '', '', '34324', '', '', '', '', '', '', '', '', ''),
	(3, 1, 1, 1, 'Второй сервисный центр', '', '', 'Иванов иван', '', '', 'Оператор центра', '', '', '2343434', 'адрес центра', '', '', '+99891-568-52-69\r\n+99890-123-56-66', '24234', 'info@samauto.uz ', 'samauto.uz ', '43.02323', '69.23564');
/*!40000 ALTER TABLE `dillers_services` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) unsigned DEFAULT NULL COMMENT 'тип 0-фото 1-файл',
  `status` tinyint(1) unsigned DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `file` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='документы';

-- Дамп данных таблицы samauto.documents: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` (`id`, `type`, `status`, `title_ru`, `title_uz`, `title_en`, `file`) VALUES
	(1, 0, 1, 'ewr', 'rwer', 'wer', '1540892213.jpg'),
	(2, 1, 1, 'енкен', 'куене', 'уен', '1540892807.jpg'),
	(3, 1, 1, 'erw', 'wer', 'wer', NULL),
	(4, 0, 1, 'уауйк', 'цук', 'цук', '1540892542.jpg');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.doljnost
CREATE TABLE IF NOT EXISTS `doljnost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(32) DEFAULT NULL,
  `name_uz` varchar(32) DEFAULT NULL,
  `name_en` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='должности';

-- Дамп данных таблицы samauto.doljnost: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `doljnost` DISABLE KEYS */;
INSERT INTO `doljnost` (`id`, `name_ru`, `name_uz`, `name_en`) VALUES
	(1, 'Руководитель', '', ''),
	(2, 'Менеджер', NULL, NULL);
/*!40000 ALTER TABLE `doljnost` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(4) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `year` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='история';

-- Дамп данных таблицы samauto.history: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`id`, `year`, `status`) VALUES
	(1, 2018, 1),
	(2, 2019, 1),
	(3, 2020, 1);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.history_events
CREATE TABLE IF NOT EXISTS `history_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `history_id` int(10) unsigned DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='события в истории';

-- Дамп данных таблицы samauto.history_events: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `history_events` DISABLE KEYS */;
INSERT INTO `history_events` (`id`, `history_id`, `date`, `status`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`) VALUES
	(1, 1, '1999-10-10', 0, 'tr', '', '', 'ry', '', ''),
	(2, 2, '2018-10-05', 1, 'ewrer', '', '', 'werqwe', '', ''),
	(3, 1, NULL, 1, 'et', '', '', 'et', '', ''),
	(4, 1, NULL, 0, 'ertwertwert', '', '', 'werte33', '', ''),
	(5, 2, '1199-11-11', 1, '', '', '', '', '', ''),
	(6, 2, '1999-11-11', 1, 'aaa', '', '', 'aaa', '', ''),
	(7, 1, '2000-11-11', 1, 'dddd', '', '', 'ddd', '', ''),
	(8, 1, '1999-11-11', 1, 'yuiuiytui', '', '', 'ytiytui', '', ''),
	(9, 1, '1999-12-22', 1, 'aaa', '', '', 'aaa', '', ''),
	(10, 1, '2018-11-01', 1, 'teet', '', '', 'ertertert', '', ''),
	(11, 3, '1999-12-11', 1, 'dgg', '', '', 'dfgdg', '', '');
/*!40000 ALTER TABLE `history_events` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.history_gallery
CREATE TABLE IF NOT EXISTS `history_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `history_id` int(10) unsigned DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='галерея для событий истории';

-- Дамп данных таблицы samauto.history_gallery: ~21 rows (приблизительно)
/*!40000 ALTER TABLE `history_gallery` DISABLE KEYS */;
INSERT INTO `history_gallery` (`id`, `history_id`, `image`) VALUES
	(10, 2, '1540984025.png'),
	(11, 2, '1540984026.png'),
	(12, 2, '1540984028.png'),
	(13, 4, '1540985054.png'),
	(14, 4, '1540985055.png'),
	(15, 4, '1540985057.png'),
	(16, 5, '1540986423.png'),
	(17, 5, '1540986424.png'),
	(18, 6, '1540986468.png'),
	(19, 6, '1540986469.png'),
	(20, 6, '1540986470.png'),
	(21, 7, '1540987082.png'),
	(22, 8, '1540987125.png'),
	(23, 8, '1540987126.png'),
	(24, 8, '1540987127.png'),
	(25, 9, '1540987291.png'),
	(26, 10, '1541566274.png'),
	(27, 10, '1541566275.png'),
	(28, 11, '1541571354.png'),
	(29, 11, '1541571355.png'),
	(30, 11, '1541571356.png');
/*!40000 ALTER TABLE `history_gallery` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.missions
CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num` varchar(4) NOT NULL DEFAULT '0',
  `file` varchar(16) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `data` mediumtext COMMENT 'инфо о мисии',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='миссия компании';

-- Дамп данных таблицы samauto.missions: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
INSERT INTO `missions` (`id`, `num`, `file`, `title_ru`, `title_uz`, `title_en`, `data`) VALUES
	(1, '01', '1540884599.png', 'Миссия', 'sdfdf', 'sdfd', '[{"title_ru":"eyyer eyyrty trye rye","text_ru":"werr yeyty rtyrt y\\r\\n\\r\\n yry \\r\\ny\\r\\n rey ey ","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"sfdf sdf df df,msd f,sd,f sd fsdkfn skdnf kjsdf sdf","text_ru":"fds ;lmsdfl; msdl;fm l;sdfml; dlsf;s;ldf \\r\\nsdf sldfm l;sdmfl; sdl;fl;sdf; sdf\\r\\nsd f;lsmd;lf sd;lf \\r\\nsdfsdfs","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
	(2, '02', '1540884613.png', 'ИСМ', '', '', '[{"title_ru":"уцкцук","text_ru":"цук","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
	(3, '03', '1540884628.png', 'Видение', '', '', '[{"title_ru":"aa","text_ru":"aa","title_uz":"","text_uz":"","title_en":"","text_en":""},{"title_ru":"44","text_ru":"tyt","title_uz":"","text_uz":"","title_en":"","text_en":""}]'),
	(12, '22', '1540884638.png', 'Энергоменеджмент', '', '', '[{"title_ru":"цуку","text_ru":"кцук","title_uz":"","text_uz":"","title_en":"","text_en":""}]');
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(10) unsigned DEFAULT NULL,
  `hit` tinyint(1) unsigned DEFAULT NULL COMMENT 'показат на главной',
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
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='новости';

-- Дамп данных таблицы samauto.news: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `date`, `hit`, `image`, `title_ru`, `title_uz`, `title_en`, `link_ru`, `link_uz`, `link_en`, `text_ru`, `text_uz`, `text_en`, `status`) VALUES
	(1, 1538741016, NULL, '1539154803.jpg', 'www', '', '', 'www', '', '', '<p>werr</p>', '', '', 1),
	(2, 1541624400, 1, '1539166042.jpg', 'aaadsdasdas', '', '', 'aaadsdasdas', '', '', '<p>addsa</p>', '', '', 1),
	(3, 1541624400, 1, '1539166193.jpg', 'чсмссм', '', '', 'chsmssm', '', '', '<p>исмисми&nbsp;</p><p>rfwer wer wlekqrn lkqwenrkl nwqeklrn klqwer\\qwe</p><p>r we;lrm; ewq;lwemrl; qwel;rqw le;rl;we klsdnlkf nalf</p><p>a; ldfmaslkdfm lksadf as</p><p>fa dkflmadlkf mal;sdf</p><p>dfasdf</p>', '', '', 1),
	(4, 1511384400, 1, '1539166211.jpg', 'трплро', '', '', 'trplro', '', '', '<p>bfjksdfsdf</p><p>sdfasd,ff</p><p>asdf\\\'asd\'\\fasdf</p><p>asd;f,asdfasdf</p><p>tyuu</p><p><br></p>', '', '', 1),
	(5, 1528624400, 1, '1541656447.png', 'test', '', '', 'test', '', '', '<p>test</p>', '', '', 1),
	(6, 1542142800, 1, '1542705505.jpg', 'se', '', '', 'se', '', '', '<p>rwer<br></p>', '', '', 1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.news_gallery
CREATE TABLE IF NOT EXISTS `news_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(10) unsigned DEFAULT NULL,
  `type` tinyint(1) unsigned DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'название фото или ссылка youtube ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы samauto.news_gallery: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `news_gallery` DISABLE KEYS */;
INSERT INTO `news_gallery` (`id`, `news_id`, `type`, `image`) VALUES
	(10, 1, 0, '1542705543.jpg'),
	(11, 1, 0, '1542714352.jpg'),
	(12, 1, 1, 'https://www.youtube.com/embed/icc54QUCbX8'),
	(13, 1, 0, '1541653024.png'),
	(14, 1, 0, '1541653035.png'),
	(15, 4, 0, '1541657013.png'),
	(16, 4, 0, '1541657019.png'),
	(17, 3, 0, '1541673588.png'),
	(18, NULL, 0, NULL),
	(19, NULL, 1, '0NLKzS0yjKE');
/*!40000 ALTER TABLE `news_gallery` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(32) NOT NULL DEFAULT '0',
  `data` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='информация о страницах';

-- Дамп данных таблицы samauto.pages: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `page`, `data`) VALUES
	(1, 'contacts', '{"sam_address_ru":"ООО «САМАРКАНДСКИЙ АВТОМОБИЛЬНЫЙ ЗАВОД» 140160. г. Самарканд, ул. Бухорий, 5","sam_phone1_ru":"+998 (66) 230-8711","sam_phone2_ru":"+998 (66) 230-8711","sam_fax_ru":"+998 (66) 230-8711","sam_email_ru":"info@samuto11.uz","sam_site_ru":"samuto11.uz","sam_address_uz":"","sam_phone1_uz":"","sam_phone2_uz":"","sam_fax_uz":"","sam_email_uz":"","sam_site_uz":"","sam_address_en":"","sam_phone1_en":"","sam_phone2_en":"","sam_fax_en":"","sam_email_en":"","sam_site_en":"","sam_lat":"39.6496297","sam_lon":"66.9100557","tash_address_ru":"Ташкентское Представительство ООО «Самаркандский Автомобильный Завод». 100047. г. Ташкент, Мирабадский район, ул. Амира Темура, 13","tash_phone1_ru":"+998 (66) 230-8700","tash_phone2_ru":"+998 (66) 230-8700","tash_fax_ru":"+998 (66) 230-8700","tash_email_ru":"info@samuto.uz","tash_site_ru":"samuto.uz","tash_address_uz":"","tash_phone1_uz":"","tash_phone2_uz":"","tash_fax_uz":"","tash_email_uz":"","tash_site_uz":"","tash_address_en":"","tash_phone1_en":"","tash_phone2_en":"","tash_fax_en":"","tash_email_en":"","tash_site_en":"","tash_lat":"41.314548","tash_lon":"69.280291"}');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'категория - локализация',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hit` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'в слайдер',
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
  `image` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='локализация\r\nтовары, комплектующие';

-- Дамп данных таблицы samauto.products: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `cat_id`, `status`, `hit`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`, `num`, `model`, `quantity`, `mass`, `material_ru`, `material_uz`, `material_en`, `length`, `width`, `height`, `weight`, `image`) VALUES
	(1, 5, 1, 1, 'www', '', '', 'eee', '', '', '111', 'е23', '1', '', '', '', '', '12', '122', '12', '12', '1538996062.png'),
	(2, 8, 1, 1, 'test', '', '', 'test', '', '', '12', 'test', '2', '', 'Кожа', '', '', '122', '123', '2222', '34', '1539082676.png'),
	(3, 6, 1, 1, 'четкий', '', '', 'Четкий, очень вкусно!', '', '', '33', 'модель 1', '4', '', 'пластмасс', '', '', '23', '22', '33', '43', '1539082800.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.products_gallery
CREATE TABLE IF NOT EXISTS `products_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='галерея для товара';

-- Дамп данных таблицы samauto.products_gallery: ~23 rows (приблизительно)
/*!40000 ALTER TABLE `products_gallery` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `products_gallery` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(6) unsigned NOT NULL DEFAULT '0',
  `name_ru` varchar(24) DEFAULT NULL,
  `name_uz` varchar(24) DEFAULT NULL,
  `name_en` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы samauto.regions: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `name_ru`, `name_uz`, `name_en`) VALUES
	(1, 'Андижанская обл.', NULL, NULL),
	(2, 'Бухарская обл.', NULL, NULL),
	(3, 'Джизакская обл.', NULL, NULL),
	(4, 'Респ. Каракалпак', NULL, NULL),
	(5, 'Кашкадарьинская', NULL, NULL),
	(6, 'Навоийская обл.', NULL, NULL),
	(7, 'Наманганская обл', NULL, NULL),
	(8, 'Самаркандская об', NULL, NULL),
	(9, 'Сурхандарьинская обл.', NULL, NULL),
	(10, 'Сырдарьинская обл.', NULL, NULL),
	(11, 'Ташкентская обл.', NULL, NULL),
	(12, 'Ферганская обл.', NULL, NULL),
	(13, 'Хорезмская обл.', NULL, NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.transport
CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'статус',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT 'тип авто автобус, грузовик',
  `type_id` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название типа авто Бортовой, тягач...',
  `model` varchar(255) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title_ru` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `title_uz` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `title_en` varchar(128) NOT NULL DEFAULT '0' COMMENT 'название авто',
  `image` varchar(16) NOT NULL DEFAULT '0',
  `data` text COMMENT 'опции',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='информация об авто, а также несколько комплектов для 1 авто';

-- Дамп данных таблицы samauto.transport: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `transport` DISABLE KEYS */;
INSERT INTO `transport` (`id`, `status`, `type`, `type_id`, `model`, `category_id`, `title_ru`, `title_uz`, `title_en`, `image`, `data`) VALUES
	(1, 1, 0, '1', 'A-234', 1, 'Автобус пассажирский', '', '', '1543836239.png', '{"complect":{"engine_volume":"5","power":"255","cilinders":"2","type":"0","drive":"0","gearbox":"0","gearbox_count":"6","podves-front":"Макферсон","podves-back":"Зависимая с листовыми рессорами","gearstop-front":"1","gearstop-back":"1","width":"2300","length":"6800","height":"3200","base":"2x4","radius":"1200","fuel-type":"0","fuel-model":"АИ-91","fuel-size":"95","expense_city":"15","expence_out":"7.8","expense_both":"12,5","accel_time":"21","speed":"160","doors":"3","count":"48","volume":"520","mass":"3400","mass-max":"2300","file":"1543836270.png"}}');
/*!40000 ALTER TABLE `transport` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.transport_gallery
CREATE TABLE IF NOT EXISTS `transport_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transport_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`transport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='галерея авто';

-- Дамп данных таблицы samauto.transport_gallery: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `transport_gallery` DISABLE KEYS */;
INSERT INTO `transport_gallery` (`id`, `transport_id`, `image`) VALUES
	(16, 1, '1543819165.png'),
	(17, 1, '1543819166.jpg'),
	(18, 1, '1543819168.jpg');
/*!40000 ALTER TABLE `transport_gallery` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `role` tinyint(1) unsigned DEFAULT '0' COMMENT 'роли  1-менеджер 5-админ',
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы samauto.user: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `status`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, '$2y$13$eRsZxKLsM5URak3rUBQVcOXener2LqXVP6YhHOzsTLUHPtFOv2c22', NULL, 'admin@info.ru', NULL, 1, 9, NULL, NULL),
	(3, 'test', 'nOLrtvytZXDGiICG51CU7V3y2jsg8dB_', '$2y$13$yDrIZjVAk4Jk8gQETskj3.7hnDrcw1vG9WDpxqLnc6Aix31/g/VrK', NULL, 'admin@test.ru', NULL, 1, 9, 1543468873, 1543470163);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.vacancy
CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_uz` text,
  `text_en` text,
  `status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='вакансии';

-- Дамп данных таблицы samauto.vacancy: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`id`, `category_id`, `title_ru`, `title_uz`, `title_en`, `text_ru`, `text_uz`, `text_en`, `status`) VALUES
	(1, 1, 'Механик настройщик', '', '', '<p>\r\n\r\n</p><p>Samauto хочет сотрудничать с тобой, если ты обладаешь:</p><ul><li>- Уверенными знаниями в WordPress;</li><li>- HTML5/CSS3 на профессиональном уровне;</li><li>- Базовые знания php;</li><li>- Хорошими знаниями Javascript, bootstrap;</li><li>- Понятиями адаптивной верстки;</li><li>- Высшим, Средним либо средне-специальным образованием;</li><li>- Базовые знания английского языка;</li><li>- Angular, React будет плюсом;</li><li>- Умением пользоваться современными технологиями front-end разработки (less, sass, gulp, grunt...) Прикрепи к резюме примеры верстки и укажи вакансию - front-end разработчик!</li></ul><p>Мы обещаем:</p><ul><li>- Рабочий день <b>09:00-18:00</b>&nbsp;с часовым перерывом на обед;</li><li>- Дружный и приветливый коллектив;</li><li>- Работа в команде увлеченных своим делом профессионалов;</li><li>- Заработную плату от <b>5 000 000 сум;</b></li><li>- Кофе, чай и диван<b>!</b></li></ul>\r\n\r\n<br><p></p>', '', '', 1),
	(2, 1, 'Механик - электронщик', '', '', '<p></p>\r\n\r\n<p>Samauto хочет сотрудничать с тобой, если ты обладаешь:</p><ul><li>- Уверенными знаниями в WordPress;</li><li>- HTML5/CSS3 на профессиональном уровне;</li><li>- Базовые знания php;</li><li>- Хорошими знаниями Javascript, bootstrap;</li><li>- Понятиями адаптивной верстки;</li><li>- Высшим, Средним либо средне-специальным образованием;</li><li>- Базовые знания английского языка;</li><li>- Angular, React будет плюсом;</li><li>- Умением пользоваться современными технологиями front-end разработки (less, sass, gulp, grunt...) Прикрепи к резюме примеры верстки и укажи вакансию - front-end разработчик!</li></ul><p></p>', '', '', 1);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.vacancy_category
CREATE TABLE IF NOT EXISTS `vacancy_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_uz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='категории для вакансий';

-- Дамп данных таблицы samauto.vacancy_category: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `vacancy_category` DISABLE KEYS */;
INSERT INTO `vacancy_category` (`id`, `title_ru`, `title_uz`, `title_en`, `status`) VALUES
	(1, 'Механик', '', '', 1),
	(2, 'Повар', '', '', 1),
	(3, 'Водитель', '', '', 1);
/*!40000 ALTER TABLE `vacancy_category` ENABLE KEYS */;


-- Дамп структуры для таблица samauto.workers_questions
CREATE TABLE IF NOT EXISTS `workers_questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_id` int(10) unsigned DEFAULT NULL COMMENT 'кому сообщение',
  `date` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `fullname` varchar(128) DEFAULT NULL COMMENT 'фио в строке',
  `organization` varchar(255) DEFAULT NULL COMMENT 'организация',
  `subject` varchar(255) DEFAULT NULL COMMENT 'тема',
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `msg` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='вопросы сотрудникам';
