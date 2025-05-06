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
use Slub\SlubProfileBookmarks\Utility\ConstantsUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ApiBookmarkListConfiguration
{
    public const KEY = 'bookmarkList';

    protected string $apiKey = '';
    protected string $requestUri = '';
    protected string $requestArgumentIdentifier = '';

    public function __construct()
    {
        $configuration = $this->getConfiguration(ConstantsUtility::EXTENSION_KEY)[self::KEY];

        empty($configuration['apiKey']) ?: $this->setApiKey($configuration['apiKey']);
        empty($configuration['requestArgumentIdentifier']) ?: $this->setRequestArgumentIdentifier($configuration['requestArgumentIdentifier']);
        empty($configuration['requestUri']) ?: $this->setRequestUri($configuration['requestUri']);
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey = ''): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    /**
     * @param string $requestUri
     */
    public function setRequestUri(string $requestUri = ''): void
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return string
     */
    public function getRequestArgumentIdentifier(): string
    {
        return $this->requestArgumentIdentifier;
    }

    /**
     * @param string $requestArgumentIdentifier
     */
    public function setRequestArgumentIdentifier(string $requestArgumentIdentifier = ''): void
    {
        $this->requestArgumentIdentifier = $requestArgumentIdentifier;
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
