<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;
    public $code;
    public $name;
    public $quantity;
    public $price;
    public $description;
    public $image;
    public $currentImage;

    protected function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:products,code,' . $this->product->id,
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // 1MB max
        ];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->currentImage = $product->image;
    }

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
            // Delete old image if it exists
            if ($this->currentImage && Storage::disk('public')->exists($this->currentImage)) {
                Storage::disk('public')->delete($this->currentImage);
            }
            
            $imagePath = $this->image->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $this->product->update($data);

        session()->flash('success', 'Product updated successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
} 