<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $image;

    protected $rules = [
        'code' => 'required|string|max:255|unique:products,code',
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:1024', // 1MB max
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
        ];

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
            $data['image'] = $imagePath;
        }

        Product::create($data);

        session()->flash('success', 'Product created successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.products.create');
    }
} 