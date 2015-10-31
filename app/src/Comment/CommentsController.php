<?php

namespace CR\Comment;

/**
* A controller for users and admin related events.
*/
class CommentsController implements \Anax\DI\IInjectionAware {

	use \Anax\DI\TInjectable;

	/**
	 * Initialize the controller.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->comments = new \CR\Comment\Comment();
		$this->comments->setDI($this->di);
	}

	/**
	 * Index page
	 *
	 */
	public function indexAction() {
		$this->theme->setTitle("Kommentarer");
		$this->views->add('comment/index', [], 'main');
	}

	/**
     * View all comments for a page.
     *
     * @param $page string with name of page
     *
     * @return void
     */
	public function viewPageCommentsAction($page, $redirect) {

		$noForm = false;

		$all = $this->comments->query()
			->where('page = ?')
			->andWhere('deleted IS NULL')
			->execute([$page]);

		// Get form view if add/edit is clicked
		if ($this->request->getGet('edit') == 'yes') {

			$comment = $this->comments->find($this->request->getGet('id'));

			$form = new \Anax\HTMLForm\CFormEditComment($comment, array('page' => $page, 'redirect' => $redirect ));
            $form->setDI($this->di);
            $form->check();

            $noForm = true;

			$this->views->add('comment/comment-form-container', [
				'content'	=> $form->getHTML(),
				'page'		=> $page,
				'redirect'	=> $redirect,
				'noForm'	=> $noForm,
				], 'fullpage');

		} elseif ($this->request->getGet('comment') == 'yes') {
			
			$form = new \Anax\HTMLForm\CFormAddComment(array('page' => $page, 'redirect' => $redirect ));
            $form->setDI($this->di);
            $form->check();

            $noForm = true;

			$this->views->add('comment/comment-form-container', [
				'content'	=> $form->getHTML(),
				'page'		=> $page,
				'redirect'	=> $redirect,
				'noForm'	=> $noForm,
				], 'fullpage');
		}

		$this->session->set('doEditComment', null);
		
		// If $all array not empty, convert comment content from markdown to html, and get Gravatars
		if (is_array($all)) {
			foreach ($all as $id => &$comment) {
				$comment->getProperties()['content'] = $this->textFilter->doFilter($comment->getProperties()['content'], 'shortcode, markdown');
				$comment->gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->getProperties()['email']))) . '.jpg';
			}
		}

		$this->views->add('comment/comments', [
			'noForm' => $noForm,
			'comments' => $all,
			'redirect' => $redirect
			], 'fullpage');
	}

	/**
	 * Setup database
	 *
	 * @return void
	 */
	public function setupAction() {
		//$this->db->setVerbose();
		$now = gmdate('Y-m-d H:i:s');

		$this->db->dropTableIfExists('comment')->execute();

		$this->db->createTable(
			'comment',
			[
			'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
			'content' => ['text'],
			'name' => ['varchar(80)'],
			'email' => ['varchar(80)'],
			'url' => ['varchar(80)'],
			'ip' => ['varchar(20)'],
			'created' => ['datetime'],
			'updated' => ['datetime'],
			'deleted' => ['datetime'],
			'redirect' => ['varchar(20)'],
			'page' => ['varchar(20)'],
			]
			)->execute();

		$this->db->insert(
			'comment',
			['content', 'name', 'email', 'url', 'ip', 'created', 'redirect', 'page']
			);

		$now = gmdate('Y-m-d H:i:s');

		$this->db->execute([
			'Ett exempel på en kommentar.',
			'Carl',
			'esp_horizon@hotmail.com',
			'http://dbwebb.se',
			'111.0.0.1',
			$now,
			'',
			'start'
			]);

		$this->db->execute([
			'Grym sida.',
			'Mikael',
			'mikael.roos@bth.se',
			'http://dbwebb.se',
			'111.0.0.1',
			$now,
			'',
			'start'
			]);

		$this->db->execute([
			'Ett exempel på en kommentar',
			'Carl',
			'esp_horizon@hotmail.com',
			'http://dbwebb.se',
			'111.0.0.1',
			$now,
			'',
			'redovisning'
			]);

		$url = $this->url->create('comments-');
		$this->response->redirect($url);
	}
}