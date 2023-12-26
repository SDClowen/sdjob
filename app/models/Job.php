<?php
namespace App\Models;

use Core\{Model, Database};

class Job extends Model
{
    const KNOWLEDGES = [
        "0 - 1 Yıl",
        "1 - 3 Yıl",
        "3 - 5 Yıl",
        "5 Yıl ve üstü"
    ];

    const EDUCATIONS = [
        "Lise",
        "Ön Lisans",
        "Üniversite"
    ];

    const MILITARY_SITUATIONS = [
        "Yapıldı",
        "Yapılmadı",
        "Muaf"
    ];

    const WORKING_TYPES = [
        "Tam Zamanlı (Full Time)",
        "Yarı Zamanlı (Part Time)"
    ];

    const GENDERS = [
        "Kadın",
        "Erkek",
        "Her İkisi"
    ];

    const DEPARTMENTS = [
        "İnsan Kaynakları (İK)",
        "Finans ve Muhasebe",
        "Pazarlama ve Satış",
        "Operasyonlar ve Üretim",
        "Bilgi Teknolojileri (BT) ve Bilgi Güvenliği",
        "Araştırma ve Geliştirme (Ar-Ge)",
        "Müşteri Hizmetleri",
        "Lojistik ve Tedarik Zinciri Yönetimi",
        "Hukuk ve İdari İşler",
        "İletişim ve Halkla İlişkiler",
        "Personel ve Özlük İşleri",
        "Eğitim ve Gelişim",
        "Maaş ve Bordro"
    ];

    const POSITIONS = [
        "CEO (İcra Kurulu Başkanı)",
        "Yönetici",
        "Direktör",
        "Uzman",
        "Süpervizör",
        "Asistan",
        "Stajer"

    ];

    public static function all(int $employerId)
    {
        $query = "select a.*, count(j.id) applicantCount from jobs a
        left join jobapplicants j on j.jobId = a.id 
        where a.employerId = $employerId
        group by a.id";

        return Database::get()->query($query)->results();
    }

    public static function allWithEmployers($offset, $limit, $search = null)
    {
        $db = Database::get()
            ->select("a.*, d.applicantId, d.createdAt applicantDate, b.title employerTitle, c.photo")
            ->from("jobs a")
            ->join("employers b", "a.employerId = b.id")
            ->join("users c", "c.id = b.userId")
            ->leftJoin("jobapplicants d", "a.id = d.jobId")
            ->limit($offset, $limit);

        if ($search) {

            if (isset($search->title))
                $db->like("a.title", "%$search->title%");

            if (isset($search->knowledge))
                $db->where("a.knowledge", value: $search->knowledge);

            if (isset($search->educationLevel))
                $db->where("a.educationLevel", value: $search->educationLevel);

            if (isset($search->militaryStatus))
                $db->where("a.militaryStatus", value: $search->militaryStatus);

            if (isset($search->workingType))
                $db->where("a.workingType", value: $search->workingType);

            if (isset($search->gender))
                $db->where("a.gender", value: $search->gender);

            if (isset($search->position))
                $db->where("a.position", value: $search->position);

            if (isset($search->department))
                $db->where("a.department", value: $search->department);

            if (isset($search->stateId))
                $db->where("a.stateId", value: $search->stateId);

            if (isset($search->sectorId))
                $db->where("c.sectorId", value: $search->sectorId);
        }

        return $db->results();
    }

    /**
     * Check the row is exists: true otherwise false via specific column and value
     */
    public static function get(int $id)
    {
        return Database::get()->from("jobs")->where("id", "=", $id)->result();
    }

    /**
     * Check the row is exists: true otherwise false via specific column and value
     */
    public static function getBySlug(string $slug)
    {
        return Database::get()
            ->select("a.*, c.applicantId, c.createdAt applicantDate, b.title employerTitle, g.photo, b.description employerDescription, e.name state, f.name sector, count(c.id) applicantCount")
            ->from("jobs a")
            ->join("employers b", "a.employerId = b.id")
            ->leftJoin("jobapplicants c", "a.id = c.jobId")
            ->join("users d", "d.id = b.userId")
            ->join("states e", "e.id = a.stateId")
            ->join("sectors f", "f.id = d.sectorId")
            ->join("users g", "g.id = b.userId")
            ->groupBy(["a.id"])
            ->where("a.slug", "=", $slug)
            ->result();
    }

    /**
     * Update user data
     */
    public static function update(int $id, array $data, int $type)
    {
        return Database::get()->from("jobs")
            ->where("id", "=", $id)
            ->update($data);
    }

    /**
     * Update user data by speficed column
     */
    public static function updateBy($column, $value, array $data, int $type = 0, $op = "=")
    {
        return Database::get()->from("jobs")
            ->where($column, $op, $value)
            ->update($data);
    }

    /**
     * Delete row via id directly
     */
    public static function delete(int $id, int $employerId)
    {
        return Database::get()->from("jobs")
            ->where("id", "=", $id)
            ->where("employerId", "=", $employerId)
            ->delete();
    }

    /**
     * Check the row is exists: true otherwise false via specific column and value
     */
    public static function exists($column, $value, int $type)
    {
        return Database::get()->select("count(id)")
            ->from("jobs")
            ->where($column, "=", $value)
            ->first();
    }
}
