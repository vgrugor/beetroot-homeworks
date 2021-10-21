<?php

final class Student extends User
{
    private int $scholarship;
    private int $course;

    public function __construct(string $name, int $age, int $scholarship, int $course)
    {
        parent::__construct($name, $age);
        $this->setScholarship($scholarship);
        $this->setCourse($course);
    }

    /**
     * @param string $scholarship
     */
    public function setScholarship(string $scholarship): void
    {
        $this->scholarship = $scholarship;
    }

    /**
     * @return int
     */
    public function getScholarship(): int
    {
        return $this->scholarship;
    }

    /**
     * @param $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return int
     */
    public function getCourse(): int
    {
        return $this->course;
    }
}