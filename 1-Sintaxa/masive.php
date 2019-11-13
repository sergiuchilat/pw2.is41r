<?php

// 0 1 2
$note = [5, 6, 2];

foreach ($note as $nota){
    echo $nota; ?><br><?
}


$student  = [
    'nume' => 'Ion Creanga',
    'age' => 123,
    'marks' => [5, 6, 2]
];
print_r($student);
?>
    <hr>
<?
echo $student['nume'];
?>
    <hr>
    <hr>
<?
$group = [
    0 => [
        'nume' => 'Ion Creanga',
        'age' => 123,
        'marks' => [5, 6, 2]
    ],
    'a' => [
        'nume' => 'Mihai Eminescu',
        'age' => 123,
        'marks' => [5, 6, 2]
    ],
    [
        'nume' => 'Alecu Russo',
        'age' => 123,
        'marks' => [5, 6, 2]
    ]
];

?>
<pre>
    <? print_r($group); ?>
</pre>
