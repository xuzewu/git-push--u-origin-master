<?php
function bhh($a=[],$n=0){
	if(count($a)==8){
		$_GET[]=$a;
		print_r($a).'&nbsp';
		return;
	}
	for($i=0;$i<8;$i++){
		if($n==0){
			$a[0]=$i;
			bhh($a,$n+1);
		}else{	
			$bool=true;
			foreach($a as $k=>$v){
				if($i==$v or abs($i-$v)==$n-$k){	
					$bool=false;
					break;
				}
			}	
			if($bool){
				$a[$n]=$i;
				bhh($a,$n+1);
			} 
		}	
	} 
}
bhh();	
echo count($_GET);
		 
		
		