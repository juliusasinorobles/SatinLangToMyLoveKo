<?php

	function encrypt($string = '')
	{
	    $string = _convert_string_to_array($string);
	    $string = implode('%20', $string);
	    $string = base64_encode($string);
	    $string = str_replace('=', '', $string);
	    
	    $string = _convert_string_to_array($string);
	    $string = implode('%20', $string);
	    $string = base64_encode($string);
	    $string = str_replace('=', '', $string);
	    
	    return $string;
	}

	function decrypt($string = '')
	{
	    $string = base64_decode($string);
	    $string = str_replace('%20', '', $string);
	    
	    $string = base64_decode($string);
	    $string = str_replace('%20', '', $string);
	    
	    return $string;
	}
	
	function _convert_string_to_array($string)
	{
	    $chars_arr = array();

	    for ($i = 0; $i <= strlen($string) - 1; $i++)
	    {
	        $chars_arr[] = substr($string, $i, 1);
	    }
	    
	    return $chars_arr;
	}

?>