<div class="modal fade" id="exampleModalDeleteProject" tabindex="-1" aria-labelledby="exampleModalDeleteProject" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalDeleteProject">Warning!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                Apakah Anda yakin ingin menghapus proyek ini?
            </div>
            <div class="modal-footer">
                <a href="/deleteProject/{{ $p->id }}" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
