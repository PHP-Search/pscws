<?php

$header = <<<'EOF'
SCWS: Simple Chinese Word Segmentation.

PSCWS4 is a pure PHP implention of SCWS, which is a C-extension for PHP.
This project is a fork of https://github.com/wxkxklmyt/pscws4.

(c) hightman <MingL_Mar@msn.com>
    wxkxklmyt <519468341@qq.com>
    masterwto <masterwto@163.com>

The original SCWS is wirtten by hightman (马明练), see:
https://github.com/hightman/scws

The PSCWS4 library is wirtten by hightman, released at
http://www.xunsearch.com/scws/download.php

The wxkxklmyt/pscws4 composer package is maintained by wxkxklmyt, see:
https://github.com/wxkxklmyt/pscws4

All rights reserved by original author and contributors.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

if (PHP_VERSION_ID < 70000) {
    $finder
        ->notPath('tests/Test/Constraint/SameStringsConstraintForV7.php')
        ->notPath('tests/Test/Constraint/XmlMatchesXsdConstraintForV7.php')
    ;
}

$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP56Migration' => true,
        '@PHPUnit60Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'comment_to_phpdoc' => true,
        'compact_nullable_typehint' => true,
        'escape_implicit_backslashes' => true,
        'explicit_indirect_variable' => true,
        'explicit_string_variable' => true,
        'final_internal_class' => true,
        'fully_qualified_strict_types' => true,
        'function_to_constant' => ['functions' => ['get_class', 'get_called_class', 'php_sapi_name', 'phpversion', 'pi']],
        'header_comment' => ['header' => $header],
        'heredoc_to_nowdoc' => true,
        'list_syntax' => ['syntax' => 'long'],
        'method_chaining_indentation' => true,
        'method_argument_space' => ['ensure_fully_multiline' => true],
        'multiline_comment_opening_closing' => true,
        'no_extra_blank_lines' => ['tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block']],
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_curly_braces' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'php_unit_ordered_covers' => true,
        'php_unit_set_up_tear_down_visibility' => true,
        'php_unit_strict' => true,
        'php_unit_test_annotation' => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_types_order' => true,
        'semicolon_after_instruction' => true,
        'single_line_comment_style' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'string_line_ending' => true,
        'yoda_style' => true,
        'no_alternative_syntax' => true,
    ])
    ->setFinder($finder)
;

// special handling of fabbot.io service if it's using too old PHP CS Fixer version
if (false !== getenv('FABBOT_IO')) {
    try {
        PhpCsFixer\FixerFactory::create()
            ->registerBuiltInFixers()
            ->registerCustomFixers($config->getCustomFixers())
            ->useRuleSet(new PhpCsFixer\RuleSet($config->getRules()));
    } catch (PhpCsFixer\ConfigurationException\InvalidConfigurationException $e) {
        $config->setRules([]);
    } catch (UnexpectedValueException $e) {
        $config->setRules([]);
    } catch (InvalidArgumentException $e) {
        $config->setRules([]);
    }
}

return $config;
