<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class IndexFacilities extends Component
{
    public function render()
    {
        return view('livewire.index-facilities');

    }
    public ?int $quantity = 10;
 
    public ?string $search = null;
 
    public function with(): array
    {
        return [
            'headers' => [
                ['index' => 'id', 'label' => '#'],
                ['index' => 'name', 'label' => 'Member'],
            ],
            'rows' => User::query()
                ->when($this->search, function (Builder $query) {
                    return $query->where('name', 'like', "%{$this->search}%");
                })
                ->paginate($this->quantity)
                ->withQueryString()
        ];
    }
}; ?>
 
<div>
    <x-table :$headers :$rows filter loading />
</div>