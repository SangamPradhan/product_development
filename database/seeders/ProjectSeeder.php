<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'NeuralSync: Predictive Supply Chain',
            'slug' => 'neuralsync-predictive-supply-chain',
            'type' => 'Case Study',
            'subtitle' => 'How we leveraged deep learning architectures to forecast global shipping disruptions.',
            'description' => 'A comprehensive deep learning system designed to analyze and predict supply chain vulnerabilities before they occur, using multi-modal data streams.',
            'featured_image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2070&auto=format&fit=crop',
            'tags' => 'LOGISTICS, AI, PREDICTIVE',
            'status' => 'Completed',
            'is_featured' => true,
            'client' => 'GlobalLogistics Corp',
            'duration' => '8 Months Execution',
            'technologies' => 'PyTorch, Kubernetes, Apache Kafka',
            'overview' => '<p>The global supply chain is increasingly vulnerable to micro-disruptions that cascade into macro-economic events. NeuralSync was conceptualized to ingest terabytes of satellite imagery, weather patterns, and port congestion data to build a resilient predictive model.</p><p>By transitioning from reactive logistical management to proactive AI-driven routing, the client achieved unprecedented operational stability during peak global shipping crises.</p>',
            'result_1_value' => '42%',
            'result_1_title' => 'Reduction in System Latency',
            'result_1_description' => 'We optimized the real-time processing pipeline, allowing for decision-making signals to reach endpoints 42% faster than legacy architectures.',
            'result_2_value' => '$14M',
            'result_2_label' => 'Quarterly Savings',
            'result_3_title' => 'ISO 27001 Certified',
            'result_3_description' => 'The implementation adheres to the highest global standards for information security and data integrity management.',
            'impl_1_title' => 'Multi-Modal Data Ingestion',
            'impl_1_description' => 'We engineered a robust data pipeline using Apache Kafka to simultaneously process structured logistics databases and unstructured satellite imagery feeds in real-time.',
            'impl_2_title' => 'Transformer-Based Forecasting',
            'impl_2_description' => 'Moving beyond traditional time-series analysis, we implemented customized Transformer architectures capable of understanding complex, long-range dependencies in global shipping patterns.',
            'impl_3_title' => 'Edge-Optimized Deployment',
            'impl_3_description' => 'The final predictive models were quantized and deployed via Kubernetes to edge devices at major ports, ensuring critical decision making capability even with intermittent cloud connectivity.',
        ]);

        Project::create([
            'title' => 'FinGuard AI: Automated Fraud Detection',
            'slug' => 'finguard-ai-automated-fraud-detection',
            'type' => 'Product',
            'subtitle' => 'Next-generation transaction monitoring using graph neural networks.',
            'description' => 'An enterprise-grade fraud detection system that maps complex transaction relationships to identify anomalous patterns in real-time.',
            'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop',
            'tags' => 'FINTECH, SECURITY, GNN',
            'status' => 'Active',
            'is_featured' => false,
            'client' => 'SecureBank Intl',
            'duration' => '12 Months Execution',
            'technologies' => 'TensorFlow, Neo4j, Python',
            'overview' => '<p>Financial fraud is evolving faster than traditional rule-based systems can adapt. FinGuard AI utilizes Graph Neural Networks to analyze the complex web of transaction relationships, uncovering hidden fraud rings that standard models miss.</p>',
            'result_1_value' => '99.9%',
            'result_1_title' => 'Detection Rate',
            'result_1_description' => 'Achieved near-perfect detection of complex fraud patterns with minimal false positives.',
            'result_2_value' => '50ms',
            'result_2_label' => 'Processing Time',
            'result_3_title' => 'PCI DSS Compliant',
            'result_3_description' => 'Fully compliant with payment card industry data security standards.',
            'impl_1_title' => 'Graph Database Integration',
            'impl_1_description' => 'Migrated legacy transaction data into Neo4j for real-time relationship mapping.',
            'impl_2_title' => 'GNN Model Training',
            'impl_2_description' => 'Developed and trained specialized Graph Neural Networks to identify localized anomalies in transaction clusters.',
            'impl_3_title' => 'Real-time API',
            'impl_3_description' => 'Deployed a highly available API capable of evaluating transactions in under 50 milliseconds.',
        ]);
        
        Project::create([
            'title' => 'BioTrace Hub: Genomic Data Platform',
            'slug' => 'biotrace-hub-genomic-data-platform',
            'type' => 'Research',
            'subtitle' => 'Accelerating bioinformatics research with cloud-native architectures.',
            'description' => 'A scalable platform for analyzing massive genomic datasets, enabling faster discovery of personalized medicine targets.',
            'featured_image' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?q=80&w=2070&auto=format&fit=crop',
            'tags' => 'HEALTHCARE, CLOUD, BIG DATA',
            'status' => 'In Progress',
            'is_featured' => false,
            'client' => 'Genomics Research Institute',
            'duration' => 'Ongoing',
            'technologies' => 'AWS, Next.js, Go',
            'overview' => '<p>Bioinformatics research generates petabytes of data that requires immense computational power to process. BioTrace Hub provides researchers with a cloud-native platform to seamlessly run complex genomic analyses.</p>',
            'result_1_value' => '10x',
            'result_1_title' => 'Faster Analysis',
            'result_1_description' => 'Reduced the time required for whole-genome sequencing analysis by an order of magnitude.',
            'result_2_value' => 'PB',
            'result_2_label' => 'Data Scale',
            'result_3_title' => 'HIPAA Compliant',
            'result_3_description' => 'Built from the ground up to ensure patient data privacy and regulatory compliance.',
            'impl_1_title' => 'Serverless Computing',
            'impl_1_description' => 'Utilized AWS Lambda for highly scalable and cost-effective data processing pipelines.',
            'impl_2_title' => 'Interactive Dashboard',
            'impl_2_description' => 'Built a high-performance Next.js application for visualizing complex genomic datasets.',
            'impl_3_title' => 'High-Throughput API',
            'impl_3_description' => 'Developed a Go-based backend capable of handling millions of concurrent data requests.',
        ]);
    }
}
