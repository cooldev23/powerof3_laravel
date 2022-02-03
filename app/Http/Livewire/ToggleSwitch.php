<?php

namespace App\Http\Livewire;

use App\Models\ListingMedia;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleSwitch extends Component
{
    public $model;
    public $field;
    public $word;
    public $listing;
    public $isEnabled;

    public function mount()
    {
        $this->isEnabled = (bool) $this->model->getAttribute($this->field);
    }
    public function render()
    {
        return view('livewire.toggle-switch');
    }
    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }
}
