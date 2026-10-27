<div class="row">
    <div class="card">
        <div id="content_list">
            <div class="lightbox">
                <button onclick="main_content('content_list');$('#tableList').DataTable().ajax.reload( null, false );" class="btn btn-sm icon icon-left btn-info mb-5">Kembali</button>
                <div class="row" style="margin: auto;">
                    <div class="col-lg-6 mt-1">
                        <img
                        src="{{ $packet->photo }}"
                        data-mdb-img="{{ $packet->photo }}"
                        alt="Image"
                        class="w-100 shadow-1-strong rounded"
                        />
                    </div>
                @foreach($packet->details as $detail)
                  <div class="col-lg-6 mt-1">
                    <img
                      src="{{ $detail->photo }}"
                      data-mdb-img="{{ $detail->photo }}"
                      alt="Image"
                      class="w-100 shadow-1-strong rounded"
                    />
                  </div>
                @endforeach
                  {{-- <div class="col-lg-6">
                    <img
                      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Vertical/1.webp"
                      data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Vertical/1.webp"
                      alt="Dark Roast Iced Coffee"
                      class="w-100 shadow-1-strong rounded"
                    />
                  </div> --}}
                </div>
              </div>
        </div>
    </div>
</div>
