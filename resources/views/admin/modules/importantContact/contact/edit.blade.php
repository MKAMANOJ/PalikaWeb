@extends('admin.layouts.admin')

@section('title')
  Edit Important Contact
@endsection

@section('content')
  <div class="portlet-title">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <h1 class="page-title font-green sbold">
          <i class="fa fa-television font-green"></i> Important Contact
          <small class="font-green sbold">Edit</small>
        </h1>
      </div>
    </div>
  </div>
  <div class="portlet-body">
    {!! Form::model($contact, ['route' => ['important-contact.update', $contact->id], 'method' => 'patch', 'files' => true]) !!}
    @include('admin.modules.importantContact.contact.partials.form', ['formAction' => 'Update', 'readAction' => true])
    {!! Form::close() !!}
  </div>
@endsection
