<?php

class Test {
    public ?self $next;
    public ?string $label = null;

    public function __construct(?string $label)
    {
        $this->label = $label;
    }
}

$a = new test('a');
$b = new test('b');
$c = new test('c');
$a->next = $b;
$b->next = $c;
$c->next = null;


function reverse($head) {
    $prev = null;
    $current = $head;
    
    while ($current !== null) {
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }
    
    return $prev;
}

$ob1 = reverse($a);
var_dump($ob1);
