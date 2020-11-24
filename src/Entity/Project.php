<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private $project_name;

    /**
     * @ORM\Column(type="text")
     */
    private $project_description;

    /**
     * @ORM\Column(type="date")
     */
    private $project_creation_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $project_deadline;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $project_status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="project", orphanRemoval=true)
     */
    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->project_name;
    }

    public function setProjectName(string $project_name): self
    {
        $this->project_name = $project_name;

        return $this;
    }

    public function getProjectDescription(): ?string
    {
        return $this->project_description;
    }

    public function setProjectDescription(string $project_description): self
    {
        $this->project_description = $project_description;

        return $this;
    }

    public function getProjectCreationDate(): ?\DateTimeInterface
    {
        return $this->project_creation_date;
    }

    public function setProjectCreationDate(\DateTimeInterface $project_creation_date): self
    {
        $this->project_creation_date = $project_creation_date;

        return $this;
    }

    public function getProjectDeadline(): ?\DateTimeInterface
    {
        return $this->project_deadline;
    }

    public function setProjectDeadline(\DateTimeInterface $project_deadline): self
    {
        $this->project_deadline = $project_deadline;

        return $this;
    }

    public function getProjectStatus(): ?string
    {
        return $this->project_status;
    }

    public function setProjectStatus(string $project_status): self
    {
        $this->project_status = $project_status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setProject($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getProject() === $this) {
                $task->setProject(null);
            }
        }

        return $this;
    }
}
