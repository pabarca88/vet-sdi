<form action="{{ route('importar.diagnosticos.psicologia') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Importar Diagnósticos</button>
</form>

