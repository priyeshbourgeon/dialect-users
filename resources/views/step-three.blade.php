@extends('layouts.app')
@section('content')
<!-- banner -->
<style>
    
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#EC2531;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}
</style>
<section class="inner_page uk-clearfix">
    <div class="uk_container ">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="tab_wraper">
                <ul data-uk-tab="{connect:'#my-id'}" uk-tab="media:1-2@s">
                    <li class="uk-disabled"><a href=""> <i class="fa fa-user"></i> Basic Information</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-file"></i>  Documents</a></li>
                    <li class="uk-active"><a href="" style="background-color:#EC2531;"> <i class="fa fa-diamond"></i> Business Category</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Account Verification</a></li>
                </ul>
                <ul id="my-id"  class="uk-switcher uk-margin">
                    <li></li>
                    <!-- end teb content -->
                    <li></li>
                    <!-- end teb content -->
                    <li class="uk-active"> 
                    <small>* All fields are mandatory!</small>
                    <div uk-grid>
                        <div class="uk-width-expand@m">
                            <div class="uk-card uk-card-default uk-card-body">
                                <h3>Category</h3>
                                <div class="form_group">
                                    <ul class="sector_list uk-align-center">
                                        <li><div id="all" class="s_block btn active">All</div></li>
                                        @foreach(range('A', 'Z') as $char)
                                        <li><div class="s_block btn alpha-category" style="margin:5px;" data-alpha="{{ $char }}">{{ $char }}</div></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Search</label>
                                    <div class="uk-form-controls" style="    margin-right: 5px;">
                                        <input class="uk-input"  type="text" id="search-category" placeholder="Search Category">
                                    </div>
                                </div> 
                                <hr class="uk-divider-icon">
                                <div class="uk-width-1-1@m uk-margin-small-top">
                                    <div class="category_list">
                                    @foreach($categories as $key => $category)
                                        <a class="uk-form-label category  uk-margin-right" for="form-stacked-text" data-id="{{ $category->id }}"><i class="fa fa-arrow-circle-right"></i>{{ $category->name }}</a>
                                    @endforeach
                                   </div>   
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="uk-card uk-card-default uk-card-body" id="subcategory-div">
                                <h3>Sub Category</h3>
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Sub category</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input"  type="text" id="search-subcategory" placeholder="Search Sub Category" data-search>
                                    </div>
                                </div>
                                <hr class="uk-divider-icon">
                                <ul id="parentbox" class="sector_list js-filter">

                                </ul>
                            </div>
                            <div class="uk-margin">
                            <a id="cart-button" type="button" href="{{ route('registration.companyActivity') }}" 
                            class="btn_com uk-button-large uk-margin" style="margin-top:10px;float: right;">
                                Selected Business Categories  
                                <span class="uk-badge" id="cart-count">{{ count($companyActivities) ?? 0 }}</span></a>
                            </div>    
                        </div>
                    </div>
                     
                    </li>
                   <!-- end teb content -->
                   <li></li>
                <!-- end teb content -->
            </ul>
        </div>
    </div>
    <input id="token" type="hidden" value="{{ csrf_token() }}" />
</section>
@push('scripts')
<script>
    $( document ).ready(function() {
        var token = $('#token').val();
         $("#search-category").keyup(function(){
            var keyword = $(this).val();
            if(keyword){
                $.ajax({
                    type:"POST",
                    url: "{{ route('registration.searchcategory') }}",
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
                                $(".category_list").append('<a class="uk-form-label category  uk-margin-right" for="form-stacked-text" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
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
                    url: "{{ route('registration.searchalphacategory') }}",
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
                                $(".category_list").append('<a class="uk-form-label category  uk-margin" for="form-stacked-text" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
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
                    url: "{{ route('registration.getSubCategory') }}",
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
                                $("#parentbox").append('<a data-filter-item data-filter-name="'+res[key].name.toLowerCase()+'" class="uk-form-label subcategory  uk-margin-right" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right"></i>'+res[key].name+'</a>');
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
                    url: "{{ route('registration.saveCategory') }}",
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
                           $.each(res,function(key,value){
                               var name = res[key].name.charAt(0);
                               let letter = name.toUpperCase();
                               $("#selectedbox").append(' <a data-filter-item data-filter-name="'+res[key].name.toLowerCase()+'" type="button" class="uk-button uk-button-default uk-margin-bottom subcategory  uk-margin-right" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'+res[key].name+'</a>');
                           });
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
@endpush
@endsection