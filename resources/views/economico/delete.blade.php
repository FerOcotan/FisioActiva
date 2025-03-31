<td class="border px-4 py-2">
    <a href="{{ route('economico.edit', $dato->id) }}" class="text-blue-600">Editar</a>
    
    <form action="{{ route('economico.destroy', $dato->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este registro?');" class="text-red-600 ml-2">
            Eliminar
        </button>
    </form>
</td>
