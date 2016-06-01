<?php 

class StrUtils 
{
	// Cortando cadenas de manera esmerada y organizada 
	public function cortarStrings($text, $longitud, $html = false) 
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
				// ubica tags html
				$tagsApertura = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
				$tagsCierre = "|</([a-zA-Z]+)>|";

				// Buscamos los tags HTML que abren para cerrarlos
				if (preg_match_all($tagsApertura, $final, $aBuffer)) {
					if (!empty($aBuffer[1])) {
						preg_match_all($tagsCierre, $final, $aBuffer2);

						if (count($aBuffer[1]) != count($aBuffer2[1])) {
							$aBuffer[1] = array_reverse($aBuffer[1]);

							foreach ($aBuffer[1] as $index => $tag) {
								if (empty($aBuffer2[1][$index]) || $aBuffer2[1][$index] != $tag) {
									$final .= '</' . $tag . '>';
								}
							}
						}
					}
				}
				break;
			}
		}

		return $final;
	}
	
}
