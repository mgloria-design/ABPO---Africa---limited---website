<?php
/**
 * Hardcoded job openings for ABPO Africa Limited.
 * Add, edit, or remove entries here — both careers.php and apply.php read from this file.
 * 'slug' must be unique; it's used in the apply link (apply.php?job=slug).
 */

$jobs = [
    [
        'slug'       => 'it-risk-analyst',
        'title'      => 'IT Risk Analyst',
        'department' => 'IT Risk Advisory & Analytics',
        'type'       => 'Full-time',
        'location'   => 'Lagos, Nigeria',
    ],
    [
        'slug'       => 'forensic-investigator-junior',
        'title'      => 'Forensic Investigator (Junior)',
        'department' => 'Fraud & Forensic Investigation',
        'type'       => 'Full-time',
        'location'   => 'Lagos, Nigeria',
    ],
    [
        'slug'       => 'data-analytics-intern',
        'title'      => 'Data Analytics Intern',
        'department' => 'Data Analytics & Business Insights',
        'type'       => 'Internship',
        'location'   => 'Lagos, Nigeria',
    ],
    [
        'slug'       => 'bpo-operations-associate',
        'title'      => 'BPO Operations Associate',
        'department' => 'Business Process Outsourcing',
        'type'       => 'Full-time',
        'location'   => 'Accra, Ghana',
    ],
];

/** Look up a single job by its slug. Returns null if not found. */
function find_job(array $jobs, ?string $slug): ?array
{
    if (!$slug) {
        return null;
    }
    foreach ($jobs as $job) {
        if ($job['slug'] === $slug) {
            return $job;
        }
    }
    return null;
}

function h(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}