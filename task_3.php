<?php


/*
Решил прямым перебором за O(n^2)
Можно за логарифмическое, но без подсказок нейросетей не смог бы.
*/

function getResult(array $boxes, int $weight): int 
{
    $pairs = 0;
    $n = count($boxes);
    
    for ($i = 0; $i < $n - 1; $i++) {
        if ($boxes[$i] === null) continue;
        
        for ($j = $i + 1; $j < $n; $j++) {
            if ($boxes[$j] === null) continue;
            
            if ($boxes[$i] + $boxes[$j] == $weight) {
                $pairs++;
                // нашли пару, помечаем как null
                $boxes[$i] = null;
                $boxes[$j] = null;
                break;
            }
        }
    }
    
    return $pairs;
}


$boxes1 = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$weight1 = 6;
var_dump(getResult($boxes1, $weight1));

$boxes2 = [2, 4, 3, 6, 1];
$weight2 = 5;
var_dump(getResult($boxes2, $weight2));