<?php

// Coloca a data do padrão aaaa-mm-dd para dd/mm/aaaa
	function trataData($data){
		$ano = substr($data,0,4);
		$mes = substr($data,5,2);
		$dia = substr($data,-2,2);
		if($data){
			return($dia."/".$mes."/".$ano);
		}else{
			return NULL;
		}
	}
	
	function trataDataBD($data){
		$dia = substr($data,0,2);
		$mes = substr($data,3,2);
		$ano = substr($data,6,4);
		return($ano."-".$mes."-".$dia);
	}	

    function removeCharEspecial($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '', $str);
        $str = preg_replace('/_+/', '', $str); // ideia do Bacco :)
        return $str;
    }
?>