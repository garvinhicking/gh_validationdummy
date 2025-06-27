<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

(static function () {
    ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Dto',
        'ValidationDummy: DTO',
    );
    ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Validation',
        'ValidationDummy: Validation',
    );
    ExtensionUtility::registerPlugin(
        'gh_validationdummy',
        'Debug',
        'ValidationDummy: Debug',
    );
})();
