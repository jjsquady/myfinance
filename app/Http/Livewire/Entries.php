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
    public bool $isInstallments = false;
    public int $installments = 2;

    public $month;

    public $year;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'type' => 'sometimes',
        'activity' => 'required',
        'installments' => 'sometimes'
    ];

    protected $listeners = [
        'filterList'
    ];

    public function mount()
    {
        if (is_null($this->month) || is_null($this->year)) {
            $this->month = Carbon::now()->month;
            $this->year = Carbon::now()->year;
        }
    }

    public function render()
    {
        return view('livewire.entries');
    }

    public function submit() {

        $this->validate();

        if ($this->isInstallments) {
            $currentActivity = Carbon::parse($this->activity);

            for ($i = 0; $i < $this->installments; $i++) {
                $installment = $i + 1;
                $description = "{$this->description} (Parcela {$installment}/{$this->installments})";
                $type = "outbound";
                $activity = $currentActivity->format('Y-m-d');
                $this->addEntry($description, $this->amount, $type, $activity);
                $currentActivity->addMonths();
            }

            $this->resetFields();

            $this->emit('entryAdded', [
                'month' => $this->month,
                'year' => $this->year
            ]);

            return;
        }

        $this->addEntry($this->description, $this->amount, $this->type, $this->activity);

        $this->resetFields();

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

    protected function addEntry(string $description, string $amount, string $type, string $activity)
    {
        Entry::create([
            'description' => $description,
            'amount' => intval(str_replace(".", "", str_replace(",", "", $amount))),
            'type' => $type,
            'activity_at' => $activity
        ]);
    }

    protected function resetFields()
    {
        $this->description = "";
        $this->amount = "";
        $this->type = "";
        $this->activity = Carbon::now()->format('d/m/Y');
        $this->isInstallments = false;
        $this->installments = 2;
    }
}
