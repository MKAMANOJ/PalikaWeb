@extends('admin.layouts.admin')

@section('title')
  Edit Contact Us Info
@endsection

@section('content')
  <div class="portlet-title">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <h1 class="page-title font-green sbold">
          <i class="fa fa-television font-green"></i> Contact Us Info
          <small class="font-green sbold">Edit</small>
        </h1>
      </div>
    </div>
  </div>
  <div class="portlet-body">
    {!! Form::model($contactUsInfo, ['route' => ['contact-us-info.update',$contactUsInfo->id], 'method' => 'patch']) !!}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
          {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
          <span class="required" aria-required="true"> * </span>
          {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Title']) !!}
          @if($errors->first('title'))
            <div class="ui pointing red basic label"> {{$errors->first('title')}}</div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
          {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
          {!! Form::text('address', null, ['class' => 'form-control', 'placeholder'=>'Address']) !!}
          @if($errors->first('address'))
            <div class="ui pointing red basic label"> {{$errors->first('address')}}</div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('phone1') ? 'has-error' :'' }}">
          {!! Form::label('phone1', 'Phone 1', ['class' => 'control-label']) !!}
          {!! Form::text('phone1', null, ['class' => 'form-control phoneNumber', 'placeholder'=>'Phone 1']) !!}
          @if($errors->first('phone1'))
            <div class="ui pointing red basic label"> {{$errors->first('phone1')}}</div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('phone2') ? 'has-error' :'' }}">
          {!! Form::label('phone2', 'Phone 2', ['class' => 'control-label']) !!}
          {!! Form::text('phone2', null, ['class' => 'form-control phoneNumber', 'placeholder'=>'Phone 2']) !!}
          @if($errors->first('phone2'))
            <div class="ui pointing red basic label"> {{$errors->first('phone2')}}</div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('fax') ? 'has-error' :'' }}">
          {!! Form::label('fax', 'FAX', ['class' => 'control-label']) !!}
          {!! Form::text('fax', null, ['class' => 'form-control phoneNumber', 'placeholder'=>'FAX']) !!}
          @if($errors->first('fax'))
            <div class="ui pointing red basic label"> {{$errors->first('fax')}}</div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
          {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
          {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'example@gmail.com']) !!}
          @if($errors->first('email'))
            <div class="ui pointing red basic label"> {{$errors->first('email')}}</div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('website') ? 'has-error' :'' }}">
          {!! Form::label('website', 'Website', ['class' => 'control-label']) !!}
          {!! Form::text('website', null, ['class' => 'form-control', 'placeholder'=>'http://example.com']) !!}
          @if($errors->first('website'))
            <div class="ui pointing red basic label"> {{$errors->first('website')}}</div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('facebook') ? 'has-error' :'' }}">
          {!! Form::label('facebook', 'Facebook Link', ['class' => 'control-label']) !!}
          {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder'=>'https://facebook.com/example']) !!}
          @if($errors->first('facebook'))
            <div class="ui pointing red basic label"> {{$errors->first('facebook')}}</div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('twitter') ? 'has-error' :'' }}">
          {!! Form::label('twitter', 'Twitter Link', ['class' => 'control-label']) !!}
          {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder'=>'https://twitter.com/example']) !!}
          @if($errors->first('twitter'))
            <div class="ui pointing red basic label"> {{$errors->first('twitter')}}</div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('google_plus') ? 'has-error' :'' }}">
          {!! Form::label('google_plus', 'Google Plus Link', ['class' => 'control-label']) !!}
          {!! Form::text('google_plus', null, ['class' => 'form-control', 'placeholder'=>'https://google.com/example']) !!}
          @if($errors->first('google_plus'))
            <div class="ui pointing red basic label"> {{$errors->first('google_plus')}}</div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group pull-right">
          <button class="btn btn-primary green" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Update
          </button>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection

@section('script')
  @parent
  <script src="{{ asset('admin/js/categories/categories.js') }}"></script>
  <script type="text/javascript">
    // For phone number validation
    $(document).on('keydown', '.phoneNumber', function(event) {
      if (event.shiftKey === true && event.keyCode === 187) {
      } else if (event.shiftKey === false && event.keyCode === 189) {
      } else if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) ||
        event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 107 || event.keyCode === 187 || event.keyCode === 109) {
      } else {
        event.preventDefault();
      }
      if ($(this).val().indexOf('+') !== -1 && (event.keyCode === 107 || event.keyCode === 187))
        event.preventDefault();
    });
  </script>
@endsection
