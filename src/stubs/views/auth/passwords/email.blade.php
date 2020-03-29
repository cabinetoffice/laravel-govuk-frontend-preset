@extends('layouts.app', [
    'title' => 'Reset password'
])

@section('content')
<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
        @csrf
            <fieldset class="govuk-fieldset">
                <div class="govuk-form-group">
                    <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                        <h1 class="govuk-fieldset__heading">
                            {{ __('Reset Password') }}
                        </h1>
                    </legend>
                </div>

                <div class="govuk-form-group">
                    <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="govuk-button">
                    {{ __('Send Password Reset Link') }}
                </button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
