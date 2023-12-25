<?php
namespace App\Models;

use Core\{Model, Database};

class Content extends Model
{
    public const PAGE = 0;
    public const CATEGORY = 1;

    
    public static function menu()
    {
        $db = Database::get();

        $arr = [];
        $categories = self::categories();
        foreach ($categories as $category)
            $arr[$category->title] = $db->select("title, slug")->from("pages")->where("category", "=", $category->id)->results();

        return (object) [
            "nav" => $db->select("title, slug")->from("pages")->where("category", "=", 0)->results(),
            "nav2" => $arr
        ];
    }

    public static function pages(){
        return Database::get()->select("a.id, a.title, b.title parentTitle")
            ->from("pages a")
            ->leftJoin("categories b", "a.category = b.id")
            ->results();
    }

    public static function categories(){
        return Database::get()->select("a.id, a.title, b.title parentTitle")
            ->from("categories a")
            ->leftJoin("categories b", "a.parentId = b.id")
            ->results();
    }

    /**
     * Update user data
     */
    public static function getPage(string $slug)
    {
        return Database::get()->from("pages")
            ->where("slug", "=", $slug)
            ->result();
    }

    /**
     * Update user data
     */
    public static function getContent(int $id, int $type)
    {
        return Database::get()->from($type === 0 ? "pages" : "categories")
            ->where("id", "=", $id)
            ->result();
    }

    /**
     * Update user data
     */
    public static function update(int $id, array $data, int $type)
    {
        return Database::get()->from($type === 0 ? "pages" : "categories")
            ->where("id", "=", $id)
            ->update($data);
    }

    /**
     * Update user data by speficed column
     */
    public static function updateBy($column, $value, array $data, int $type = 0, $op = "=")
    {
        return Database::get()->from($type === 0 ? "pages" : "categories")
            ->where($column, $op, $value)
            ->update($data);
    }

    /**
     * Delete row via id directly
     */
    public static function delete(int $id, int $type)
    {
        return Database::get()->from($type === 0 ? "pages" : "categories")
            ->where("id", "=", $id)
            ->delete();
    }

    /**
     * Check the row is exists: true otherwise false via specific column and value
     */
    public static function exists($column, $value, int $type)
    {
        return Database::get()->select("count(id)")
            ->from($type === 0 ? "pages" : "categories")
            ->where($column, "=", $value)
            ->first();
    }
}
