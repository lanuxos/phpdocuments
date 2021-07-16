$(document).ready(function () {
    // Insert Record
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "insert.php",
            method: "post",
            data: $('#addForm').serialize(),
            // beforeSend: function () {
            //     $('#submit').val("ເພີ່ມເຂົ້າຖານຂໍ້ມູນ");
            // },
            success: function (data) {
                $('#addForm')[0].reset();
                $('#addDocument').modal('hide');
                location.reload();
            }
        });
    });
    // Delete
    $('.delete_btn').click(function () {
        var did = $(this).attr('id');
        var yesno = confirm("ຕ້ອງການລົບລາຍການອອກຈາກຖານຂໍ້ມູນແທ້ບໍ?");
        if (yesno) {
            $.ajax({
                url: "delete.php",
                method: "post",
                data: {
                    id: did
                },
                success: function (data) {
                    location.reload();
                }
            });
        }
    });
    // Edit
    $('.edit_btn').click(function () {
        var did = $(this).attr('id');
        $.ajax({
            url: "update.php",
            method: "post",
            data: { id: did },
            dataType: "json",
            success: function (data) {
                $('#no').val(data.no);
            }
        });
    });
});
