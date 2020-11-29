<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $task_name;

    /**
     * @ORM\Column(type="text")
     */
    private $task_description;

    /**
     * @ORM\Column(type="date")
     */
    private $task_creation_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $task_deadline;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $task_status;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskName(): ?string
    {
        return $this->task_name;
    }

    public function setTaskName(string $task_name): self
    {
        $this->task_name = $task_name;

        return $this;
    }

    public function getTaskDescription(): ?string
    {
        return $this->task_description;
    }

    public function setTaskDescription(string $task_description): self
    {
        $this->task_description = $task_description;

        return $this;
    }

    public function getTaskCreationDate(): ?\DateTimeInterface
    {
        return $this->task_creation_date;
    }

    public function setTaskCreationDate(\DateTimeInterface $task_creation_date): self
    {
        $this->task_creation_date = $task_creation_date;

        return $this;
    }

    public function getTaskDeadline(): ?\DateTimeInterface
    {
        return $this->task_deadline;
    }

    public function setTaskDeadline(\DateTimeInterface $task_deadline): self
    {
        $this->task_deadline = $task_deadline;

        return $this;
    }

    public function getTaskStatus(): ?string
    {
        return $this->task_status;
    }

    public function setTaskStatus(string $task_status): self
    {
        $this->task_status = $task_status;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
