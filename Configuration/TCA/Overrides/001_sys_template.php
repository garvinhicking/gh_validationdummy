<?php

// Prevent script from being called directly
defined('TYPO3') or die();

call_user_func(function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'gh_validationdummy',
        'Configuration/TypoScript',
        'GH ValidationDummy: TypoScript'
    );
});
