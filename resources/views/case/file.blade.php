<div class="col-xl-12 mt-3 attach-file-row">
    <div class="attach-file-section d-flex align-items-center mb-2">
        <div class="primary_input flex-grow-1">
            <div class="primary_file_uploader">
                <input class="primary-input" type="text" id="placeholderAttachFile" placeholder="{{ __('common.Browse file') }}" readonly>
                <button class="" type="button">
                    <label class="btn btn-primary btn-sm"
                           for="attach_file">{{__("common.Browse")}} </label>
                    <input type="file" class="d-none" name="file[]" id="attach_file">
                </button>
            </div>
        </div>
        <span style="cursor:pointer;" class="btn btn-primary btn-sm icon-only" type="button" id="file_add"> <i class="ti-plus"></i> </span>
    </div>

</div>
