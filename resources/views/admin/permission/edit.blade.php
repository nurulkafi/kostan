@extends('admin.layouts.master')
@section('type_kamar','active')
@section('content')
 {{-- Modal Tambah Foto --}}

<section class="section">
  <div class="section-header">
    <h1>Edit Tipe Kostan</h1>
  </div>
   <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <form action="{{ url('admin/type_kamar/'.$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kostan</label>
                            <select name="kostan_id" required id="kostan" class="custom-select">
                                <option value="{{ $data->kost($data->kostan_id)->id }}" selected>{{ $data->kost($data->kostan_id)->nama }}</option>
                                @foreach ($kostan as $item)
                                @if ($data->kost($data->kostan_id)->id  != $item->id)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Tipe Kamar</label>
                            <input type="text" required name="nama" value="{{ $data->nama }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="peraturan">Peraturan Kamar</label>
                            <textarea type="text" required class="form-control round" name="peraturan"  id="editor">
                                {!! $data->peraturan !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            @php
                                $uk1 = substr($data->ukuran_kamar, 0, strpos($data->ukuran_kamar, 'x'));
                                $uk2 = substr($data->ukuran_kamar, 2, strpos($data->ukuran_kamar, 'x'));
                            @endphp
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Ukuran Kamar</label>
                                    <input type="text" value="{{ $uk1 }}" required name="ukuran[]" id="" class="form-control">
                                </div>
                                <div class="col-md-1 mt-3">
                                    <div class="mt-lg-4">
                                        X
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">&nbsp;</label>
                                    <input type="text" value="{{ $uk2 }}" required name="ukuran[]" id="" class="form-control">
                                </div>
                                <div class="col-md-2 mt-3">
                                    <div class="mt-lg-4">
                                        Meter
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="rupiah">
                        </div>
                        <div class="form-group">
                            <label for="harga">Jumlah Kamar</label>
                            <input type="text" value="{{ $data->jumlah_kamar }}" name="jumlah_kamar" class="form-control">
                        </div>
                    </div>
                    </form>
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <button type="button" class="btn btn-sm btn-primary float-right m-2" data-toggle="modal" data-target="#exampleModalCenter" data-toggle="tooltip">Tambah</button>
                            <h6 class="m-2">Fasilitas Sebelumnya</h6>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fasilitas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($data->fasilitas as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->fasilitas->nama }}</td>
                                        <td>
                                            <form method="POST"  action="{{ url('admin/detail_fasilitas/'.$item->id.'/'.$data->id) }}" id="hapus_foto">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-icon btn-sm icon-left btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                        </table>
                        <table class="table table-striped">
                            <h6>Fasilitas Tambahan</h6>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fasilitas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody class="mainbody">
                             </tbody>
                        </table>

                    </div>
                </div>
                 <div class="form-group ">
                    <button class="btn  btn-lg btn-primary mb-4 col-md-12 float-right" type="submit">Simpan</button>
                 </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <div class="section-body">
  </div>
</section>
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Fasilitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <table id="table1" class="table table-striped" >

            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($fasilitas as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td><img width="200" height="200" src="{{ asset($item->foto) }}" class="img-thumbnail" alt=""></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block pilih_fasilitas" id="pilih">Pilih</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
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
        $(document).ready(function(){
            console.log( "ready2!" );
        });
        $("#table1 .pilih_fasilitas").on("click", function() {
            var count = $('.mainbody > tr').length+1;
           console.log( "ready2!" );
            var currentRow = $(this).closest("tr");
            var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
            var col2 = currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
            var col3 = currentRow.find("td:eq(2)").html(); // get current row 2nd table cell TD value
            html = "<tr class='baris'>";
            html += "<input type='hidden' name='fasilitas_id[]' value='"+ col2 +"'>";
            html += "<td class='numbers'>"+ count +"</td>";
            html += "<td>"+ col3 +"</td>";
            html += "<td><button type='button' class='btn btn-icon btn-sm icon-left btn-danger remove-row'><i class='fas fa-trash'></i>Hapus</button></td>"
            html += "</tr>";
            $(".mainbody").append(html);
        });

        $(document).on('click','.remove-row',function(){
                $(this).closest(".baris").remove();
                $('.mainbody > tr').each(function(i){
                    $('.numbers',this).html(i+1);
                });
        });

</script>
<script>
    CKEDITOR.replace('peraturan', {
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
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
    });
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
    $(document).ready(function () {
        $("#rupiah").val(formatRupiah("{{ $data->harga }}","Rp ."));
    })
</script>

@endsection
