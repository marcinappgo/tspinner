<?php
namespace Marcinappgo\TSpinner;

/**
 * This class spins.
 *
 * @copyright  2018 Marcin Gontarz
 * @license    https://opensource.org/licenses/MIT   MIT
 * @link       https://github.com/marciappgo/tspinner
 * @since      Class available since Release 0.0.1
 */
class TSpinner {

	private $text;
	private $innerPointer = 0;
	private $result = '';
	private $spinFound = true;

	public function __construct($text) {
		$this->text = $text;
	}
	
	public function spin() {
		
		// SPINNING UNTIL THERE IS NOTHING MORE TO SPIN
		while($this->spinFound) {
			
			// LE GUARD
			$this->spinFound = false;
			
			$results = array();
			preg_match_all('/\{([^\{\}]+)\}/', $this->text, $results);
			
			foreach($results[0] AS $k => $s) {
				$this->spinFound = true;
				$candidates = explode('|', $results[1][$k]);
				$winner = $this->choose($candidates);
				$this->text = preg_replace('/'.preg_quote($s).'/',$winner, $this->text, 1);
			}
			
		}
		
		return $this->text;
		
	}
	
	private function choose($candidates) {
		$found = 0;
		while($this->lastFound == $found && count($candidates) > 1) {
			// SOME BASE HEX NUMBER - ALMOST RANDOM
			$hash = hexdec("0x".strtoupper(substr(md5(microtime()),10,5)));

			$search = count($candidates);
		
			// THE INDEX OF CANDIDATE FOUND
			$found = $hash % $search;
		}
		
		
		$this->lastFound = $found;
		
		// THE WINNER
		return $candidates[$found];
	}
	
}