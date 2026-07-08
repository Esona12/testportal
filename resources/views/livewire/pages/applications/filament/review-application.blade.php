<x-filament::section
    heading="Review Application"
    description="Process the validation assessment for this applicant record."
    icon="heroicon-o-clipboard-document-check"
>

    <form wire:submit="saveReview">

        {{ $this->form }}

        <div class="mt-6 flex justify-end">
            <x-filament::button
                type="submit"
                color="warning"
                icon="heroicon-m-check"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove wire:target="saveReview">
                    Save Changes
                </span>

                <span wire:loading wire:target="saveReview">
                    Saving...
                </span>
            </x-filament::button>
        </div>

    </form>

</x-filament::section>