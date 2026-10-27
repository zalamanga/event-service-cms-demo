$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function main_content(cont){
    $('#content_list').hide();
    $('#content_input').hide();
    $('#content_detail').hide();
    $('#' + cont).show();
}

function handle_confirm(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Konfirmasi',
        content: 'Anda yakin ingin mengkonfirmasi data ini?',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'Tidak|5000',
        buttons: {
            Ya: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"PATCH",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                $('#tableList').DataTable().ajax.reload( null, false );
                            }else{
                                error_toastr(response.message);
                                $('#tableList').DataTable().ajax.reload( null, false );
                            }
                        },
                    });
                }
            },
            Tidak: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}
function handle_delete(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Delete Confirmation',
        content: 'Are you sure delete this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'Cancel|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"DELETE",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                $('#tableList').DataTable().ajax.reload( null, false );
                            }else{
                                error_toastr(response.message);
                                $('#tableList').DataTable().ajax.reload( null, false );
                            }
                        },
                    });
                }
            },
            Cancel: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}


function handle_save(tombol, form, url, method, title) {
    $(tombol).submit( () =>{
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: () => {

        },
        success: (response) => {
            if (response.alert=="success") {
                success_toastr(response.message);
                $(form)[0].reset();
                setTimeout( () => {
                    $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        if(response.redirect){
                            location.href = response.redirect
                        }else{
                            main_content('content_list');
                             $('#tableList').DataTable().ajax.reload( null, false );
                        }
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout( () => {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                }, 2000);
            }
        },
    });
}

function ribuan(obj) {
	$('#' + obj).keyup(function (event) {
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
		var id = $(this).data("id-selector");
		var classs = $(this).data("class-selector");
		var value = $(this).val();
		var noCommas = value.replace(/,/g, "");
		$('#' + id).val(noCommas);
		$('.' + classs).val(noCommas);
	});
}

function handle_open_modal(url,modal,content){
    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            $(content).html(html);
            $(modal).modal('show');
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}

function load_input(url){
    $.get(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
    }, "html");
}

function handle_post(tombol, form, url){
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_toastr(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    location.reload();
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                }, 2000);
            }
        },
    });
}

function handle_upload(tombol,form,url,method, title){
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).html("Please Wait");
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function (response) {
                if (response.alert=="success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        if(response.redirect){
                            location.href = response.redirect;
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        main_content('content_list');
                        $('#tableList').DataTable().ajax.reload( null, false );
                    }, 2000);
                } else {
                    error_toastr(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
