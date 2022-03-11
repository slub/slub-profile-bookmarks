<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-bookmarks
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBookmarks\Domain\Model\Dto;

use Exception;
use Slub\SlubProfileBookmarks\Domain\Model\Dto\Request\RequestArgumentIdentifierInterface;
use Slub\SlubProfileBookmarks\Domain\Model\Dto\Request\RequestArgumentIdentifierTrait;
use Slub\SlubProfileBookmarks\Domain\Model\Dto\Request\RequestUriInterface;
use Slub\SlubProfileBookmarks\Domain\Model\Dto\Request\RequestUriTrait;
use Slub\SlubProfileBookmarks\Utility\ConstantsUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ApiBookmarkListConfiguration implements RequestArgumentIdentifierInterface, RequestUriInterface
{
    use RequestArgumentIdentifierTrait;
    use RequestUriTrait;

    public const KEY = 'bookmarkList';

    public function __construct()
    {
        $configuration = $this->getConfiguration(ConstantsUtility::EXTENSION_KEY)[self::KEY];

        empty($configuration['requestArgumentIdentifier']) ?: $this->setRequestArgumentIdentifier($configuration['requestArgumentIdentifier']);
        empty($configuration['requestUri']) ?: $this->setRequestUri($configuration['requestUri']);
    }

    /**
     * @param string $extensionKey
     * @return array
     */
    protected function getConfiguration(string $extensionKey = ''): array
    {
        /** @var ExtensionConfiguration $extensionConfiguration */
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

        try {
            return $extensionConfiguration->get($extensionKey);
        } catch (Exception $e) {
            return [];
        }
    }
}
