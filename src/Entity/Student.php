<?php
namespace App\Doctrine\Entity;

use App\Doctrine\Entity\Course;
use Doctrine\Common\Collections\{
    ArrayCollection,Collection
};
use Doctrine\ORM\Mapping\{
    Entity, Column, Id,
    GeneratedValue,
    ManyToMany,
    OneToMany
};

#[Entity]
class Student{
    #[Column]
    #[Id]
    #[GeneratedValue]
    public int $id;
    #[OneToMany(targetEntity:
        Phone::class, mappedBy: "student",
        cascade:["persist", "remove"]
    )]
    public Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "students")]
    private Collection $courses;

    public function __construct(
        #[Column]
        public string $name
    ){
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }
    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }
    /**
     * @return Collection<Phone>
    */
    public function phones()
    {
        return $this->phones;
    }
    public function enrollInCourse(Course $course): void
    {
        if($this->courses->contains($course)){
            return;
        }
        $this->courses
            ->add($course);
    }
    public function courses()
    {
        return $this->courses;
    }
}