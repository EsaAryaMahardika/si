$(document).ready(function () {
    $(".close").click(function () {
        $(this)
            .parent(".alert")
            .fadeOut();
    });
    $("#prov").select2({
        placeholder: 'Pilih Provinsi',
        ajax: {
            url: "prov",
            processResults: function ({
                data
            }) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.nama
                        }
                    })
                }
            }
        }
    });
    $("#prov").change(function () {
        let id = $('#prov').val();
        $("#kab").select2({
            placeholder: 'Pilih Kabupaten',
            ajax: {
                url: "kab/" + id,
                processResults: function ({
                    data
                }) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });
    });
});
