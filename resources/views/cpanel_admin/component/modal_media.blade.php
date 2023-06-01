<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediaModalLabel">MEDIA</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" name="token-upload-media" value="{{csrf_token()}}" class="d-none" id="token-upload-media">
          <input type="file" name="file-upload-media" class="d-none" id="file-upload-media">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Image</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Document</a>
              </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" disabled>Save Choice</button>
        </div>
      </div>
    </div>
  </div>