<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content" style="height: fit-content;" >
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">id</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="id" class="form-control filter-column f-name" value="" id="name" /></div>
                        </div>
                    </div>

                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Vị trí</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="placement" class="form-control filter-column f-name" value=" " id="name" /></div>
                        </div>
                    </div>

                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Loại</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="type" class="form-control filter-column f-name" value="" id="address" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tiêu đề</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="title" class="form-control filter-column f-name" value=" " id="phone" /></div>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-start">
            <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{}}" class="btn btn-dark " >Đặt lại</a>
                <button type="button" data-dismiss="modal"  class="btn btn-secondary ml-auto" id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
