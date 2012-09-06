BEGIN:VCALENDAR
METHOD:PUBLISH
PRODID:-//moodle2google//NONSGML 0.1//EN
VERSION:2.0
<?php
foreach ($events as $event) {
  $this->viewEvent($event);
}
?> 
END:VCALENDAR
