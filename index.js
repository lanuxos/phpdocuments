$(document).ready(function () {
    // View Record
    $('.viewButton').click(function () {
        var did = $(this).attr('id');
        $.ajax({
            url: "view.php",
            method: "post",
            data: { id: did },
            success: function (data) {
                $('#tableModalBody').html(data);
                $('#viewDocument').modal.show();
            }
        });
    });
    // Insert Record
    $('#insertForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "insert.php",
            method: "post",
            data: $('#insertForm').serialize(),
            // beforeSend: function () {
            //     $('#submit').val("ເພີ່ມເຂົ້າຖານຂໍ້ມູນ");
            // },
            success: function (data) {
                $('#insertForm')[0].reset();
                $('#insertDocument').modal('hide');
                // Swal.fire(
                //     'Good job!',
                //     'You clicked the button!',
                //     'success'
                //     )
                location.reload();
                }
        });
    });
    // Delete
    $('.deleteButton').click(function () {
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
    // Update
    $('.updateButton').click(function () {
        var did = $(this).attr('id');
        $.ajax({
            url: "update.php",
            method: "post",
            data: { id: did },
            dataType: "json",
            success: function (data) {
                $('#id').val(data.id);
                $('#no').val(data.noout);
                $('#date').val(data.dateout);
                $('#department').val(data.department);
                $('#content').val(data.detail);
                $('#status').val(data.status);
                $('#sign').val(data.sign);
                $('#takenDate').val(data.takendate);
                $('#taker').val(data.taker);
                $('#submit').val("ປັບປຸງຖານຂໍ້ມູນ");
                $('#insertDocument').modal('show');
            }
        });
    });
    // Update Status
    // $('.await').click(function () {
    //     var did = $(this).attr('id');
    //     $ajax({
    //         url: "status.php",
    //         method: "post",
    //         dataType: "json",
    //         data: { await: did },
    //         success: function (data) {
    //             $('#updateStatus').modal('show');
    //         }
    //     });
    // });
});
