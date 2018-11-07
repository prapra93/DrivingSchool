<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subcourses Controller
 *
 * @property \App\Model\Table\SubcoursesTable $Subcourses
 *
 * @method \App\Model\Entity\Subcourse[] paginate($object = null, array $settings = [])
 */
class SubcoursesController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    public function getByCourse() {
        $course_id = $this->request->query('course_id');

        $subcourses = $this->Subcourses->find('all', [
            'conditions' => ['Subcourses.course_id' => $course_id],
        ]);
        $this->set('subcourses',$subcourses);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $subcourses = $this->paginate($this->Subcourses);

        $this->set(compact('subcourses'));
        $this->set('_serialize', ['subcourses']);
    }

    /**
     * View method
     *
     * @param string|null $id Subcourse id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcourse = $this->Subcourses->get($id, [
            'contain' => ['Courses', 'Vehicules']
        ]);

        $this->set('subcourse', $subcourse);
        $this->set('_serialize', ['subcourse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subcourse = $this->Subcourses->newEntity();
        if ($this->request->is('post')) {
            $subcourse = $this->Subcourses->patchEntity($subcourse, $this->request->getData());
            if ($this->Subcourses->save($subcourse)) {
                $this->Flash->success(__('The subcourse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcourse could not be saved. Please, try again.'));
        }
        $courses = $this->Subcourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('subcourse', 'courses'));
        $this->set('_serialize', ['subcourse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcourse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subcourse = $this->Subcourses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcourse = $this->Subcourses->patchEntity($subcourse, $this->request->getData());
            if ($this->Subcourses->save($subcourse)) {
                $this->Flash->success(__('The subcourse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcourse could not be saved. Please, try again.'));
        }
        $courses = $this->Subcourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('subcourse', 'courses'));
        $this->set('_serialize', ['subcourse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcourse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subcourse = $this->Subcourses->get($id);
        if ($this->Subcourses->delete($subcourse)) {
            $this->Flash->success(__('The subcourse has been deleted.'));
        } else {
            $this->Flash->error(__('The subcourse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
