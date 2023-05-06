<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class MonthFilter extends Component
{
    public int $month;

    public int $year;

    public function mount()
    {
        $currentDate = Carbon::now();
        $this->month = $currentDate->month;
        $this->year = $currentDate->year;
    }

    public function updated()
    {
        $this->emit('filterList', [
            'month' => $this->month,
            'year' => $this->year
        ]);
    }
    public function render()
    {
        return view('livewire.month-filter');
    }
}
