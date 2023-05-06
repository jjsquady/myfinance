<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Carbon\Carbon;
use Livewire\Component;

class SummaryInfo extends Component
{
    public string $totalIncome;

    public string $totalOutcome;

    public float $inoutPercent;

    protected $listeners = [
        'filterList' => 'updateInfo',
        'entryAdded' => 'updateInfo'
    ];

    public function mount()
    {
        $this->updateInfo([
            'month' => Carbon::now()->month,
            'year' => Carbon::now()->year
        ]);
    }

    public function updateInfo(array $payload)
    {
        $income = Entry::where('type', 'inbound')
            ->whereMonth('activity_at', $payload['month'])
            ->whereYear('activity_at', $payload['year'])
            ->sum('amount');

        $outcome = Entry::where('type', 'outbound')
            ->whereMonth('activity_at', $payload['month'])
            ->whereYear('activity_at', $payload['year'])
            ->sum('amount');

        $this->updateValues($income, $outcome);
    }

    public function render()
    {
        return view('livewire.summary-info');
    }

    protected function updateValues($income, $outcome)
    {
        $this->totalIncome = number_format($income/100,2,',','.');
        $this->totalOutcome = number_format($outcome/100,2,',','.');
        if ($income > 0) {
            $this->inoutPercent = number_format(($outcome/$income) * 100, 2);
            return;
        }
        if ($outcome > 0 and $income == 0) {
            $this->inoutPercent = 100;
            return;
        }
        $this->inoutPercent = 0;
    }
}
