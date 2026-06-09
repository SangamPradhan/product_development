<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample featured project
        Project::create([
            'title' => 'Predictive Logistics Optimization',
            'slug' => 'predictive-logistics-optimization',
            'type' => 'Logistics',
            'subtitle' => 'Reducing delivery times using demand forecasting.',
            'description' => 'An enterprise solution that predicts demand and optimizes route planning to reduce costs and delivery times.',
            'tags' => 'forecasting,optimization,logistics',
            'is_featured' => true,
            'client' => 'Acme Logistics',
            'duration' => '6 months',
            'technologies' => 'Python,PyTorch,Postgres',
            'overview' => '<p>We implemented a time-series forecasting model and integrated it into the routing engine.</p>',
            'result_1_value' => '18%',
            'result_1_title' => 'Delivery Time Reduction',
            'result_1_description' => 'Average delivery time reduced by 18%.',
            'result_2_value' => '12%',
            'result_2_label' => 'Cost Savings',
            'result_3_title' => 'Scalable Pipeline',
            'result_3_description' => 'Automated model retraining and deployment pipeline.',
        ]);

        // Additional sample projects
        Project::create([
            'title' => 'Autonomous Health Monitoring',
            'slug' => 'autonomous-health-monitoring',
            'type' => 'Healthcare',
            'subtitle' => 'Real-time patient monitoring with anomaly detection.',
            'description' => 'Sensor fusion and anomaly detection models to alert clinicians in real-time.',
            'tags' => 'healthcare,anomaly-detection',
            'is_featured' => false,
            'client' => 'HealthCorp',
            'duration' => '9 months',
            'technologies' => 'TensorFlow,Node.js,Redis',
        ]);

        Project::create([
            'title' => 'Finance Risk Scoring',
            'slug' => 'finance-risk-scoring',
            'type' => 'Fintech',
            'subtitle' => 'Risk scoring for small business loans.',
            'description' => 'A composite scoring engine that improves approval accuracy while reducing defaults.',
            'tags' => 'fintech,scoring,ml',
            'is_featured' => false,
            'client' => 'FinanceCo',
            'duration' => '4 months',
            'technologies' => 'Scala,Spark,Postgres',
        ]);
    }
}
