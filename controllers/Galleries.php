<?php namespace Mohsin\MagnificGallery\Controllers;

use Flash;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use Mohsin\MagnificGallery\Models\Gallery;
use Backend\Models\Preference as PreferenceModel;

class Galleries extends Controller
{
    public $implement = [
      'Backend.Behaviors.FormController',
      'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['mohsin.magnificgallery.manage_galleries'];

    public function __construct()
    {
        parent::__construct();

        PreferenceModel::instance()->get('show_gallery_in_nav') ? BackendMenu::setContext('Mohsin.MagnificGallery', 'galleries') : BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Mohsin.MagnificGallery', 'galleries');
    }

}
