BEGIN:VEVENT
UID:<?php echo $event->getUid(); ?> 
SUMMARY:<?php echo $course; ?> 
DESCRIPTION:<?php echo $note . '\n' . $thing . '\n' . $event->getDescription(); ?> 
LOCATION:<?php echo $place; ?> 
CLASS:PUBLIC
LAST-MODIFIED:<?php echo $event->getProperty('last-modified'); ?> 
DTSTAMP:<?php echo $event->getProperty('dtstamp'); ?> 
DTSTART:<?php echo $event->getProperty('dtstart'); ?> 
DTEND:<?php echo $event->getProperty('dtend'); ?> 
CATEGORIES:<?php echo $event->getProperty('categories'); ?> 
END:VEVENT
