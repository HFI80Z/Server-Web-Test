<?php
// app/Models/CoreModel.php
namespace App\Models;

abstract class CoreModel
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    // Getters / Setters
    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
