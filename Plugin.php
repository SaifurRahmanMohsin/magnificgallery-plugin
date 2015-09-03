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

  public function registerNavigation()
  {
    return [
      'gallery' => [
        'label'       => 'mohsin.magnificgallery::lang.magnific.name',
        'url'   			=> Backend::url('mohsin/magnificgallery/galleries'),
        'permissions' => ['cms.manage_content'],
        'icon'        => 'icon-film',
        'sideMenu'    => [
            'galleries' => [
                'label'       => 'mohsin.magnificgallery::lang.magnific.name',
                'url'   			=> Backend::url('mohsin/magnificgallery/galleries'),
                'description' => 'mohsin.magnificgallery::lang.plugin.description',
                'icon'        => 'icon-film',
                'permissions' => ['cms.manage_content'],
                'order'       => 100
            ],
            'settings' => [
                'label'       => 'cms::lang.editor.settings',
                'url'   			=> Backend::url('mohsin/magnificgallery/galleries'),
                'description' => 'mohsin.magnificgallery::lang.plugin.description',
                'icon'        => 'icon-cog',
                'permissions' => ['cms.manage_content'],
                'order'       => 200
            ]
        ]
      ],
    ];
  }
}
?>
