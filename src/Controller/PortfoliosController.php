<?php

declare(strict_types=1);

namespace App\Controller;

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
        $this->paginate = [
            'contain' => ['Instructors'],
        ];
        $portfolios = $this->paginate($this->Portfolios);

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
}
