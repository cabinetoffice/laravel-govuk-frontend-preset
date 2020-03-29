@extends('layouts.app', [
    'title' => 'Reset password'
])

@section('content')
<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

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
                    <input id="email" type="email" class="govuk-input" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="govuk-form-group">
                    <label for="password" class="govuk-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="govuk-input" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="govuk-form-group">
                    <label for="password-confirm" class="govuk-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="govuk-input" name="password_confirmation" required>
                </div>

                <button type="submit" class="govuk-button">
                    {{ __('Reset Password') }}
                </button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
