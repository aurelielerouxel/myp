<?php

namespace App\Controller;

use App\Entity\Project;
use\App\Entity\Task;
use\App\Entity\User;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{

    /**
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * @Route("/", name="project_index", methods={"GET"})
     */
    public function projects(ProjectRepository $projectRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="project_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project->setUser($this->getUser());
            $project->setProjectCreationDate(new \DateTime('now'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            $this->addFlash('success','Votre projet à bien été créé.');
            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * @Route("/{id}", name="project_show")
     */
    public function show(Project $project, int $id): Response
    {
        $projectRepository = $this->getDoctrine()->getRepository(Project::class);
        $project = $projectRepository->find($id);
        dump($project);
        $taskRepository = $this->getDoctrine()->getRepository(Task::class);
        $task = $taskRepository->findBy([
            'project'=>$project
        ]);
        dump($task);
        return $this->render('project/show.html.twig', [
            'project' => $project,
            'task' => $task
        ]);
    }

    /**
     * @Route("/{id}/edit", name="project_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Project $project): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * @Route("/{id}", name="project_delete")
     */
    public function delete(int $id, ProjectRepository $projectRepository): Response
    {
        try {
            $project = $projectRepository->findOneBy([
                "id" => $id,
                "user" => $this->getUser()
            ]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Votre projet a bien été supprimé'
            );
        } catch (\Exception $e) {
            $this->addFlash(
                'danger',
                "Une erreue est survenue, nous n'avons pas pu supprimer votre projet. Veuillez réessayez ultérieurement."
            );
        }
        return $this->redirectToRoute('project_index');
    }

    // public function delete(Request $request, Project $project): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($project);
    //         $entityManager->flush();
    //         $this->addFlash(
    //             'success',
    //             'Votre projet a bien été supprimé'
    //         );
    //     }
    //     else {
    //         $this->addFlash(
    //             'danger',
    //             "Une erreur est survenue, nous n'avons pas pu supprimer votre projet"
    //           );
    //     }

    //     return $this->redirectToRoute('project_index');
    // }
}
