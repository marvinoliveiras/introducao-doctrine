<?php
namespace App\Doctrine\Entity;
use App\Doctrine\Entity\Student;
use Doctrine\Common\Collections\{
    ArrayCollection,Collection
};
use Doctrine\ORM\Mapping\{
    Column, Entity, GeneratedValue,
    Id, ManyToMany
};
#[Entity]
class Course
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(Student::class, mappedBy:"courses")]
    private Collection $students;
    public function __construct(
        #[Column]
    public string $name
    ){
        $this->students = new ArrayCollection();
    }
    /**
     * @return Collection<Student>
     */
    public function students(): Collection
    {
        return $this->students;
    }
    public function courses(): Collection
    {
        return $this->courses;
    }
    public function addStudent(Student $student): void
    {
        if($this->students->contains($student)){
            return;
        }
        $this->students
            ->add($student);
    }
}