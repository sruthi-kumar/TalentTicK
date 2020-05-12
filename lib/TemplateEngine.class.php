<?php
class TemplateEngine {

	protected $template_dir = __DIR__ . '/../templates/';
	protected $fallback_template_dir = __DIR__ . '/../templates/common/';
	protected $vars = array();
	protected $output = "show";

	public function __construct($template_dir = null, $output = null) {
		if ($template_dir !== null) {
			// you should check here if this dir really exists
			$this->template_dir .= $template_dir . '/';
		}

		if ($output !== null) {
			// you should check here if this dir really exists
			$this->output .= $output;
		}
	}

	public function render($template_file) {
		if (file_exists($this->template_dir . $template_file)) {

			return $this->assemble_view($this->template_dir . $template_file);

		} else {

			if (file_exists($this->fallback_template_dir . $template_file)) {

				return $this->assemble_view($this->fallback_template_dir . $template_file);

			} else {

				throw new Exception('no template file ' . $template_file . ' present in directory ' . $this->template_dir);
			}
		}
	}

	public function assemble_view($template_file) {
		ob_start();
		include $template_file;
		$html = ob_get_contents();
		ob_end_clean();
		if ($this->output == "show") {
			print_r($html);
		} else {
			return $html;
		}
		return;
	}

	public function __set($name, $value) {
		$this->vars[$name] = $value;
	}

	public function __get($name) {
		return $this->vars[$name];
	}
}
