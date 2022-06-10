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

.category_list > li{
    background: #eeeeee;
    padding: 5px;
    list-style: none;
    margin:2px;
    cursor: pointer;
}
.category_list > li > a{
   color:#000;
}

.subcategory_list > li{
    background: #eeeeee;
    padding: 5px;
    list-style: none;
    margin:2px;
    cursor: pointer;
}
.subcategory_list > li > a{
   color:#000;
}

</style>
<section class="inner_page uk-clearfix">
    <div class="uk_container ">
        <div class="uk-card uk-card-default uk-card-body">
            <div id="preloader" class="uk-overlay-primary uk-position-cover">
                <div class="uk-position-center">
                    <span uk-spinner="ratio: 2"></span>
                </div>
            </div>
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
                    <div>
                        <div class="uk-width-extend@m">
                            <div uk-grid>
                                <h3 class="uk-width-2-3@m">Category</h3>
                                <a id="cart-button" href="{{ route('registration.companyActivity') }}" 
                                class="btn_com uk-button-small uk-width-1-3@m">
                                    Selected Business Categories  
                                    <span class="uk-badge" id="cart-count">{{ count($companyActivities) ?? 0 }}</span>
                                </a>
                            </div>
                            <div class="uk-width-1-1@m uk-margin-small-top">
                                <div class="form_group">
                                    <div class="uk-form-controls" style="margin-right: 5px;">
                                        <input class="uk-input"  type="text" id="search-category" placeholder="Search Category">
                                    </div>
                                </div> 
                            </div>
                            <div class="uk-width-1-1@m uk-margin-small-top">
                                <ul class="sector_list uk-align-center">
                                    <li><div id="all" class="s_block btn active" onClick="window.location.reload();">All</div></li>
                                    @foreach(range('A', 'Z') as $char)
                                        <li><div class="s_block btn alpha-category " style="margin:1px;" data-alpha="{{ $char }}">{{ $char }}</div></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr class="uk-divider-icon">
                            <div uk-grid>
                                <div class="uk-width-2-3@m uk-margin-small-top">
                                    <ul class="category_list">
                                        @foreach($categories as $key => $category)
                                            <li><a class="uk-form-label category  uk-margin-right cat_block" for="form-stacked-text" data-id="{{ $category->id }}" data-name="{{ $category->name }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>   
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    <h4 id="cat_name_head"></h4>
                                    <ul id="parentbox" class="subcategory_list">

                                    </ul>
                                </div>
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
    $('#preloader').fadeOut('slow');
    $( document ).ready(function() {
        var token = $('#token').val();
         $("#search-category").keyup(function(){
            var keyword = $(this).val();
            if(keyword){
                $.ajax({
                    type:"POST",
                    url: "{{ route('registration.searchsubcategory') }}",
                    data:{
                        '_token':token,
                        'keyword':keyword
                    },
                    beforeSend: function() {
                        $(".category_list").empty();
                        $(".category_list").html('<li class="uk-text-large uk-text-danger uk-text-center"><div uk-spinner="ratio: 1"></div></li>');
                    },
                    success:function(res){       
                        if(res){
                            $(".category_list").empty();
                            $('#cat_name_head').text('');
                            $('#parentbox').empty();
                            $.each(res,function(key,value){
                                $(".category_list").append('<li class="uk-form-label subcategory  uk-margin-right cat_block" data-id="'+res[key].id+'">'+res[key].name+'</li>');
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
                        $(".category_list").html('<li class="uk-text-large uk-text-danger uk-text-center "><div uk-spinner="ratio: 3"></div></li>');
                    },
                    success:function(res){       
                        if(res){
                            $(".category_list").empty();
                            $('#parentbox').empty();
                            $.each(res,function(key,value){
                                $(".category_list").append('<li class="uk-form-label category  uk-margin cat_block" for="form-stacked-text" data-id="'+res[key].id+'">'+res[key].name+'</li>');
                            });
                        }
                    }
                });
            }
        });

        $(document.body).on('click', '.category' ,function(){
            var cat_id = $(this).data('id');
            var cat_name = $(this).data('name');
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
                        $('#cat_name_head').text(cat_name);
                        if(res){
                            $.each(res,function(key,value){
                                var name = res[key].name.charAt(0);
                                let letter = name.toUpperCase();
                                $("#parentbox").append('<li class="uk-form-label subcategory  uk-margin-right cat_block" data-id="'+res[key].id+'">'+res[key].name+'</li>');
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
            $('#preloader').fadeIn('slow');
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
                        $('#countloader').append('<li class="uk-text-large uk-text-success uk-text-center"><div uk-spinner="ratio: 3"></div></li>');
                        $('#loading-text').append('<div><span uk-spinner="ratio: 1"></span>Processing... please wait</div>');
                    },
                    success:function(res){ 
                        $('#preloader').fadeOut('slow');
                        $('#countloader').empty();
                        $('#loading-text').empty('');
                        if(res){
                            var countItem = res.length;
							$('#cart-count').text(countItem);
                        //    $.each(res,function(key,value){
                        //        var name = res[key].name.charAt(0);
                        //        let letter = name.toUpperCase();
                        //        $("#selectedbox").append(' <a data-filter-item data-filter-name="'+res[key].name.toLowerCase()+'" type="button" class="uk-button uk-button-default uk-margin-bottom subcategory  uk-margin-right" data-id="'+res[key].id+'"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'+res[key].name+'</a>');
                        //    });
                        }
                        else{
                            $('#selectedbox').append('<p class="uk-text-large uk-text-danger uk-text-center">No Data Found</p>');
                        }
                    }
                });
            }
        });        
    });
</script>
@endpush
@endsection