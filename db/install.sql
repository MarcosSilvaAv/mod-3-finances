INSERT INTO `{c2r-prefix}_modules` (`name`, `folder`, `code`, `sort`) VALUES ("{c2r-mod-name}", "{c2r-mod-folder}", "{c2r-mod-code}", 0);


CREATE TABLE `{c2r-prefix}_3_finances_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `iban` varchar(45) NOT NULL,
  `swift` varchar(45) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `code` text,
  `balance` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `{c2r-prefix}_3_finances_accounts_movements` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `value` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `{c2r-prefix}_3_finances_accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `{c2r-prefix}_3_finances_accounts_movements`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `{c2r-prefix}_3_finances_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `{c2r-prefix}_3_finances_accounts_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;
COMMIT;
