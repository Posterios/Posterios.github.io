<div class="modal fade" id="exampleModalDeleteProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Warning!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                Are you sure want to delete this project?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-transparent" data-bs-dismiss="modal">Close</button>
                <a href="/projectDelete/{{ $p->id }}" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>