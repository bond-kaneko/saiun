<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Instructors Controller.
 *
 * @property \App\Model\Table\InstructorsTable $Instructors
 *
 * @method \App\Model\Entity\Instructor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstructorsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'prefix' => 'Instructor',
                'controller' => 'InstructorsUsers',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Instructors', 'action' => 'login']);
        }
    }

    /**
     * Index method.
     *
     * @return \Cake\Http\Response|void|null Renders view
     */
    public function index()
    {
        $instructors = $this->paginate($this->Instructors);

        $this->set(compact('instructors'));
    }

    /**
     * View method.
     *
     * @param string|null $id instructor id
     *
     * @return \Cake\Http\Response|void|null Renders view
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function view($id = null)
    {
        $instructor = $this->Instructors->get($id, [
            'contain' => ['Portfolios'],
        ]);

        $this->set(compact('instructor'));
    }

    /**
     * Add method.
     *
     * @return \Cake\Http\Response|void|null redirects on successful add, renders view otherwise
     */
    public function add()
    {
        $instructor = $this->Instructors->newEmptyEntity();
        if ($this->request->is('post')) {
            $instructor = $this->Instructors->patchEntity($instructor, $this->request->getData());
            if ($this->Instructors->save($instructor)) {
                $this->Flash->success(__('The instructor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The instructor could not be saved. Please, try again.'));
        }
        $this->set(compact('instructor'));
    }

    /**
     * Edit method.
     *
     * @param string|null $id instructor id
     *
     * @return \Cake\Http\Response|void|null redirects on successful edit, renders view otherwise
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function edit($id = null)
    {
        $instructor = $this->Instructors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $instructor = $this->Instructors->patchEntity($instructor, $this->request->getData());
            if ($this->Instructors->save($instructor)) {
                $this->Flash->success(__('The instructor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The instructor could not be saved. Please, try again.'));
        }
        $this->set(compact('instructor'));
    }

    /**
     * Delete method.
     *
     * @param string|null $id instructor id
     *
     * @return \Cake\Http\Response|void|null redirects to index
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instructor = $this->Instructors->get($id);
        if ($this->Instructors->delete($instructor)) {
            $this->Flash->success(__('The instructor has been deleted.'));
        } else {
            $this->Flash->error(__('The instructor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
