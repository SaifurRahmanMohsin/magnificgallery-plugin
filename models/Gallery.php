<?php

namespace Mohsin\MagnificGallery\Models;

use Model;

/**
* Gallery Model
*/
class Gallery extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
    * @var string The database table used by the model.
    */
    protected $table = 'mohsin_magnificgallery_galleries';

    public $rules = [
        'name' => 'required|between:3,64',
    ];

    public $attachMany = [
        'images' => [
            'System\Models\File',
            'order' => 'sort_order'
        ],
    ];
}
