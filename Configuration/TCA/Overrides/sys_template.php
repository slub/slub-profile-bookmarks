<?php

defined('TYPO3') || die();

// Add static typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'slub_profile_bookmarks',
    'Configuration/TypoScript/',
    'SLUB profile bookmarks'
);
