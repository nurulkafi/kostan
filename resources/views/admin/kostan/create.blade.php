@extends('admin.layouts.master')
@section('kostan','active')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Tambah Kostan</h1>
  </div>
   <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <form action="{{ url('admin/kostan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Kostan</label>
                            <input type="text" required name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Kostan / Gender</label>
                            <select name="gender" required class="custom-select">
                                <option selected>-- Pilih Gender --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Campur">Campur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" required class="form-control round" name="deskripsi"  id="editor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="provinsi_id" required id="provinsi" class="custom-select">
                                <option selected>-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten / Kota</label>
                            <select name="kabupaten_id" required id="kabupaten" class="custom-select">
                                <option selected>-- Pilih Kabupaten --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea class="form-control" required id="exampleFormControlTextarea1" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Foto 1</label>
                            <br>
                            <img id="output" class="img-thumbnail mb-2" width="150px" height="150px"  />
                            <br>
                            <input type="file" name="image[]" required class="form-control" accept="image/*" onchange="loadFile(event)">
                        </div>
                        <div class="form-group">
                            <label for="">Foto 2</label>
                            <br>
                            <img id="output2" class="img-thumbnail mb-2" width="150px" height="150px"  />
                            <br>
                            <input type="file" name="image[]" class="form-control" accept="image/*" onchange="loadFile2(event)">
                        </div>
                        <div class="form-group">
                            <label for="">Foto 3</label>
                            <br>
                            <img id="output3" class="img-thumbnail mb-2" width="150px" height="150px"  />
                            <br>
                            <input type="file" name="image[]" class="form-control" accept="image/*" onchange="loadFile3(event)">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button class="btn  btn-lg btn-primary col-md-4 mb-4" type="submit">Simpan</button>
                </div>
            </div>
            </form>
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
                    url: '../../province/search/'+id,
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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile3 = function(event) {
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection
