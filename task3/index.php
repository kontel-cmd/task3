<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<?php

// 1
$str = '123.45abc';
echo (int)$str . "<br>";
echo (float)$str . "<br>";
echo (int)(bool)$str . "<br>";

echo "<br>";

// 2
function checkType($var): string {
    return gettype($var);
}
echo checkType(42) . "<br>";
echo checkType('hello') . "<br>";

echo "<br>";

// 3
$a = 10;
$b = 2.5;
echo gettype($a + $b) . "<br>";
echo gettype($a - $b) . "<br>";
echo gettype($a * $b) . "<br>";
echo gettype($a / $b) . "<br>";

echo "<br>";

// 4
$values = [0, '', 'false', [], null, 42];
foreach ($values as $val) {
    echo ($val ? 'TRUE' : 'FALSE') . "<br>";
}

echo "<br>";

// 5
echo ('10' + 5) . "<br>";
echo ('10' . 5) . "<br>";
echo ((int)'10abc' + 5) . "<br>";
echo ('10abc' . 5) . "<br>";

echo "<br>";

// 6
$arr = [
    1 => 'int',
    '1' => 'string',
    true => 'bool'
];
print_r($arr);

echo "<br>";

// 7
function greet() {
    echo "Hello!<br>";
}
function callFn(callable $fn) {
    $fn();
}
callFn('greet');

echo "<br>";

// 8
function showItems(iterable $items) {
    foreach ($items as $item) {
        echo $item . "<br>";
    }
}
showItems([1, 2, 3]);
function gen(): Generator {
    yield 4;
    yield 5;
}
showItems(gen());

echo "<br>";

// 9
$arr = ['name' => 'Ann', 'age' => 20];
$obj = (object)$arr;
print_r($obj);
$back = (array)$obj;
print_r($back);

echo "<br>";

// 10
$a = null;
$b = '';
$c = 0;
$d = [];
var_dump(isset($a), isset($b), isset($c), isset($d));
var_dump(empty($a), empty($b), empty($c), empty($d));

echo "<br>";

// 11
$fh = fopen(__FILE__, 'r');
echo gettype($fh) . "<br>";
fclose($fh);

echo "<br>";

// 12
$types = [
    1,
    'str',
    1.2,
    true,
    null,
    [1],
    (object)['a' => 1],
    fopen(__FILE__, 'r')
];
foreach ($types as $t) {
    echo gettype($t) . "<br>";
    var_dump($t);
}
fclose($types[7]);

echo "<br>";

// 13
$var = 'hello';
unset($var);
var_dump(isset($var));
var_dump(isset($var) ? $var : null);

echo "<br>";

// 17
function test(int|string $x) {
    echo "Value: $x<br>";
}
test(10);
test("abc");

echo "<br>";

// 18

function handle($value) {
    if (is_int($value)) return $value * 2;
    if (is_string($value)) return "\"$value\"";
    if (is_array($value)) return count($value);
    if (is_object($value) && method_exists($value, 'run')) return $value->run();
    return null;
}

class Value {
    public function run() {
        return "Running";
    }
}

echo handle(5) . "\n";
echo handle("PHP") . "\n";
echo handle([1, 2]) . "\n";
echo handle(new Value()) . "\n";


// 19

$res = fopen(__FILE__, 'r');
$types = [
    1,
    's',
    1.1,
    true,
    [1],
    null
   
];
foreach ($types as $v) {
    echo gettype($v) . "<br>";
}
fclose($res);

echo "<br>";

// 20
function describe(mixed $v): string {
    return match (true) {
        is_int($v) => 'Integer',
        is_string($v) => 'String',
        is_array($v) => 'Array',
        is_bool($v) => 'Boolean',
    };
}
echo describe(10) . "<br>";
echo describe("abc") . "<br>";
echo describe([1]) . "<br>";
echo describe(false) . "<br>";

echo "<br>";

// 21
$result = 0.1 + 0.2;
var_dump($result === 0.3);
var_dump(abs($result - 0.3) < 0.00001);

echo "<br>";

// 22
$vals = [
    [1, 2],
    new stdClass(),
    'strlen',
    123
];
foreach ($vals as $v) {
    var_dump([
        'array' => is_array($v),
        'object' => is_object($v),
        'callable' => is_callable($v),
        'iterable' => is_iterable($v),
    ]);
}

