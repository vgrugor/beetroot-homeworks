<?php

class Worker extends User
{
    private int $salary;

    public function __construct(string $name, int $age, int $salary)
    {
        parent::__construct($name, $age);
        $this->setSalary($salary);
    }

    /**
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }
}