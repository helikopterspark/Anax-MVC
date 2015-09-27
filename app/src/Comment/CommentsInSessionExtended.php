<?php

namespace CR\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentsInSessionExtended extends \Phpmvc\Comment\CommentsInSession {

	/**
     * Find and return all comments for a page.
     *
     * @param $page string with name of page
     *
     * @return array with all comments.
     */
    public function findAllOnPage($page) {
    	$allForPage = $this->session->get('comments', []);
    	if (array_key_exists($page, $allForPage)) {
    		return $allForPage[$page];
    	} else {
    		return null;
    	}
        
    }

	/**
     * Add a new comment to page.
     *
     * @param array $comment with all details.
     * @param $page string with name of page
     * 
     * @return void
     */
    public function addToPage($comment, $page)
    {
        $comments = $this->session->get('comments', []);
        $comments[$page][] = $comment;
        $this->session->set('comments', $comments);
    }

    /**
     * Update a comment.
     *
     * @param array $comment with all details.
     * @param $commentID id of comment which is the array index
     * @param $page string with name of page
     * 
     * @return void
     */
    public function updateComment($comment, $commentID, $page) {
        $comments = $this->session->get('comments', []);
        $comments[$page][$commentID] = $comment;
        $this->session->set('comments', $comments);
    }

    /**
     * Delete one comment.
     *
     * @param $commentID id of comment which is the array index
     * @param $page string with name of page
     *
     * @return void
     */
    public function deleteOne($commentID, $page) {
        $comments = $this->session->get('comments', []);
        unset($comments[$page][$commentID]);
        $this->session->set('comments', $comments);
    }
}