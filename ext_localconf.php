<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

$boot = function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'gh_validationdummy',
        'Dto',
        [
            \GarvinHicking\ValidationDummy\Controller\DtoController::class => 'list, new, create, edit, update',
        ],
        // non-cacheable actions
        [
            \GarvinHicking\ValidationDummy\Controller\DtoController::class => 'list, new, create, edit, update',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'gh_validationdummy',
        'Validation',
        [
            \GarvinHicking\ValidationDummy\Controller\ValidationController::class => 'list, new, create, edit, update',
        ],
        // non-cacheable actions
        [
            \GarvinHicking\ValidationDummy\Controller\ValidationController::class => 'list, new, create, edit, update',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'gh_validationdummy',
        'Debug',
        [
            \GarvinHicking\ValidationDummy\Controller\DebugController::class => 'list',
        ],
        // non-cacheable actions
        [
            \GarvinHicking\ValidationDummy\Controller\DebugController::class => 'list',
        ]
    );
};

$boot();
unset($boot);
