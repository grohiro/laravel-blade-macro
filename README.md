laravel-blade-macro
===================

`BladeMacro` defines reusable template blocks.


**form.blade.php**

```
 @macro('bootstrap_input', $type, $field, $label = "", $opts = ['class' => 'form-control']) <div class="form-group">   <label class="col-sm-1 control-label">{{{$label}}}</label>   <div class="col-sm-8">   {{Form::$type($field, '', $opts)}}   </div> </div> @endmacro {{bootstrap_input('text', 'username', 'Username')}} {{bootstrap_input('text', 'email', 'E-Mail', ['required' => 'required', 'class' => 'form-control'])}} {{bootstrap_input('textarea', 'comments', 'Comments')}} <!-- checkbox!!! --> <div class="form-group">   <div class="col-sm-offset-1 col-sm-10">     <div class="checkbox">       <label><input type="checkbox"> Remember me</label>     </div>   </div> </div> {{bootstrap_input('textarea', 'profile', 'Profile')}}
```


**HTML**

```
 <div class="form-group">
  <label class="col-sm-1 control-label">Username</label>
  <div class="col-sm-8">
  <input class="form-control" name="username" type="text" value="">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-1 control-label">E-Mail</label>
  <div class="col-sm-8">
  <input required="required" class="form-control" name="email" type="text" value="">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-1 control-label">Comments</label>
  <div class="col-sm-8">
  <textarea class="form-control" name="comments" cols="50" rows="10"></textarea>
  </div>
 </div>
 <!-- checkbox!!! -->
 <div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-1 control-label">Profile</label>
  <div class="col-sm-8">
  <textarea class="form-control" name="profile" cols="50" rows="10"></textarea>
  </div>
 </div>
```

## Usage

**start/global.php**

```
\BladeMacro::register();
```

## Helper
`@php()` directive

**start/global.php**

```
\BladeMacro::registerPHP();
```

***.blade.php**

```
@macro('bootstrap_input', $opts = array())
  @php($opts['class'] .= " form-control") // append
  {{Form::text('email', '', $opts)}}
@endmacro

{{bootstrap_input(['class' => 'required'])}}
// <input class="required form-control"...
```

```
\BladeMacro::registerPHP('code'); // change directive to @code()
```


----
[https://twitter.com/KoudaiHirokawa](https://twitter.com/KoudaiHirokawa)

