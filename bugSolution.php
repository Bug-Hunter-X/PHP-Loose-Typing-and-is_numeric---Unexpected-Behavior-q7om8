This improved version uses a stricter approach to checking if a value is a numeric integer or a numeric float, preventing unexpected behavior from loosely typed strings or booleans.

```php
function processValue($value) {
  if (is_int($value) || is_float($value)) {
    return $value * 2;
  } else if (is_string($value) && ctype_digit($value)) {
    return (int)$value * 2; // explicit type conversion
  } else {
    return "Not a number";
  }
}

$result1 = processValue(10); // Expected: 20
$result2 = processValue("10"); // Expected: 20
$result3 = processValue("10abc"); // Expected: Not a number
$result4 = processValue(true); // Expected: Not a number

print_r([$result1, $result2, $result3, $result4]);
```
The solution explicitly checks for integer and float types, and handles strings containing only digits by first ensuring it's a string with only digits via `ctype_digit` before converting it to an integer.