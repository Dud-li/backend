<?php
if(isset($_GET["num"])){
    $num = $_GET["num"];
	$array = explode(",", $num);
	$x = round(count($array)/2);
	while($x > 0)
	{
		for($i = $x; $i < count($array);$i++){
			$temp = $array[$i];
			$j = $i;
			while($j >= $x && $array[$j-$x] > $temp)
			{
				$array[$j] = $array[$j - $x];
				$j -= $x;
			}
			$array[$j] = $temp;
		}
		$x = round($x/2.2);
	}
	for ($i = 0; $i<count($array);$i++)
		echo "$array[$i] ";
}
?>