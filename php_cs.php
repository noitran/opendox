<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'no_unreachable_default_argument_value' => false,
        'braces' => [
            'allow_single_line_closure' => false,
        ],
        'binary_operator_spaces' => [
            'align_double_arrow' => false,
        ],
        'trailing_comma_in_multiline_array' => true,
        'whitespace_after_comma_in_array' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_return' => true,
        'cast_spaces' => true,
        'function_typehint_space' => true,
        'hash_to_slash_comment' => true,
        'linebreak_after_opening_tag' => true,
        'lowercase_cast' => true,
        'method_separation' => true,
        'new_with_braces' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_unused_imports' => true,
        'phpdoc_align' => false,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'method_argument_space' => [
            'ensure_fully_multiline' => true,
            'keep_multiple_spaces_after_comma' => true,
        ],
    ])
    ->setRiskyAllowed(false)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude([
                'bootstrap/cache',
                'bower_components',
                'node_modules',
                'tasks',
                'public',
                'bin',
                'storage',
                'vendor',
            ])
            ->notPath('_ide_helper_models.php')
            ->notPath('_ide_helper.php')
            ->notPath('.phpstorm.meta.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
    );
