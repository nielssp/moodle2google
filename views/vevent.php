<?php echo "\r\n"; ?>
BEGIN:VEVENT<?php echo "\r\n"; ?>
UID:<?php echo $uid; ?> <?php echo "\r\n"; ?>
SUMMARY:<?php echo $course; ?> <?php echo "\r\n"; ?>
DESCRIPTION:<?php echo $note; ?> <?php echo "\r\n"; ?>
LOCATION:<?php echo $place; ?> <?php echo "\r\n"; ?>
CLASS:PUBLIC<?php echo "\r\n"; ?>
LAST-MODIFIED:<?php echo $lastModified; ?><?php echo "\r\n"; ?>
DTSTAMP:<?php echo $dtstamp; ?><?php echo "\r\n"; ?>
DTSTART:<?php echo $dtstart ?><?php echo "\r\n"; ?>
DTEND:<?php echo $dtend ?><?php echo "\r\n"; ?>
CATEGORIES:<?php echo $categories; ?><?php echo "\r\n"; ?>
END:VEVENT<?php echo "\r\n"; ?>
