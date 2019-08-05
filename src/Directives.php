<?php


namespace Hebinet\BladeHelpers;


use Illuminate\Support\Str;

class Directives
{
    private static $includedViews = [];

    /**
     * Compile the include-once statements into valid PHP.
     *
     * @param string $expression
     * @return string
     */
    public function compileIncludeOnce($expression)
    {
        $expression = self::stripParentheses($expression);

        return "<?php if(\Hebinet\BladeHelpers\Directives::checkIfNotIncluded({$expression})) { echo \$__env->make({$expression}, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render();} ?>";
    }

    /**
     * @param $view
     * @param mixed ...$more
     *
     * @return bool
     */
    public static function checkIfNotIncluded($view, ...$more)
    {
        if (!in_array($view, self::$includedViews)) {
            array_push(self::$includedViews, $view);

            return true;
        }

        return false;
    }

    /**
     * Strip the parentheses from the given expression.
     *
     * @param string $expression
     * @return string
     */
    private function stripParentheses($expression)
    {
        if (Str::startsWith($expression, '(')) {
            $expression = substr($expression, 1, -1);
        }

        return $expression;
    }

    /**
     * Clears the included views array
     */
    public static function clearIncluded()
    {
        self::$includedViews = [];
    }
}