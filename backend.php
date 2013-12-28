<?php
//Here it is assumed that first suggestion in the array is for function return type. Say for C you can't use suggestion int test[] for function return. So it is supposed that first suggestion every time is used for function return :)
header('Content-Type: application/json');
$language=json_decode($_POST['language']);
@$className=$_POST['className'];
$functionName=$_POST['functionName'];
$functionReturnType=$_POST['functionReturnType'];
$functionReturnDimension=$_POST['functionReturnDimension'];
$file = 'db.json';
$string = file_get_contents("db.json") or die('Could not read database!');
$php_array=json_decode($string,true);
$i=0;
$j=0;
$result=array();
$variable_string;
for($i;$i<count($php_array['language']);$i++)
{
	if($php_array['language'][$i]['name']==$language[$j])
	{
		$variables=json_decode($_POST[$language[$i].'variables']);
		$variable_string=implode(", ", $variables);
		$fuctionSignature=$php_array['language'][$i]['fuctionSignature'];
		$fuctionSignature = str_replace("functionName", $functionName, $fuctionSignature);
		for($k=0;$k<count($php_array['language'][$i]["type"]);$k++)
		{
			if($php_array['language'][$i]["type"][$k]["name"]==$functionReturnType)
			{
				$functionReturn=str_replace("test",'',$php_array['language'][$i]["type"][$k]['dimension'][$functionReturnDimension]["suggestion"][0]);
				$fuctionSignature = str_replace("functionReturn", $functionReturn, $fuctionSignature);
			}
		}
		 $str=$variable_string;
		$fuctionSignature = str_replace("variables",$str, $fuctionSignature);	
		if(!is_null($className))
		$fuctionSignature = str_replace("className", $className, $fuctionSignature);
		$result[$j]=$fuctionSignature;		
		$j++;
	}
}
echo json_encode($result);
?> 