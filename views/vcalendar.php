BEGIN:VCALENDAR<?php echo "\r\n"; ?>
METHOD:PUBLISH<?php echo "\r\n"; ?>
PRODID:-//moodle2google//NONSGML 0.1//EN<?php echo "\r\n"; ?>
VERSION:2.0<?php echo "\r\n"; ?>
<?php
foreach ($events as $event) {
  $this->viewEvent($event);
}
?> 
END:VCALENDAR
