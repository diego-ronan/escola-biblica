<div>
    <a href="{{ route('classroom.create')}}" 
       class="w3-btn w3-teal w3-section"
       wire:navigate
    >Nova Classe &plus;
    </a>
    <table class="w3-table w3-large w3-table-all">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Nome
                </th>
                <th scope="col">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classrooms as $classroom)
                <tr>
                    <th scope="row">
                        {{ $classroom->id }}
                    </th>
                    <td>
                        {{ $classroom->name}}
                    </td>
                    <td>
                        <a href="{{ route('classroom.update', $classroom->id) }}" 
                           class="w3-margin-right w3-text-indigo"
                           wire:navigate
                           style="text-decoration: none"
                        >
                        Editar
                        </a>
                        <a href="" 
                           class="w3-text-red"
                           wire:click.prevent="delete({{ $classroom->id }})"
                           wire:confirm="Deseja realmente excluir o registro?"
                           style="text-decoration: none"
                        >Excluir
                        </a>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>  
</div>
                        
                    