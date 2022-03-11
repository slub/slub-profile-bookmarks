<?php

use Slub\SlubProfileBookmarks\Controller\BookmarkController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

// Add tsconfig page
ExtensionManagementUtility::addPageTSConfig(
    '@import "EXT:slub_profile_bookmarks/Configuration/TsConfig/Page.tsconfig"'
);

// Configure plugin - bookmark list
ExtensionUtility::configurePlugin(
    'SlubProfileBookmarks',
    'BookmarkList',
    [
        BookmarkController::class => 'list'
    ],
    [
        BookmarkController::class => 'list'
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
