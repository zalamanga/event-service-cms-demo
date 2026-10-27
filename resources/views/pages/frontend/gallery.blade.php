@extends('layouts.main')
@section('content')
    <section class="container py-5 my-5">
        <div id="content_list">
            <div class="row flex-column flex-md-row align-items-end justify-content-between mb-3 my-lg-5">
                <div class="col-12 col-md-6">
                    <h3 class="text-black">Gallery</h3>
                    <p class="font-secondary">Temukan hal baru di gallery kita</p>
                </div>
                <form class="col-12 col-md-4 col-xl-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-secondary" id="content_filter" name="name" onkeyup="load_list(1);" placeholder="Search..."
                            aria-label="Search Gallery" aria-describedby="searchGallery">
                    </div>
                </form>
            </div>

           <div id="list_result"></div>
        </div>
        {{-- Modal preview gallery --}}
        <div class="modal fade" id="galleryModal" aria-labelledby="galleryModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div id="content_modal_gallery">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function main_content(cont){
            $('#content_list').hide();
            $('#content_detail').hide();
            $('#' + cont).show();
        }
        function load_list(page){
            $.get('?page=' + page, $('#content_filter').serialize(), function(result){
                $('#list_result').html(result);
                main_content('content_list');
            }, "html");
        }
        load_list(1);
    </script>
@endsection
