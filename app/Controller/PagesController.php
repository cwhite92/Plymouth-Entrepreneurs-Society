<?php

class PagesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }

    public function admin_index() {
        $this->set('pageTitle', 'Static Pages - Admin Panel');
        $this->set('currentPage', 'pages');

        $this->set('pages', $this->Page->find('all'));
        $this->layout = 'admin';
    }

    public function admin_delete($id = null) {
        $page = $this->Page->findById($id);
        if(!$page) {
            throw new NotFoundException();
        }

        // Delete event
        if($this->Page->delete($id)) {
            $this->Session->setFlash('The page "' . $page['Page']['title'] . '" has been deleted.');
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $this->set('pageTitle', 'Edit Page - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'pages');

        if($this->request->is('post') || $this->request->is('put')) {
            // Check if the category already exists
            $this->loadModel('Category');
            $dbCategory = $this->Category->find('first', array(
                'conditions' => array('Category.name' => $this->data['Category']['name'])
            ));

            if(!empty($dbCategory)) {
                // The category already exists, assign its ID before the save
                $this->request->data['Category']['id'] = $dbCategory['Category']['id'];
            }

            if($this->Page->saveAssociated($this->request->data)) {
                $this->Session->setFlash('The page has been updated.', 'default');
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('There was a problem saving the page. Please try again.', 'default');
        }

        $page = $this->Page->findById($id);
        if(!$page) {
            throw new NotFoundException();
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $page;
        }

        $this->layout = 'admin';
    }

    public function admin_add() {
        $this->set('pageTitle', 'Add Page - Admin Panel');
        $this->set('currentPage', 'pages');

        if($this->request->is('post')) {
            $this->Page->create();

            // Check if the category already exists
            $this->loadModel('Category');
            $dbCategory = $this->Category->find('first', array(
                'conditions' => array('Category.name' => $this->data['Category']['name'])
            ));

            if(!empty($dbCategory)) {
                // The category already exists, assign its ID before the save
                $this->request->data['Category']['id'] = $dbCategory['Category']['id'];
            }

            if($this->Page->saveAssociated($this->request->data)) {
                $this->Session->setFlash('The page has been created.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save the page.');
            }
        }

        $this->layout = 'admin';
    }

    public function view($permalink) {
        $page = $this->Page->findByPermalink($permalink);
        if(!$page) {
            throw new NotFoundException();
        }

        $this->set('pageTitle', $page['Page']['title'] . ' - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'pages');

        $this->set('page', $page);
    }

}