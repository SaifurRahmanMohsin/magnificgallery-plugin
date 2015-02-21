<?php
namespace Mohsin\MagnificGallery\Components;

use Lang;
use Cms\Classes\ComponentBase;
use System\Classes\CombineAssets;
use Mohsin\MagnificGallery\Models\Gallery;

class Magnific extends ComponentBase
{
  public function componentDetails()
  {
    return [
    'name' => 'mohsin.magnificgallery::lang.magnific.name',
    'description' => 'mohsin.magnificgallery::lang.magnific.description'
    ];
  }

  public function defineProperties()
  {
    return [
    'idGallery' => [
      'title'        => 'mohsin.magnificgallery::lang.magnific.name',
      'description'  => 'mohsin.magnificgallery::lang.magnific.choice',
      'type'         => 'dropdown'
      ],
    'height' => [
      'title'             => 'Height',
      'description'       => 'Height of each image.',
      'type'              => 'string',
      'validationPattern' => '^[0-9]+$|^auto$',
      'validationMessage' => 'Invalid value',
      'default'           => '100',
      'group'             => Lang::get('Dimensions'),
    ],
    'width' => [
      'title'             => 'Width',
      'description'       => 'Width of each image.',
      'type'              => 'string',
      'validationPattern' => '^[0-9]+$|^auto$',
      'validationMessage' => 'Invalid value',
      'default'           => 'auto',
      'group'             => Lang::get('Dimensions'),
      ],
    ];
  }

  public function getidGalleryOptions()
  {
    return Gallery::select('id', 'name')->orderBy('name')->get()->lists('name', 'id');
  }

  public function onRun()
  {
    $css = [
      'assets/css/magnific-popup.css'
    ];
    $js  = [
      'assets/js/jquery.magnific-popup.min.js',
      'assets/js/magnific.js'
    ];
    $this -> addCss(CombineAssets::combine($css, plugins_path() . '/mohsin/magnificgallery'));
    $this -> addJs(CombineAssets::combine($js, plugins_path() . '/mohsin/magnificgallery'));
  }

  public function onRender(){
    $gallery = new Gallery;
    $this -> gallery = $this -> page['gallery'] = $gallery->where('id', '=', $this -> property('idGallery')) -> first();
    $this -> page['height'] = $this -> property('height');
    $this -> page['width']  = $this -> property('width');
  }
}
?>
