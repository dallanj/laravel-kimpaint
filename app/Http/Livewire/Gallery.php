<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ImageUpload;

class Gallery extends Component
{
    use WithFileUploads;
    public $fileTitle, $fileName;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submit()
    {
        $dataValid = $this->validate([
            'fileTitle' => 'required',
            'fileName' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
  
        $dataValid['fileName'] = $this->fileName->store('galleries', 'public');
  
        ImageUpload::create($dataValid);
  
        session()->flash('message', 'File uploaded.');
    }

    public function render()
    {
        return view('livewire.gallery');
    }
}
