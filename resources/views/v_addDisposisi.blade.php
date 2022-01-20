<div class="modal fade" id="FormAddDisposisi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><strong>Tambah Data</strong></h4>
            </div>

            <form action="{{ route('insert_disposisi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="content">
                        <div class="row">
                            <div class="row g-3">
                                
                                <div class="col-md-4">
                                    <label class="form-label" style="font-size: 11px">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" value="{{ old('perihal') }}" style="margin-bottom: 10px" autofocus required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Asal Surat</label>
                                    <input type="text" name="asal_surat" class="form-control" value="{{ old('asal_surat') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-2">
                                    <label class="form-label" style="font-size: 11px">Kode Surat</label>
                                    <input type="text" name="kode_surat" class="form-control" value="{{ old('kode_surat') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Tanggal Surat</label>
                                    <input type="date" name="tgl_surat" class="form-control" value="{{ old('tgl_surat') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Tanggal Terima Surat</label>
                                    <input type="date" name="tgl_terima" class="form-control" value="{{ old('tgl_terima') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Tanggal Penyelesaian</label>
                                    <input type="date" name="tgl_selesai" class="form-control" value="{{ old('tgl_selesai') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-3">
                                    <label class="form-label" style="font-size: 11px">Tanggal Disposisi</label>
                                    <input type="date" name="tgl_disposisi" class="form-control" value="{{ old('tgl_disposisi') }}" style="margin-bottom: 10px" required>
                                </div>
                
                                <div class="col-md-6">
                                    <label class="form-label" style="font-size: 11px">Isi Ringkas</label>
                                    <textarea name="isi_ringkas" class="form-control" rows="2"  style="margin-bottom: 10px; resize:none;" required>{{ old('isi_ringkas') }}</textarea>
                                </div>
                
                                <div class="col-md-6">
                                    <label class="form-label" style="font-size: 11px">Catatan Disposisi</label>
                                    <textarea name="isi_disposisi" class="form-control" rows="2" style="margin-bottom: 10px; resize:none;" required>{{ old('isi_disposisi') }}</textarea>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="" class="form-label" style="font-size: 11px">Yang Menyetujui</label>
                                    <select name="user_approve" class="form-control" style="margin-bottom: 20px">
                                        <option value="">Pilih...</option>
                                        {{-- @foreach ($user_approve as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>                    
                
                                <div class="col-md-6">
                                    <label class="form-label" style="font-size: 11px">Upload File Surat</label>
                                    <input type="file" name="file_surat" class="form-control" value="{{ old('file_surat') }}" style="margin-bottom: 10px" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm pull-left">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    