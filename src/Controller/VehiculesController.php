<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicules Controller
 *
 * @property \App\Model\Table\VehiculesTable $Vehicules
 *
 * @method \App\Model\Entity\Vehicule[] paginate($object = null, array $settings = [])
 */
class VehiculesController extends AppController
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
        $vehicules = $this->paginate($this->Vehicules);

        $this->set(compact('vehicules'));
        $this->set('_serialize', ['vehicules']);

    }

    public function findMakes() {
        
        if ($this->request->is('ajax')) {
        
            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Vehicules->find('all', array(
                'conditions' => array('Vehicules.make LIKE ' => '%' . $name . '%')
            ));
        
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['make'], 'value' => $result['make']);
            }
            echo json_encode($resultArr);
        }
    }


    /**
     * View method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function view($id = null)
    {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $vehicule = $this->Vehicules->get($id, [
            'contain' => ['Users', 'Lessons', 'Subcategories', 'Subcourses']
        ]);

        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicule = $this->Vehicules->newEntity();
        if ($this->request->is('post')) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            $vehicule->user_id = $this->Auth->user('id');
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
        }
        $users = $this->Vehicules->Users->find('list', ['limit' => 200]);
        $lessons = $this->Vehicules->Lessons->find('list', ['limit' => 200]);

        // Bâtir la liste des catégories
        $this->loadModel('Courses');
        $courses = $this->Courses->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $courses = $courses->toArray();
        reset($courses);
        $course_id = key($courses);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $subcourses = $this->Vehicules->Subcourses->find('list', [
            'conditions' => ['Subcourses.course_id' => $course_id],
        ]);

        

        $this->set(compact('vehicule', 'users', 'lessons', 'subcourses', 'courses'));
        $this->set('_serialize', ['vehicule', 'subcourses', 'courses']);

    }

    

    /**
     * Edit method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;

        $vehicule = $this->Vehicules->get($id, [
            'contain' => ['Lessons']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
        }
        $users = $this->Vehicules->Users->find('list', ['limit' => 200]);
        $lessons = $this->Vehicules->Lessons->find('list', ['limit' => 200]);

        // Bâtir la liste des catégories
        $this->loadModel('Courses');
        $courses = $this->Courses->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $courses = $courses->toArray();
        reset($courses);
        $course_id = key($courses);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $subcourses = $this->Vehicules->Subcourses->find('list', [
            'conditions' => ['Subcourses.course_id' => $course_id],
        ]);

        $this->set(compact('vehicule', 'users', 'lessons', 'subcourses', 'courses'));
        $this->set('_serialize', ['vehicule', 'subcourses', 'courses']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $this->request->allowMethod(['post', 'delete']);
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            $this->Flash->success(__('The vehicule has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //------------------------------------------------------------------//
    //------------------------------------------------------------------//
    //-------------------------JQUERY-AJAX------------------------------//
    //------------------------------------------------------------------//
    //------------------------------------------------------------------//

    public function addAjax(){
        
        $response = ['result' => 'fail'];
        $errors = $this->Vehicules->validator()->errors($this->request->data);
        if (empty($errors)) {
            $vehicule = $this->Vehicules->newEntity($this->request->data);
            $vehicule->user_id = $this->Auth->user('id');
            if ($this->Vehicules->save($vehicule)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
    }
        
            public function editAjax() {
                $response = ['result' => 'fail'];
                $errors = $this->Vehicules->validator()->errors($this->request->data);
                if (empty($errors)) {
                    $vehicule = $this->Vehicules->newEntity($this->request->data);
                    $vehicule->id = $this->request->data('id');
                    
                    if ($this->Vehicules->save($vehicule)) {
                        $response = ['result' => 'success'];
                    }
                } else {
                    $response['error'] = $errors;
                }
                $this->set(compact('response'));
                $this->set('_serialize', ['response']);
            }
            
            public function getVehicule($id = 0) {
                if($id == 0){
                    $vehicules = $this->Vehicules->find('all');
                }else{
                    $vehicules = $this->Vehicules->get($id);
                }
                
                $this->set(compact('vehicules'));
                $this->set('_serialize', ['vehicules']);
            }
            
            public function deleteAjax()
            {
                $response = ['result' => 'fail'];
                $id = $this->request->data('id');
                
                $vehicule = $this->Vehicules->get($id);
                if ($this->Vehicules->delete($vehicule)) {
                    $response = ['result' => 'success'];
                }
        
                
                $this->set(compact('response'));
                $this->set('_serialize', ['response']);
            }

    //------------------------------------------------------------------//
    //------------------------------------------------------------------//
    //--------------------------ANGULAR JS------------------------------//
    //------------------------------------------------------------------//
    //------------------------------------------------------------------//
    
    public function viewAng($id = null)
    {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $vehicule = $this->Vehicules->get($id, [
            'contain' => ['Users', 'Lessons', 'Subcategories', 'Subcourses']
        ]);

        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicule']);
    }

    public function addAng(){
        
        $vehicule = $this->Vehicules->newEntity();
        if ($this->request->is('post')) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            if ($this->Vehicules->save($vehicule)) {
                //$this->Flash->success(__('The vehicule has been saved.'));
                //return $this->redirect(['action' => 'index']);
                $response = ['result' => 'The vehicule was created.'];
            } else {
                //$this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
                $response['error'] = __('The vehicule could not be saved. Please, try again.');
            }
        }
        //$categories = $this->Subcategories->Categories->find('list', ['limit' => 200]);
        //$this->set(compact('vehicule', 'categories'));
        //$this->set('_serialize', ['vehicule']);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
    }
        
    public function editAng() {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $vehicule = $this->Vehicules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            if ($this->Vehicules->save($vehicule)) {
                //$this->Flash->success(__('The vehicule has been saved.'));
                //return $this->redirect(['action' => 'index']);
                $response = ['result' => 'The vehicule was updated.'];
            } else {
                //$this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
                $response['error'] = __('The vehicule could not be saved. Please, try again.');
            }
        }
        //$categories = $this->Vehicules->Categories->find('list', ['limit' => 200]);
        //$this->set(compact('vehicule', 'categories'));
        //$this->set('_serialize', ['vehicule']);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }        
            
    public function deleteAng()
    {
        $data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $this->request->allowMethod(['post', 'delete']);
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            //$this->Flash->success(__('The vehicule has been deleted.'));
            $response = ['result' => 'The vehicule was deleted.'];
        } else {
            //$this->Flash->error(__('The vehicule could not be deleted. Please, try again.'));
            $response = ['error' => 'The vehicule could not be deleted. Please, try again.'];
        }

        //return $this->redirect(['action' => 'index']);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }        

}
