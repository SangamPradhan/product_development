<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the services table with sample data inspired by the reference design.
     */
    public function run(): void
    {
        $services = [
            [
                'title'             => 'AI Automation',
                'icon'              => 'hub',
                'short_description' => 'Deploy custom neural architectures that handle repetitive workflows with zero-latency decision making.',
                'description'       => '<p>Deploy custom neural architectures that handle repetitive workflows with zero-latency decision making. Our automation engines integrate seamlessly into your existing tech stack, reducing operational overhead by up to 70%.</p><ul><li>Predictive Resource Allocation</li><li>Natural Language Document Processing</li><li>Autonomous Customer Support Chains</li></ul>',
                'features'          => "Predictive Resource Allocation\nNatural Language Document Processing\nAutonomous Customer Support Chains",
                'status'            => 'Active',
            ],
            [
                'title'             => 'Coding Help',
                'icon'              => 'terminal',
                'short_description' => 'Professional-grade refactoring, debugging, and architecture design for complex software systems.',
                'description'       => '<p>Professional-grade refactoring, debugging, and architecture design for complex software systems. We tackle legacy codebases, performance bottlenecks, and full-stack modernization projects.</p><ul><li>Python, Rust, TypeScript expertise</li><li>Architecture audits & redesigns</li><li>CI/CD pipeline optimization</li></ul>',
                'features'          => "Python, Rust, TypeScript expertise\nArchitecture audits & redesigns\nCI/CD pipeline optimization",
                'status'            => 'Active',
            ],
            [
                'title'             => 'Business Building',
                'icon'              => 'domain',
                'short_description' => 'From MVP to market-ready enterprise — we build digital infrastructure, GTM strategy, and automation layers.',
                'description'       => '<p>From MVP to market-ready enterprise. We build the digital infrastructure, GTM strategy, and automation layers for high-growth startups. Our end-to-end approach covers product-market fit analysis, scalable architecture, and launch execution.</p><ul><li>Market research & validation</li><li>Full-stack product development</li><li>Growth & launch strategy</li></ul>',
                'features'          => "Market research & validation\nFull-stack product development\nGrowth & launch strategy",
                'status'            => 'Active',
            ],
            [
                'title'             => 'Technical Consulting',
                'icon'              => 'architecture',
                'short_description' => 'High-level strategic advisory for CTOs and Engineering Leads on impossible bottlenecks.',
                'description'       => '<p>High-level strategic advisory for CTOs and Engineering Leads. We solve the "impossible" architectural bottlenecks that slow enterprises down. Our consultants bring deep experience from Fortune 500 engineering teams.</p><ul><li>System architecture reviews</li><li>Performance optimization</li><li>Security & compliance audits</li></ul>',
                'features'          => "System architecture reviews\nPerformance optimization\nSecurity & compliance audits",
                'status'            => 'Active',
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                $data
            );
        }
    }
}
