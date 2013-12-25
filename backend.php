<?php
$language=$_POST['language'];
$num_var=$_POST['numArg'];
$variables=$_POST['var_name'];
$type=$_POST['type'];
$functionName=$_POST['functionName'];
$dim=$_POST['dim'];
if($language=='c')
{
	$i=0;
	for($i=0;$i<$num_var;$i++)
	{
		echo $type[$i].' '.$variables[$i].', ';
		
	}
}
else if($language=='java')
{
	$className=$_POST['className'];
	
}
?>