<?php

return PhpCsFixer\Config::create()
    ->setRules([
        'psr0' => false,
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
            'align_equals' => false,
        ],
        'trailing_comma_in_multiline_array' => true,
        'whitespace_after_comma_in_array' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_return' => true,
        'cast_spaces' => [
            'space' => 'single',
        ],
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
        'phpdoc_separation' => true,
        'phpdoc_trim' => true,
        'method_argument_space' => [
            'ensure_fully_multiline' => true,
            'keep_multiple_spaces_after_comma' => true,
        ],
        'single_quote' => true,
        'phpdoc_no_empty_return' => false,
        'single_blank_line_before_namespace' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'break', 'continue', 'declare', 'return', 'throw', 'try',
            ],
        ],
        'class_attributes_separation' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'declare_equal_normalize' => [
            'space' => 'single',
        ],
        'no_spaces_inside_parenthesis' => true,
        'ternary_operator_spaces' => true,
        'no_leading_import_slash' => true,

        // @PHP71Migration
        'ternary_to_null_coalescing' => true,
        'visibility_required' => true,

        // @PHP71Migration:risky
        'void_return' => true,
        'random_api_migration' => true,
        'pow_to_exponentiation' => true,

        // @Symfony:risky
        'dir_constant' => true,
        'function_to_constant' => true,
        'is_null' => true,
        'modernize_types_casting' => true,
        'no_alias_functions' => true,
    ])
    ->setRiskyAllowed(true)
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
