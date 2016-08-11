<?php
namespace Mohsin\MagnificGallery\Components;

use Lang;
use Cms\Classes\ComponentBase;
use System\Classes\CombineAssets;
use Mohsin\MagnificGallery\Models\Gallery;

class Magnific extends ComponentBase
{

  /**
   * The model that contains the images
   * @var Model
   */
  public $gallery;

  /**
   * Parameter to use for the image height
   * @var string
   */
  public $height;

  /**
   * Parameter to use for the image width
   * @var string
   */
  public $width;

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
    $gallery = new Gallery;
    $this -> gallery = $gallery -> where('id', '=', $this -> property('idGallery')) -> first();
    $this -> height = $this -> property('height');
    $this -> width  = $this -> property('width');

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

}
?>
