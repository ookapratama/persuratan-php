@extends('layout.v_template')
@section('title', 'Home')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach ($kelolauser as $data)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="/user/edit/{{ $data->id }}" class="btn btn-sm btn-warning fa fa-pencil"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-trash" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                    </td>                   
                </tr>              
            @endforeach
        </tbody>
    </table>
@endsection
