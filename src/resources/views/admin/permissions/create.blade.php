@extends('role-manager::layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Add New Permission') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.permissions.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Constant key') }}</label>

                    <div class="col-md-6">
                        <input id="short_code" type="text" class="form-control @error('short_code') is-invalid @enderror" name="constant_key" value="{{ old('short_code') }}" autocomplete="short_code" >

                        @error('short_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Classification Type') }}</label>

                    <div class="col-md-6" id="permissions-select">
                        <select name="classification_type" id="permissions" class="@error('permissions') is-invalid @enderror"  >
                            @foreach ($permissionTypes as $id => $permission)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', []))) ? 'selected' : '' }}>{{ $permission }}</option>
                            @endforeach
                        </select>

                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>





                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
<script>

</script>

@endsection
