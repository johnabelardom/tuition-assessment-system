<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prototypes extends MX_Controller {

	var $page;
	var $assets;
	var $script_tags;
	var $link_tags;
	var $meta_tags;

	function __construct() {
		parent::__construct();
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->library('shortcode');
		$this->assets = base_url() . 'public/assets/';

		$this->page['page_title'] = "Prototypes";
		
		$this->load->module('globalcontroller');
		$this->load->module('__functions');
		// $this->shortcode->add('bartag', array($this, 'bartag_func'));
	}

	/*function bartag_func($atts) {
		extract($this->shortcode->shortcode_atts(array(
			'foo' => 'no foo',
			'baz' => 'default baz',
		), $atts));

		return "foo = {$foo}";
	}*/

	function index() {
		$view = 'prototypes/index';
		// $this->load_default();
		modules::run('__globalmodule/__globalmodule/set_tablename', 'nyeam_table');
		$this->page['data'] = modules::run('__globalmodule/__globalmodule/get_tablename');
		$this->page['assets_url'] = $this->assets;

		$this->script_tags = array(
			array(
				'script_name' => 'FontAwesome 5',
				'src' => $this->assets . 'fontawesome/svg-with-js/js/fontawesome-all.min.js',
				'type' => '',
				'attrs' => array('defer')
			)
		);
		$this->link_tags = array(
			array(
				'link_name' => 'W3.CSS',
				'rel' => '',
				'type' => '',
				'href' => $this->assets . 'w3-css/4-w3.css'
			), array(
				'link_name' => 'Prototypes Stylings',
				'rel' => '',
				'type' => '',
				'href' => $this->assets . 'css/style.css'
			)
		);
		$this->functions->render_page(true, $this->page['page_title'], $this->script_tags, $this->link_tags, $this->meta_tags, $view, true, $this->page);
	}



	/*
	* Call this function to load all the JS and CSS frameworks and libraries
	*/
	function load_default() {
		$this->script_tags = array(
			array(
				'script_name' => 'jQuery',
				'src' => $this->assets . 'jquery/jquery-3.2.1.min.js',
				'type' => '',
				'attrs' => array()
			),
			array(
				'script_name' => 'jQuery Migrate Plugin',
				'src' => $this->assets . 'jquery/jquery-migrate-1.4.1.min.js',
				'type' => '',
				'attrs' => array()
			),
			array(
				'script_name' => 'jQuery UI',
				'src' => $this->assets . 'jq-default-ui/jquery-ui.min.js',
				'type' => '',
				'attrs' => array()
			),
			array(
				'script_name' => 'Bootstrap JS',
				'src' => $this->assets . 'bootstrap/js/bootstrap.min.js',
				'type' => 'type',
				'attrs' => array()
			),
			array(
				'script_name' => 'FontAwesome 5',
				'src' => $this->assets . 'fontawesome/svg-with-js/js/fontawesome-all.min.js',
				'type' => '',
				'attrs' => array('defer')
			)
		);
		$this->link_tags = array(
			array(
				'link_name' => 'Bootstrap CSS',
				'rel' => '',
				'type' => 'type',
				'href' => $this->assets . 'bootstrap/css/bootstrap.min.css'
			),
			array(
				'link_name' => 'jQuery UI CSS',
				'rel' => '',
				'type' => 'type',
				'href' => $this->assets . 'jq-default-ui/jquery-ui.min.css'
			),
			array(
				'link_name' => 'W3.CSS',
				'rel' => '',
				'type' => 'type',
				'href' => $this->assets . 'w3-css/4-w3.css'
			)
		);
		$this->meta_tags = array(
			array(
				'meta_name' => 'Viewport',
				'name' => 'viewport',
				'content' => 'width=device-width, initial-scale=1'
			)
		);
	}
}
