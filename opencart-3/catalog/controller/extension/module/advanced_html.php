<?php

class ControllerExtensionModuleAdvancedHTML extends Controller {
    public function index($setting) {
        $data = array();

        if (isset($setting['module_description']) && !empty($setting['module_description'])) {
            $template_content = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');
            $temp_file = DIR_TEMPLATE . 'default/tmp_templates/temp_html_module_' . md5($template_content) . '.twig';

            if (!file_exists($temp_file)) {
                file_put_contents($temp_file, $template_content);
            }

            $data['tmp_file'] =  'default/tmp_templates/temp_html_module_' . md5($template_content) . '.twig';
        }

        return $this->load->view('extension/module/advanced_html', $data);
    }
}