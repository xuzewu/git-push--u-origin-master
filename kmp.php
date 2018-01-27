<?php
//abca
//前缀：a,ab,abc 
//后缀：bca,bc,a  重复的是'a'，因此权值为1
//abcab
//前缀：a,ab,abc,abca
//后缀：bcab,cab,ab,b 重复的是'ab'，因此权值为2
//权值算法
$pattern='ABCDABD';
$front=$end='';	
$str=strlen($pattern);
$first=$pattern[0];
$next[]=0;
for($k=1;$k<$str;$k++){ //第一个循环，对字符串'ABCDABD'本身进行拆分成A,AB,ABC等
	$next[]=0; //权值默认为0，如果匹配出了长度，则修改。
	$front=$end=$head=$tail=null; 
	$first.=$pattern[$k];
	$long=strlen($first);
	for($i=0;$i<$long-1;$i++){ //这里对拆分成的字符串再进行首尾拆分，例如ABC拆分成前缀A,AB，后缀，BC,C
		$front.=$first[$i];
		$end=$first[$long-$i-1].$end; 
		$head[]=$front;
		$tail[]=$end;
	}
	$len=null; //权值
	for($i=0;$i<count($head);$i++){ //这里是对拆分后的前缀和后缀进行比较
		for($j=0;$j<count($tail);$j++){
			if($head[$i]==$tail[$j]){
				!$len?$len=strlen($head[$i]):(strlen($head[$i])>$len?$len=strlen($head[$i]):'');
				$next[$k]=$len;
			}
		}	
	}
}	
//匹配算法
$string="BBC ABCDAB ABCDABCDABDABCDABDE";
$sum=$start=0;
$right=null;
for($i=$start;$i<strlen($string);$i++){
	for($k=0;$k<$str;$k++){
		if($right==$pattern){
			$sum++; //匹配正确的次数
		}	
		if($string[$i+$k]!=$pattern[$k]){
			$right=null; //匹配错误，清空
			$start+=$k-$next[$k]; //前进的位数等于匹配正确数减权值
			break;
		}else{
			$right.=$pattern[$k]; //匹配正确，连接起来
		}	
	}
}	
echo $sum;
