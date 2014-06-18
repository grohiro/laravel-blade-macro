<?php
namespace Grohiro\LaravelBladeMacro;
/**
 * Laravel Blade `@macro` directive
 *
 * <pre>
 * \Macro::register(); // @macro(),@endmacro()
 * \Macro::registerPHP(); // @php($val = 'hoge') ~> <?php ($val = 'hoge') ?>
 * \Macro::registerPHP('code'); // change directive to `@code()`
 * </pre>
 */
class Macro {

  private function Macro() {}

  /**
   * register `@macro/@endmacro` tag
   */
  public static function register() {

    // @macro()
    \Blade::extend(function($view, $_null) {

      $pattern = '/@macro\s*\(\'(\w+)\'(\s*,\s*(.[^\n]*))?\)/';

      while (preg_match($pattern, $view, $matches)) {

        $code = "<?php function {$matches[1]}";

        // arguments
        if (!isset($matches[3])) {
          $code .= "()";
        } else {
          $code .= "(".$matches[3].")";
        }

        $code .= " { ob_start(); ?".">";

        $view = preg_replace($pattern, $code, $view, 1);
      }

      return $view;
    });

    // @endmacro
    \Blade::extend(function($view, $compiler) {
      $pattern = $compiler->createPlainMatcher('endmacro');
      $code = "\n<?php return ob_get_clean(); } ?".">\n";
      return preg_replace($pattern, $code, $view);

    });
  }

  /**
   * register `@php()` directive
   */
  public static function registerPHP($tagName = 'php') {
    \Blade::extend(function($view, $compiler) use ($tagName) {
      $pattern = $compiler->createMatcher($tagName);
      $code = "<?php $2 ?".">";
      return preg_replace($pattern, $code, $view);
    });
  }
}


