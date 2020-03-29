@extends('layouts.app', [
    'title' => 'Login'
])

@section('content')

<div class="govuk-grid-row">
      <div class="govuk-grid-column-two-thirds">

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <fieldset class="govuk-fieldset">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                    <h1 class="govuk-fieldset__heading">
                        {{ __('Login') }}
                    </h1>
                </legend>

                @if ($errors->has('email'))
                    <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="error-summary">
                        <h2 class="govuk-error-summary__title" id="error-summary-title">There is a problem</h2>
                        <div class="govuk-error-summary__body">
                            <ul class="govuk-list govuk-error-summary__list">
                                <li>
                                    {{ $errors->first('email') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="govuk-form-group">
                    <label class="govuk-label" for="address-line-1">
                        {{ __('E-Mail Address') }}
                    </label>
                    <input class="govuk-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="govuk-form-group">
                    <label class="govuk-label" for="address-line-1">
                        {{ __('Password') }}
                    </label>
                    <input class="govuk-input" id="password" type="password" name="password" required>
                </div>

                <div class="govuk-form-group">
                    <div class="govuk-checkboxes">
                        <div class="govuk-checkboxes__item">
                            <input class="govuk-checkboxes__input" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label class="govuk-label govuk-checkboxes__label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="govuk-button">
                    {{ __('Login') }}
                </button>
                <a  href="{{ route('password.request') }}" class="govuk-link">
                    {{ __('Forgot Your Password?') }}
                </a>
            </fieldset>

        </form>
      </div>
    </div>


@endsection
