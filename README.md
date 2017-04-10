Laravel Blade Macro
===================

**Available for Laravel 5.3+ (also 5.0+, but not tested) (2017/4/10)**

LaravelBladeMacro creates a reusable template block in a blade template file.

**form.blade.php**

```
@macro('bootstrap_input', $type, $field, $label = "", $opts = ['class' => 'form-control']) <div class="form-group">   <label class="col-sm-1 control-label">{{{$label}}}</label>   <div class="col-sm-8">   {{Form::$type($field, '', $opts)}}   </div> </div> @endmacro{!! \Html::bootstrap_input('text', 'username', 'Username') !!}{!! \Html::bootstrap_input('text', 'email', 'E-Mail', ['required' => 'required', 'class' => 'form-control']) !!}```

## Usage

```sh
$ composer require 'grohiro/laravel-blade-macro'
```

**AppServiceProvider**

```php
public function boot() {
  // Add the follows
  \Grohiro\LaravelBladeMacro\Macro::register();
}
```
