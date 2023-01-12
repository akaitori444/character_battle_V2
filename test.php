<?php




function Access_power()
{
    $pl_critical = rand(10, 20);
    print("pl_criticalの値は{$pl_critical}でした<br>");
    $Access_power = rand(1, 50)+50;
    print("Access_powerの値は{$Access_power}でした<br>");
    $dice = rand(1,100);
    print("diceの値は{$dice}でした<br>");
    switch($dice) {
        case $dice <= $pl_critical:
            print("判定クリティカル成功<br>");
            $a = 判定クリティカル成功;
            break;
        case $dice <= $Access_power:
            print("判定成功<br>");
            $a = 判定成功;
            break;
        default:
            print("判定失敗<br>");
            $a = 判定失敗;
            break;
        }

    if($dice <= $pl_critical){
        $attack_result = 2;
        //echo '判定クリティカル成功', '<br />';
      }elseif($dice <= $Access_power){
        $attack_result = 1;
        //echo '判定成功', '<br />';
      }else{
        $attack_result = 0;
        //echo '判定失敗', '<br />';
      }
      print("attack_resultの値は{$attack_result}でした");

    return print($a);

}