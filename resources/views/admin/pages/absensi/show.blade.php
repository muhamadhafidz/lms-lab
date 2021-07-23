<form action="{{ route('admin.absensi.izin', $bap) }}" method="POST">
    @csrf
    <div class="form-group">
        <select class="form-control" id="asisten" name="asisten">
            @foreach ($data->jadwal->asisten as $asisten)
                <option value="{{ $asisten->user->id }}">
                    {{ $asisten->user->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Pilih</button>
</form>

