
<form class="w3-container" wire:submit="save">
    
    <input 
        id="date" 
        class="w3-margin-bottom" 
        type="date"
        wire:model.live="date" 
    />    
    <table class="w3-table w3-large w3-table-all w3-margin-bottom">
        <thead>
            <tr>
                <th scope="col">
                    Nome
                </th>
                <th scope="col">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
                <input 
                    type="hidden" 
                    wire:model.fill="student_name.{{$key}}" 
                    value="{{ $student->name }}" 
                />
                <input 
                    type="hidden" 
                    wire:model.fill="classroom_id.{{$key}}" 
                    value="{{ $student->classroom_id }}" 
                />
                <tr>
                    <td>
                        {{ $student->name }}
                    </td>
                    <td>
                        Ausente
                        <input  
                            class="w3-radio" 
                            type="radio"
                            wire:model.live="attendance_status.{{$key}}"
                            value="Ausente"
                            id="ausente{{$key}}"
                            style="margin-right: 32px;"    
                        />
                    </td>
                    <td>
                        Presente
                        <input 
                            class="w3-radio" 
                            type="radio" 
                            wire:model.live="attendance_status.{{$key}}"
                            value="Presente"
                            id="presente{{$key}}"
                        />            
                    </td>
                </tr>  
            @endforeach
        </tbody>
    </table>      
        <button class="w3-btn w3-blue">Registrar</button>
    </form>
</div>