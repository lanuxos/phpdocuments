<?php
require('conn.php');
require('datalist.php');
?>
<form action="" method="post" autocomplete="on" id="insertForm">
    <input type="hidden" name="id" id="id">
    <div class="modal fade" id="insertDocument" tabindex="-1" aria-labelledby="insertDocumentLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertDocumentLabel">ບັນທຶກລາຍການຮັບເອກະສານ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="departmentLabel">ກົມກອງ</span>
                        <input type="text" class="form-control" placeholder="ກົມກອງ" aria-label="ກົມກອງ" aria-describedby="department" id="department" autofocus list="departments" name="department">
                    </div>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text">#</span>
                        <input type="text" class="form-control" placeholder="ເລກທີ ເອກະສານ" aria-label="ເລກທີ ເອກະສານ" name="no" id="no">
                        <span class="input-group-text">ວດປ</span>
                        <input type="date" class="form-control" placeholder="ວດປ ເອກະສານ" aria-label="ວດປ ເອກະສານ" name="date" id="date">
                    </div>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="contentLabel">ເນື້ອໃນ</span>
                        <input type="text" class="form-control" placeholder="ເນື້ອໃນ" aria-label="ເນື້ອໃນ" aria-describedby="content" id="content" list="contents" name="content">
                    </div>

                    <hr>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="statusLabel">ສະຖານະ</span>
                        <select name="status" id="status">
                            <option value="ລໍຖ້າ">ລໍຖ້າ</option>
                            <option value="ເຊັນແລ້ວ">ເຊັນແລ້ວ</option>
                            <option value="ຮັບແລ້ວ">ຮັບແລ້ວ</option>
                        </select>
                    </div>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="signLabel">ເຊັນໂດຍ</span>
                        <input type="text" class="form-control" placeholder="ເຊັນໂດຍ" id="sign" name="sign" list="signs" aria-label="ເຊັນໂດຍ" aria-describedby="sign">
                    </div>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="takerLabel">ຮັບໂດຍ</span>
                        <input type="text" class="form-control" placeholder="ຮັບໂດຍ" id="taker" name="taker" aria-label="ຮັບໂດຍ" aria-describedby="taker">
                    </div>

                    <div class="input-group m-1 mt-3">
                        <span class="input-group-text" id="takenDateLabel">ວດປ ປ່ອຍເອກະສານ</span>
                        <input type="date" class="form-control" placeholder="ວດປ ປ່ອຍເອກະສານ" id="takenDate" name="takenDate" aria-label="ວດປ ປ່ອຍເອກະສານ" aria-describedby="takenDate">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                        </svg>
                        ຍົກເລີກ
                    </button>
                    <button type="submit" class="btn btn-success" id="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                        ບັນທຶກລາຍການ
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>