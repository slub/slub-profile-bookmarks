<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-bookmarks
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBookmarks\Service;

use Slub\SlubProfileBookmarks\Http\Request;
use Slub\SlubProfileBookmarks\Routing\UriGenerator;
use Slub\SlubProfileBookmarks\Sanitization\BookmarkArgumentSanitization;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;

class BookmarkService
{
    protected BookmarkArgumentSanitization $bookmarkArgumentSanitization;
    protected Request $request;
    protected UriGenerator $uriGenerator;

    /**
     * @param BookmarkArgumentSanitization $bookmarkArgumentSanitization
     * @param Request $request
     * @param UriGenerator $uriGenerator
     */
    public function __construct(
        BookmarkArgumentSanitization $bookmarkArgumentSanitization,
        Request $request,
        UriGenerator $uriGenerator
    ) {
        $this->bookmarkArgumentSanitization = $bookmarkArgumentSanitization;
        $this->request = $request;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * @param array $arguments
     * @return array
     * @throws AspectNotFoundException
     */
    public function getBookmarks(array $arguments): array
    {
        $sanitizedArguments = $this->bookmarkArgumentSanitization->sanitizeArguments($arguments);
        $uri = $this->uriGenerator->buildBookmarkList($sanitizedArguments);

        return $this->request->process($uri) ?? [];
    }
}
