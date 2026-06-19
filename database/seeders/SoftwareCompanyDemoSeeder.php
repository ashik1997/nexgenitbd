<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoftwareCompanyDemoSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        DB::table('website_banners')->delete();
        DB::table('website_banners')->insert([
            [
                'title' => 'Custom Software Built Around Your Business',
                'description' => 'We design and develop secure web, mobile, and business applications that simplify operations and accelerate growth.',
                'short_description' => 'Custom software development',
                'view_btn_url' => url('/demos'),
                'purchase_btn_url' => url('/contact-us'),
                'image' => 'assets/frontend/img/demo-content/illustrations/img13.png',
                'short_image' => 'assets/frontend/img/demo-content/icons/12-seo-service.svg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Launch Better Digital Products, Faster',
                'description' => 'From product strategy and UI/UX to development and quality assurance, our team turns ideas into reliable digital products.',
                'short_description' => 'Product design and engineering',
                'view_btn_url' => url('/demos'),
                'purchase_btn_url' => url('/contact-us'),
                'image' => 'assets/frontend/img/demo-content/illustrations/img11.png',
                'short_image' => 'assets/frontend/img/demo-content/icons/10-we-work.svg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Modernize Your Business with Cloud and Automation',
                'description' => 'We connect systems, automate repetitive workflows, and build scalable cloud solutions that help your team work smarter.',
                'short_description' => 'Cloud, API, and automation',
                'view_btn_url' => url('/demos'),
                'purchase_btn_url' => url('/contact-us'),
                'image' => 'assets/frontend/img/demo-content/illustrations/img14.png',
                'short_image' => 'assets/frontend/img/demo-content/icons/22-seo-analysis.svg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('home_contents')->delete();
        DB::table('home_contents')->insert([
            [
                'title' => 'Product Strategy and UI/UX Design',
                'description' => '<p>We validate your idea, map the user journey, and create intuitive interfaces before development begins. The result is a product that looks polished and feels effortless to use.</p><ul><li>Discovery workshops and product planning</li><li>Wireframes, prototypes, and design systems</li><li>User-focused web and mobile experiences</li></ul>',
                'image' => 'assets/frontend/img/demo-content/icons/07-we-offer.svg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Web, Mobile, and SaaS Development',
                'description' => '<p>Our engineers build maintainable software using modern technologies and proven delivery practices. We focus on performance, security, and a clean foundation that can scale with your business.</p><ul><li>Business websites and web applications</li><li>Mobile apps and SaaS platforms</li><li>APIs, dashboards, and system integrations</li></ul>',
                'image' => 'assets/frontend/img/demo-content/illustrations/img13.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Long-Term Support and Continuous Improvement',
                'description' => '<p>Launch is only the beginning. We monitor, maintain, and improve your software so it remains secure, fast, and aligned with your evolving goals.</p><ul><li>Quality assurance and performance optimization</li><li>Cloud deployment, monitoring, and maintenance</li><li>Dedicated technical support and product iteration</li></ul>',
                'image' => 'assets/frontend/img/demo-content/icons/10-we-work.svg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('testimonials')->delete();
        DB::table('testimonials')->insert([
            [
                'writer_avatar' => 'assets/frontend/img/demo-content/avatars/author1.png',
                'writer_name' => 'Sarah Ahmed',
                'writer_designation' => 'COO, RetailFlow',
                'speech' => 'NexGen IT transformed our manual sales process into one connected platform. Our team now saves hours every day and management finally has real-time visibility.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'writer_avatar' => 'assets/frontend/img/demo-content/avatars/author4.png',
                'writer_name' => 'Daniel Morgan',
                'writer_designation' => 'Founder, LaunchPilot',
                'speech' => 'They understood the product vision quickly, challenged weak assumptions, and delivered a polished SaaS MVP that was ready for our first customers.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'writer_avatar' => 'assets/frontend/img/demo-content/avatars/author7.png',
                'writer_name' => 'Nadia Rahman',
                'writer_designation' => 'Head of Operations, MedixCare',
                'speech' => 'Communication was clear throughout the project. The new portal is fast, secure, and much easier for both our staff and customers to use.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'writer_avatar' => 'assets/frontend/img/demo-content/avatars/author10.png',
                'writer_name' => 'Michael Chen',
                'writer_designation' => 'CTO, Northstar Logistics',
                'speech' => 'The integration work was excellent. Several disconnected tools now exchange data automatically, reducing errors and giving us a much cleaner workflow.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('blogs')->delete();
        DB::table('blogs')->insert([
            $this->blog('How Custom Software Can Reduce Operational Costs', 'custom-software-reduce-operational-costs', 'Custom software can automate repetitive work, reduce errors, and bring fragmented business processes into one reliable platform.', 'uploads/images/blog/41BuLkehnKLkrrZLKA6l-1640629965.jpg', $now),
            $this->blog('A Practical Guide to Building Your First SaaS Product', 'guide-to-building-first-saas-product', 'A successful SaaS product starts with a focused problem, a validated workflow, and a technical foundation designed for steady growth.', 'uploads/images/blog/7Kj1wnJxtxXEfI82VmKl-1640630391.jpg', $now),
            $this->blog('Web Application Security Checklist for Growing Businesses', 'web-application-security-checklist', 'Security should be part of product development from day one. Here are the essential controls every modern web application should include.', 'uploads/images/blog/CYY5BQPjnJMMn4KXoekF-1617978151.jpg', $now),
            $this->blog('When Should You Modernize a Legacy System?', 'when-to-modernize-legacy-system', 'Slow performance, expensive maintenance, and limited integrations are common signs that an older system is holding your business back.', 'uploads/images/blog/F0bwYQhOkV0cEP1b5gBs-1617551374.jpg', $now),
            $this->blog('Why UI/UX Design Matters for Business Software', 'why-ui-ux-matters-for-business-software', 'Clear workflows and thoughtful interface design improve adoption, shorten training time, and help teams complete important work with fewer mistakes.', 'uploads/images/blog/gDuWU62U7mjTJdi5MAPA-1640629843.jpg', $now),
            $this->blog('Cloud, API, and Automation Trends to Watch', 'cloud-api-automation-trends', 'Modern companies are using APIs, cloud infrastructure, and intelligent automation to move faster without increasing operational complexity.', 'uploads/images/blog/GKZW76qTp1fExwyKshkj-1640629789.jpg', $now),
        ]);

        DB::table('website_clients')->delete();
        $clientNames = [
            ['name' => 'Vertex Commerce', 'industry' => 'Retail Technology'],
            ['name' => 'MedixCare', 'industry' => 'Healthcare'],
            ['name' => 'Northstar Logistics', 'industry' => 'Logistics'],
            ['name' => 'LaunchPilot', 'industry' => 'SaaS'],
            ['name' => 'Finora', 'industry' => 'Financial Services'],
            ['name' => 'EduSpark', 'industry' => 'Education Technology'],
        ];
        DB::table('website_clients')->insert(collect(range(1, 6))->map(function ($index) use ($now, $clientNames) {
            return [
                'name' => $clientNames[$index - 1]['name'],
                'industry' => $clientNames[$index - 1]['industry'],
                'description' => 'Digital product and software delivery partner.',
                'url' => '#',
                'image' => "assets/frontend/img/demo-content/clients/clients{$index}.png",
                'sort_order' => $index,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        })->all());

        DB::table('web_designs')->delete();
        DB::table('web_designs')->insert([
            ['title' => 'Custom Web Application Development', 'description' => 'Secure, responsive, and scalable web applications tailored to your workflow and business goals.', 'image' => 'assets/frontend/img/services/custom-software.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'SaaS Product Development', 'description' => 'End-to-end SaaS engineering, from MVP planning and architecture to launch, billing, and ongoing iteration.', 'image' => 'assets/frontend/img/services/ui-ux-design.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Business Portal and Dashboard', 'description' => 'Powerful dashboards and portals that centralize data, streamline approvals, and improve team productivity.', 'image' => 'assets/frontend/img/services/api-integration.jpg', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('voip_dialers')->delete();
        DB::table('voip_dialers')->insert([
            ['title' => 'Mobile App Development', 'description' => 'User-friendly Android and iOS applications built for performance, reliability, and long-term maintainability.', 'image' => 'assets/frontend/img/services/mobile-app.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Cross-Platform Applications', 'description' => 'Efficient cross-platform apps that deliver a consistent experience across devices while reducing development time.', 'image' => 'assets/frontend/img/services/mobile-app.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'App Maintenance and Optimization', 'description' => 'Performance tuning, feature upgrades, security updates, and dependable support for existing mobile products.', 'image' => 'assets/frontend/img/services/software-consultation.jpg', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('voip_hosting_domains')->delete();
        DB::table('voip_hosting_domains')->insert([
            ['title' => 'Cloud Infrastructure and DevOps', 'description' => 'Reliable cloud environments, CI/CD pipelines, monitoring, and deployment automation.', 'benefit' => 'Ship updates faster, improve uptime, and scale infrastructure with confidence.', 'image' => 'assets/frontend/img/services/cloud-devops.jpg', 'benefit_image' => 'assets/frontend/img/services/cloud-devops.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'API and System Integration', 'description' => 'Connect your CRM, ERP, payment gateway, mobile app, and third-party platforms through secure APIs.', 'benefit' => 'Eliminate duplicate data entry and create a smooth flow of information across your business.', 'image' => 'assets/frontend/img/services/api-integration.jpg', 'benefit_image' => 'assets/frontend/img/services/api-integration.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Workflow Automation', 'description' => 'Automate repetitive processes, notifications, reporting, and approvals with dependable software workflows.', 'benefit' => 'Reduce manual work, improve accuracy, and give your team more time for high-value tasks.', 'image' => 'assets/frontend/img/services/software-consultation.jpg', 'benefit_image' => 'assets/frontend/img/services/software-consultation.jpg', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('faqs')->delete();
        DB::table('faqs')->insert([
            ['question' => 'What types of software do you build?', 'answer' => 'We build business websites, custom web applications, SaaS products, mobile apps, dashboards, APIs, automation tools, and cloud-based systems.', 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Can you work with an existing application?', 'answer' => 'Yes. We can audit, maintain, redesign, optimize, or gradually modernize an existing application without disrupting daily operations.', 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'How long does a typical project take?', 'answer' => 'A focused MVP may take 6–12 weeks, while larger platforms take longer. After discovery, we provide a clear scope, timeline, and delivery plan.', 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Do you provide support after launch?', 'answer' => 'Yes. We offer ongoing maintenance, monitoring, security updates, performance optimization, and feature development after launch.', 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Will we own the source code?', 'answer' => 'Yes. After the agreed project payments are complete, you receive the project source code and relevant technical documentation.', 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'How do we start a project?', 'answer' => 'Send us a short description of your idea or current challenge. We will schedule a discovery call and recommend the most practical next step.', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('custom_pages')->delete();
        DB::table('custom_pages')->insert([
            ['status' => 1, 'name' => 'About Us', 'slug' => 'about-us', 'title' => 'Software Engineering with a Business Mindset', 'description' => '<p>NexGen IT is a software company helping startups and established businesses design, build, and improve digital products.</p><p>Our team combines product thinking, user experience design, modern engineering, and dependable support. We value clear communication, practical decisions, and software that creates measurable business value.</p>', 'visitor_counter' => 0, 'serial' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['status' => 1, 'name' => 'Our Process', 'slug' => 'our-process', 'title' => 'A Clear Process from Idea to Launch', 'description' => '<h3>Discover</h3><p>We understand your goals, users, workflows, and technical constraints.</p><h3>Design</h3><p>We plan the product experience, architecture, milestones, and delivery roadmap.</p><h3>Build</h3><p>We develop in focused iterations with regular demos and quality checks.</p><h3>Launch and Improve</h3><p>We deploy, monitor, support, and continuously improve the product.</p>', 'visitor_counter' => 0, 'serial' => 2, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('demos')->delete();
        DB::table('demos')->insert([
            $this->demo('SaaS Analytics Dashboard', 'saas-analytics-dashboard', 'A modern subscription analytics dashboard with user management, reporting, and KPI tracking.', 'assets/frontend/img/demo-content/illustrations/img11.png', $now),
            $this->demo('Inventory and Sales Management', 'inventory-sales-management', 'A centralized system for products, purchases, stock levels, sales, and operational reports.', 'assets/frontend/img/demo-content/case-studies/screen1.png', $now),
            $this->demo('Customer Service Portal', 'customer-service-portal', 'A self-service customer portal with ticketing, knowledge base, notifications, and account management.', 'assets/frontend/img/demo-content/case-studies/screen2.png', $now),
            $this->demo('Project and Team Workspace', 'project-team-workspace', 'A collaborative workspace for tasks, milestones, documents, communication, and project reporting.', 'assets/frontend/img/demo-content/illustrations/img13.png', $now),
        ]);

        update_static_option('counter_awards', '12+');
        update_static_option('counter_year', '8+');
        update_static_option('counter_project', '150+');
        update_static_option('counter_client', '85+');
        update_static_option('company_email', 'hello@nexgenit.com');
        update_static_option('company_phone', '+880 1705-549900');
        update_static_option('company_address', 'Dhaka, Bangladesh');
        update_static_option('company_short_description', 'NexGen IT designs and develops custom software, web applications, mobile apps, SaaS products, and cloud solutions for growing businesses.');
        update_static_option('company_office_hour', 'Sun - Thu, 9:00 AM - 6:00 PM');
        update_static_option('footer_credit', 'Copyright '.date('Y').' NexGen IT. Software designed for meaningful growth.');
        update_static_option('website_meta_description', 'NexGen IT is a software development company specializing in custom web applications, mobile apps, SaaS products, UI/UX, cloud, APIs, and automation.');
    }

    private function blog($title, $slug, $description, $image, $now)
    {
        return [
            'title' => $title,
            'writer_id' => 1,
            'is_active' => 1,
            'description' => '<p>'.$description.'</p><p>At NexGen IT, we approach every software project with a focus on business outcomes, user experience, security, and long-term maintainability.</p>',
            'image' => $image,
            'slug' => $slug,
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }

    private function demo($title, $slug, $description, $image, $now)
    {
        return [
            'title' => $title,
            'writer_id' => 1,
            'price' => 0,
            'url' => url('/contact-us'),
            'is_active' => 1,
            'description' => $description,
            'image' => $image,
            'slug' => $slug,
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
