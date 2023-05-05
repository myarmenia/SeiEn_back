<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disabled Backdrop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta
                at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in
                facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est
                facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form class="form" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>