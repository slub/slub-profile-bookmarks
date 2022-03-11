<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-bookmark
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBookmarks\Domain\Model\Dto\Request;

interface RequestArgumentIdentifierInterface
{
    /**
     * @return string
     */
    public function getRequestArgumentIdentifier(): string;

    /**
     * @param string $requestArgumentIdentifier
     */
    public function setRequestArgumentIdentifier(string $requestArgumentIdentifier = ''): void;
}
