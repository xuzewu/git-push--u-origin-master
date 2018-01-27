<?php
$a='zaqbdacde';
$b='zaqbacdef';
for($i=0;$i<strlen($a);$i++){
	$c='';
	$k=$i;
	for($j=0;$j<strlen($b);$j++){	
		if($a[$k]!=$b[$j]){
			$d[]=$c;
			$c='';
			$k=$i;
			continue;
		}	
		$c.=$b[$j];	
		if($k<strlen($a)-1){
			$k++;
		}
	}
}			
print_r($d);
foreach($d as $v){
	!isset($long) || strlen($long)<strlen($v) ? $long=$v : '' ;
}
echo $long;	
foreach($d as $v){
	if(strlen($long)==strlen($v)){
		$e[]=$v;
	}	
}
print_r($e);