<?php
namespace Utils;

use RuntimeException;

class Config
{
    private const string FILENAME = 'config.ini';

    private static ?array $data = null;

    private static function load(): array
    {
        if (self::$data === null) {
            $file = __DIR__ . '/../' . self::FILENAME;
            $parsed = parse_ini_file($file);
            if ($parsed === false) {
                throw new RuntimeException("Unable to read $file");
            }
            self::$data = $parsed;
        }
        return self::$data;
    }

    public static function get(string $key): string
    {
        $data = self::load();
        if (!isset($data[$key])) {
            throw new RuntimeException("Missing key in " . self::FILENAME . ": $key");
        }
        return (string) $data[$key];
    }
}
