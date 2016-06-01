<?php 

class StrUtils 
{
	// Cortando cadenas de manera esmerada
	public function cortarStrings($text, $longitud) 
	{
		$final = '';
		$total = 0;

		// Separamos el texto por los espacios
		foreach (explode(' ', $text) as $word) {
			if ($word != '') {
				$final .= ' '. $word;
				$total += strlen($word);
			}

			// Ya se supero el límite establecido, salimos del foreach
			if ($total >= $longitud) {
				break;
			}
		}

		return $final;
	}
	
}
