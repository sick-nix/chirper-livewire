<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    #[Rule('required|string|max:255')]
    public string $message = '';

    public function store(): void {
        $validated = $this->validate();
        auth()->user()?->chirps()->create($validated);
        $this->message = '';
        $this->dispatch('chirp-created');
    }
}; ?>

<form wire:submit="store">
    <textarea
        wire:model="message"
        placeholder="{{ __('What\'s on your mind?') }}"
        class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
    ></textarea>

    <x-input-error :messages="$errors->get('message')" class="mt-2" />
    <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
</form>
