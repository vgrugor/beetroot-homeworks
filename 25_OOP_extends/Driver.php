<?php

final class Driver extends Worker
{
    private int $experience;
    private string $category;

    public function __construct(string $name, int $age, int $salary, int $experience, string $category)
    {
        parent::__construct($name, $age, $salary);
        $this->setExperience($experience);
        $this->setCategory($category);
    }

    /**
     * @param $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @param $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
}