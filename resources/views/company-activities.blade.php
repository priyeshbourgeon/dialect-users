@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
            <div class="uk_container ">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3>Selected Services</h3>
                    <div id="loader"></div>
                    <div class="uk-overflow-auto" id="cat-list">
                        @foreach($companyActivities  as $key => $ca)
                        <span class="uk-label uk-padding uk-margin category-selected" data-id="{{ $ca->id }}" uk-tooltip="title: Click here to remove {{ $ca->name }}">{{ $ca->name ?? ''  }}</span>
                        @endforeach
                    </div>

                <div class="uk-width-1-1@m uk-margin-medium-top uk-text-right">
                    <div class=" form_group">
                    <a href="{{ route('registration.selectService') }}"><button type="button" class="btn_com">Back</button></a>
                    <a href="{{ route('registration.makePayment') }}"><button type="button" class="btn_com">Confirm & Proceed</button></a>
                    </div>
                   </div>

                </div>


                
            </div>
            <input id="token" type="hidden" value="{{ csrf_token() }}" />
</section>
@push('scripts')
<script>
    $(document).ready(function(){
        var token = $('#token').val();
         $(".category-selected").click(function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    type:"POST",
                    url: "{{ route('registration.deleteCategory') }}",
                    data:{
                        '_token':token,
                        'id':id
                    },
                    beforeSend: function() {
                        $("#loader").html('<div class="uk-text-large uk-text-danger uk-text-center"><span uk-spinner="ratio: 3"></span>Processing... Please Wait</div>');
                    },
                    success:function(res){       
                        window.location.reload();
                    }
                });
            }
         });
    });
</script>  
@endpush  
@endsection