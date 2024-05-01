<div class="py-12">
    <form wire:submit="update" class="sm:px-6 lg:px-8">
        <div class="max-w-screen-md mb-5">
            <x-input-label for="name" :value="__('Nome do aluno')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
        </div>
        <div class="max-w-screen-md mb-5">
            <x-primary-button class="bg-green-600">Salvar</x-primary-button>
        </div>
    </form>
</div>