echo "<br>";

// 23
$arr = [1, 2, 3, 4, 5];
print_r($arr);

echo "<br>";

// 24
$user = [
    'name' => 'Kostya',
    'age' => 30,
    'email' => 'kostya@mail.com'
];
echo $user['name'] . "<br>";
echo $user['age'] . "<br>";
echo $user['email'] . "<br>";

echo "<br>";

// 25
$students = [
    ['name' => 'Kostya', 'grades' => [5, 5, 3]],
    ['name' => 'Dima', 'grades' => [4, 4, 4]],
];
foreach ($students as $s) {
    $avg = array_sum($s['grades']) / count($s['grades']);
    echo $s['name'] . ": $avg<br>";
}

// 26
$arr = [1, 2, 3];
$arr[] = 4; 
unset($arr[3]); 
print_r($arr);

echo "<br>";

// 27
$assoc = ['a' => 1, 'b' => 2];
print_r(array_keys($assoc));
print_r(array_values($assoc));

echo "<br>";

// 28
$nums = [3, 1, 4, 2];
sort($nums); 
print_r($nums);
rsort($nums); 
print_r($nums);

echo "<br>";

// 29
$assoc = ['b' => 2, 'a' => 1];
asort($assoc); 
print_r($assoc);
ksort($assoc); 
print_r($assoc);

echo "<br>";

// 30
$nums = [1, 2, 3];
$squares = array_map(fn($x) => $x * $x, $nums);
print_r($squares);

echo "<br>";

// 31
$nums = [1, 2, 3, 4, 5];
$evens = array_filter($nums, fn($x) => $x % 2 === 0);
print_r($evens);

echo "<br>";

// 32
$sum = array_reduce([1, 2, 3], fn($carry, $item) => $carry + $item, 0);
echo $sum . "<br>";

echo "<br>";

// 33
$user = ['name' => 'Ann', 'email' => 'a@mail.com'];
var_dump(array_key_exists('email', $user));

echo "<br>";

// 34
$a = [1, 2];
$b = [3, 4];
$merged = array_merge($a, $b);
print_r($merged);

echo "<br>";

// 35
$nums = range(1, 10);
$chunks = array_chunk($nums, 3);
print_r($chunks);

echo "<br>";

// 36
$slice = array_slice($nums, 1, 4);
print_r($slice);

echo "<br>";

// 37
$arr = ['a', 'b', 'c'];
$str = implode(',', $arr);
echo $str . "<br>";
$back = explode(',', $str);
print_r($back);

echo "<br>";

// 38
$arr = [1, 2, 3];
var_dump(in_array(2, $arr));

echo "<br>";

// 39
$index = array_search(2, $arr);
echo $index . "<br>";

echo "<br>";

// 40
$arr = [1, 2, 2, 3];
$unique = array_unique($arr);
print_r($unique);

echo "<br>";

// 41
$a = [1, 2, 3];
$b = [2, 3, 4];
print_r(array_intersect($a, $b)); // общее
print_r(array_diff($a, $b)); // разность

echo "<br>";

// 42
$keys = ['name', 'age'];
$values = ['Kostya', 25];
$assoc = array_combine($keys, $values);
print_r($assoc);

echo "<br>";

// 43
$arr = ['x' => 1, 'y' => 2];
foreach ($assoc as $key => $value) {
    echo "$key: $value<br>";
}

echo "<br>";

// 44
function doubleValues(array $arr): array {
    return array_map(fn($x) => $x * 2, $arr);
}
print_r(doubleValues([1, 2, 3]));

echo "<br>";

// 45
function walk(array $arr) {
    foreach ($arr as $item) {
        if (is_array($item)) {
            walk($item);
        } else {
            echo $item . "<br>";
        }
    }
}
walk([1, [2, 3], 4]);
echo "<br>";

// 46
$arr = [1, 2, 3];
array_walk($arr, function (&$val) {
    $val *= 10;
});
print_r($arr);

echo "<br>";

// 47
$range = range(1, 100);
$div7 = array_filter($range, fn($x) => $x % 7 === 0);
print_r($div7);


?>
</body>
</html>