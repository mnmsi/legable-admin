function dataURLtoFile(dataUrl, filename) {

    let arr = dataUrl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bStr = atob(arr[1]),
        n = bStr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bStr.charCodeAt(n);
    }

    return new File([u8arr], filename, {type: mime});
}

function showExcelFile(fileData, fileName) {
    let file = dataURLtoFile(fileData, fileName);

    let reader = new FileReader();
    reader.readAsArrayBuffer(file);

    reader.onload = function (event) {

        let data = new Uint8Array(reader.result);
        let work_book = XLSX.read(data, {type: 'array'});
        let sheet_name = work_book.SheetNames;
        let sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header: 1});

        if (sheet_data.length > 0) {
            var table_output = '<table class="table table-striped table-bordered">';
            for (var row = 0; row < sheet_data.length; row++) {
                table_output += '<tr>';
                for (var cell = 0; cell < sheet_data[row].length; cell++) {
                    if (row == 0) {
                        table_output += '<th>' + sheet_data[row][cell] + '</th>';
                    } else {
                        table_output += '<td>' + sheet_data[row][cell] + '</td>';
                    }
                }
                table_output += '</tr>';
            }

            table_output += '</table>';
            $('#excel_data').html(table_output);
        }
    }

    $("#allTypeContent").hide();
    $("#pageModal").modal('hide')
    $("#fileShowModal").modal('show');
}

function showDocFile(fileData) {
    $("#allTypeContent").attr('src', "https://view.officeapps.live.com/op/embed.aspx?src=" + fileData);
    $("#pageModal").modal('hide')
    $("#fileShowModal").modal('show')
}

function parseWordDocxFile(fileData, fileName, showDiv) {

    let file = dataURLtoFile(fileData, fileName);

    let reader = new FileReader();
    reader.readAsArrayBuffer(file);

    reader.onloadend = function (event) {

        let arrayBuffer = reader.result;

        mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
            console.log(resultObject.value);
            $(showDiv).html(resultObject.value);
            console.log(resultObject.value);
        })
    };

    $("#allTypeContent").hide();
    $("#pageModal").modal('hide')
    $("#fileShowModal").modal('show');
}
