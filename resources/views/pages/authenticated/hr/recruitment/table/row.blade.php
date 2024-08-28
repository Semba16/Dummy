@forelse ($applications as $application)
    <tr @class([])>
        <td>
            <div @class(['fw-bold'])>
                {{ $application->name }}
            </div>
            <div>
                {{ $application->client_id }}
            </div>
        </td>
        <td @class(['text-end text-nowrap'])>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Hapus</button>
        </td>
    </tr>
@empty
    <tr @class(['fw-bold'])>
        <td colspan="3" @class(['text-center'])>Tidak ada data</td>
    </tr>
@endforelse
