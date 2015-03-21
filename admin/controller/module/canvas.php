<?php

class ControllerModuleCanvas extends Controller {

    protected $module = 'module/canvas';

    protected function index() {
        $this->language->load($this->module);
        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('ebaydisplay', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->cache->delete('ebaydisplay');

            $this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_content_top'] = $this->language->get('text_content_top');
        $this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
        $this->data['text_column_left'] = $this->language->get('text_column_left');
        $this->data['text_column_right'] = $this->language->get('text_column_right');

        $this->data['tab_module'] = $this->language->get('tab_module');
        $this->data['tab_general'] = $this->language->get('tab_general');
        $this->data['tab_']
    }
}