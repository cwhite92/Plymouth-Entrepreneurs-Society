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

    public function admin_index() {
        $this->set('pageTitle', 'Events - Admin Panel');
        $this->set('currentPage', 'events');

        $this->set('events', $this->Event->find('all', array(
            'order' => 'Event.id desc'
        )));
        $this->layout = 'admin';
    }

    public function index() {
        $this->set('pageTitle', 'Events - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'events');

        $this->set('events', $this->paginate('Event'));
    }

    public function view($id = null) {
        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException();
        }

        $this->set('pageTitle', $event['Event']['title'] . ' - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'events');

        $this->set('event', $event);
    }

    public function admin_add() {
        $this->set('pageTitle', 'Add Event - Admin Panel');
        $this->set('currentPage', 'events');

        if($this->request->is('post')) {
            $this->Event->create();

            // Fuck this, I can't be bothered trying to work out how to do it properly since we're running out of time.
            $this->request->data['Attachment'] = array();

            // Loop through all uploaded attachments
            foreach($this->request->data['Event']['attachments'] as $attachment) {
                // Only proceed if there wasn't an error uploading
                if($attachment['error'] == 0) {
                    // Attempt to move the uploaded file
                    if(move_uploaded_file($attachment['tmp_name'], WWW_ROOT . 'files' . DS . 'attachments' . DS . $attachment['name'])) {
                        // Format the array so it gets saved to the database correctly
                        $this->request->data['Attachment'][] = array(
                            'filename' => $attachment['name']
                        );
                    }
                }
            }

            if(!empty($this->request->data['Event']['poster']['name'])){
                if($this->Event->saveAssociated($this->request->data)) {
                    $this->Session->setFlash('Your event has been saved.', 'default');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Unable to add your event.', 'default');
                }
            } else {
                $this->Session->setFlash('An event poster is required to be uploaded for every event');
            }
        }

        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $this->set('pageTitle', 'Edit Event - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'events');

        if($this->request->is('post') || $this->request->is('put')) {
            if($this->Event->save($this->request->data)) {
                $this->Session->setFlash('Your event has been updated.', 'default');
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('There was a problem saving your event. Please try again.', 'default');
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

        // Delete all attachments with this event ID
        $this->loadModel('Attachment');
        $this->Attachment->deleteAll(array(
            'Attachment.event_id' => $event['Event']['id']
        ));

        // Delete event
        if($this->Event->delete($id)) {
            $this->Session->setFlash('The event "' . $event['Event']['title'] . '" has been deleted.');
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }
}