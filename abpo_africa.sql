-- ====================================================
-- ABPO Africa Limited — Blog / Insights Database Schema
-- ====================================================

CREATE DATABASE IF NOT EXISTS abpo_africa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE abpo_africa;

-- ----------------------------
-- Categories
-- ----------------------------
CREATE TABLE IF NOT EXISTS blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(120) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ----------------------------
-- Authors
-- ----------------------------
CREATE TABLE IF NOT EXISTS blog_authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    title VARCHAR(150) DEFAULT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    bio TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ----------------------------
-- Posts
-- ----------------------------
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt VARCHAR(500) DEFAULT NULL,
    content LONGTEXT NOT NULL,
    featured_image VARCHAR(255) DEFAULT NULL,
    category_id INT DEFAULT NULL,
    author_id INT DEFAULT NULL,
    read_time INT DEFAULT 5,                 -- minutes
    is_featured TINYINT(1) DEFAULT 0,
    status ENUM('draft','published') DEFAULT 'published',
    views INT DEFAULT 0,
    published_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES blog_authors(id) ON DELETE SET NULL,
    INDEX idx_status_published (status, published_at),
    INDEX idx_category (category_id)
) ENGINE=InnoDB;

-- ----------------------------
-- Seed: Categories
-- ----------------------------
INSERT INTO blog_categories (name, slug) VALUES
('IT Risk & Cybersecurity', 'it-risk-cybersecurity'),
('Business Process Outsourcing', 'business-process-outsourcing'),
('Fraud & Forensics', 'fraud-forensics'),
('Risk Management', 'risk-management'),
('Data Analytics', 'data-analytics'),
('Company News', 'company-news');

-- ----------------------------
-- Seed: Authors
-- ----------------------------
INSERT INTO blog_authors (name, title, avatar) VALUES
('ABPO Research Team', 'Advisory & Insights', NULL),
('Sarah Mensah', 'Head of Risk Advisory', NULL),
('David Okonkwo', 'Lead Forensic Investigator', NULL);

