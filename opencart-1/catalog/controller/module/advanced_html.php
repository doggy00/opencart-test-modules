<?php  
class ControllerModuleAdvancedHtml extends Controller {
	protected function index($setting) {
		$this->language->load('module/advanced_html');
		
    	$this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['my_test'] = 123123;
        $this->data['a'] = [1,2,3,4,5];

        if (isset($setting['description']) && !empty($setting['description'])) {
            $template_content = html_entity_decode($setting['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
            $temp_file = DIR_CACHE . 'custom_templates/temp_advanced_html_module_' . md5($template_content) . '.tpl';

            if (!file_exists($temp_file)) {
                file_put_contents($temp_file, $template_content);
            }

            $this->data['tmp_file'] = DIR_CACHE . 'custom_templates/temp_advanced_html_module_' . md5($template_content) . '.tpl';
        }

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/advanced_html.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/advanced_html.tpl';
		} else {
			$this->template = 'default/template/module/advanced_html.tpl';
		}
		
		$this->render();
	}
}
?>