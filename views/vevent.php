BEGIN:VEVENT<?php echo "\r\n"; ?>
UID:<?php echo $event->getUid(); ?> <?php echo "\r\n"; ?>
SUMMARY:<?php echo $course; ?> <?php echo "\r\n"; ?>
DESCRIPTION:<?php echo $note . '\n' . $thing . '\n' . $event->getDescription(); ?> <?php echo "\r\n"; ?>
LOCATION:<?php echo $place; ?> <?php echo "\r\n"; ?>
CLASS:PUBLIC<?php echo "\r\n"; ?>
LAST-MODIFIED:<?php echo $event->getProperty('last-modified'); ?><?php echo "\r\n"; ?>
DTSTAMP:<?php echo $event->getProperty('dtstamp'); ?><?php echo "\r\n"; ?>
DTSTART:<?php echo $event->getProperty('dtstart'); ?><?php echo "\r\n"; ?>
<?php if ($event->getProperty('dtend') != null): ?>
DTEND:<?php echo $event->getProperty('dtend'); ?><?php echo "\r\n"; ?>
<?php endif; ?>
CATEGORIES:<?php echo $event->getProperty('categories'); ?><?php echo "\r\n"; ?>
END:VEVENT<?php echo "\r\n"; ?>
