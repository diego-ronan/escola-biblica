<div>
    <a href="{{ route('student.create')}}" 
       class="w3-btn w3-teal w3-section"
       wire:navigate
    >Novo Aluno&nbsp;
    &plus;
    </a>
    <a href="{{ route('attendance.create')}}" 
       class="w3-btn w3-indigo w3-section"
       wire:navigate
    >Fazer chamada&nbsp;
        <i class="fa fa-edit"></i>
    </a>
    <table class="w3-table w3-striped w3-large w3-table-all">
        <thead class="">
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
            @foreach ($students as $student)
                <tr class="">
                    <th scope="row">
                        {{ $student->id }}
                    </th>
                    <td>
                        {{ $student->name}}
                    </td>
                    <td>
                        <a href="{{ route('student.update', $student->id) }}" 
                           class="w3-margin-right w3-text-indigo"
                           wire:navigate
                           style="text-decoration: none"
                        >
                        Editar
                        </a>
                        <a href="" 
                           class="w3-text-red"
                           wire:click.prevent="delete({{ $student->id }})"
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
                        
                    