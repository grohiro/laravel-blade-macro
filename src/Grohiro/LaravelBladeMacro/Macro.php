<?php
namespace Grohiro\LaravelBladeMacro;
/**
 * Laravel Blade `@macro` directive.
 * It supports Laravel 5+
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
   * register `@macro/@endmacro` directives
   */
  public static function register() {

    $pattern = '/[\'"](\w+)[\'"],(.*)/';
    // @macro()
    \Blade::directive('macro', function($expression) use ($pattern) {
      if (preg_match($pattern, $expression, $matches)) {
        return "<?php \Html::macro('$matches[1]', function ($matches[2]) use (\$__env) { ob_start(); ?>";
      }
    });

    // @endmacro
    \Blade::directive('endmacro', function($expression) {
      return "\n<?php return ob_get_clean(); }) ?".">\n";
    });
  }
}
