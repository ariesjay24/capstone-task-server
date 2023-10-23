<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'ProjectName' => 'Website Redesign',
                'Description' => 'Redesign the company website with a modern look and improved user experience.',
                'UserID' => 1, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-01-15',
                'DueDate' => '2023-04-30',
            ],
            [
                'ProjectName' => 'Mobile App Development',
                'Description' => 'Develop a mobile app for both iOS and Android platforms.',
                'UserID' => 2, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-02-10',
                'DueDate' => '2023-06-30',
            ],
            [
                'ProjectName' => 'Product Launch',
                'Description' => 'Plan and execute the launch of a new product into the market.',
                'UserID' => 3, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-03-20',
                'DueDate' => '2023-07-15',
            ],
            [
                'ProjectName' => 'E-commerce Website Development',
                'Description' => 'Build an e-commerce website for online sales.',
                'UserID' => 4, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-04-05',
                'DueDate' => '2023-09-30',
            ],
            [
                'ProjectName' => 'Marketing Campaign',
                'Description' => 'Launch a new marketing campaign to increase brand awareness.',
                'UserID' => 5, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-05-15',
                'DueDate' => '2023-08-30',
            ],
            [
                'ProjectName' => 'Inventory Management System',
                'Description' => 'Develop a system to manage inventory and streamline operations.',
                'UserID' => 6, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-06-10',
                'DueDate' => '2023-10-15',
            ],
            [
                'ProjectName' => 'Customer Support Portal',
                'Description' => 'Create a customer support portal for improved customer service.',
                'UserID' => 7, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-07-20',
                'DueDate' => '2023-11-30',
            ],
            [
                'ProjectName' => 'Event Planning',
                'Description' => 'Plan and organize a corporate event for employees and clients.',
                'UserID' => 8, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-08-15',
                'DueDate' => '2023-12-15',
            ],
            [
                'ProjectName' => 'Content Marketing Strategy',
                'Description' => 'Develop a content marketing strategy to boost online presence.',
                'UserID' => 9, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-09-05',
                'DueDate' => '2024-02-28',
            ],
            [
                'ProjectName' => 'Quality Assurance and Testing',
                'Description' => 'Perform quality assurance and testing for a software product.',
                'UserID' => 10, // Replace with the actual user ID of the project manager
                'StartDate' => '2023-10-10',
                'DueDate' => '2024-03-31',
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
