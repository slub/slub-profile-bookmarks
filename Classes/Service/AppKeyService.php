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
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;

class AppKeyService
{
    protected Request $request;
    protected UriGenerator $uriGenerator;

    /**
     * @param Request $request
     * @param UriGenerator $uriGenerator
     */
    public function __construct(
        Request $request,
        UriGenerator $uriGenerator
    ) {
        $this->request = $request;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * @param int $username
     * @param string $password
     * @return string|null
     * @throws AspectNotFoundException
     */
    public function getAppKey(int $username, string $password): ?string
    {
        $uri = $this->uriGenerator->buildAppKey([
            'username' => $username,
            'password' => $password,
        ]);
        $data = $this->request->process($uri);

        if (
            is_array($data) &&
            array_key_exists('appkey', $data)
        ) {
            return $data['appkey'];
        }

        return null;
    }
}
