<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <form  action="{{ route('staff.update',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form_wraper" uk-grid> 
                            <input type="hidden" name="role" value="Admin" />  
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Name *</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input  @error('name') uk-form-danger uk-animation-shake @enderror" id="name"   name="name" type="text" value="{{ old('name') ??  $user->name }}" placeholder="Name">
                                    </div>
                                    @error('name')
                                        <small style="color:red"> {{$message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Designation *</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input  @error('designation') uk-form-danger uk-animation-shake @enderror" id="designation"   name="designation" type="text" value="{{ old('designation') ?? $user->role }}" placeholder="Designation" >
                                    </div>
                                    @error('designation')
                                        <small style="color:red"> {{$message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror" id="email"   name="email" type="email" value="{{ old('email') ?? $user->email }}" placeholder="Email">
                                    </div>
                                    @error('email')
                                        <small style="color:red"> {{$message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Mobile</label>
                                    <div>
                                        <div class="uk-flex country_code_div ">
                                            <div class="">
                                                <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                            </div>
                                            <div style="position: relative; flex-grow: 8 ">
                                                <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                                <input class="uk-input @error('mobile') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Mobile" id="mobile" name="mobile" value="{{ old('mobile') ?? $user->mobile }}">
                                            </div>
                                        </div>   
                                    </div>
                                    @error('mobile')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Landline</label>
                                    <div>
                                        <div class="uk-flex country_code_div ">
                                            <div class="">
                                                <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                            </div>
                                            <div style="position: relative; flex-grow: 8 ">
                                                <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                                <input class="uk-input @error('landline') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Landline" id="landline" name="landline" value="{{ old('landline') ?? $user->landline }}">
                                            </div>
                                        </div>   
                                    </div>
                                    @error('landline')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-3@m uk-margin-small-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Extension</label>
                                    <div>
                                        <div class="uk-flex country_code_div ">
                                            <div style="position: relative; flex-grow: 8 ">
                                                <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                                <input class="uk-input @error('extension') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Extension" id="extension" name="extension" value="{{ old('extension') ?? $user->extension }}">
                                            </div>
                                        </div>   
                                    </div>
                                    @error('extension')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-1@m uk-margin-small-top uk-text-right">
                            <div class=" form_group">
                                <button type="submit" class="btn_com">Save</button>
                            </div>
                        </div>
                          </div>
                        
                        
                        </form>
                        </div> 