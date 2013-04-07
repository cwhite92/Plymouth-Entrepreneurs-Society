<?php

class SponsorsController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_index() {
        $this->set('sponsors', $this->Sponsor->find('all'));
        $this->layout = 'admin';
    }

    public function admin_delete($id) {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if($this->Sponsor->delete($id)) {
            $this->Session->setFlash('The sponsor has been deleted.', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $sponsor = $this->Sponsor->findById($id);
        if(!$sponsor) {
            throw new NotFoundException();
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->Sponsor->id = $id;
            if($this->Sponsor->save($this->request->data)) {
                $this->Session->setFlash('The sponsor has been updated.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update sponsor.', 'default', array('class' => 'error'));
            }
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $sponsor;
        }

        $this->layout = 'admin';
    }

    public function admin_add() {
        if($this->request->is('post')) {
            //die(debug($this->request->data));
            $this->Sponsor->create();
            if($this->Sponsor->save($this->request->data)) {
                $this->Session->setFlash('The sponsor.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add sponsor.', 'default', array('class' => 'error'));
            }
        }

        $this->layout = 'admin';
    }

}