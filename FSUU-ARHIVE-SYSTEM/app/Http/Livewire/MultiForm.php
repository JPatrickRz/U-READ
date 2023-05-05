<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Publisher;

class MultiForm extends Component
{
    use WithFileUploads;

    public $source_title;
    public $tags;
    public $abstract;
    public $publisher;
    public $year;
    public $department;
    public $pdf_file;
    public $pdf_file_name;

    public $currentStep = 1;
    public $totalSteps = 5;


    public function render()
    {
        return view('livewire.multi-form');
    }

}
