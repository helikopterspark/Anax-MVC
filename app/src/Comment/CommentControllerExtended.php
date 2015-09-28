<?php

namespace CR\Comment;

class CommentControllerExtended extends \Phpmvc\Comment\CommentController {

	/**
     * View all comments for a page.
     *
     * @param $page string with name of page
     *
     * @return void
     */
	public function viewPageCommentsAction($page, $redirect)
	{
		if (null !== $this->session->get('doEditComment')) {
			$isEditComment = $this->session->get('doEditComment');
		} else {
			$isEditComment = $this->request->getPost('doEditComment');
		}
		$isEnterNew = $this->request->getPost('doEnterComment');
		$inputerror = $this->session->get('inputerror', []);

		$form = FALSE;

		$comments = new \CR\Comment\CommentsInSessionExtended();
		$comments->setDI($this->di);
		$all = $comments->findAllOnPage($page);

		// Get form view if add/edit is clicked
		if ($isEditComment) {
			if (null !== $this->session->get('tempcomment')) {
				$comment = $this->session->get('tempcomment');
				$commentID = $this->session->get('commentID');
			} else {
				$commentID = $this->request->getPost('commentID');
				$comment = $all[$commentID];
			}
			$form = TRUE;

			$this->views->add('comment/form', [
				'mail'      => $comment['mail'],
				'web'       => $comment['web'],
				'name'      => $comment['name'],
				'content'   => $comment['content'],
				'timestamp'	=> $comment['timestamp'],
				'output'    => null,
				'update'	=> TRUE,
				'id'		=> $commentID,
				'page'		=> $page,
				'redirect'	=> $redirect,
				'form'		=> $form,
				'error'		=> $inputerror,
				]);
		} elseif ($isEnterNew) {
			$form = TRUE;
			$this->views->add('comment/form', [
				'mail'      => null,
				'web'       => null,
				'name'      => null,
				'content'   => null,
				'timestamp'	=> null,
				'update'	=> null,
				'output'    => null,
				'page'		=> $page,
				'redirect'	=> $redirect,
				'form'		=> $form,
				'error'		=> null,
				]);
		} elseif ($inputerror) {
			$form = TRUE;
			$temp = $this->session->get('tempcomment', []);
			$this->views->add('comment/form', [
				'mail'      => $temp['mail'],
				'web'       => $temp['web'],
				'name'      => $temp['name'],
				'content'   => $temp['content'],
				'timestamp'	=> null,
				'update'	=> null,
				'output'    => null,
				'page'		=> $page,
				'redirect'	=> $redirect,
				'form'		=> $form,
				'error'		=> $inputerror,
				]);
		}

		$this->session->set('doEditComment', null);
		$this->session->set('inputerror', null);
		$this->session->set('tempcomment', null);

		// If $all array not empty, convert comment content from markdown to html, and get Gravatars
		if (is_array($all)) {
			foreach ($all as $id => &$comment) {
				$comment['content'] = $this->textFilter->doFilter($comment['content'], 'shortcode, markdown');
				$comment['gravatar'] = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($comment['mail']))) . '.jpg';
			}
		}

		$this->views->add('comment/comments', [
			'comments' => $all,
			'form'	=> $form,
			]);
	}

    /**
     * Add a comment to a page.
     *
     * @param $page string with name of page
     *
     * @return void
     */
    public function addToPageAction($page)
    {
    	$isPosted = $this->request->getPost('doCreate');

    	if (!$isPosted) {
    		$this->response->redirect($this->request->getPost('redirect'));
    	}

    	$comment = [
    	'content'   => $this->request->getPost('content'),
    	'name'      => $this->request->getPost('name'),
    	'web'       => $this->request->getPost('web'),
    	'mail'      => $this->request->getPost('mail'),
    	'timestamp' => time(),
    	'ip'        => $this->request->getServer('REMOTE_ADDR'),
    	];

    	$validate = $this->validateInput($comment);
    	if ($validate) {
    		$this->session->set('inputerror', $validate);
    		$this->response->redirect($this->request->getPost('redirect'));
    	}

    	// Cleanup
    	$comment = $this->cleanupInput($comment);

    	$comments = new \CR\Comment\CommentsInSessionExtended();
    	$comments->setDI($this->di);

    	$comments->addToPage($comment, $page);

    	$this->response->redirect($this->request->getPost('redirect'));
    }


	/**
     * Edit a comment on the page.
     *
     * @param $page string with name of page
     *
     * @return void
     */
	public function updateAction($page) {
		$isPosted = $this->request->getPost('doUpdate');

		if (!$isPosted) {
			$this->response->redirect($this->request->getPost('redirect'));
		}
		$commentID = $this->request->getPost('commentID');

		$comment = [
		'content'   => $this->request->getPost('content'),
		'name'      => $this->request->getPost('name'),
		'web'       => $this->request->getPost('web'),
		'mail'      => $this->request->getPost('mail'),
		'timestamp'	=> $this->request->getPost('timestamp'),
		'updated' => time(),
		'ip'        => $this->request->getServer('REMOTE_ADDR'),
		];

		$validate = $this->validateInput($comment);
		if ($validate) {
			$this->session->set('inputerror', $validate);
			$this->session->set('commentID', $commentID);
			$this->session->set('doEditComment', TRUE);
			$this->response->redirect($this->request->getPost('redirect'));
		}

    	// Cleanup
		$comment = $this->cleanupInput($comment);

		$comments = new \CR\Comment\CommentsInSessionExtended();
		$comments->setDI($this->di);

		$comments->updateComment($comment, $commentID, $page);

		$this->response->redirect($this->request->getPost('redirect'));
	}

    /**
     * Remove one comment from the page.
     *
     * @param $page string with name of page
     *
     * @return void
     */
    public function removeOneAction($page)
    {
    	$isPosted = $this->request->getPost('doRemoveOne');

    	if (!$isPosted) {
    		$this->response->redirect($this->request->getPost('redirect'));
    	}
    	$commentID = $this->request->getPost('commentID');

    	$comments = new \CR\Comment\CommentsInSessionExtended();
    	$comments->setDI($this->di);

    	$comments->deleteOne($commentID, $page);

    	$this->response->redirect($this->request->getPost('redirect'));
    }

    /**
     * Validate comment input
     * @param $comment array with comment data
     *
     * @return array with error messages or null
     */
    private function validateInput($comment) {

    	$v = new \Valitron\Validator($comment);

    	$v->rule('required', ['content', 'name', 'mail']);
    	$v->rule('email', 'mail');
    	if ($comment['web']) {
    		$v->rule('url', 'web');
    	}
    	if($v->validate()) {
    		return null;
    	} else {
    		$this->session->set('tempcomment', $comment);
    		return $v->errors();
    	}
    }

    /**
     * Strip tags from comment input
     *
     * @param $comment array with comment data
     *
     * @return $comment array with cleaned data
     */
    private function cleanupInput($comment) {
    	$comment['content'] = htmlentities(strip_tags($comment['content']));
    	$comment['name'] = htmlentities(strip_tags($comment['name']));
    	$comment['web'] = htmlentities(strip_tags($comment['web']));
    	$comment['mail'] = htmlentities(strip_tags($comment['mail']));

    	return $comment;
    }
}