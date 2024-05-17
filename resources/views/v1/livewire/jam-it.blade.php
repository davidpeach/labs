<p x-data="{ success: $wire.entangle('jammed') }">
    <button wire:click="jam">Jam It!</button>
    <span x-cloak :class="success ? 'bg-green-400': 'hidden'"> -- Jammed!</span>
</p>
