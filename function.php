<?php

/*
//データ確認用
echo('<pre>');
var_dump($_POST);
echo('</pre>');
echo('<pre>');
var_dump($result);
echo('</pre>');
exit();
*/

//while
//0から10まで出力する
/*$i = 0;
while($i < 11){
    echo $i;
    $i++;
};*/

//do{繰り返す処理}while(条件);そんな使わない
/*$i = 0;
do{
    echo $i;
    $i++;
}while($i < 11);

for ($i = 0; $i < 11; $i++){
    echo $i;
}
*/
/*-----------------------------------------------------------*/ 
/**
* 接続率計算
* @param string $record キャラクターデータ
* @return bool $Access_power 
*/
function Access_power($record){
    if($record["attack"] > 3){
        $attack_count = $record["attack"] * 2 - 3;
        }else{
        $attack_count = $record["attack"];
        }
        if($record["toughness"] > 3){
        $toughness_count = $record["toughness"] * 2 - 3;
        }else{
        $toughness_count = $record["toughness"];
        }
        if($record["speed"] > 3){
        $speed_count = $record["speed"] * 2 - 3;
        }else{
        $speed_count = $record["speed"];
        }
        if($record["technic"] > 3){
        $technic_count = $record["technic"] * 2 - 3;
        }else{
        $technic_count = $record["technic"];
        }
        if($record["imagination"] > 3){
        $imagination_count = $record["imagination"] * 2 - 3;
        }else{
        $imagination_count = $record["imagination"];
        }
        if($record["chase"] > 3){
        $chase_count = $record["chase"] * 2 - 3;
        }else{
        $chase_count = $record["chase"];
        }
        $Access_count = $attack_count + $toughness_count + $speed_count + $technic_count + $imagination_count + $chase_count;
        $Access_power = 100 - $Access_count;
    
        return $Access_power;
    }

