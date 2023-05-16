<?php

namespace Musicplayer\Database;

use PDO;

class Database

{
    private const HOST = 'db';
    private const DB = 'musicplayer';
    private const CHARSET = 'utf8mb4';
    private const DSN = 'mysql:host=' . self::HOST
    . ';dbname=' . self::DB . ';charset=' . self::CHARSET;
    private const USER = 'root';
    private const PASSWORD = 'password';

    private PDO $pdo;

    public function __construct()
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->pdo = new PDO(self::DSN, self::USER, self::PASSWORD, $options);
        } catch (\PDOException $e) {
            throw new \Exception('<p>There was an error connecting to the db</p>');
        }
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}