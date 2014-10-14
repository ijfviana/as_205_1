<?php
define(DIR_HOME,"./slides");
define(SUFFIX,"contents");

$json = file_get_contents("./slides/list.json");

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

// TODO: leer outline y poner los titulos en los slides generados

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {

        if ($key == "filename")
	{
		if (!file_exists (DIR_HOME."/".$val))
		{
			$fp = fopen(DIR_HOME.'/'.$val, 'w');
			fclose($fp);
			$trozos = explode("." , $file);
			$fp = fopen(DIR_HOME.'/'.trozos[0]."_" .SUFFIX.".".trozos[1], 'w');
			fclose($fp);
		}
	}
    }
}

?>
