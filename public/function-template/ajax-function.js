function AjaxEdit(url, id, data, callback){
    $.ajax({
        type: 'POST',
        url: url + id,
        data: data,
        success: function(result) {
            Swal.fire({
                text: 'Success Simpan Data',
                icon: 'success',
                timer: 1500
            }).then(() => {
                window.location.href = callback;
            });
        },
        error: function() {
            Swal.fire({
                text: 'Error Submit Data',
                icon: 'error',
                timer: 1500
            });
        }
    });
}
function AjaxDelete(url, id, data){
    $.ajax({
        type: 'POST',
        url: url + id,
        data: data,
        success: function(result) {
            Swal.fire({
                text: 'Success Hapus Data',
                icon: 'success',
                timer: 1500
            }).then(() => {
                table.ajax.reload();
            });
        },
        error: function() {
            Swal.fire({
                text: 'Error Hapus Data',
                icon: 'error',
                timer: 1500
            });
        }
    });
}
function AjaxCreate(url, data, callback){
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(result) {
            Swal.fire({
                text: 'Success Simpan Data',
                icon: 'success',
                timer: 1500
            }).then(() => {
                window.location.href = callback;
            });
        },
        error: function() {
            Swal.fire({
                text: 'Error Submit Data',
                icon: 'error',
                timer: 1500
            });
        }
    });
}