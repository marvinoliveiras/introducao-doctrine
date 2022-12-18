<?php
namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function getStudentsAndCourses(): array
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin( 'student.phones', 'phone')
            ->leftJoin( 'student.courses', 'course')
            ->getQuery()
            ->getResult();
    }
}