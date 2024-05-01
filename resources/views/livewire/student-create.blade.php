<div class="w3-card-4 w3-padding-24">
    <form class="w3-container" wire:submit="save">
        <label>Classe</label>
        <select class="w3-select w3-margin-bottom" wire:model.fill="classroom_id">
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">
                    {{ $classroom->name}}
                </option>
            @endforeach
        </select>
        <label>Nome do aluno</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" wire:model="name">
        <button class="w3-btn w3-blue">Registrar</button>
    </form>
</div>
 