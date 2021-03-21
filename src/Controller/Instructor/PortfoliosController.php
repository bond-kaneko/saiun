<?php

declare(strict_types=1);

namespace App\Controller\Instructor;

/**
 * Portfolios Controller.
 *
 * @property \App\Model\Table\PortfoliosTable $Portfolios
 *
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PortfoliosController extends AppController
{
    /**
     * Index method.
     *
     * @return \Cake\Http\Response|void|null Renders view
     */
    public function index()
    {
        $loginId = $this->Authentication->getIdentity()['id'];
        if (!$this->Portfolios->Instructors->exists(['id' => $loginId])) {
            throw new NotFoundException();
        }

        $this->paginate = [
            'contain' => ['Instructors'],
        ];

        $portfolios = $this->Portfolios->find()
            ->contain(['Instructors'])
            ->where(['Portfolios.instructor_id' => $loginId]);

        $portfolios = $this->paginate($portfolios);

        $this->set(compact('portfolios'));
    }

    /**
     * View method.
     *
     * @param string|null $id portfolio id
     *
     * @return \Cake\Http\Response|void|null Renders view
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function view($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => ['Instructors'],
        ]);

        $blocks = (array) json_decode($portfolio->content);

        $this->set(compact('portfolio', 'blocks'));
    }

    /**
     * Add method.
     *
     * @return \Cake\Http\Response|void|null redirects on successful add, renders view otherwise
     */
    public function add()
    {
        $loginId = $this->Authentication->getIdentity()['id'];
        if (!$this->Portfolios->Instructors->exists(['id' => $loginId])) {
            throw new NotFoundException();
        }

        $portfolio = $this->Portfolios->newEntity(['instructor_id' => $loginId]);
        if ($this->request->is('post')) {
            debug($this->request->getData());
            exit;
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->getData());
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
        }
        $this->set(compact('portfolio'));
    }

    /**
     * Edit method.
     *
     * @param string|null $id portfolio id
     *
     * @return \Cake\Http\Response|void|null redirects on successful edit, renders view otherwise
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function edit($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->getData());
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
        }
        $users = $this->Portfolios->Users->find('list', ['limit' => 200]);
        $this->set(compact('portfolio', 'users'));
    }

    /**
     * Delete method.
     *
     * @param string|null $id portfolio id
     *
     * @return \Cake\Http\Response|void|null redirects to index
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portfolio = $this->Portfolios->get($id);
        if ($this->Portfolios->delete($portfolio)) {
            $this->Flash->success(__('The portfolio has been deleted.'));
        } else {
            $this->Flash->error(__('The portfolio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}