<?php //php 7.2.24

/* Вывести дерево без рекурсии в следующем виде
1
1.2
1.2.5
1.2.6
1.2.6.8
1.3
1.3.7
1.4
*/

$tree = [
    ['id' => '8', 'parent_id' => '6',],
    ['id' => '2', 'parent_id' => '1',],
    ['id' => '3', 'parent_id' => '1',],
    ['id' => '4', 'parent_id' => '1',],
    ['id' => '5', 'parent_id' => '2',],
    ['id' => '1', 'parent_id' => '0',],
    ['id' => '6', 'parent_id' => '2',],
    ['id' => '7', 'parent_id' => '3',],
];
PrintTree($tree);

function PrintTree($tree): void
{
    $result = [0];
    while (!empty($result)) {
        $root = array_pop($result);
        $i = 0;
        while (isset($tree[$i])) {
            if ($tree[$i]['parent_id'] == $root) {
                if ($root) {
                    $result[] = $root;
                }
                $result[] = $tree[$i]['id'];
                $str = implode('.', $result);
                echo "$str\n";
                array_splice($tree, $i, 1);
                break;
            }
            $i++;
        }
    }
}