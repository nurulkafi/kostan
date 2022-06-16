@extends('admin.layouts.master')
@section('kostan','active')
@section('content')
 {{-- Modal Tambah Foto --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/foto_kostan/'.$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
      <div class="modal-body">
        <div class="form-group">
            <label for="">Foto 1</label>
            <br>
            <img id="output" class="img-thumbnail mb-2" width="150px" height="150px"  />
            <br>
            <input type="file" name="image" required class="form-control" accept="image/*" onchange="loadFile(event)">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<section class="section">
  <div class="section-header">
    <h1>Edit Kostan</h1>
  </div>
   <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <form action="{{ url('admin/kostan/'.$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Kostan</label>
                            <input type="text" value="{{ $data->nama }}" required name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Kostan / Gender</label>
                            <select name="gender" required class="custom-select">
                                @if ($data->gender == "Laki-Laki")
                                <option selected>{{ $data->gender }}</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Campur">Campur</option>
                                @elseif ($data->gender == "Perempuan")
                                <option selected>{{ $data->gender }}</option>
                                <option value="Perempuan">Laki-Laki</option>
                                <option value="Campur">Campur</option>
                                @else
                                <option selected>{{ $data->gender }}</option>
                                <option value="Perempuan">Laki-Laki</option>
                                <option value="Campur">Perempuan</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" required class="form-control round" name="deskripsi"  id="editor">{!! $data->deskripsi !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="provinsi_id" required id="provinsi" class="custom-select">
                                <option selected>{{ $data->alamat->kabupaten->provinsi->title}}</option>
                                @foreach ($provinsi as $item)
                                @if ($item->title !=  $data->alamat->kabupaten->provinsi->title)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten / Kota</label>
                            <select name="kabupaten_id" required id="kabupaten" class="custom-select">
                                <option value="{{ $data->alamat->kabupaten->id }}" selected>{{ $data->alamat->kabupaten->title }}</option>
                                @foreach ($kota as $item2)
                                @if ($item2->code !=  $data->alamat->kabupaten->code)
                                <option value="{{ $item2->provinsi_id }}">{{ $item2->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea class="form-control" required id="exampleFormControlTextarea1" name="alamat">{{ $data->alamat->alamat_lengkap }}</textarea>
                        </div>
                    </div>
                    </form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <button type="button" class="btn btn-icon btn-sm icon-left btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModalCenter" data-toggle="tooltip" title='Tambah Foto'><i class="fas fa-plus"></i>Tambah Foto</button>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data->foto as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><img src="{{ asset($item->path) }}" width="150px" height="150px" alt="" class="img-thumbnail"></td>
                                            <td>
                                                <form method="POST"  action="{{ url('admin/foto_kostan/'.$item->id.'/'.$data->id) }}" id="hapus_foto">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-icon btn-sm icon-left btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn  btn-lg btn-primary col-md-4 mb-4" type="submit">Simpan</button>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <div class="section-body">
  </div>

</section>
<script>
    CKEDITOR.replace('deskripsi', {
    	// Define the toolbar groups as it is a more accessible solution.
    	toolbarGroups: [
    		{ "name": 'document', "groups": [ 'mode', 'document', 'doctools' ] },
            { "name": 'clipboard', "groups": [ 'clipboard', 'undo' ] },
            { "name": 'editing', "groups": [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { "name": 'forms', "groups": [ 'forms' ] },
            { "name": 'basicstyles', "groups": [ 'basicstyles', 'cleanup' ] },
            { "name": 'paragraph', "groups": [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { "name": 'links', "groups": [ 'links' ] },
            { "name": 'insert', "groups": [ 'insert' ] },
            { "name": 'styles', "groups": [ 'styles' ] },
            { "name": 'colors', "groups": [ 'colors' ] },
            { "name": 'tools', "groups": [ 'tools' ] },
            { "name": 'others', "groups": [ 'others' ] },
            { "name": 'about', "groups": [ 'about' ] }
    	],
    	// Remove the redundant buttons from toolbar groups defined above.
    	removeButtons: 'Source,Save,Templates,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,Outdent,Indent,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Image,Flash,Table,HorizontalRule,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,Maximize,ShowBlocks,About,NewPage,ExportPdf,Preview,Print'
    });
</script>
<script>
    $(document).ready(function () {
        $('#provinsi').on('change',function(){
            let id = $(this).val();
                $.ajax({
                    url: '../../../province/search/'+id,
                    type: 'get',
                    dataType: 'json',
                    success:function(data) {
                        $('#kabupaten').empty();
                        $.each(data, function(key, value){
                            $('#kabupaten').append(`<option value="${key}"> ${value} </option>`);
                        });
                },
                });
        });
    });
</script>
@include('admin.layouts.sweatalert')
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: 'Apakah Anda Yakin Akan Menghapus Data?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
                $("#hapus_foto").closest("form").submit()
                console.log($("#hapus_foto").closest("form").submit());
            }
        })
      });

</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
}
</script>
@endsection
