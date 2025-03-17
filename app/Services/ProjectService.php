<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function find($id)
    {
        return $this->projectRepository->find($id);
    }
    public function getAll()
    {
        return $this->projectRepository->all();
    }
    public function store(array $data)
    {
        $data = $this->projectRepository->create($data);
        return $data;
    }
    public function update($id, array $data)
    {
        $project = $this->projectRepository->find($id);
        return $this->projectRepository->edit($project, $data);
    }
    public function delete($id)
    {
        $project = $this->projectRepository->find($id);
        return $project->delete();
    }
}
