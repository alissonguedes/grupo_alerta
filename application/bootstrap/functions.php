<?php

use App\Models\Admin\ConfigModel;

if (!function_exists('data')) {
	function data($data, $format = 'd.m.Y H:i:s', $new_format)
	{

		$mes  = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
		$data = date($format, strtotime($data));
		$data = preg_replace('/\.(\d){2}\./', $new_format . $mes[date('m', strtotime($data)) - 1] . $new_format, $data);
		return $data;
	}
}

if (!function_exists('get_config')) {

	function get_config($config)
	{

		$cfg = new ConfigModel();

		return $cfg->getConfig($config)->first()->value ?? null;

	}

}

function tradutor($traducao, $lang = null, $except = null)
{

	$idioma = is_null($lang) ? (isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : get_config('language')) : $lang;

	// Formata a data e hora de acordo com o Idioma
	if (is_object($traducao)) {

		$date = (string) $traducao;

		switch ($idioma) {

			case 'en':$formato = 'Y-m-d h:ia';
				break;
			case 'pt-br':$formato = 'd/m/Y H\hi';
				break;
			case 'hr':$formato = 'd-m-y h:ia';
				break;

		}

		return date($formato, strtotime($date));

	}

	$return = is_string($traducao) ? json_decode($traducao, true) : $traducao;

	if (is_array($return) && array_key_exists($idioma, $return)) {

		if (!empty($return[$idioma])) {
			return $return[$idioma];
		}

	} else {

		return tradutor([$idioma => $traducao]);

	}

	$catch = [
		'en'    => 'Translation not available for this language',
		'hr'    => 'A fordítás nem érhetó el ezen a nyelven',
		'pt-br' => 'Tradução não disponível para este idioma',
	];

	$except = !is_null($except) ? $except : $catch;

	return $except[$idioma];

}

if (!function_exists('hashCode')) {
	function hashCode($str)
	{
		return !empty($str) ? substr(hash('sha512', $str), 0, 50) : null;
	}
}

function configuracoes()
{

}

/**
 * Remove caratecres especiais
 * Converte todos os caracteres de um arquivo para caixa baixa
 * Remove espaçamentos
 */
function limpa_string($string, $replace = '-')
{
	$output = [];
	$a      = ['Á' => 'a', 'À' => 'a', 'Â' => 'a', 'Ä' => 'a', 'Ã' => 'a', 'Å' => 'a', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'å' => 'a', 'a' => 'a', 'Ç' => 'c', 'ç' => 'c', 'Ð' => 'd', 'É' => 'e', 'È' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'Ñ' => 'n', 'ñ' => 'n', 'O' => 'o', 'Ó' => 'o', 'Ò' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'Õ' => 'o', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'ö' => 'o', 'õ' => 'o', 'ø' => 'o', 'œ' => 'o', 'Š' => 'o', 'Ú' => 'u', 'Ù' => 'u', 'Û' => 'u', 'Ü' => 'u', 'U' => 'u', 'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'Y' => 'y', 'Ý' => 'y', 'Ÿ' => 'y', 'ý' => 'y', 'ÿ' => 'y', 'Ž' => 'z', 'ž' => 'z'];
	$string = strtr($string, $a);
	$regx   = [' ', '.', '+', '@', '#', '!', "$", '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', ';', ':', ',', '\\', '|', '£', '¢', '¬', '/', '?', '°', '´', '`', '{', '}', '[', ']', 'ª', 'º', '~', '^', "\'", "\""];

	$replacement = str_replace($regx, '|', trim(strtolower($string)));
	$explode     = explode('|', $replacement);

	for ($i = 0; $i < count($explode); $i++) {
		if (!empty($explode[$i])) {
			$output[] = trim($explode[$i]);
		}
	}

	return implode($replace, $output);

}

function download($path, $filename)
{

	$headers = null;

	// $headers .= ('Content-Description: File Transfer');
	// $headers .= ('Content-Type: application/octet-stream');
	// $headers .= ('Content-Disposition: attachment; filename=' . $filename);
	// $headers .= ('Content-Transfer-Encoding: binary');
	// $headers .= ('Expires: 0');
	// $headers .= ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	// $headers .= ('Pragma: public');
	// $headers .= ('Content-Length: ' . Storage::size($path));

	return Storage::download($path, $filename);

}

/**
 * Função para exibir o endereço
 * @param Array $config [ col, set, div ]
 * @param col => string - the column name
 * @param set => boolean - show or hide from list
 * @param div => string - separator caracter
 * @param Array [ 'col' => 'column1', 'set' => boolean, 'div' => '<separator>']
 */
function exibir_endereco(array $config = [
	[
		'col' => 'address',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'address_nro',
		'set' => true,
		'div' => '<br> ',
	],
	[
		'col' => 'cep',
		'set' => true,
		'div' => ' - ',
	],
	[
		'col' => 'bairro',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'complemento',
		'set' => true,
		'div' => '<br>',
	],
	[
		'col' => 'cidade',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'uf',
		'set' => true,
		'div' => ' - ',
	],
	[
		'col' => 'pais',
		'set' => true,
		'div' => '',
	],
]) {
	$endereco = null;

	foreach ($config as $ind => $val) {

		$local = null;

		if (!empty($val) && !is_null($config[$ind++])) {

			if (!empty(get_config($val['col']))) {
				$local = get_config($val['col']);
			}

			if ($ind < count($config)) {

				if (!is_null(get_config($config[$ind++]['col']))) {

					/**
					 * Aqui, verifica se a condição do próximo array
					 * é válida para exibir o próximo caráctere separador
					 */
					if (!is_null($local)) {

						if ($ind < count($config)) {
							$local .= $val['div'];
						}

					}

				}

			}

		}

		$endereco .= $local;

	}

	return $endereco;
}

if (!function_exists('base_url')) {

	function base_url()
	{

		$baseUrl    = request()->getBaseUrl();
		$currentUrl = request()->getRequestUri();

		$dir = explode($baseUrl, $currentUrl);
		array_shift($dir);

		$path = explode('/', implode('/', $dir));
		array_shift($path);

		$baseUrl = is_dir(BASEDIR . 'app/Http/Controllers/' . ucfirst($path[0])) ? $path[0] : '/';

		return url($baseUrl) . '/';

	}

}
