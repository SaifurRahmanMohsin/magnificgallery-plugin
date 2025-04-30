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

    /**
     * Current page for pagination
     * @var int
     */
    public $currentPage;

    /**
     * Total pages in the gallery
     * @var int
     */
    public $totalPages;

    /**
     * Collection of images for the current page
     * @var Collection
     */
    public $paginatedImages;

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
                'title'       => 'mohsin.magnificgallery::lang.magnific.name',
                'description' => 'mohsin.magnificgallery::lang.magnific.choice',
                'type'        => 'dropdown'
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
            'perPage' => [
                'title'             => 'Images Per Page',
                'description'       => 'Number of images to display per page.',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Please enter a valid number',
                'default'           => '12',
                'group'             => Lang::get('Pagination'),
            ],
            'showPagination' => [
                'title'             => 'Show Pagination',
                'description'       => 'Display pagination controls.',
                'type'              => 'checkbox',
                'default'           => true,
                'group'             => Lang::get('Pagination'),
            ]
        ];
    }

    public function getidGalleryOptions()
    {
        return Gallery::select('id', 'name')->orderBy('name')->get()->lists('name', 'id');
    }

    public function onRun()
    {
        $this->gallery = Gallery::where('id', '=', $this->property('idGallery'))->first();
        $this->height = $this->property('height');
        $this->width = $this->property('width');

        // Load paginated data
        $this->setupPagination();

        $css = [
            'assets/css/magnific-popup.css'
        ];
        $js = [
            'assets/js/jquery.magnific-popup.min.js',
            'assets/js/magnific.js'
        ];
        $this->addCss(CombineAssets::combine($css, plugins_path() . '/mohsin/magnificgallery'));
        $this->addJs(CombineAssets::combine($js, plugins_path() . '/mohsin/magnificgallery'), ['defer' => true]);
    }

    /**
     * Set up pagination for the gallery images
     */
    protected function setupPagination()
    {
        if (!$this->gallery || !$this->gallery->images) {
            $this->paginatedImages = collect([]);
            $this->currentPage = 1;
            $this->totalPages = 1;
            return;
        }

        // Get pagination parameters
        $page = (int) $this->param('page', 1);
        $perPage = (int) $this->property('perPage', 12);
        if ($page < 1) $page = 1;

        // Calculate total pages
        $allImages = $this->gallery->images;
        $totalImages = count($allImages);
        $this->totalPages = ceil($totalImages / $perPage);

        // Ensure valid page number
        if ($page > $this->totalPages) {
            $page = $this->totalPages;
        }

        $this->currentPage = $page;

        // Get the images for the current page
        $offset = ($page - 1) * $perPage;
        $this->paginatedImages = $allImages->slice($offset, $perPage);
    }

    /**
     * Event handler for navigating to a specific page
     */
    public function onPageChange()
    {
        // Get the requested page
        $page = post('page', 1);

        // Redirect to the same page with the page parameter
        return redirect()->to($this->currentPageUrl(['page' => $page]));
    }

    /**
     * Returns the pagination links HTML
     */
    public function getPaginationLinks()
    {
        if (!$this->property('showPagination') || $this->totalPages <= 1) {
            return '';
        }

        $links = '';

        // Previous button
        if ($this->currentPage > 1) {
            $links .= '<a href="'.$this->currentPageUrl(['page' => $this->currentPage - 1]).'" class="pagination-link">&laquo; '.Lang::get('system::lang.pagination.previous').'</a>';
        } else {
            $links .= '<span class="pagination-link disabled">&laquo; '.Lang::get('system::lang.pagination.previous').'</span>';
        }

        // Page numbers
        $range = 2; // Number of pages to show before and after current page

        for ($i = 1; $i <= $this->totalPages; $i++) {
            if ($i == 1 || $i == $this->totalPages || ($i >= $this->currentPage - $range && $i <= $this->currentPage + $range)) {
                if ($i == $this->currentPage) {
                    $links .= '<span class="pagination-link active">'.$i.'</span>';
                } else {
                    $links .= '<a href="'.$this->currentPageUrl(['page' => $i]).'" class="pagination-link">'.$i.'</a>';
                }
            } elseif ($i == $this->currentPage - $range - 1 || $i == $this->currentPage + $range + 1) {
                $links .= '<span class="pagination-ellipsis">&hellip;</span>';
            }
        }

        // Next button
        if ($this->currentPage < $this->totalPages) {
            $links .= '<a href="'.$this->currentPageUrl(['page' => $this->currentPage + 1]).'" class="pagination-link">'.Lang::get('system::lang.pagination.next').' &raquo;</a>';
        } else {
            $links .= '<span class="pagination-link disabled">'.Lang::get('system::lang.pagination.next').' &raquo;</span>';
        }

        return '<div class="magnific-pagination">'.$links.'</div>';
    }
}
