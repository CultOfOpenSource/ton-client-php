<?php

final class Dummy
{
    private static $ffi;

    function __construct()
    {
        if (is_null(self::$ffi)) {
            self::$ffi = FFI::cdef(
                file_get_contents(__DIR__ . '/dummy.h'),
                'libc.so.6',
            );
        }
    }

    function timeOfDay(): int
    {
        $tv = self::$ffi->new("struct timeval");
        $tz = self::$ffi->new("struct timezone");
        self::$ffi->gettimeofday(FFI::addr($tv), FFI::addr($tz));

        return $tv->tv_sec;
    }

    function printf($format, ...$args): int
    {
        return (int)self::$ffi->printf($format, ...$args);
    }
}

$d = new Dummy();
$d->printf("Привет, %s!\n", "мир");
$d->printf("timeOfDay: %d\n", $d->timeofDay());
