<?php
$a=[0,1,2,3,4,5,6,7];
function f($a,$str=''){
	if(count($a)==1){
		$_GET[]=$str.$a[0];
		return ;
	}
	for($i=0;$i<count($a);$i++){
		list($a[0],$a[$i])=[$a[$i],$a[0]];
		f(array_slice($a,1),$str.$a[0]);
	}
}
f($a); 
foreach($_GET as $n){
	$bool=true;
	for($i=7;$i>=1;$i--){
		if(!$bool){
			break;
		}	
		for($j=$i-1;$j>=0;$j--){
			if(abs($n[$i]-$n[$j])==$i-$j){	
				$bool=false;
				break;
			}	
		}
	}
	if($bool){
		$_POST[]=$n;
	}	
} 
print_r($_POST);