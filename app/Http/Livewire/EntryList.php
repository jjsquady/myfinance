<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class EntryList extends Component
{
    public Collection $entries;

    protected $listeners = [
        'filterList',
        'entryAdded' => 'filterList'
    ];

    public function mount(): void
    {
        $this->filterList([
            'month' => Carbon::now()->month,
            'year' => Carbon::now()->year
        ]);
    }

    public function filterList(array $payload): void
    {
        $this->entries = Entry::whereMonth('activity_at', $payload['month'])
            ->whereYear('activity_at',$payload['year'])
            ->get();
    }

    public function render(): View
    {
        return view('livewire.entry-list');
    }
}
