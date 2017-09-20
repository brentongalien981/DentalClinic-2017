<!-- Modal Core -->
<div class="modal fade" id="implant-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Implant Specific Services</h4>
            </div>

            <div class="modal-body">
                <?php require_once(PUBLIC_PATH . "view/services/sub-services/implant-accordion.php"); ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-simple">Save</button>
            </div>

        </div>

    </div>
</div>