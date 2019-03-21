<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

if (!function_exists('classnames')) {
    /**
     * css样式名生成器
     * classnames("foo", "bar"); // => "foo bar"
     * classnames("foo", [ "bar"=> true ]); // => "foo bar"
     * classnames([ "foo-bar"=> true ]); // => "foo-bar"
     * classnames([ "foo-bar"=> false ]); // => "
     * classnames([ "foo" => true ], [ "bar"=> true ]); // => "foo bar"
     * classnames([ "foo" => true, "bar"=> true ]); // => "foo bar"
     * classnames("foo", [ "bar"=> true, "duck"=> false ], "baz", [ "quux"=> true ]); // => "foo bar baz quux"
     * classnames(null, false, "bar", 0, 1, [ "baz"=> null ]); // => "bar 1"
     */
    function classnames()
    {
        $args    = func_get_args();
        $classes = array_map(function ($arg) {
            if (is_array($arg)) {
                return implode(" ", array_filter(array_map(function ($expression, $class) {
                    return $expression ? $class : false;
                }, $arg, array_keys($arg))));
            }
            return $arg;
        }, $args);
        return implode(" ", array_filter($classes));
    }
}

if (!function_exists('throw_if')) {
    /**
     * 按条件抛异常
     *
     * @param mixed             $condition
     * @param \Throwable|string $exception
     * @param array             ...$parameters
     * @return mixed
     *
     * @throws \Throwable
     */
    function throw_if($condition, $exception, ...$parameters)
    {
        if ($condition) {
            throw (is_string($exception) ? new $exception(...$parameters) : $exception);
        }

        return $condition;
    }
}

if (!function_exists('throw_unless')) {
    /**
     * 按条件抛异常
     *
     * @param mixed             $condition
     * @param \Throwable|string $exception
     * @param array             ...$parameters
     * @return mixed
     * @throws \Throwable
     */
    function throw_unless($condition, $exception, ...$parameters)
    {
        if (!$condition) {
            throw (is_string($exception) ? new $exception(...$parameters) : $exception);
        }

        return $condition;
    }
}

if (!function_exists('app_path')) {
    /**
     * 获取当前应用目录
     *
     * @param string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app()->getAppPath() . ($path ? $path . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('base_path')) {
    /**
     * 获取应用基础目录
     *
     * @param string $path
     * @return string
     */
    function base_path($path = '')
    {
        return app()->getBasePath() . ($path ? $path . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('config_path')) {
    /**
     * 获取应用配置目录
     *
     * @param string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->getConfigPath() . ($path ? $path . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('public_path')) {
    /**
     * 获取web根目录
     *
     * @param string $path
     * @return string
     */
    function public_path($path = '')
    {
        return app()->getRootPath() . ($path ? ltrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('runtime_path')) {
    /**
     * 获取web根目录
     *
     * @param string $path
     * @return string
     */
    function runtime_path($path = '')
    {
        return app()->getRuntimePath() . ($path ? $path . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('root_path')) {
    /**
     * 获取项目根目录
     *
     * @param string $path
     * @return string
     */
    function root_path($path = '')
    {
        return app()->getRootPath() . ($path ? $path . DIRECTORY_SEPARATOR : $path);
    }
}

if (!function_exists('tap')) {
    /**
     * 对一个值调用给定的闭包，然后返回该值
     *
     * @param mixed         $value
     * @param callable|null $callback
     * @return mixed
     */
    function tap($value, $callback = null)
    {
        if (is_null($callback)) {
            return $value;
        }

        $callback($value);

        return $value;
    }
}