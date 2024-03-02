<?php

// Prevent script from being called directly
defined('TYPO3') or die();

call_user_func(function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'gh_validationdummy',
        'Configuration/TSConfig/TSConfig.tsconfig',
        'GH ValidationDummy: TSConfig'
    );
});
