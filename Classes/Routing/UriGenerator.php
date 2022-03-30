<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-bookmarks
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBookmarks\Routing;

use Slub\SlubProfileBookmarks\Domain\Model\Dto\ApiBookmarkListConfiguration;
use Slub\SlubProfileBookmarks\Utility\LanguageUtility;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UriGenerator
{
    /**
     * @param array $additionalParameters
     * @return string
     * @throws AspectNotFoundException
     */
    public function buildBookmarkList(array $additionalParameters): string
    {
        /** @var ApiBookmarkListConfiguration $apiConfiguration */
        $apiConfiguration = GeneralUtility::makeInstance(ApiBookmarkListConfiguration::class);

        /** @extensionScannerIgnoreLine */
        $requestUri = $apiConfiguration->getRequestUri();
        $requestArgumentIdentifier = $apiConfiguration->getRequestArgumentIdentifier();

        return $this->build($requestUri, $requestArgumentIdentifier, $additionalParameters);
    }

    /**
     * @param string $requestUri
     * @param string $requestArgumentIdentifier
     * @param array $additionalParameters
     * @return string
     * @throws AspectNotFoundException
     */
    protected function build(
        string $requestUri,
        string $requestArgumentIdentifier,
        array $additionalParameters
    ): string {
        $parameters = [
            'L' => LanguageUtility::getUid() ?? 0
        ];

        empty($requestArgumentIdentifier) ?: $parameters[$requestArgumentIdentifier] = $additionalParameters;

        if (count($parameters) > 0) {
            $requestUri .= strpos($requestUri, '?') ? '&' : '?';
            $requestUri .= http_build_query($parameters);
        }

        return $requestUri;
    }
}
