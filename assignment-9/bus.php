<?php
class Bus {
	public $armed = false;
	public $exploded = false;
	public $currentSpeed = 0;

	function setSpeed($mph) {
		$this->currentSpeed = $mph;
		if ($this->currentSpeed > 50 && $this->armed == false) {
			$this->armed = true;
		}

 		if ($this->currentSpeed < 50 && $this->armed) {
 			$this->exploded = true;
 		}
 		if ($this->currentSpeed >= 80) {
 			echo "<img src='http://www.fm104.ie/getmedia/2c0e0d23-2626-4205-a41f-9cd3a4a6ed7f/bus-jump.gif'><br>";
 		}
	}

	function getSpeed() {
		return $this->currentSpeed;
	}

	function trigger() {
		$this->exploded = true;
	}

	function status() {
		//echo "Bomb Exploded: " . $this->exploded . "<br>";
		if($this->armed && !$this->exploded){
			echo "Speed is " . $this->currentSpeed . " mph<br> Bomb is ARMED<br>";
		}elseif($this->exploded){
			echo "Bomb has Exploded <br> <img src='http://i.imgur.com/rdIsTE2.gif'><br>";

		}
		else{
			echo "Speed is " . $this->currentSpeed . " mph<br> Bomb is unarmed<br>";
		}
	}
}

?>