<?php

final class Client
{
    private static FFI $ffi;

    function __construct()
    {
        self::$ffi = FFI::cdef(
            file_get_contents(__DIR__  . '/tonclient.h'),
            __DIR__ . '/tonclient.so',
        );
    }

    function createContext(string $content)
    {
        $config = self::$ffi->new("struct tc_string_data_t {s}");
        var_dump($config);
        $config->content = $content; // FIXME
        $ctx = self::$ffi->tc_create_context($config);
        var_dump($ctx);
    }
}

$d = new Client();
$d->createContext('foo');
