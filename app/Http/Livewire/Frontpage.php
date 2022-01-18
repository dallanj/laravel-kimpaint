<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class Frontpage extends Component
{
    public $urlslug;
    public $title;
    public $content;
    
    /**
     * Livewire mount function
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function mount($urlslug = null)
    {
        $this->retrieveContent($urlslug);
    }
    
    /**
     * Fetch record data from database with slug variable
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function retrieveContent($urlslug)
    {
        // Get home page if slug is empty
        if(empty($urlslug)) {
            $data = Page::where('is_default_home', true)->first();
        } else {
            $data = Page::where('slug', $urlslug)->first();
        }

        // if the url slug does not exist, show 404 error
        if(!$data) {
            $data = Page::where('is_default_not_found', true)->first();
        }

        // $data = Page::where('slug',$urlslug)->first();
        $this->title = $data->title;
        $this->content = $data->content;
    }
    
    /**
     * Livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.frontpage')->layout('layouts.frontpage');
    }
}
