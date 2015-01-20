<?php
namespace Mohsin\MagnificGallery\Controllers;

use Flash;
use BackendMenu;
use Backend\Classes\Controller;
use Mohsin\MagnificGallery\Models\Gallery;

class Galleries extends Controller {

  public $implement = [
    'Backend.Behaviors.FormController',
    'Backend.Behaviors.ListController'
  ];

  public $formConfig = 'config_form.yaml';
  public $listConfig = 'config_list.yaml';

  public function __construct()
  {
    parent::__construct();
    BackendMenu::setContext('Mohsin.MagnificGallery', 'magnificgallery', 'galleries');
  }
}
?>
