<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template = NULL, $data = NULL ) {
			if ($template != NULL) {
				// head
				$data['_meta'] 					= $this->_ci->load->view('template/_layout/_meta', $data, TRUE);
				$data['_css'] 					= $this->_ci->load->view('template/_layout/_css', $data, TRUE);
				
				// Header
					$data['_nav'] 				= $this->_ci->load->view('template/_layout/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_layout/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_layout/_sidebar', $data, TRUE);
				
				//Content
					$data['_headerContent'] 	= $this->_ci->load->view('template/_layout/_headerContent', $data, TRUE);
					$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view('template/_layout/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_layout/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_layout/_js', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_layout/_template', $data, TRUE);
			}
		}
		
		function excel($template = NULL, $data = NULL ) {
			if ($template != NULL) {
				
				//Content
				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 			= $this->_ci->load->view('template/_layout/_content2', $data, TRUE);

				echo $data['_excel'] 		= $this->_ci->load->view('template/_layout/_excel', $data, TRUE);
			}
		}

		function word($template = NULL, $data = NULL ) {
			if ($template != NULL) {
				
				//Content
				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 			= $this->_ci->load->view('template/_layout/_content2', $data, TRUE);

				echo $data['_word'] 		= $this->_ci->load->view('template/_layout/_word', $data, TRUE);
			}
		}
	}
?>