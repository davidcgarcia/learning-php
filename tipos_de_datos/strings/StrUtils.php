<?php 

class StrUtils 
{
	/**
	* Cortando cadenas de manera esmerada y organizada 
	*
	* @param $text: texto que será acortado
	* @param $longitud: cantidad de caracteres en donde se cortará el string 
	* @param $html: [opcional]
	*
	* @return string
	*/
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
	
	/** 
	* Indica si una cadena de texto o número es palídromo 
	* 
	* @param $str
	*
	* @return boolean
	*/
	public function esPalindromo($str) 
	{
		// Casteamos a string el parámetro enviado 
		(string)$str;

		if (strlen($str) == 1) {
			return true;
		} else {
			// Limpiamos la cadena antes de ser evaluada
			$str = $this->limpiarCadena($str);
			
			// Verificamos si es igual en ambos sentidos 
			if (strrev($str) == $str) {
				return true;
			}

			return false;
		}
	}

	/** 
	* Elimina caracteres especiales de la cadena de texto 
	*
	* @param $str
	*
	* @return string
	*/
	public function limpiarCadena()
	{
		// Tags HTML 
		$str = strip_tags($str);

		// Espacios
		$str = str_replace('', '', strtolower($str));

		// Acentos
		$p = ['/á/', '/é/', '/í/', '/ó/', '/ú/'];
		$r = ['a', 'e', 'i', 'o', 'u',];
		$str = preg_replace($p, $r, $str);

		// Acentos HTML
		$p = ['/&aacute;/', '/&eacute;/', '/&oacute;/', '/&uacute;/', ];
		$r = ['a', 'e', 'i', 'o', 'u',];
		$str = preg_replace($p, $r, $str);

		// Signos de puntuación 
		$str = preg_replace('/%&.+?;/', '', $str);
		$str = str_replace(',', '', $str);

		return $str;
	}
}
