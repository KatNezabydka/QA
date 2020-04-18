<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
    '@Symfony' => true,
    '@PSR1' => true,
    '@PSR2' => true,
    '@PhpCsFixer' => false,
    '@DoctrineAnnotation' => true,
    'concat_space' => [
        'spacing' => 'one'
    ],
    'phpdoc_add_missing_param_annotation' => [
        'only_untyped' => false,
    ],
    'blank_line_before_statement' => [
        'statements' => ["break", "continue", "return", "throw", "try"]
    ],
    'blank_line_after_opening_tag' => false
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);