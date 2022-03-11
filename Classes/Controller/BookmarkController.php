<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-bookmarks
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBookmarks\Controller;

use Psr\Http\Message\ResponseInterface;
use Slub\SlubProfileBookmarks\Mvc\View\JsonView;
use Slub\SlubProfileBookmarks\Service\BookmarkService;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BookmarkController extends ActionController
{
    protected $view;
    protected $defaultViewObjectName = JsonView::class;
    protected BookmarkService $bookmarkService;

    /**
     * @param BookmarkService $bookmarkService
     */
    public function __construct(BookmarkService $bookmarkService)
    {
        $this->bookmarkService = $bookmarkService;
    }

    /**
     * @return ResponseInterface
     * @throws AspectNotFoundException
     */
    public function listAction(): ResponseInterface
    {
        $bookmarks = $this->bookmarkService->getBookmarks($this->request->getArguments());

        $this->view->setVariablesToRender(['bookmarkList']);
        $this->view->assign('bookmarkList', $bookmarks);

        return $this->jsonResponse();
    }
}
