<?php
namespace App\Models;

use Core\{Model, Database};

class User extends Model
{
    public const APPLICANT = 0;
    public const EMPLOYER = 1;

    public static function validateAuth($value, $password, $role = 0)
    {
        $column = strpos($value, "@") ? "email" : "phone";

        $result = Database::get()->from("users")
            ->where($column, "=", $value)
            ->where("password", "=", $password)
            ->where("role", "=", $role)
            ->result();

        if (! $result)
            return false;

        if ($role != 1) {
            $table = "applicants";
            if ($result->type == 1)
                $table = "employers";

            $result->detail = Database::get()->from($table)->where("userId", "=", $result->id)->result();
            if (! $result->detail)
                return false;
        }

        return $result;
    }

    public static function validatePin($token, $pin)
    {
        return Database::get()->from("users")->where("pin_token", "=", $pin)->result();
    }

    /**
     * Get user id from the session
     */
    public static function id() : int
    {
        $user = self::info();

        return $user->id;
    }

    /**
     * Get user info from the session
     */
    public static function info()
    {
        $user = null;
        
        if (session_check("user"))
            $user = session_get("user");
        elseif (session_check("admin"))
            $user = session_get("admin");

        return $user;
    }

    /**
     * Get user by id from the database
     */
    public static function getUserById(int $id)
    {
        return Database::get()->from("users")->where("id", "=", $id)->result();
    }

    /**
     * Create new user
     */
    public static function create(object $data, $type)
    {
        $db = Database::get();
        $db->from("users")->insert([
            "name" => $data->name,
            "surname" => $data->surname,
            "email" => $data->email,
            "phone" => $data->phone,
            "stateId" => $data->stateId,
            "sectorId" => $data->sectorId,
            "password" => hash("sha256", $data->password),
            "type" => $type
        ]);

        $userId = $db->lastInsertId();
        if (! $userId)
            return false;

        if ($type == self::APPLICANT) {
            $db->from("applicants")->insert([
                "userId" => $userId
            ]);
        } else {
            $db->from("employers")->insert([
                "userId" => $userId,
                "name" => $data->companyName,
                "title" => $data->companyTitle,
                "address" => $data->companyAddress,
                "taxOffice" => $data->taxOffice,
                "taxNo" => $data->taxNo,
            ]);
        }

        return $userId;
    }

    /**
     * Update user data
     */
    public static function update(array $data)
    {
        return Database::get()->from("users")
            ->where("id", "=", self::id())
            ->update($data);
    }

    /**
     * Update user data by speficed column
     */
    public static function updateBy($column, $value, array $data, $op = "=")
    {
        return Database::get()->from("users")
            ->where($column, $op, $value)
            ->update($data);
    }

    /**
     * Delete row via id directly
     */
    public static function nativeDelete(int $id)
    {
        return Database::get()->from("users")
            ->where("id", "=", $id)
            ->delete();
    }

    /**
     * Check the row is exists: true otherwise false via specific column and value
     */
    public static function exists($column, $value)
    {
        return Database::get()->select("count(id)")
            ->from("users")
            ->where($column, "=", $value)
            ->first();
    }
}
