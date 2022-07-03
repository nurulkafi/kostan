@extends('admin.layouts.master')
@section('role','active')
@section('content')
 {{-- Modal Tambah Foto --}}

<section class="section">
  <div class="section-header">
    <h1>Tambah Role</h1>
  </div>
   <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <form action="{{ url('admin/role/'.$role->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Role</label>
                            <input type="text" value="{{ $role->name }}" required name="name" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                           <label for="peraturan">Permission</label>
                           <div class="row">
                             @foreach ($permission as $item)
                             <div class="col-md-3">
                                <div class="form-check">
                                   @if (in_array($item->id,$rolePermission))
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault{{ $item->id }}" checked>
                                    <label class="form-check-label" for="flexCheckDefault{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                    @else
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault{{ $item->id }}">
                                        <label class="form-check-label" for="flexCheckDefault{{ $item->id }}">
                                            {{ $item->name }}
                                        </label>
                                    @endif
                                </div>
                             </div>
                            @endforeach
                        </div>
                           </div>
                    </div>
                </div>
                 <div class="form-group ">
                    <button class="btn  btn-lg btn-primary mb-4 col-md-6" type="submit">Simpan</button>
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

        // $(document).on("click", ".removerow", function(e) {
        //     $(this).closest("tr").remove();
        //     renumberRows();
        // });
        $(document).on('click','.remove-row',function(){
                $(this).closest(".baris").remove();
                $('.mainbody > tr').each(function(i){
                    $('.numbers',this).html(i+1);
                });
        });
        function renumberRows() {
            $(".mainbody > tr").each(function(i, v) {
                $(this).find(".rownumber").text(i + 1);
            });
        }

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
</script>

@endsection
