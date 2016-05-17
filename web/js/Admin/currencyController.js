'use strict';

function editCurrency(btn) {
    var id = btn.id;
    var editName = $('#curNameEdit').val();
    var editCode = $('#curCodeEdit').val();
    var editRate = $('#curRateEdit').val();
    var editStat = $('#isDefaultEdit').prop('checked');

    var editArray = {
        'id': id,
        'editName': editName,
        'editCode': editCode,
        'editRate': editRate,
        'editStat': editStat
    };

    $.ajax({
        url: "cpanel/updatecurrency",
        method: "POST",
        data: {
            "updateData": editArray
        },
        success: function (data) {
            if (data === 'true') {
                location.reload();
            } else {
                alert('During operation an error was ocured');
            }
        }
    });
}

function editModalBtn(btn) {
    var id = btn.id;
    var name = $('#' + id).attr('data-curname');
    var code = $('#' + id).attr('data-curcode');
    var defcur = $('#' + id).attr('data-isdefault');
    var rate = $('#' + id).attr('data-currate');

    $('#curNameEdit').attr('value', name);
    $('#curCodeEdit').attr('value', code);
    $('#curRateEdit').attr('value', rate);
    if (defcur == 1) {
        $('#isDefaultEdit').attr('checked', true);
    }

    $('.saveEditedBtn').attr('id', id);
}

function deleteCurConf(btn) {
    var curName = $(btn).data('curname');

    $('#deleteCurName').text(curName);
    $('.deleteBtn').attr('id', btn.id);
}

function deleteCurrency(id) {
    $.ajax({
        url: "{{ path('delete_currency') }}",
        method: "POST",
        data: {
            "id": id
        },
        success: function (data) {
            if (data === 'true') {
                location.reload();
            } else {
                alert('During operation an error was ocured');
            }
        }
    })
}

$('#addCurrencyError').attr('hidden', true);

$(document).ready(function () {
    $('[data-tooltip="tooltip"]').tooltip();
});

$('#isDefault').click(function () {

    var isChecked = $('#isDefault').prop('checked');
    if (isChecked == true) {
        $('#curRate').prop('disabled', true);
        $('#curRate').val('1');
    } else {
        $('#curRate').prop('disabled', false);
        $('#curRate').val('');
    }
});

function addCurrency() {

    var curName = $('#curName').val();
    var curCode = $('#curCode').val();
    var isDefault = $('#isDefault').prop('checked');
    var curRate = $('#curRate').val();
    var data = {
        'curName': curName,
        'curCode': curCode,
        'isDefault': isDefault,
        'curRate': curRate
    };
    $.ajax({
        type: "POST",
        url: "{{ path('add_new_currency') }}",
        data: {
            "newCurrency": data
        },
        success: function (data) {
            if (data === 'false') {
                $('#addCurrencyError').attr('hidden', false);
            } else {
                location.reload();
            }
        }
    });
}