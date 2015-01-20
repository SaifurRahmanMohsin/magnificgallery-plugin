<?php
namespace Mohsin\MagnificGallery;

use App;
use Event;
use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

  /**
  * Returns information about this plugin.
  *
  * @return array
  */
  public function pluginDetails()
  {
    return [
      'name'        => 'Magnific Gallery',
      'description' => 'Create responsive galleries to use in your web app.',
      'author'      => 'Saifur Rahman Mohsin',
      'icon'        => 'icon-picture-o'
    ];
  }

  public function registerComponents()
  {
    return [
      'Mohsin\MagnificGallery\Components\Magnific' => 'magnific'
    ];
  }

  public function registerNavigation()
  {
    return [
      'galleries' => [
        'label' => 'Gallery',
        'url'   => Backend::url('mohsin/magnificgallery/galleries'),
        'icon'        => 'icon-picture-o',
        'permissions' => ['mohsin.*'],
        'order'       => 500
      ],
    ];
  }
}
?>
