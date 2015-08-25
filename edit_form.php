<?php
 
class block_sitestats_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
 
        // Number of views.
        $mform->addElement('text', 'config_viewcount', get_string('viewcount', 'block_sitestats'));
        $mform->setDefault('config_viewcount', 15000);
        $mform->setType('config_viewcount', PARAM_INT);      

        // Number of videos.
        $mform->addElement('text', 'config_videocount', get_string('videocount', 'block_sitestats'));
        $mform->setDefault('config_videocount', 15000);
        $mform->setType('config_videocount', PARAM_INT);

        // Number of questions
        $mform->addElement('text', 'config_questioncount', get_string('questioncount', 'block_sitestats'));
        $mform->setDefault('config_questioncount', 15000);
        $mform->setType('config_questioncount', PARAM_INT);      
    }
}