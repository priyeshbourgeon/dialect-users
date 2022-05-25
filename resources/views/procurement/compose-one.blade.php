@extends('procurement.layouts.app')
@section('content')
<style>
    .hidden{
        display: none;
    }
</style>
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap">
            <div class="col_maii_left toggle_sidebar">
                <div class=" uk-card uk-card-default uk-card-small ">
                    <div class="side_anglebnt">
                        <div class="tog_btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>  
                    <div class="compose_mail">
                        <a  href="{{ route('procurement.compose-one') }}"> <i class="fa fa-plus"></i> <span> Compose </span></a>
                    </div>
                    <hr>
                    <ul>
                       <li><a uk-tooltip="title: Inbox" href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> </a></li>
                       <li><a uk-tooltip="title: Sent" href="{{ route('procurement.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                       <li><a uk-tooltip="title: Draft" href="#"><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                       <li><a uk-tooltip="title: Upcoming Events" href="#"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">
                <h1 class="comm_title">Generate Quote</h1>
                <div class="col_maii_middle">
                    <div class="col_maiil_left"  style="width:100%">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">        
                            <div class="panel_header"> Choose Category</div>   
                                <div uk-grid>
                                    <div  class="uk-width-3-4@m">
                                        <div class=" form_wraper">
                                            <div class=" form_group">
                                                <ul class="sector_list">
                                                    <li><div class="s_block uk-margin" onClick="window.location.reload();" >All</div></li>
                                                    @foreach(range('A', 'Z') as $char)
                                                    <li><div class="s_block uk-margin alpha-category" data-alpha="{{ $char }}">{{ $char }}</div></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="form_group">
                                                <div class=" form_group">
                                                    <label class="uk-form-label" for="form-stacked-text">Search</label>
                                                    <div class="uk-form-controls" style="    margin-right: 5px;">
                                                        <input class="uk-input"  type="text" id="search-category" placeholder="Search Category">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_group category_list">
                                            @foreach($categories as $key => $cat)
                                                <a class="uk-form-label category uk-margin-right cat_block" for="form-stacked-text" data-id="{{ $cat->id }}"><i class="fa fa-arrow-circle-right"></i> {{ $cat->name ?? '' }}</a>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-4@m">
                                        <div class=" form_wraper">
                                            <div class=" form_group">
                                                <label class="uk-form-label" for="form-stacked-text">Sub category</label>
                                                <div class="uk-form-controls">
                                                    <input class="uk-input"  type="text" id="search-subcategory" placeholder="Search Sub Category" data-search>
                                                </div>
                                            </div>
                                            <div class="form_group" id="parentbox"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    <input id="token" type="hidden" value="{{ csrf_token() }}" />
</section>
<!-- CONTAINER CLOSED -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $( document ).ready(function() {
                var token = $('#token').val();
                $("#search-category").keyup(function(){
                   var keyword = $(this).val();
                   if(keyword){
                        $.ajax({
                            type:"POST",
                            url: "{{ route('search.service') }}",
                            data:{
                                '_token':token,
                                'keyword':keyword
                            },
                            beforeSend: function() {
                                $(".category_list").empty();
                                $(".category_list").html('<li class="uk-text-large uk-text-danger uk-text-center"><div uk-spinner="ratio: 3"></div></li>');
                            },
                            success:function(res){       
                                if(res){
                                    $(".category_list").empty();
                                    $('#parentbox').empty();
                                    $.each(res,function(key,value){
                                        $(".category_list").append('<a class="uk-form-label category  uk-margin-right cat_block" for="form-stacked-text" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
                                    });
                                }
                            }
                        });
                    }
                });
                $(".alpha-category").click(function(){
                   var keyword = $(this).data('alpha');
                   if(keyword){
                        $.ajax({
                            type:"POST",
                            url: "{{ route('search.alpha.service') }}",
                            data:{
                                '_token':token,
                                'keyword':keyword
                            },
                            beforeSend: function() {
                                $(".category_list").empty();
                                $(".category_list").html('<li class="uk-text-large uk-text-danger uk-text-center"><div uk-spinner="ratio: 3"></div></li>');
                            },
                            success:function(res){       
                                if(res){
                                    $(".category_list").empty();
                                    $('#parentbox').empty();
                                    $.each(res,function(key,value){
                                        $(".category_list").append('<a class="uk-form-label category  uk-margin-right cat_block" for="form-stacked-text" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
                                    });
                                }
                            }
                        });
                    }
                });

                $(document.body).on('click', '.category' ,function(){
                    var cat_id = $(this).data('id');
                    if(cat_id){
                        $.ajax({
                            type:"POST",
                            url: "{{ route('getSubService') }}",
                            data:{
                                '_token':token,
                                'cat_id':cat_id
                            },
                            beforeSend: function(){
                                $('#parentbox').append('<li class="uk-text-large uk-text-danger uk-text-center"><div uk-spinner="ratio: 3"></div></li>');
                            },
                            success:function(res){ 
                                $('#parentbox').empty();
                                if(res){
                                    $.each(res,function(key,value){
                                        var name = res[key].name.charAt(0);
                                        let letter = name.toUpperCase();
                                        $("#parentbox").append('<a data-filter-item data-filter-name="'+res[key].name.toLowerCase()+'" class="uk-form-label subcategory  uk-margin-right cat_block_linear" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
                                    });
                                }
                            else{
                                $('#parentbox').append('<p class="uk-text-large uk-text-danger uk-text-center">No Data Found</p>');
                            }
                        }
                    });
                }
                });

                $(document.body).on('click', '.subcategory' ,function(){
                    var subcat_id = $(this).data('id');
                    if(subcat_id){
                        $.ajax({
                            type:"POST",
                            url: "{{ route('saveMailCatService') }}",
                            data:{
                                '_token':token,
                                'subcat_id':subcat_id
                            },
                            beforeSend: function(){
                                $('#selectedbox').append('<li class="uk-text-large uk-text-danger uk-text-center"><div uk-spinner="ratio: 3"></div></li>');
                            },
                            success:function(res){ 
                                $('#selectedbox').empty();
                                if(res){
                                    // $.each(res,function(key,value){
                                    //     var name = res[key].name.charAt(0);
                                    //     let letter = name.toUpperCase();
                                    //     $("#selectedbox").append(' <a data-filter-item data-filter-name="'+res[key].name.toLowerCase()+'" type="button" class="uk-button uk-button-default uk-margin-bottom subcategory  uk-margin-right" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'+res[key].name+'</a>');
                                    // });
                                    window.location.href = "{{ route('procurement.compose-two') }}";
                                }
                                else{
                                    $('#selectedbox').append('<p class="uk-text-large uk-text-danger uk-text-center">No Data Found</p>');
                                }
                            }
                        });
                    }
                });
          

                $('[data-search]').on('keyup', function() {
                    var searchVal = $(this).val();
                    
                    var filterItems = $('[data-filter-item]');

                    if ( searchVal != '' ) {
                        filterItems.addClass('hidden');
                        $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
                    } else {
                        filterItems.removeClass('hidden');
                    }
                });
                
            });
        </script>
        @endsection