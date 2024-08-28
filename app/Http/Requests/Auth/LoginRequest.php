<?php

namespace App\Http\Requests\Auth;

// use App\Libraries\GeeCaptcha;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'user' => 'required|string',
      'password' => 'required|string',
    ];
  }

  /**
   * Attempt to authenticate the request's credentials.
   *
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function authenticate()
  {
    $this->ensureIsNotRateLimited();

    // if (config('app.env') == 'production') {
    //   $captcha = new GeeCaptcha();
    //   if (!$captcha->validate(
    //     $this->only(
    //       'lot_number',
    //       'captcha_output',
    //       'pass_token',
    //       'gen_time'
    //     )
    //   )
    //   ) {
    //     throw ValidationException::withMessages([
    //       'captcha' => __('auth.failed'),
    //     ]);

    //     return;
    //   };
    // }

    $credential = $this->post('user');
    $login_type = filter_var($credential, FILTER_VALIDATE_EMAIL)
    ? 'email'
    : 'username';

    $this->merge([
      $login_type => $credential
    ]);

    $remember = $this->post('remember') ? true : false;
    if (!Auth::attempt($this->only($login_type, 'password'), $remember)) {
      RateLimiter::hit($this->throttleKey());

      throw ValidationException::withMessages([
        'email' => __('auth.failed'),
      ]);
    }

    RateLimiter::clear($this->throttleKey());
  }

  /**
   * Ensure the login request is not rate limited.
   *
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function ensureIsNotRateLimited()
  {
    if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
      return;
    }

    event(new Lockout($this));

    $seconds = RateLimiter::availableIn($this->throttleKey());

    throw ValidationException::withMessages([
      'email' => trans('auth.throttle', [
        'seconds' => $seconds,
        'minutes' => ceil($seconds / 60),
      ]),
    ]);
  }

  /**
   * Get the rate limiting throttle key for the request.
   *
   * @return string
   */
  public function throttleKey()
  {
    return Str::lower($this->input('email')) . '|' . $this->ip();
  }
}
