<?php

namespace WPAdvanced\Settings;


class _Core
{
  private $settings = [
    'acf' => [
      'title' => 'Manage',
      'slug' => 'options',
      'icon' => 'dashicons-admin-tools',
      'pages' => [
        'header' => 'Header',
        'settings' => 'Settings',
        'footer' => 'Footer',
      ],
      'notranslate' => [],
    ],
    'tinymce' => [
      'pages_editor' => false,
      'buttons_1' => [
        'formatselect',
        'bold',
        'italic',
        'underline',
        'alignleft',
        'aligncenter',
        'alignright',
        'bullist',
        'numlist',
        'link',
        'undo',
        'redo',
        'hr',
        'blockquote',
        'forecolor',
        'textcolor_map' => [
          'D7C0D0', 'color1',
          'F7C7DB', 'color2',
        ],
      ],
      'buttons_2' => [
        'styleselect',
        'removeformat',
        'pastetext',
      ],
      'formats' => [
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6',
        'p' => 'Paragraph',
      ],
      'colors' => '
        "000000", "Black",
        "FFFFFF", "White",
        "262948", "Main Dark",
        "626373", "Secondary Dark",
        "E6EFFF", "Light Blue",
        "3585F4", "Accent Color",
      ',
      'style_formats' => [
        ['title' => 'Style H1', 'classes' => 'h1_style', 'inline' => 'span', 'wrapper' => true],
        ['title' => 'Style H2', 'classes' => 'h2_style', 'inline' => 'span', 'wrapper' => true],
        ['title' => 'Style H3', 'classes' => 'h3_style', 'inline' => 'span', 'wrapper' => true],
        ['title' => 'Style H4', 'classes' => 'h4_style', 'inline' => 'span', 'wrapper' => true],
        ['title' => 'Style H5', 'classes' => 'h5_style', 'inline' => 'span', 'wrapper' => true],
        ['title' => 'Style H6', 'classes' => 'h6_style', 'inline' => 'span', 'wrapper' => true],
      ]
    ],
    'css' => [
      'path' => [
        'public/build/css/styles.css'
      ]
    ],
    'js' => [
      'path' => [
        'public/build/js/scripts.js'
      ]
    ],
    'phpmailer' => [
      'debug_level' => 0, // 0 - DEBUG OFF 1 - DEBUG_CLIENT 2 - DEBUG_SERVER 3 - DEBUG_CONNECTION 4 - DEBUG_LOWLEVEL
      'host' => '',
      'username' => '',
      'password' => '',
      'secure' => 'ssl', // sll, tls
      'port' => '',
      'from' => '',
    ],
    'comments' => [
      'disabled' => true
    ],
    'contact-form' => [
      'disable-validation' => true,
    ],
  ];

  public function __construct()
  {
    new ACF($this->settings['acf']);
    new Comments($this->settings['comments']);
    new ContactForm($this->settings['contact-form']);
    new CSS($this->settings['css']);
//    new JS( $this->settings['js'] );
    new Phpmailer($this->settings['phpmailer']);
    new TinyMCE( $this->settings['tinymce'] );
    new Woocommerce();
  }
}
