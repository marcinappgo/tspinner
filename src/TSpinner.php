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
	
	private $start = '{';
	private $end = '}';
	private $pipe = ']';


	public function __construct($text) {
		$this->text = $text;
	}
	
}