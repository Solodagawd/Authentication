
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `uid` (
  `uid` int(11) NOT NULL,
  `key` text NOT NULL,
  `username` text NOT NULL,
  `banned` int(11) NOT NULL,
  `hwid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `uid`
  ADD PRIMARY KEY (`uid`);

ALTER TABLE `uid`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
