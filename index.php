<?php
// Exercise from slide 20

// Abstract class: every employee shares a name, a base salary and the
// introduce() method, but each type calculates its salary differently.
abstract class Employee {
    protected string $name;
    protected float $baseSalary;

    public function __construct($name, $baseSalary) {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
    }

    // Shared behaviour: written once here, inherited by every child class
    public function introduce() {
        echo "Bonjour, mon nom est {$this->name}<br>";
    }

    // Getter for the private/protected name
    public function getName() {
        return $this->name;
    }

    // Abstract method: no implementation here, each child class MUST implement it
    abstract public function calculateSalary();
}

class Developer extends Employee {
    private $completedProjects;

    public function __construct($name, $baseSalary, $completedProjects) {
        parent::__construct($name, $baseSalary);
        $this->completedProjects = $completedProjects;
    }

    // Base salary + 200 € per completed project
    public function calculateSalary() {
        return $this->baseSalary + ($this->completedProjects * 200);
    }
}

class Salesperson extends Employee {
    private $monthlySales;

    public function __construct($name, $baseSalary, $monthlySales) {
        parent::__construct($name, $baseSalary);
        $this->monthlySales = $monthlySales;
    }

    // Base salary + 5% commission on the month's sales
    public function calculateSalary() {
        return $this->baseSalary + ($this->monthlySales * 0.05);
    }
}

// Creating the objects
$developer = new Developer("Alex", 3000, 3);
$salesperson = new Salesperson("Sarah", 2500, 10000);

// Polymorphism: same method names, different behaviour per class
$employees = [$developer, $salesperson];

foreach ($employees as $employee) {
    $employee->introduce();
    echo "Mon salaire ce mois-ci est de " . $employee->calculateSalary() . " €<br><br>";
}


// ========Exercies slide 16========

// class StringUtility {
//     private static $times = 2;

//     public static function shout($string) {
//         return strtoupper($string) . "!";
//     }

//     public static function whisper($string) {
//         return strtolower($string) . ".";
//     }

//     public static function repeat($string, $times = 2) {

        
//         for($i=0; $i<$times; ++$i){
//             echo $string . "\n";
//         }
//     }
// }

// echo StringUtility::shout("hello") . "\n";
// echo StringUtility::whisper("HELLO") . "\n";
// StringUtility::repeat("hello",4);
// StringUtility::repeat("Goodbye");

// ======== Exercise from slide 15 ========

// class Article{
//     public $title;
//     public $content;
//     private $published = false;

//     public function __construct($title, $content){
//         $this->title=$title;
//         $this->content=$content;
//     }

//     public function publish() {
//         $this->published=true;
//     }

//     public function isPublished() {
//         return $this->published;
//     }
// }

// $instance1 = new Article('This is the title', 'Here is some content.');
// $instance2 = new Article('This is the title', 'Here is some content.');

// $instance1 -> publish();
// if($instance1 -> isPublished()){
//     echo "Published\n";
// }
// else{
//     echo "unpublished\n";
// };

// if($instance2 -> isPublished()){
//     echo "Published\n";
// }
// else{
//     echo "unpublished\n";
// };