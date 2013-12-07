<?

// funkcja czyszczaca zmienne formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

require_once('./filterek/class.inputfilter_clean.php');

function czysc_zmienne_formularza($input)
{
	$myFilter = new InputFilter($tags, $attr, $tag_method, $attr_method, $xss_auto);

        //zmienna do czyszczenia
	$input = stripslashes($input);

	// process input
	$result = $myFilter->process($input);

        //czysta zmienna
        $input=strip_tags($result);

        //zwrocenie wyniku
        return $input;
}
//koniec podstawowej funkcji czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


?>
