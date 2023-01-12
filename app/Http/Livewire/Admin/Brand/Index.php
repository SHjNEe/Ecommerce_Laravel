<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;



class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }


    public function render()
    {
        $brands = Brand::orderBy('id', 'asc')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])
            ->extends('layouts.admin');
    }

    public function createBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        $this->closeModal();
        session()->flash('status', 'Brand saved successfully');
    }


    public function updateBrand()
    {
        $validatedData = $this->validate();
        $brand = Brand::findOrFail($this->brand_id);
        $brand->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        session()->flash('status', 'Brand updated successfully');
        $this->closeModal();
    }

    public function editBrand(int $brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->brand_id = $brand->id;
    }


    public function deleteBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
    }



    public function destroyBrand()
    {
        $brand = Brand::findOrFail($this->brand_id)->delete();
        session()->flash('status', 'Brand deleted successfully');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }
}
