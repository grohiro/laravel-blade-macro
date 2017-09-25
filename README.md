Laravel Blade Macro
===================

- Available for Laravel 5.3+ 
- <s>(also 5.0+, but not tested)</s> (not working) (2017/10/3)

LaravelBladeMacro creates a reusable template block in a blade template file.

## Usage

form.blade.php

```
@macro('bootstrap_input', $type, $field, $label = "", $opts = ['class' => 'form-control'])
<div class="form-group">
  <label class="col-sm-1 control-label">{{$label}}</label>
  <div class="col-sm-8">
    {!! Form::$type($field, '', $opts) !!}
  </div>
</div>
@endmacro

{!! Html::bootstrap_input('text', 'username', 'Username') !!}
{!! Html::bootstrap_input('text', 'email', 'E-Mail', ['required' => 'required', 'class' => 'form-control']) !!}
```

## Requirements

- [Laravel Collective/HTML](https://laravelcollective.com/) for `Html` Facade.

## Install

```sh
$ composer require 'grohiro/laravel-blade-macro'
```

config/app.php

```php
$providers = [
  // 
  Grohiro\LaravelBladeMacro\BladeMacroServiceProvider::class,
];
```
