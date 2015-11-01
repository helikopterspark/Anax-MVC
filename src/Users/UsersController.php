<?php

namespace Anax\Users;

/**
* A controller for users and admin related events.
*/
class UsersController implements \Anax\DI\IInjectionAware {

	use \Anax\DI\TInjectable;

	/**
	 * Initialize the controller.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->users = new \Anax\Users\User();
		$this->users->setDI($this->di);
	}

	/**
	 * List all users.
	 *
	 * @return void
	 */
	public function indexAction() {

		$all = $this->users->findAll();

		$this->theme->setTitle("Alla användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Alla användare",
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
		$this->addLegend();
	}

	/**
	* Add legend as triptych
	*
	* @return
	*/
	private function addLegend() {
		$legend1 = $this->fileContent->get('users/users-legend.html');
		$legend2 = $this->fileContent->get('users/users-legend-2.html');
		$legend3 = $this->fileContent->get('users/users-legend-3.html');

		$this->theme->addClassAttributeFor('wrap-triptych', 'smaller-text');

		$this->views->add('theme/index', ['content' => $legend1], 'triptych-1');
		$this->views->add('theme/index', ['content' => $legend2], 'triptych-2');
		$this->views->add('theme/index', ['content' => $legend3], 'triptych-3');
	}

	/**
	 * List user with id.
	 *
	 * @param int $id of user to display
	 *
	 * @return void
	 */
	public function idAction($id = null) {

		$user = $this->users->find($id);

		if ($user) {
			$this->theme->setTitle("Användare " . $user->acronym);
			$this->views->add('users/view', [
				'users' => [$user],
				'title' => 'Användare ' . $user->acronym,
				], 'main');
			$this->views->add('users/users-sidebar', [], 'sidebar');
		} else {
			$url = $this->url->create('users-');
			$this->response->redirect($url);
		}
	}

	/**
	 * Add new user.
	 *
	 * @param string $acronym of user to add.
	 *
	 * @return void
	 */
	public function addAction($acronym = null) {

		$form = new \Anax\HTMLForm\CFormAddUser();
		$form->setDI($this->di);
		$form->check();

		$this->di->theme->setTitle("Registrera användare");
		$this->views->add('theme/index', [
			'title' => 'Registrera användare',
			'content' => '<h2>Registrera användare</h2>' . $form->getHTML()
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
	}

	/**
	 * Update user.
	 *
	 * @param int $id of user to add.
	 *
	 * @return void
	 */
	public function updateAction($id = null) {

		$user = $this->users->find($id);
		
		$form = new \Anax\HTMLForm\CFormEditUser($user);
		$form->setDI($this->di);
		$form->check();

		$this->di->theme->setTitle("Uppdatera användare");
		$this->views->add('theme/index', [
			'title' => 'Uppdatera användare',
			'content' => '<h2>Uppdatera användare</h2>' . $form->getHTML()
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
	}

	/**
	 * Delete user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function deleteAction($id = null) {
		if (!isset($id)) {
			die("Missing id");
		}

		$res = $this->users->delete($id);

		$url = $this->url->create('users-');
		$this->response->redirect($url);
	}

	/**
	 * Delete (soft) user.
	 *
	 * @param integer $id of user to soft delete.
	 *
	 * @return void
	 */
	public function softDeleteAction($id = null) {
		if (!isset($id)) {
			die("Missing id");
		}

		$now = date('Y-m-d H:i:s');

		$user = $this->users->find($id);

		$user->deleted = $now;
		$user->active = null;
		$user->save();

		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}

	/**
	 * Undo delete (soft) user.
	 *
	 * @param integer $id of user to undo soft delete.
	 *
	 * @return void
	 */
	public function undoSoftDeleteAction($id = null) {
		if (!isset($id)) {
			die("Missing id");
		}

		$now = date('Y-m-d H:i:s');

		$user = $this->users->find($id);

		$user->deleted = null;
		//$user->active = $now;
		$user->save();

		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}

	/**
	 * List all active and not deleted users.
	 *
	 * @return void
	 */
	public function activeAction() {
		$all = $this->users->query()
		->where('active IS NOT NULL')
		->andWhere('deleted IS NULL')
		->execute();

		$this->theme->setTitle("Aktiva användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Aktiva användare",
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
		$this->addLegend();
	}

	/**
	 * List all active and not deleted users.
	 *
	 * @return void
	 */
	public function inactiveAction() {
		$all = $this->users->query()
		->where('active IS NULL')
		->andWhere('deleted IS NULL')
		->execute();

		$this->theme->setTitle("Inaktiva användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Inaktiva användare",
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
		$this->addLegend();
	}

	/**
	 * List all active and not deleted users.
	 *
	 * @return void
	 */
	public function nonDeletedAction() {
		$all = $this->users->query()
		->where('deleted IS NULL')
		->execute();

		$this->theme->setTitle("Aktiva och inaktiva användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Aktiva och inaktiva användare",
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
		$this->addLegend();
	}

	/**
	 * List all trashed (softdeleted) users.
	 *
	 * @return void
	 */
	public function trashAction() {
		$all = $this->users->query()
		->where('deleted IS NOT NULL')
		->execute();

		$this->theme->setTitle("Papperskorgen");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Papperskorgen",
			], 'main');
		$this->views->add('users/users-sidebar', [], 'sidebar');
		$this->addLegend();
	}

	/**
	 * Setup database
	 *
	 * @return void
	 */
	public function setupAction() {
		//$this->db->setVerbose();

		$this->db->dropTableIfExists('user')->execute();

		$this->db->createTable(
			'user',
			[
			'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
			'acronym' => ['varchar(20)', 'unique', 'not null'],
			'email' => ['varchar(80)'],
			'name' => ['varchar(80)'],
			'password' => ['varchar(255)'],
			'created' => ['datetime'],
			'updated' => ['datetime'],
			'deleted' => ['datetime'],
			'active' => ['datetime'],
			]
			)->execute();

		$this->db->insert(
			'user',
			['acronym', 'email', 'name', 'password', 'created', 'active', 'deleted']
			);

		$now = date('Y-m-d H:i:s');

		$this->db->execute([
			'admin',
			'admin@dbwebb.se',
			'Administrator',
			password_hash('admin', PASSWORD_DEFAULT),
			$now,
			$now
			]);

		$this->db->execute([
			'johndoe',
			'johndoe@dbwebb.se',
			'John Doe',
			password_hash('johndoe', PASSWORD_DEFAULT),
			$now,
			$now,
			null
			]);

		$this->db->execute([
			'janedoe',
			'janedoe@dbwebb.se',
			'Jane Doe',
			password_hash('janedoe', PASSWORD_DEFAULT),
			$now,
			null,
			null
			]);

		$this->db->execute([
			'nisse',
			'nisse@dbwebb.se',
			'Nisse Hulth',
			password_hash('nisse', PASSWORD_DEFAULT),
			$now,
			null,
			$now
			]);

		$url = $this->url->create('users-');
		$this->response->redirect($url);
	}
}