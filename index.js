$(document).ready(function () {
    // View Record
    $('.viewButton').click(function () {
        var did = $(this).attr('id');
        $.ajax({
            url: "view.php",
            method: "post",
            data: {
                id: did
            },
            success: function (data) {
                $('#tableModalBody').html(data);
                $('#viewDocument').modal.show(); // Uncaught TypeError: $(...).modal.show is not a function
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
                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'ບັນທຶກລາຍການໃໝ່ລົງຖານຂໍ້ມູນແລ້ວ',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    location.reload();
                });
            }
        });
    });
    // Delete
    $('.deleteButton').click(function () {
        var did = $(this).attr('id');
        // var yesno = confirm("ຕ້ອງການລົບລາຍການອອກຈາກຖານຂໍ້ມູນແທ້ບໍ?");
        // if (yesno) {
        //     $.ajax({
        //         url: "delete.php",
        //         method: "post",
        //         data: {
        //             id: did
        //         },
        //         success: function (data) {
        //             location.reload();
        //         }
        //     });
        // }
        Swal.fire({
            title: 'ຢືນຢັນ?',
            text: "ທ່ານຕ້ອງການລົບລາຍການດັ່ງກ່າວອອກຈາກຖານຂໍ້ມູນແທ້ບໍ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ຢືນຢັນການລົບ!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete.php",
                    method: "post",
                    data: {
                        id: did
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'ລົບແລ້ວ!',
                            text: 'ລາຍການດັ່ງກ່າວ ຖືກລົບອອກຈາກຖານຂໍ້ມູນແລ້ວ.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            location.reload();
                        });
                    }
                });

            }
        })
    });
    // Update
    $('.updateButton').click(function () {
        var did = $(this).attr('id');
        $.ajax({
            url: "update.php",
            method: "post",
            data: {
                id: did
            },
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

});
// Annual Chart Toggle Display
// function toggleDisplay() {
//     var div = document.getElementById("annualChart");
//     if (div.style.display === "none") {
//         div.style.display = "block";
//     } else {
//         div.style.display = "none";
//     }
// }