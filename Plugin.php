<?php
namespace Mohsin\MagnificGallery;

use Backend;
use System\Classes\PluginBase;

/**
 * Magnific Gallery Plugin Information File
 */
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
      'name'        => 'mohsin.magnificgallery::lang.plugin.name',
      'description' => 'mohsin.magnificgallery::lang.plugin.description',
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
        'label' => 'mohsin.magnificgallery::lang.magnific.name',
        'url'   => Backend::url('mohsin/magnificgallery/galleries'),
        'icon'        => 'icon-picture-o',
        'permissions' => ['mohsin.magnificgallery.*'],
        'order'       => 500
      ],
    ];
  }
}
?>
