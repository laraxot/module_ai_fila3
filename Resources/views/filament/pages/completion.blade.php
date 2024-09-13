<x-filament-panels::page>
    <x-filament-panels::form wire:submit="completion">
        {{ $this->completionForm }}

<<<<<<< HEAD
        <x-filament-panels::form.actions 
=======
        <x-filament-panels::form.actions
>>>>>>> 4b612bf07fd8062b38e5db468a4fd29117086a11
            :actions="$this->getCompletionFormActions()"
        />

    </x-filament-panels::form>
</x-filament-panels::page>
