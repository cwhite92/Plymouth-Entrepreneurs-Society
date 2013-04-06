<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jakechampion
 * Date: 05/04/2013
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */
class Service extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}