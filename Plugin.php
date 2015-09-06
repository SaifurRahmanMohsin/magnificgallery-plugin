<?php
namespace Mohsin\MagnificGallery;

use Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

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

  public function registerSettings()
  {
    return [
      'galleries' => [
        'label'       => 'mohsin.magnificgallery::lang.magnific.name',
        'url'         => Backend::url('mohsin/magnificgallery/galleries'),
        'description' => 'mohsin.magnificgallery::lang.plugin.description',
        'category'    => SettingsManager::CATEGORY_CMS,
        'icon'        => 'icon-film',
        'permissions' => ['mohsin.magnificgallery.*'],
        'order'       => 200
      ],
    ];
  }

  public function registerPermissions()
  {
      return [
          'mohsin.magnificgallery.manage_galleries' => [
              'label' => 'mohsin.magnificgallery::lang.permissions.manage_galleries',
              'tab'   => 'cms::lang.permissions.name'
          ],
      ];
  }
}
?>
