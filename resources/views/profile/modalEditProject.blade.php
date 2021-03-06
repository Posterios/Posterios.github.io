<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<style>
    label{
        font-weight: bold;
    }
</style>


<div class="modal fade" id="exampleModalEditProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #259df3">Edit Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action={{ url('/editProject') }} method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $p->id }}">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Judul Proyek</label>
                        <input class="form-control" type="text" name="project_title" value="{{ $p->project_title }}">
                        @if($errors->first('project_title'))
                            <small class="text-danger"><em>{{ $errors->first('project_title') }}</em></small>
                        @else
                            <small class="text-muted"><em>*6 - 30 karakter</em></small>
                        @endif
                    </div>

                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="ml-4 form-select" id="main" name="project_category">
                                    @if ($p->project_category == "Teknologi")
                                        <option value="Teknologi" selected>Teknologi</option>
                                        <option value="Teknik Rekayasa">Teknik Rekayasa</option>
                                        <option value="Seni">Seni</option>
                                    @elseif($p->project_category == "Teknik Rekayasa")
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Teknik Rekayasa" selected>Teknik Rekayasa</option>
                                        <option value="Seni">Seni</option>
                                    @elseif($p->project_category == "Seni")
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Teknik Rekayasa">Teknik Rekayasa</option>
                                        <option value="Seni" selected>Seni</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Sub Kategori</label>
                                <select name="project_subcategory" class="ml-4 form-select" id="sub">
                                    @if ($p->project_category == "Teknologi" && $p->project_subcategory == "Digital Desain")
                                        <option value="Digital Desain" selected>Digital Desain</option>
                                        <option value="Programming">Programming</option>
                                    @elseif($p->project_category == "Teknologi" && $p->project_subcategory == "Programming")
                                        <option value="Digital Desain">Digital Desain</option>
                                        <option value="Programming" selected>Programming</option>
                                    @elseif($p->project_category == "Teknik Rekayasa" && $p->project_subcategory == "Komputer dan Jaringan")
                                        <option value="Komputer dan Jaringan">Komputer dan Jaringan</option>
                                    @elseif($p->project_category == "Seni" && $p->project_subcategory == "Seni Tari")
                                        <option value="Seni Lukis">Seni Lukis</option>
                                        <option value="Seni Musik">Seni Musik</option>
                                        <option value="Seni Tari" selected>Seni Tari</option>
                                    @elseif($p->project_category == "Seni" && $p->project_subcategory == "Seni Musik")
                                        <option value="Seni Lukis">Seni Lukis</option>
                                        <option value="Seni Musik" selected>Seni Musik</option>
                                        <option value="Seni Tari">Seni Tari</option>
                                    @elseif($p->project_category == "Seni" && $p->project_subcategory == "Seni Lukis")
                                        <option value="Seni Lukis" selected>Seni Lukis</option>
                                        <option value="Seni Musik">Seni Musik</option>
                                        <option value="Seni Tari">Seni Tari</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar Proyek</label>
                        <input class="form-control" type="file" id="for mFile" name="project_image" accept="image/jpg, image/jpeg, image/png">
                        @if($errors->first('project_image'))
                            <small class="text-danger"><em>{{ $errors->first('project_image') }}</em></small>
                        @else
                            <small class="text-muted"><em>*maks 3 MB</em></small>
                        @endif

                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tautan Proyek</label>
                        <input class="form-control" type="url" name="project_link" value="{{ $p->project_link }}">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Proyek</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="project_description" rows="10">{{ $p->project_description }}</textarea>
                        @if($errors->first('project_description'))
                            <small class="text-danger"><em>{{ $errors->first('project_description') }}</em></small>
                        @else

                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tautan Video</label>
                        <input class="form-control" value="{{ $p->project_video_link }}" type="text" name="project_video_link" placeholder="https://www.youtube.com/">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Video</label>
                        <input class="form-control" type="file" name="project_video" accept=".mp4,.mkv">
                        @if($errors->first('project_video'))
                            <small class="text-danger"><em>{{ $errors->first('project_video') }}</em></small>
                        @else
                            <small class="text-muted"><em>*maks 10 MB</em></small>
                        @endif
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-transparent" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn but-save text-light" style="background-color: #259df3" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#main").change(function() {
            var val = $(this).val();
            if (val == "Teknologi") {
                $("#sub").html("<option value='Digital Desain'>Digital Desain</option><option value='Programming'>Programming</option>");
            } else if (val == "Teknik Rekayasa") {
                $("#sub").html("<option value='Komputer dan Jaringan'>Komputer dan Jaringan</option>");
            } else if (val == "Seni") {
                $("#sub").html("<option value='Seni Musik'>Seni Musik</option><option value='Seni Lukis'>Seni Lukis</option><option value='Seni Tari'>Seni Tari</option>");
            }
        });

    });
</script>

@if (count($errors) > 0)
  <script>
      $( document ).ready(function() {
          $('#exampleModalEditProject').modal('show');
      });
  </script>
@endif
