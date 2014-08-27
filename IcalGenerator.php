<?php

class IcalGenerator {
  private $text = false;
  private $remove = array();

  public function __construct($debug = false, $remove = array()) {
    $this->text = $debug;
    $this->remove = $remove;
  }
  
  public function generate($url) {
    if ($this->text)
      header('Content-Type:text/plain; charset=utf-8');
    else
      header('Content-Type:text/calendar; charset=utf-8');


    $raw = file_get_contents($url);
    preg_match_all('/BEGIN:VEVENT(.+?)END:VEVENT/s', $raw, $events);

    $events = $events[0];

    include 'views/vcalendar.php';
  }

  private function read($event, $key) {
    preg_match('/' . $key . ':(.+)\r/', $event, $matches);
    return isset($matches[1]) ? $matches[1] : '';
  }

  public function viewEvent($event) {
    $uid = $this->read($event, 'UID');
    preg_match('/SUMMARY:(.+?)DESCRIPTION:/s', $event, $matches);
    $summary = str_replace("\r\n\t ", '', $matches[1]);
    foreach ($this->remove as $needle) {
      if (strpos($summary, $needle) !== false)
        return;
    }

    $categories = $this->read($event, 'CATEGORIES');

    preg_match('/Kursus: <\/span>(.+?) \(/', $summary, $matches);
    $course = $matches[1];

    $dtstamp = $this->read($event, 'DTSTAMP');
    $dtstart = $this->read($event, 'DTSTART');
    $dtend = $this->read($event, 'DTEND');
    $lastModified = $this->read($event, 'LAST-MODIFIED');

    preg_match('/Lokale: <\/span>(.+?) - <span/', $summary, $matches);
    $place = isset($matches[1]) ? $matches[1] : '';

    preg_match('/<span lang="da" class="multilang">Note: <\/span>(.+?) - <span/', $summary, $matches);
    $note = isset($matches[1]) ? $matches[1] : '';

    include 'views/vevent.php';
  }
}
