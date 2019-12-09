@extends("V_dashboard")

@php // module name
    $module = "manage-galery";
    $folderImage = "galery";
@endphp

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
            <h1 class="m-0 text-dark">Galery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Manage Galery</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content" style="opacity: 0;">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Galery</h3>
            <button type="submit" class="btn btn-primary add-data-form" style="float: right; padding-top: 1px; padding-bottom: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Add
            </button>
            <button type="submit" class="btn btn-danger add-data-form-cancel" style="display: none; float: right; padding-top: 1px; padding-bottom: 1px;">
                <i class="fas fa-times"></i>&nbsp;&nbsp;Cancel
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body hide-add-data">
            <table class="table table-bordered">
                <thead>                  
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Alt Image</th>
                    <th>Thumbnail</th>
                    <th>Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data)>0)
                        @php $no = 1; @endphp
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $no }}.</td>
                                <td>{{ $row['title_galery'] }}</td>
                                <td>{{ $row['alt_galery'] }}</td>
                                <td>
                                    <img src="{{ Config::get('constants.urlAssetsImages') }}{{ $folderImage.'/thumbnail' }}/{{ $row['thumbnail_galery'] }}" style="width: 100px;" />
                                </td>
                                <td class="text-center">
                                    <img src="{{ Config::get('constants.urlAssetsImages') }}{{ $folderImage }}/image/{{ $row['image_galery'] }}" style="width: 100px;" />
                                </td>
                                {{-- <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger"></div>
                                </div>
                                </td> --}}
                                <td class="project-actions text-right" style="width: 160px;">
                                    <a class="btn btn-info btn-sm form-edit" id="{{ $row['id_galery'] }}" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url($module.'/delete?id=') }}{{ $row['id_galery'] }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @php $no++ @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer hide-add-data clearfix">
                @php
                    $totalPage = ceil($totalData/$limit);
                @endphp
                @if($totalPage>1)
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        @for($b=1;$b<=$totalPage;$b++)
                            <li class="page-item {{ (!empty($_GET['page']) ? (($_GET['page'] == $b) ? "active" : '') : '') }}"><a class="page-link" href="{{ url($module) }}/?page={{ $b }}">{{ $b }}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                @endif
            </div>
        </div>
        <form action="{{ url($module.'/add') }}" method="POST" enctype="multipart/form-data" class="form-add-data" style="display: none;">
            {{ csrf_field() }}
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
                                <label for="inputText">Title</label>
                                <input type="hidden" name="id_galery" value="" />
                                <input type="text" name="title_galery" class="form-control" id="inputText" placeholder="Enter title galery" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Alt Image</label>
                                <input type="text" name="alt_galery" class="form-control" id="inputText" placeholder="Enter alt galery" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="inputFile">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image_galery" id="inputFile">
                                    <input type="hidden" name="data_image" value="" />
                                    <label class="custom-file-label" for="inputFile">Choose file</label>
                                </div>
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div> --}}
                                </div>
                            </div>
                            <div class="form-group wrap-image-upload" style="display: none;">
                                <label>Image</label>
                                <div class="image-upload">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
                <input type="submit" value="Save Changes" class="btn btn-success float-right"><br /><br /><br />
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
            $("section.content").css("opacity", "1");

            $(".add-data-form").click(function(){
                $(this).hide();
                $(".hide-add-data").hide();
                $(".add-data-form-cancel").show();
                $(".form-add-data").fadeIn(500);

                $(".form-add-data").attr("action", "{{ url($module.'/add') }}");

                $(".form-add-data .card.card-primary input").val("");
                $(".form-add-data #summernote").summernote('code', '');
            });

            $(".add-data-form-cancel").click(function(){
                $(this).hide();
                $(".form-add-data").hide();
                $(".wrap-image-upload").hide();
                $(".add-data-form").show();
                $(".hide-add-data").fadeIn(500);
            });

            $('input[name=image_galery]').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // $('#blah').attr('src', e.target.result);
                        $(".image-upload").empty().append(""+
                            "<img src='"+e.target.result+"' width='100' />"
                        );
                    }
                    
                    reader.readAsDataURL(input.files[0]);

                    $(".wrap-image-upload").show();
                }
            }

            function formEdit(id){
                $.ajax({
                    url: "{{ url($module.'/form-edit') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: "id="+id,
                    beforeSend: function(){
                        
                    },
                    success: function(res){
                       
                        $("input[name=id_galery]").val(res.id_galery)
                        $("input[name=title_galery]").val(res.title_galery);
                        $("input[name=alt_galery]").val(res.alt_galery);
                        $("input[name=data_image]").val(res.image_galery);

                        if(res.image_galery != ""){
                            $(".image-upload").empty().append(""+
                                "<img src='{{ Config::get("constants.urlAssetsImages") }}{{ $folderImage }}/"+res.image_galery+"' width='100' />"
                            );
                            $(".wrap-image-upload").show();
                        }

                        $(".form-add-data").attr("action", "{{ url($module.'/update') }}");

                        $(".add-data-form").hide();
                        $(".hide-add-data").hide();
                        $(".add-data-form-cancel").show();
                        $(".form-add-data").fadeIn(500);
                    },
                    error: function(){

                    }
                });
            }

            $(".form-edit").click(function(){
                var id = $(this).attr("id");

                formEdit(id);
            });

            @if(Session::has('message'))
                $.amaran({
                    'message'           : '{{ Session::get("note") }}',
                    'cssanimationIn'    : 'tada',
                    'cssanimationOut'   : 'rollOut'
                });
            @endif

            $('#summernote').summernote({
                height: 350
            });
        });
    </script>
@endsection