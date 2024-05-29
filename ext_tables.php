<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

$boot = function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Dto',
        'Test: DTO',
        null,
        'gh_validationdummy'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Validation',
        'Test: Custom Validation',
        null,
        'gh_validationdummy'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Debug',
        'Test: DEBUG ViewHelper',
        null,
        'gh_validationdummy'
    );
};

$boot();
unset($boot);
