<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\ComponentConcerns\PerformsRedirects;

class Entries extends Component
{
    use PerformsRedirects;

    public string $description = "";
    public string $amount = "";
    public string $type = "";
    public string $activity = "";

    public float $totalIncome = 0;

    public $month;

    public $year;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'type' => 'required',
        'activity' => 'required',
    ];

    protected $listeners = [
        'filterList'
    ];

    public function render()
    {
        return view('livewire.entries');
    }

    public function submit() {

        $this->validate();

        Entry::create([
            'description' => $this->description,
            'amount' => intval(str_replace(".", "", str_replace(",", "", $this->amount))),
            'type' => $this->type,
            'activity_at' => $this->activity
        ]);

        $this->description = "";
        $this->amount = "";
        $this->type = "";
        $this->activity = Carbon::now()->format('d/m/Y');

        $this->emit('entryAdded', [
            'month' => $this->month,
            'year' => $this->year
        ]);
    }

    public function filterList(array $payload)
    {
        $this->month = $payload['month'];
        $this->year = $payload['year'];
    }
}
