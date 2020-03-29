<?php
/**
 * 
 */
class formate 
{
	
public function date($value)
{
	# code...
	return date("F j, Y,g:i a",strtotime($value));
}
public function readmore($text,$limit)
{
	# code...
	$text=$text."";
	//$text=substr($text, 0,$limit);
	$text=substr($text, 0,strrpos($text, " "));
	$text=$text."...";
	return $text;
}
public function validation($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
}
?>