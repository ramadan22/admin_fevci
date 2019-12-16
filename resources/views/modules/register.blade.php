@extends("V_dashboard")

@php // module name
    $module = "manage-register";
    $folderImage = "register";
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
            <h1 class="m-0 text-dark">Register</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Manage Register</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content" style="opacity: 0;">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Register</h3>
            {{-- <button type="submit" class="btn btn-primary add-data-form" style="float: right; padding-top: 1px; padding-bottom: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Add
            </button> --}}
            <button type="submit" class="btn btn-danger add-data-form-cancel" style="display: none; float: right; padding-top: 1px; padding-bottom: 1px;">
                <i class="fas fa-times"></i>&nbsp;&nbsp;Cancel
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body hide-add-data" style="overflow: auto;">
            <table class="table table-bordered" style="width: 2000px;">
                <thead>                  
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 100px;">Full Name</th>
                    <th style="width: 105px;">Nick Name</th>
                    <th>Address</th>
                    <th style="width: 130px;">Place Of Birth</th>
                    <th style="width: 125px;">Birth Of Date</th>
                    <th style="width: 150px;">Domicile Address</th>
                    <th style="width: 120px;">NRA Number</th>
                    <th style="width: 135px;">Police Number</th>
                    <th style="width: 140px;">Production Year</th>
                    <th>Type</th>
                    <th>Motivation</th>
                    <th>Suggestion</th>
                    <th>Image</th>
                    <th style="width: 120px;">Created Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data)>0)
                        @php $no = 1; @endphp
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $no }}.</td>
                                <td>{{ $row['full_name'] }}</td>
                                <td>{{ $row['nick_name'] }}</td>
                                <td>{{ $row['address'] }}</td>
                                <td>{{ $row['place_of_birth'] }}</td>
                                <td>{{ $row['birth_of_date'] }}</td>
                                <td>{{ $row['domicile_address'] }}</td>
                                <td>{{ $row['nra_number'] }}</td>
                                <td>{{ $row['police_number'] }}</td>
                                <td>{{ $row['production_year'] }}</td>
                                <td>{{ $row['type'] }}</td>
                                <td>{{ $row['motivation'] }}</td>
                                <td>{{ $row['suggestion'] }}</td>
                                <td class="text-center">
                                    <img src="{{ Config::get('constants.urlAssetsImages') }}{{ $folderImage }}/{{ $row['image'] }}" width="100" />
                                </td>
                                <td>{{ $row['created_date'] }}</td>
                                <td class="project-actions text-right" style="width: 160px;">
                                    <a class="btn btn-info btn-sm form-edit" id="{{ $row['id_register'] }}" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url($module.'/delete?id=') }}{{ $row['id_register'] }}">
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
    </section>
@endsection

@section("js")
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="//cdn.jsdelivr.net/jquery.amaran/0.5.4/jquery.amaran.min.js"></script>
    <script>
        $(document).ready(function() {
            $("section.content").css("opacity", "1");

            /*
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

            $('input[name=image_info]').on('change',function(){
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
                       
                        $("input[name=id_info]").val(res.id_info)
                        $("input[name=title_info]").val(res.title_info);
                        $("textarea[name=content_info]").summernote('code', res.content_info);
                        $("input[name=data_image]").val(res.image_info);

                        if(res.image_info != ""){
                            $(".image-upload").empty().append(""+
                                "<img src='{{ Config::get("constants.urlAssetsImages") }}{{ $folderImage }}/"+res.image_info+"' width='100' />"
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

            */

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