<?php
header('Content-Type: application/json');
$language=json_decode($_POST['language']);
@$className=$_POST['className'];
$functionName=$_POST['functionName'];
$functionReturnType=$_POST['functionReturnType'];
$file = 'db.json';
$string = file_get_contents("db.json") or die('Could not read database!');
$php_array=json_decode($string,true);
$i=0;
$j=0;
$result=array();
for($i;$i<count($php_array['language']);$i++)
{
	if($php_array['language'][$i]['name']==$language[$j])
	{
		$variables=json_decode($_POST[$language[$i].'variables']);
		$variable_string=implode(", ", $variables);
		$fuctionSignature=$php_array['language'][$i]['fuctionSignature'];
		$fuctionSignature = str_replace("functionName", $functionName, $fuctionSignature);
		$fuctionSignature = str_replace("functionReturnType", $functionReturnType, $fuctionSignature);
		
		$fuctionSignature = str_replace("variables", $variable_string, $fuctionSignature);	
		if(!is_null($className))
		$fuctionSignature = str_replace("className", $className, $fuctionSignature);
		$result[$j]=$fuctionSignature;		
		$j++;
	}
}
echo json_encode($result);

?>