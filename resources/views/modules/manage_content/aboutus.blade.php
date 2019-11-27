@extends("V_dashboard")

@section("css")
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.amaran/0.5.4/amaran.min.css">
@endsection

@section("content")
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">About Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manage Content</a></li>
              <li class="breadcrumb-item active">About Us</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
        <form action="{{ url('manage-content/about/update') }}" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="inputDescription">About Us Content</label>
                            <input type="hidden" name="id_aboutus" value="{{ $aboutus['id_aboutus'] }}" />
                            <textarea id="summernote" rows="4" name="content_aboutus" style="display: none;">{{ $aboutus['content_aboutus'] }}</textarea>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection

@section("js")
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="//cdn.jsdelivr.net/jquery.amaran/0.5.4/jquery.amaran.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(\Session::has('message'))
                $.amaran({
                    'message'           :'Success Update Data Aboutus',
                    'cssanimationIn'    :'tada',
                    'cssanimationOut'   :'rollOut'
                });
            @endif

            $('#summernote').summernote({
                height: 350
            });
        });
    </script>
@endsection