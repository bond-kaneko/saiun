<?php

declare(strict_types=1);

namespace App\Controller\Instructor;

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
                'controller' => 'Instructors',
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
}
