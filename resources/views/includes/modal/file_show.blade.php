<div class="modal fade" id="fileShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width" style="max-width: fit-content!important;width: 800px;">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <div class="align-items-center fileModalHeader"><strong id="infoName"></strong></div>
                <button type="button" class="close p-0 border-0" id="pageModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <embed src="" id="allTypeContent" style="width: 100%;height: 400px"/>
                </div>
                <div id="statusDiv"></div>
                <div id="informationDiv"></div>
                <div id="excel_data"></div>
                <div id="ppt_data"></div>
                <div id="word_container"></div>

                <div id="my_pdf_viewer">
                    <embed id="pdf_viewer" src=""/>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    embed > img {
        vertical-align: middle;
        width: 100%;
        height: auto;
    }
</style>
