@extends('role-manager::layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Edit Role') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')


                <div class="form-group row">
                    <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="text" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $role->title) }}" required autocomplete="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Short Code') }}</label>

                    <div class="col-md-6">
                        <input id="text" type="short_code" class="form-control @error('short_code') is-invalid @enderror" name="short_code" value="{{ old('short_code', $role->short_code) }}" autocomplete="short_code">

                        @error('short_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            {{--    <div class="form-group row">
                    <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                    <div class="col-md-6" id="permissions-select">
                        <select name="permissions[]" id="permissions" class="@error('permissions') is-invalid @enderror"  multiple>
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                            @endforeach
                        </select>
                        <a href="#" id="permission-select-all" class="btn btn-link">select all</a>
                        <a href="#" id="permission-deselect-all" class="btn btn-link">deselect all</a>

                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>--}}

                <div class="checkbox-tabs">
                  <ul class="nav nav-tabs" role="tablist">
                      @foreach($classifications as $index => $tab)
                          <li class="nav-item @if($index == 0) active @endif"> <!-- Add 'active' class to the first tab -->
                              <a class="nav-link @if($index == 0) active @endif" id="tab{{ $tab['id'] }}" data-toggle="tab" href="#content{{ $tab['id'] }}" role="tab" aria-controls="content{{ $tab['id'] }}" aria-selected="true">{{ $tab['name'] }}</a>
                          </li>
                      @endforeach
                  </ul>

 <div class="tab-content">
    @foreach($classifications as $index => $tab)
         <div class="tab-pane fade @if($index == 0) show active @endif" id="content{{ $tab['id'] }}" role="tabpanel" aria-labelledby="tab{{ $tab['id'] }}">
             <div class="checkboxes">
                 @foreach($tab['get_functions'] as $checkbox)
                 <div class="checkbox">
                     <input type="checkbox" id="checkbox{{ $checkbox['id'] }}" name="permissions[]" value="{{ $checkbox['id'] }}"
                     @if ( (in_array($checkbox['id'], old('permissions', [])) || $role->permissions->contains($checkbox['id']))) checked @endif>
                     <label for="checkbox{{ $checkbox['id'] }}">{{ $checkbox['name'] }}</label>
                  </div>
                 @endforeach
             </div>
         </div>
     @endforeach
 </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        var permission_select = new SlimSelect({
            select: '#permissions-select select',
            //showSearch: false,
            placeholder: 'Select Permissions',
            deselectLabel: '<span>&times;</span>',
            hideSelectedOption: true,
        })

        $('#permissions-select #permission-select-all').click(function(){
            var options = [];
            $('#permissions-select select option').each(function(){
                options.push($(this).attr('value'));
            });

            permission_select.set(options);
        })

        $('#permissions-select #permission-deselect-all').click(function(){
            permission_select.set([]);
        })
    </script>
@endsection
