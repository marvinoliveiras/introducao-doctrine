<?php

use App\Doctrine\Entity\Course;
use App\Doctrine\Entity\Phone;
use App\Doctrine\Entity\Student;
use App\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

/*$entityManager = EntityManagerCreator::createEntityManager();
$dql = 'SELECT student, phone, course FROM App\\Doctrine\\Entity\\Student student
    LEFT JOIN student.phones phone
    LEFT JOIN student.courses course';
*/
/**
 * @var $student[] $studentList
 */
/*$studentList = $entityManager->createQuery($dql)
    ->getResult();


$studentList = $entityManager->getRepository(
    Student::class
    )->findAll();
*/

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(
    Student::class
);
$studentList = $studentRepository
    ->getStudentsAndCourses();
foreach($studentList as $student){
    echo PHP_EOL.PHP_EOL;
    echo "ID: $student->id\nName: $student->name\n";
    echo "Phones:\n";
    echo implode(', ',$student->phones()
        ->map(fn(Phone $phone) => $phone->number)
        ->toArray());
    echo PHP_EOL;
    echo "Courses:\n";
    echo implode(', ',$student->Courses()
        ->map(fn(Course $course) => $course->name)
        ->toArray());
    echo PHP_EOL.PHP_EOL;
}
$studentClass = Student::class;
$dql = "SELECT COUNT(student) FROM $studentClass student";
echo "list: " . $entityManager->createQuery($dql)
    ->getSingleScalarResult();
//$student = $studentRepository->findOneBy(['name' => 'Marcos Vinícius']);

