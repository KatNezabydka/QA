<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
     '@PhpCsFixer' => true,
     'concat_space' => [
        'spacing' => 'one'
     ],
     'phpdoc_types_order' => [
        'null_adjustment' => 'always_last'
      ],
     '@DoctrineAnnotation' => true,
     'blank_line_after_opening_tag' => false,
     'no_superfluous_phpdoc_tags' => false,
     'multiline_whitespace_before_semicolons' => false,
 ];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);