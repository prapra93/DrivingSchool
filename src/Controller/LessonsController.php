<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lessons Controller
 *
 * @property \App\Model\Table\LessonsTable $Lessons
 *
 * @method \App\Model\Entity\Lesson[] paginate($object = null, array $settings = [])
 */
class LessonsController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $lessons = $this->paginate($this->Lessons);

        $this->set(compact('lessons'));
        $this->set('_serialize', ['lessons']);
    }

    /**
     * View method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lesson = $this->Lessons->get($id, [
            'contain' => ['Users', 'Files', 'Vehicules']
        ]);

        $this->set('lesson', $lesson);
        $this->set('_serialize', ['lesson']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lesson = $this->Lessons->newEntity();
        if ($this->request->is('post')) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            $lesson->user_id = $this->Auth->user('id');
            if ($this->Lessons->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $users = $this->Lessons->Users->find('list', ['limit' => 200]);
        $files = $this->Lessons->Files->find('list', ['limit' => 200]);
        $vehicules = $this->Lessons->Vehicules->find('list', ['limit' => 200]);
        $this->set(compact('lesson', 'users', 'files', 'vehicules'));
        $this->set('_serialize', ['lesson']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lesson = $this->Lessons->get($id, [
            'contain' => ['Files', 'Vehicules']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $users = $this->Lessons->Users->find('list', ['limit' => 200]);
        $files = $this->Lessons->Files->find('list', ['limit' => 200]);
        $vehicules = $this->Lessons->Vehicules->find('list', ['limit' => 200]);
        $this->set(compact('lesson', 'users', 'files', 'vehicules'));
        $this->set('_serialize', ['lesson']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lesson = $this->Lessons->get($id);
        if ($this->Lessons->delete($lesson)) {
            $this->Flash->success(__('The lesson has been deleted.'));
        } else {
            $this->Flash->error(__('The lesson could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $lessonId = (int)$this->request->getParam('pass.0');
            if ($this->Lessons->isOwnedBy($lessonId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function get($status = 0) {
        $lessons = $this->Lessons->find('recent', ['status' => $status]);
        $this->set(compact('lessons'));
        $this->set('_serialize', ['lessons']);
    }

    public function finish($id = null) {
        $response = ['result' => 'fail'];
        if (!is_null($id)) {
            $lessons = TableRegistry::get('Lessons');
            $lesson = $lessons->get($id);
            $lessons->patchEntity($lesson, ['is_done' => 1]);
            if ($lessons->save($lesson)) {
                $response = ['result' => 'success'];
            }
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    public function apropos()
    {
    }

}
