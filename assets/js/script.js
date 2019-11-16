// DataTable
  $(document).ready(function(){
    $('#table').DataTable();
  });


// Chained Dropbox
  $(document).ready(function(){
    $('#fakultas').change(function(){
        var kode_fakultas=$(this).val();
        $.ajax({
            url : "http://localhost/nilai_app_ci/mahasiswa/listProdi",
            method : "POST",
            data : {kode_fakultas: kode_fakultas},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '<option>--Pilih--</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].kode_prodi+'">'+data[i].nama_prodi+'</option>';
                }
                $('#prodi').html(html);
                 
            }
        });
    });
});