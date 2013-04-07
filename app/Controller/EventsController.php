<?php
class EventsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $paginate = array(
        'limit' => 6,
        'order' => array(
            'Event.created' => 'desc'
        )
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function  admin_index() {
        $this->set('events', $this->Event->find('all'));
        $this->layout = 'admin';
    }

    public function  index() {
        $this->set('events', $this->paginate('Event'));
    }

    public function view($id = null) {
        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException();
        }

        $this->set('event', $event);
    }

    public function admin_add() {
        if($this->request->is('post')) {
            $this->Event->create();
            if($this->Event->save($this->request->data)) {
                $this->Session->setFlash('Your event has been saved.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your event.', 'default', array('class' => 'error'));
            }
        }

        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        if($this->request->is('post') || $this->request->is('put')) {
            if($this->Event->save($this->request->data)) {
                $this->Session->setFlash('Your event has been updated.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('There was a problem saving your event. Please try again.', 'default', array('class' => 'error'));
        }

        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException();
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $event;
        }

        $this->layout = 'admin';
    }

    public function admin_delete($id = null) {
        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException();
        }

        if($this->Event->delete($id)) {
            $this->Session->setFlash('The event "' . $event['Event']['title'] . '" has been deleted.');
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }
}