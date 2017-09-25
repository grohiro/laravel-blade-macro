<?php
namespace Grohiro\LaravelBladeMacro;

use Illuminate\Support\ServiceProvider;

class BladeMacroServiceProvider extends ServiceProvider
{
    const MACRO_REGEX = '/[\'"](\w+)[\'"],(.*)/';

    public function boot()
    {
        \Blade::directive('macro', function ($expression) {
            if (preg_match(self::MACRO_REGEX, $expression, $matches)) {
                return "<?php \Html::macro('$matches[1]', function ($matches[2]) use (\$__env) { ob_start(); ?>\n";
            }
        });

        \Blade::directive('endmacro', function ($expression) {
            return "\n<?php return ob_get_clean(); }) ?".">\n";
        });
    }

    public function register()
    {
    }
}
