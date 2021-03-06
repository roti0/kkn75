<div class="card">
    <div class="card-header">Buat Surat {{ $mail->name }}</div>

    <div class="card-body">
        <form id="form-mail" method="post" >
            <div class="form-group">
                <p>Nama : {{ $userdata->name }}</p>
            </div>
            <div class="form-group">
                <p>NIK : {{ $userdata->nik }}</p>
            </div>
            <input type="hidden" name="userdata" value="{{ $userdata->id }}">
            
            <input type="hidden" name="mail" value="{{ $mail->id }}">
            <div class="form-group">
                <input type="text" name="usaha" placeholder="Tulis Nama Usaha" class="form-control" required>
            </div>
            <div class="form-group d-flex justify-content-around">
                <button type="submit" class="btn btn-submit btn-primary">
                    Buat Surat
                </button>
            </div>
           
        </form>
    </div>
</div>

<script>
    $('#form-mail').submit(function (e) {
        e.preventDefault();
        var form = new FormData($(this)[0]);
        var route = '/mail/post'
        var div = $('#content');
        var spinner = $('#spinner');
        swal({
                title: "Apakah anda yakin dengan data anda ?",
                buttons: ["Tidak", "Ya"],
                confirmButtonColor: "#00D084",
                closeModal: true,
                dangerMode: true,
                cache: false
            })
            .then((value) => {
                if (value) {
                    $.ajax({
                        type: "POST",
                        url: route,
                        data: form,
                        processData: false,
                        contentType: false,
                        cache:false,
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function(data) { // Are not working with dataType:'jsonp'
                            spinner.show();
                            div.hide();
                        },
                        error: function(xhr, status, error) {
                            spinner.hide();
                            div.show();
                            var obj = JSON.parse(xhr.responseText);
                            console.log(obj);
                            for (k in obj.errors) {
                                var a = JSON.stringify(obj.errors[k][0]);
                                swal("Sorry !", a, "error");
                            }
                        },
                        success: function(data) {
                            div.html(data);
                            div.show();
                            spinner.hide();
                            swal("Good job!", "Data Anda Telah Ditambahkan!", "success");
                        }
                    });
                }
            });
    })
</script>