-- ----------------------------
-- Seed: Sample Posts
-- ----------------------------
INSERT INTO blog_posts (title, slug, excerpt, content, category_id, author_id, read_time, is_featured, status, published_at) VALUES
(
  'Why African Businesses Need a Proactive IT Risk Strategy in 2026',
  'proactive-it-risk-strategy-2026',
  'As digital transformation accelerates across the continent, reactive IT risk approaches are no longer enough. Here is what forward-thinking organizations are doing differently.',
  '<p>Digital transformation across Africa is accelerating faster than most risk frameworks can keep pace with. Organizations that once treated IT risk as a once-a-year checklist exercise are now finding themselves exposed to threats that move in real time.</p><p>A proactive IT risk strategy starts with continuous visibility: knowing what assets exist, who has access to them, and how data flows between systems. From there, organizations need to layer in regular vulnerability assessments, incident response readiness, and a culture where reporting potential issues is encouraged rather than penalized.</p><p>The organizations seeing the best outcomes are the ones treating IT risk management as a continuous discipline embedded into daily operations, not a periodic audit exercise.</p>',
  1, 2, 6, 1, 'published', '2026-06-10 09:00:00'
),
(
  'Five Signs Your Business Could Benefit from BPO',
  'five-signs-business-benefit-bpo',
  'Outsourcing isn-t just for large enterprises. Here are five clear indicators that it might be time to consider business process outsourcing.',
  '<p>Many growing businesses reach a point where internal teams are stretched thin handling repetitive back-office work instead of focusing on strategic growth. If any of the following sound familiar, it may be time to explore outsourcing.</p><p>First, if your finance team spends more time on data entry than analysis, that is a clear signal. Second, rising operational costs without a corresponding rise in output often point to inefficient internal processes. Third, difficulty scaling customer support during peak periods is a common pain point that BPO partners solve well.</p><p>Fourth, compliance and reporting burdens that pull leadership away from strategic work are a strong case for outsourcing. Finally, if you are struggling to find and retain specialized talent for non-core functions, a BPO partnership can close that gap quickly.</p>',
  2, 1, 5, 0, 'published', '2026-06-02 09:00:00'
),
(
  'Inside a Fraud Investigation: What Organizations Should Expect',
  'inside-fraud-investigation-what-to-expect',
  'When fraud is suspected, the first 48 hours matter most. Here is a behind-the-scenes look at how a professional forensic investigation unfolds.',
  '<p>When an organization first suspects fraud, the instinct is often to confront the suspected individual immediately. This is almost always the wrong move, as it can compromise evidence and tip off other parties involved.</p><p>A professional investigation begins with a confidential scoping phase, where the allegation is assessed and a containment plan is put in place to preserve evidence, including financial records and digital communications. Investigators then move into evidence collection, using forensically sound methods to ensure findings remain legally admissible.</p><p>Throughout the process, communication is carefully managed on a need-to-know basis. The investigation concludes with a clear, evidence-backed report that supports whatever action the organization chooses to take next, whether disciplinary, legal, or regulatory.</p>',
  3, 3, 7, 1, 'published', '2026-05-20 09:00:00'
),
(
  'Building a Risk-Aware Culture: Beyond the Policy Document',
  'building-risk-aware-culture',
  'A risk management framework is only as strong as the culture behind it. Here is how leading organizations move risk awareness from paper to practice.',
  '<p>Many organizations invest heavily in risk policies and frameworks, only to find that staff on the ground are barely aware they exist. A truly risk-aware culture requires more than documentation; it requires consistent reinforcement.</p><p>This starts at the top. When leadership visibly prioritizes risk discussions in regular meetings, it signals to the rest of the organization that this is not a box-ticking exercise. Training also needs to move beyond annual compliance modules toward practical, role-specific scenarios that employees can relate to.</p><p>Finally, organizations that create safe channels for staff to flag concerns without fear of blame tend to surface risks much earlier, when they are still manageable.</p>',
  4, 2, 5, 0, 'published', '2026-05-08 09:00:00'
),
(
  'From Spreadsheets to Dashboards: A Practical Data Maturity Roadmap',
  'spreadsheets-to-dashboards-data-maturity',
  'Most organizations sit somewhere between scattered spreadsheets and a fully data-driven culture. Here is a practical path to move forward.',
  '<p>Data maturity is rarely a single leap. Most organizations move through identifiable stages, and understanding where you currently sit helps clarify the next achievable step.</p><p>The first stage is fragmented reporting, where each department maintains its own spreadsheets with little consistency. The next stage involves centralizing data into a single source of truth, even if reporting is still largely manual. From there, organizations begin automating recurring reports and building live dashboards that reduce the lag between data and decision.</p><p>The most mature organizations reach a stage where predictive analytics actively informs strategic planning, rather than simply reporting on what already happened.</p>',
  5, 1, 6, 0, 'published', '2026-04-22 09:00:00'
),
(
  'ABPO Africa Limited Expands Forensic Investigation Capabilities',
  'abpo-africa-expands-forensic-capabilities',
  'We are pleased to announce the expansion of our digital forensics team, strengthening our ability to support clients across East and West Africa.',
  '<p>ABPO Africa Limited is pleased to announce a significant expansion of its digital forensics and e-discovery capabilities, in direct response to growing client demand across the region.</p><p>This expansion includes new forensic toolsets for mobile and cloud-based evidence recovery, alongside additional specialist staff trained in chain-of-custody best practices. The investment reflects our continued commitment to delivering thorough, court-ready investigations for clients facing fraud and financial misconduct.</p><p>We look forward to continuing to support organizations across the continent with rigorous, independent investigative services.</p>',
  6, 1, 3, 0, 'published', '2026-04-05 09:00:00'
);