<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testimonials extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modalConfirmDeleteVisible = false;
    public $testimonial;
    public $author;
    public $modelId;

    /**
     * Check if the required inputs contains data
     *
     * @return void
     */
    public function rules()
    {
        return [
            'testimonial' => 'required',
            'author' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.testimonials');
    }
}
