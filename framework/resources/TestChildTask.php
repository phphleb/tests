<?php

namespace Phphleb\Tests\Framework\Resources;

class TestChildTask extends \Hleb\Main\Commands\MainLaunchTask
{
  public function setChildDate($date) {
      $this->setDate($date);
  }

  public function givenChildHour($data) {
      return $this->givenHour($data);
  }

    public function givenChildMonth($data) {
        return $this->givenMonth($data);
    }

    public function givenChildMinutes($data, $cmd) {
        return $this->givenMinutes($data, $cmd);
    }

    public function changeChildLeapYear() {
        return $this->changeLeapYear();
    }

    public function changeAmChild() {
        return $this->changeAm();
    }

    public function changePmChild() {
        return $this->changePm();
    }

    public function byPatternChild($format, $date, $cmd) {
        return $this->byPattern($format, $date, $cmd);
    }
}
