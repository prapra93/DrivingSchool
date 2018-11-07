<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Utility\Text;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{



    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('users', $this->Users->find('all'));
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));

        $user = $this->Users->get($id, [
            'contain' => ['Customers', 'Lessons', 'Vehicules']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $isHuman = captcha_validate($this->request->data['CaptchaCode']);
            unset($this->request->data['CaptchaCode']);
            if ($isHuman){
                $user->role = 2;
                $user['uuid'] = Text::uuid();
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $email = new Email('default');
                    $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/activation/" . $user->uuid;
                    $email->to($user->email)
                        ->subject('Comfirmation d\'email ~VROOM~ Ecole de conduite')
                        ->send('Click here to confirm you inscription : ' . $confirmation_link);
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('Unable to add the user.'));

            } else {
                $this->Flash->error(__('Please check your Captcha.'));

            }
        }
        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function comfirm($id = null)
    {
        $user = $this->Users->get($id);
        $email = new Email('default');
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/activation/" . $user->uuid;
        $email->to($user->email)->subject('Comfirmation d\'email ~VROOM~ Ecole de conduite')->send($confirmation_link);
        return $this->redirect(['action' => 'view',$id]);

    }

    public function activation($uuid = null)
    {

        $users = $this->Users->find('all');

        foreach ($users as $row) {
            if($row['uuid'] == $uuid){
                $id = $row['id'];
            }
        }

        $user = $this->Users->get($id);

        $user->activation = true;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The email has been comfirm.'));

            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }else{
            $this->Flash->error(__('The email could not be comfirm. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Lessons', 'action' => 'index']);
    }

    public function changePassword($id = null)
    {
            
        $user = $this->Users->find('all');
        $user = $this->Users->get($id);
            
        if (!empty($user)) {

            $password = sha1(Text::uuid());
       
            $password_token = Security::hash($password, 'sha256', true);
       
            //$hashval = sha1($user->username . rand(0, 100));
                   
            $user->password_reset_token = $password_token;
            //$user->hashval = $hashval;
       
            $reset_token_link = Router::url(['controller' => 'Users', 'action' => 'resetPassword'], TRUE) . '/' . $password_token;
                   
       
            if($this->Users->save($user)) {

                $this->redirect($reset_token_link);
                $this->Flash->success('Generating Token Succes');
            }
              
       
        } else {
            $this->Flash->error('Error, idk');
        }
            
        
    }

    public function resetPassword($password_reset_token = null) {
        if (!empty($password_reset_token)) {
 
            $user = $this->Users->findByPasswordResetToken($password_reset_token)->first();
 
            if ($user) {
                
                if (!empty($this->request->data)) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->data['new_password'],
                        'new_password' => $this->request->data['new_password'],
                        'confirm_password' => $this->request->data['confirm_password']
                            ], ['validate' => 'password']
                    );
 
                    //$hashval_new = sha1($user->username . rand(0, 100));
                    //$user->token = $hashval_new;

                    $user->password_reset_token = null;
                    //$user->hashval = null;
 
                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your password has been changed successfully');
                        $user->token = null;
 
                        $this->redirect(['controller' => 'Lessons', 'action' => 'index']);
                    } else {
                        $this->Flash->error('Error changing password. Please try again!');
                    }
                }
            } else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        } else {
            $this->Flash->error('Error loading password reset.');
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
