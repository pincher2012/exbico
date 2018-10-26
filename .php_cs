<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP71Migration' => true,
        '@PSR2' => true,
        '@PSR1' => true,
        '@PHP71Migration:risky' => true,
        '@Symfony' => true,
        '@PHPUnit60Migration:risky' => true,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'compact_nullable_typehint' => true,
        'dir_constant' => true,
        'mb_str_functions' => true,
        'method_chaining_indentation' => true,
        'multiline_whitespace_before_semicolons' => true,
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'self_accessor' => true,
        'yoda_style' => null,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('build')
        ->exclude('config')
        ->exclude('runtime')
        ->exclude('var')
        ->exclude('vendor')
        ->exclude('web')
        ->in(__DIR__)
    )
    ->setCacheFile(__DIR__.'/.php_cs.cache')
;
