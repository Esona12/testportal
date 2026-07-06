<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\ApplicationReview;

class ApplicationShow extends Component
{
    public Application $application;

    public string $APL_Status = 'Open';
    public string $reviewer_notes = '';

    public function mount($id)
    {
        $this->application = Application::findOrFail($id);

        $review = ApplicationReview::where('application_id', $this->application->APL_ID)
            ->where('user_id', Auth::id())
            ->first();

        if ($review) {
            $this->APL_Status = trim($review->status) ?: 'Open';
            $this->reviewer_notes = $review->notes ?? '';
        } else {
            $this->APL_Status = trim($this->application->APL_Status ?? 'Open');
            $this->reviewer_notes = '';
        }

        // FINAL SAFETY NET (VERY IMPORTANT)
        if (! in_array($this->APL_Status, [
            'Open',
            'Pending Review',
            'Accepted',
            'Declined',
        ])) {
            $this->APL_Status = 'Open';
        }
    }

    protected function rules(): array
    {
        return [
            'APL_Status' => [
                'required',
                'in:Open,Pending Review,Accepted,Declined',
            ],
            'reviewer_notes' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }

    public function saveReview()
    {
        $this->validate();

        ApplicationReview::updateOrCreate(
            [
                'application_id' => $this->application->APL_ID,
                'user_id' => Auth::id(),
            ],
            [
                'status' => $this->APL_Status,
                'notes' => $this->reviewer_notes,
            ]
        );

        $this->application->update([
            'APL_Status' => $this->APL_Status,
        ]);

        session()->flash('success', 'Review saved successfully.');
    }

    public function render()
    {
        $fields = \DB::table('form_data')
            ->where('Field_Name', '<>', '')
            ->get()
            ->keyBy('Field_Name');

        return view('livewire.application-show', [
            'fields' => $fields,
        ]);
    }
}
