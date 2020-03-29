@extends('layouts.app',[
	'title' =>  Auth::user()->name
])

@section('content')
    @if (session('status'))
		<div class="govuk-warning-text">
			<span class="govuk-warning-text__icon" aria-hidden="true">!</span>
			<strong class="govuk-warning-text__text">
				{{ session('status') }}
			</strong>
		</div>
    @endif

	<p class="govuk-body">Hi <strong class="govuk-!-font-weight-bold">{{ Auth::user()->name }}</strong>. Welcome to your homepage.</p>

@endsection
