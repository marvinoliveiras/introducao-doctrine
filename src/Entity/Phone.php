<?php
namespace App\Doctrine\Entity;

use Doctrine\ORM\Mapping\{
    Entity,Column,GeneratedValue,
    Id,
    ManyToOne
};

#[Entity]
class Phone
{
    #[Column, GeneratedValue, Id]
    public int $id;
    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    public Student $student;
    public function __construct(
        #[Column]
        public string $number
    ){
    }
    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }
}