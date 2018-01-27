<?php
$str='abcddeefff';
for($i=0;$i<strlen($str);$i++){
	$bool=true;
	$n=1;
	if(isset($new)){
		foreach($new as $k=>$v){
			if($str[$i]==$k){
				$bool=false;
				break;
				
			}	
		}	
	}	
	if(!$bool){
		continue;
	}	
	for($j=$i+1;$j<strlen($str);$j++){
		if($str[$i]==$str[$j]){
			++$n;
		}		
	}
	$new[$str[$i]]=$n;
}
$c=0;
$e='';
$sum=0;
foreach($new as $k=>$v){
	if($c==2){
		$new=array_slice($new,2);
		break;
	}
	$a[]=$k;
	$e.=$k;
	$sum+=$v;
	$c++;
}	
$d=0;
foreach($new as $v){
	if($sum<=$v){
		$new=array_merge(array_slice($new,0,$d),[$e=>$sum],array_slice($new,$d));
		break;
	}
	$d++;
}

print_r($new);	
//$a=[['d','e'],[['c',['a','b']],'f']];


	
	
	
