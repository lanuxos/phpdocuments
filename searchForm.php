<?php

?>
<form action="" method="post" autocomplete="on">
    <div class="modal fade" id="searchDocument" tabindex="-1" aria-labelledby="searchDocumentLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchDocumentLabel">ສືບຄົ້ນລາຍການເອກະສານ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group m-1 mt-3">
                        <label for="quarter" class="input-group-text">ສະແດງລາຍການຕາມໄຕມາດ</label>
                        <select name="quarter" id="quarter" class="form-control">
                            <option value="1">ໄຕມາດ 1</option>
                            <option value="2">ໄຕມາດ 2</option>
                            <option value="3">ໄຕມາດ 3</option>
                            <option value="4">ໄຕມາດ 4</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary" id="quarterSubmit" name="quarterSubmit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            ຄົ້ນຫາ
                        </button>
                    </div>

                    <div class="input-group m-1 mt-3">
                        <label for="month" class="input-group-text">ສະແດງລາຍການຕາມເດືອນ</label>
                        <select name="month" id="month" class="form-control">
                            <option value="1">1./ ມັງກອນ</option>
                            <option value="2">2./ ກຸມພາ</option>
                            <option value="3">3./ ມີນາ</option>
                            <option value="4">4./ ເມສາ</option>
                            <option value="5">5./ ພຶດສະພາ</option>
                            <option value="6">6./ ມີຖຸນາ</option>
                            <option value="7">7./ ກໍລະກົດ</option>
                            <option value="8">8./ ສິງຫາ</option>
                            <option value="9">9./ ກັນຍາ</option>
                            <option value="10">10./ ຕຸລາ</option>
                            <option value="11">11./ ພະຈິກ</option>
                            <option value="12">12./ ທັນວາ</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary" id="monthSubmit" name="monthSubmit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            ຄົ້ນຫາ
                        </button>
                    </div>

                    <div class="input-group m-1 mt-3">
                        <label class="input-group-text" for="from">ຈາກ</label>
                        <input type="date" class="form-control" id="from" name="from">
                        <label class="input-group-text" for="to">ເຖິງ</label>
                        <input type="date" class="form-control" id="to" name="to" value="<?php echo date('Y-m-d'); ?>">
                        <button type="submit" name="dateSubmit" id="dateSubmit" class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            ຄົ້ນຫາ
                        </button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                        </svg>
                        ຍົກເລີກ
                    </button>
                    <button type="submit" name="all" id="all" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        ສະແດງທັງໝົດ
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>