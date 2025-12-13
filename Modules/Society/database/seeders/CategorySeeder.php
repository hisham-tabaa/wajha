<?php

namespace Modules\Society\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Society\Models\Category;

/**
 * Class CategorySeeder
 *
 * This seeder populates the 'categories' table with predefined data.
 * It uses the updateOrCreate method to prevent duplicate entries.
 *
 * @package Modules\Society\Database\Seeders
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method creates or updates predefined categories in the database.
     * It ensures that categories are not duplicated when the seeder is run multiple times.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            [
                'type' => 'society',
                'name_ar' => 'غرف للإيجار',
                'name_en' => 'Rooms for Rent',
                'description' => null,
                'sort_order' => 1,
            ],
            [
                'type' => 'society',
                'name_ar' => 'عقار للبيع',
                'name_en' => 'Property for Sale',
                'description' => null,
                'sort_order' => 2,
            ],
            [
                'type' => 'society',
                'name_ar' => 'عقار للإيجار',
                'name_en' => 'Property for Rent',
                'description' => null,
                'sort_order' => 3,
            ],
            [
                'type' => 'society',
                'name_ar' => 'السيارات',
                'name_en' => 'Cars',
                'description' => null,
                'sort_order' => 4,
                'children' => [
                    ['type' => 'society', 'name_ar' => 'سيارات جديدة', 'name_en' => 'New Cars', 'description' => null, 'sort_order' => 1,],
                    ['type' => 'society', 'name_ar' => 'سيارات مستعملة', 'name_en' => 'Used Cars', 'description' => null, 'sort_order' => 2,],
                    ['type' => 'society', 'name_ar' => 'سيارات للإيجار', 'name_en' => 'Cars for Rent', 'description' => null, 'sort_order' => 3,],
                    ['type' => 'society', 'name_ar' => 'اليات ثقيلة', 'name_en' => 'Heavy Equipment', 'description' => null, 'sort_order' => 4,],
                ]
            ],
            [
                'type' => 'society',
                'name_ar' => 'منشأة قيد التنفيذ',
                'name_en' => 'Facility Under Implementation',
                'description' => null,
                'sort_order' => 5,
            ],
            [
                'type' => 'society',
                'name_ar' => 'خدمات',
                'name_en' => 'Services',
                'description' => null,
                'sort_order' => 6,
                'children' => [
                    ['type' => 'society', 'name_ar' => 'معلم كهرباء', 'name_en' => 'Electrician', 'description' => null, 'sort_order' => 1],
                    ['type' => 'society', 'name_ar' => 'استاذ', 'name_en' => 'Teacher', 'description' => null, 'sort_order' => 2],
                    ['type' => 'society', 'name_ar' => 'معلم صحية', 'name_en' => 'Plumber', 'description' => null, 'sort_order' => 3],
                    ['type' => 'society', 'name_ar' => 'معلم بناء ( معمرجي )', 'name_en' => 'Builder (Mason)', 'description' => null, 'sort_order' => 4],
                    ['type' => 'society', 'name_ar' => 'بلاط', 'name_en' => 'Tiler', 'description' => null, 'sort_order' => 5],
                    ['type' => 'society', 'name_ar' => 'نجار', 'name_en' => 'Carpenter', 'description' => null, 'sort_order' => 6],
                    ['type' => 'society', 'name_ar' => 'طيان', 'name_en' => 'Painter', 'description' => null, 'sort_order' => 7],
                    ['type' => 'society', 'name_ar' => 'حداد', 'name_en' => 'Blacksmith', 'description' => null, 'sort_order' => 8],
                    ['type' => 'society', 'name_ar' => 'صيانة الكترونيات', 'name_en' => 'Electronics Repair', 'description' => null, 'sort_order' => 9],
                    ['type' => 'society', 'name_ar' => 'ميكانيكي', 'name_en' => 'Mechanic', 'description' => null, 'sort_order' => 10],
                    ['type' => 'society', 'name_ar' => 'مختص زجاج', 'name_en' => 'Glass Specialist', 'description' => null, 'sort_order' => 11],
                    ['type' => 'society', 'name_ar' => 'تصميم', 'name_en' => 'Design', 'description' => null, 'sort_order' => 12],
                    ['type' => 'society', 'name_ar' => 'خدمة حدائق', 'name_en' => 'Gardening Service', 'description' => null, 'sort_order' => 13],
                    ['type' => 'society', 'name_ar' => 'مكافحة حشرات', 'name_en' => 'Pest Control', 'description' => null, 'sort_order' => 14],
                    ['type' => 'society', 'name_ar' => 'معلم تنجيد', 'name_en' => 'Upholsterer', 'description' => null, 'sort_order' => 15],
                    ['type' => 'society', 'name_ar' => 'صيانة مطابخ', 'name_en' => 'Kitchen Maintenance', 'description' => null, 'sort_order' => 16],
                    ['type' => 'society', 'name_ar' => 'صيانة حمامات', 'name_en' => 'Bathroom Maintenance', 'description' => null, 'sort_order' => 17],
                    ['type' => 'society', 'name_ar' => 'السفر والسياحة', 'name_en' => 'Travel and Tourism', 'description' => null, 'sort_order' => 18],
                    ['type' => 'society', 'name_ar' => 'محاسبة ومالية', 'name_en' => 'Accounting and Finance', 'description' => null, 'sort_order' => 19],
                    ['type' => 'society', 'name_ar' => 'خدمات قانونية', 'name_en' => 'Legal Services', 'description' => null, 'sort_order' => 20],
                    ['type' => 'society', 'name_ar' => 'خدمات استشارية', 'name_en' => 'Consulting Services', 'description' => null, 'sort_order' => 21],
                    ['type' => 'society', 'name_ar' => 'خدمة مناسبات', 'name_en' => 'Event Services', 'description' => null, 'sort_order' => 22],
                    ['type' => 'society', 'name_ar' => 'دعاية وتسويق', 'name_en' => 'Advertising and Marketing', 'description' => null, 'sort_order' => 23],
                    ['type' => 'society', 'name_ar' => 'خدمات نقل وتوصيل', 'name_en' => 'Transport and Delivery', 'description' => null, 'sort_order' => 24],
                    ['type' => 'society', 'name_ar' => 'خدمات تنظيف', 'name_en' => 'Cleaning Services', 'description' => null, 'sort_order' => 25],
                    ['type' => 'society', 'name_ar' => 'خدمات طبية', 'name_en' => 'Medical Services', 'description' => null, 'sort_order' => 26],
                    ['type' => 'society', 'name_ar' => 'خدمات تجميل', 'name_en' => 'Beauty Services', 'description' => null, 'sort_order' => 27],
                    ['type' => 'society', 'name_ar' => 'خدمات رعاية منزلية', 'name_en' => 'Home Care Services', 'description' => null, 'sort_order' => 28],
                    ['type' => 'society', 'name_ar' => 'دروس خصوصية', 'name_en' => 'Private Lessons', 'description' => null, 'sort_order' => 29],
                    ['type' => 'society', 'name_ar' => 'دوات تدريب', 'name_en' => 'Training Courses', 'description' => null, 'sort_order' => 30],
                    ['type' => 'society', 'name_ar' => 'خدمات صيد', 'name_en' => 'Fishing Services', 'description' => null, 'sort_order' => 31],
                    ['type' => 'society', 'name_ar' => 'خدمات بيطرية وزراعية', 'name_en' => 'Veterinary and Agricultural Services', 'description' => null, 'sort_order' => 32],
                    ['type' => 'society', 'name_ar' => 'خدمات مكتبية', 'name_en' => 'Office Services', 'description' => null, 'sort_order' => 33],
                    ['type' => 'society', 'name_ar' => 'منصات مواقع الويب', 'name_en' => 'Website Platforms', 'description' => null, 'sort_order' => 34],
                    ['type' => 'society', 'name_ar' => 'تطوير البرمجيات', 'name_en' => 'Software Development', 'description' => null, 'sort_order' => 35],
                    ['type' => 'society', 'name_ar' => 'خدمات الفحص', 'name_en' => 'Inspection Services', 'description' => null, 'sort_order' => 36],
                    ['type' => 'society', 'name_ar' => 'FCL', 'name_en' => 'FCL', 'description' => null, 'sort_order' => 37],
                    ['type' => 'society', 'name_ar' => 'التصديق', 'name_en' => 'Certification', 'description' => null, 'sort_order' => 38],
                    ['type' => 'society', 'name_ar' => 'الدعم الفني', 'name_en' => 'Technical Support', 'description' => null, 'sort_order' => 39],
                    ['type' => 'society', 'name_ar' => 'التفتيش والائتمان', 'name_en' => 'Inspection and Accreditation', 'description' => null, 'sort_order' => 40],
                    ['type' => 'society', 'name_ar' => 'تصميم شعار', 'name_en' => 'Logo Design', 'description' => null, 'sort_order' => 41],
                    ['type' => 'society', 'name_ar' => 'تصميم 3D', 'name_en' => '3D Design', 'description' => null, 'sort_order' => 42],
                    ['type' => 'society', 'name_ar' => 'التصميم الصناعي', 'name_en' => 'Industrial Design', 'description' => null, 'sort_order' => 43],
                ]

            ],
            [
                'type' => 'society',
                'name_ar' => 'مناقصة',
                'name_en' => 'Auction',
                'description' => null,
                'sort_order' => 7,
            ],
            [
                'type' => 'society',
                'name_ar' => 'وظائف',
                'name_en' => 'Jobs',
                'description' => null,
                'sort_order' => 8,
                'children' => [
                    [
                        'type' => 'society',
                        'name_ar' => 'فرص عمل',
                        'name_en' => 'Job Opportunities',
                        'description' => null,
                        'sort_order' => 1,
                        'children' => [
                                ['type' => 'society', 'name_ar' => 'المحاسبة والمالية', 'name_en' => 'Accounting and Finance', 'description' => null, 'sort_order' => 1],
                                ['type' => 'society', 'name_ar' => 'السيارات والنقل', 'name_en' => 'Automotive and Transportation', 'description' => null, 'sort_order' => 2],
                                ['type' => 'society', 'name_ar' => 'الصحة والجمال', 'name_en' => 'Health and Beauty', 'description' => null, 'sort_order' => 3],
                                ['type' => 'society', 'name_ar' => 'مبرمج', 'name_en' => 'Programmer', 'description' => null, 'sort_order' => 4],
                                ['type' => 'society', 'name_ar' => 'التنظيف والتدبير المنزلي', 'name_en' => 'Cleaning and Housekeeping', 'description' => null, 'sort_order' => 5],
                                ['type' => 'society', 'name_ar' => 'الإنشاءات', 'name_en' => 'Construction', 'description' => null, 'sort_order' => 6],
                                ['type' => 'society', 'name_ar' => 'شيف - مطبخ', 'name_en' => 'Chef - Kitchen', 'description' => null, 'sort_order' => 7],
                                ['type' => 'society', 'name_ar' => 'إدارة وتحليل البيانات', 'name_en' => 'Data Management and Analysis', 'description' => null, 'sort_order' => 8],
                                ['type' => 'society', 'name_ar' => 'التصميم', 'name_en' => 'Design', 'description' => null, 'sort_order' => 9],
                                ['type' => 'society', 'name_ar' => 'سائق توصيل', 'name_en' => 'Delivery Driver', 'description' => null, 'sort_order' => 10],
                                ['type' => 'society', 'name_ar' => 'تعليم', 'name_en' => 'Education', 'description' => null, 'sort_order' => 11],
                                ['type' => 'society', 'name_ar' => 'هندسة', 'name_en' => 'Engineering', 'description' => null, 'sort_order' => 12],
                                ['type' => 'society', 'name_ar' => 'إدارة الفعاليات', 'name_en' => 'Event Management', 'description' => null, 'sort_order' => 13],
                                ['type' => 'society', 'name_ar' => 'عامل - فني', 'name_en' => 'Worker - Technician', 'description' => null, 'sort_order' => 14],
                                ['type' => 'society', 'name_ar' => 'موارد بشرية', 'name_en' => 'Human Resources', 'description' => null, 'sort_order' => 15],
                                ['type' => 'society', 'name_ar' => 'تكنولوجيا المعلومات', 'name_en' => 'Information Technology', 'description' => null, 'sort_order' => 16],
                                ['type' => 'society', 'name_ar' => 'خدمة قانونية', 'name_en' => 'Legal Service', 'description' => null, 'sort_order' => 17],
                                ['type' => 'society', 'name_ar' => 'التصنيع والتخزين', 'name_en' => 'Manufacturing and Warehousing', 'description' => null, 'sort_order' => 18],
                                ['type' => 'society', 'name_ar' => 'كابتن بحري / بحار', 'name_en' => 'Sea Captain / Sailor', 'description' => null, 'sort_order' => 19],
                                ['type' => 'society', 'name_ar' => 'الإعلام والفنون والترفيه', 'name_en' => 'Media, Arts and Entertainment', 'description' => null, 'sort_order' => 20],
                                ['type' => 'society', 'name_ar' => 'الطب والتمريض / الرعاية الصحية', 'name_en' => 'Medicine, Nursing and Healthcare', 'description' => null, 'sort_order' => 21],
                                ['type' => 'society', 'name_ar' => 'عقار', 'name_en' => 'Real Estate', 'description' => null, 'sort_order' => 22],
                                ['type' => 'society', 'name_ar' => 'تشغيل مطاعم وفنادق', 'name_en' => 'Restaurant and Hotel Operations', 'description' => null, 'sort_order' => 23],
                                ['type' => 'society', 'name_ar' => 'السكرتاريا والأعمال المكتبية', 'name_en' => 'Secretarial and Office Work', 'description' => null, 'sort_order' => 24],
                                ['type' => 'society', 'name_ar' => 'الأمن والحماية', 'name_en' => 'Security and Protection', 'description' => null, 'sort_order' => 25],
                                ['type' => 'society', 'name_ar' => 'السفر والضيافة', 'name_en' => 'Travel and Hospitality', 'description' => null, 'sort_order' => 26],
                                ['type' => 'society', 'name_ar' => 'التسويق والمبيعات', 'name_en' => 'Marketing and Sales', 'description' => null, 'sort_order' => 27],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الإعلامي', 'name_en' => 'Media Production', 'description' => null, 'sort_order' => 28],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الموسيقي', 'name_en' => 'Music Production', 'description' => null, 'sort_order' => 29],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الحيواني', 'name_en' => 'Animal Production', 'description' => null, 'sort_order' => 30],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الصناعي', 'name_en' => 'Industrial Production', 'description' => null, 'sort_order' => 31],
                                ['type' => 'society', 'name_ar' => 'خدمات عسكرية', 'name_en' => 'Military Services', 'description' => null, 'sort_order' => 32],
                                ['type' => 'society', 'name_ar' => 'خدمات اجتماعية', 'name_en' => 'Social Services', 'description' => null, 'sort_order' => 33],
                                ['type' => 'society', 'name_ar' => 'خدمات شخصية', 'name_en' => 'Personal Services', 'description' => null, 'sort_order' => 34],
                                ['type' => 'society', 'name_ar' => 'خدمة فنية وتدريبية', 'name_en' => 'Technical and Training Services', 'description' => null, 'sort_order' => 35],
                                ['type' => 'society', 'name_ar' => 'المنظمات غير الربحية', 'name_en' => 'Nonprofit Organizations', 'description' => null, 'sort_order' => 36],
                                ['type' => 'society', 'name_ar' => 'أخرى', 'name_en' => 'Other', 'description' => null, 'sort_order' => 37],
                        ],
                    ],
                    [
                        'type' => 'society',
                        'name_ar' => 'ابحث عن فرصة',
                        'name_en' => 'Looking for a Job',
                        'description' => null,
                        'sort_order' => 2,
                        'children' => [
                                ['type' => 'society', 'name_ar' => 'المحاسبة والمالية', 'name_en' => 'Accounting and Finance', 'description' => null, 'sort_order' => 1],
                                ['type' => 'society', 'name_ar' => 'السيارات والنقل', 'name_en' => 'Automotive and Transportation', 'description' => null, 'sort_order' => 2],
                                ['type' => 'society', 'name_ar' => 'الصحة والجمال', 'name_en' => 'Health and Beauty', 'description' => null, 'sort_order' => 3],
                                ['type' => 'society', 'name_ar' => 'مبرمج', 'name_en' => 'Programmer', 'description' => null, 'sort_order' => 4],
                                ['type' => 'society', 'name_ar' => 'التنظيف والتدبير المنزلي', 'name_en' => 'Cleaning and Housekeeping', 'description' => null, 'sort_order' => 5],
                                ['type' => 'society', 'name_ar' => 'الإنشاءات', 'name_en' => 'Construction', 'description' => null, 'sort_order' => 6],
                                ['type' => 'society', 'name_ar' => 'شيف - مطبخ', 'name_en' => 'Chef - Kitchen', 'description' => null, 'sort_order' => 7],
                                ['type' => 'society', 'name_ar' => 'إدارة وتحليل البيانات', 'name_en' => 'Data Management and Analysis', 'description' => null, 'sort_order' => 8],
                                ['type' => 'society', 'name_ar' => 'التصميم', 'name_en' => 'Design', 'description' => null, 'sort_order' => 9],
                                ['type' => 'society', 'name_ar' => 'سائق توصيل', 'name_en' => 'Delivery Driver', 'description' => null, 'sort_order' => 10],
                                ['type' => 'society', 'name_ar' => 'تعليم', 'name_en' => 'Education', 'description' => null, 'sort_order' => 11],
                                ['type' => 'society', 'name_ar' => 'هندسة', 'name_en' => 'Engineering', 'description' => null, 'sort_order' => 12],
                                ['type' => 'society', 'name_ar' => 'إدارة الفعاليات', 'name_en' => 'Event Management', 'description' => null, 'sort_order' => 13],
                                ['type' => 'society', 'name_ar' => 'عامل - فني', 'name_en' => 'Worker - Technician', 'description' => null, 'sort_order' => 14],
                                ['type' => 'society', 'name_ar' => 'موارد بشرية', 'name_en' => 'Human Resources', 'description' => null, 'sort_order' => 15],
                                ['type' => 'society', 'name_ar' => 'تكنولوجيا المعلومات', 'name_en' => 'Information Technology', 'description' => null, 'sort_order' => 16],
                                ['type' => 'society', 'name_ar' => 'خدمة قانونية', 'name_en' => 'Legal Service', 'description' => null, 'sort_order' => 17],
                                ['type' => 'society', 'name_ar' => 'التصنيع والتخزين', 'name_en' => 'Manufacturing and Warehousing', 'description' => null, 'sort_order' => 18],
                                ['type' => 'society', 'name_ar' => 'كابتن بحري / بحار', 'name_en' => 'Sea Captain / Sailor', 'description' => null, 'sort_order' => 19],
                                ['type' => 'society', 'name_ar' => 'الإعلام والفنون والترفيه', 'name_en' => 'Media, Arts and Entertainment', 'description' => null, 'sort_order' => 20],
                                ['type' => 'society', 'name_ar' => 'الطب والتمريض / الرعاية الصحية', 'name_en' => 'Medicine, Nursing and Healthcare', 'description' => null, 'sort_order' => 21],
                                ['type' => 'society', 'name_ar' => 'عقار', 'name_en' => 'Real Estate', 'description' => null, 'sort_order' => 22],
                                ['type' => 'society', 'name_ar' => 'تشغيل مطاعم وفنادق', 'name_en' => 'Restaurant and Hotel Operations', 'description' => null, 'sort_order' => 23],
                                ['type' => 'society', 'name_ar' => 'السكرتاريا والأعمال المكتبية', 'name_en' => 'Secretarial and Office Work', 'description' => null, 'sort_order' => 24],
                                ['type' => 'society', 'name_ar' => 'الأمن والحماية', 'name_en' => 'Security and Protection', 'description' => null, 'sort_order' => 25],
                                ['type' => 'society', 'name_ar' => 'السفر والضيافة', 'name_en' => 'Travel and Hospitality', 'description' => null, 'sort_order' => 26],
                                ['type' => 'society', 'name_ar' => 'التسويق والمبيعات', 'name_en' => 'Marketing and Sales', 'description' => null, 'sort_order' => 27],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الإعلامي', 'name_en' => 'Media Production', 'description' => null, 'sort_order' => 28],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الموسيقي', 'name_en' => 'Music Production', 'description' => null, 'sort_order' => 29],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الحيواني', 'name_en' => 'Animal Production', 'description' => null, 'sort_order' => 30],
                                ['type' => 'society', 'name_ar' => 'الإنتاج الصناعي', 'name_en' => 'Industrial Production', 'description' => null, 'sort_order' => 31],
                                ['type' => 'society', 'name_ar' => 'خدمات عسكرية', 'name_en' => 'Military Services', 'description' => null, 'sort_order' => 32],
                                ['type' => 'society', 'name_ar' => 'خدمات اجتماعية', 'name_en' => 'Social Services', 'description' => null, 'sort_order' => 33],
                                ['type' => 'society', 'name_ar' => 'خدمات شخصية', 'name_en' => 'Personal Services', 'description' => null, 'sort_order' => 34],
                                ['type' => 'society', 'name_ar' => 'خدمة فنية وتدريبية', 'name_en' => 'Technical and Training Services', 'description' => null, 'sort_order' => 35],
                                ['type' => 'society', 'name_ar' => 'المنظمات غير الربحية', 'name_en' => 'Nonprofit Organizations', 'description' => null, 'sort_order' => 36],
                                ['type' => 'society', 'name_ar' => 'أخرى', 'name_en' => 'Other', 'description' => null, 'sort_order' => 37],
                        ],
                    ],

                ],
            ],
            [
                'type' => 'society',
                'name_ar' => 'المشاريع المقترحة للفخامة',
                'name_en' => 'Luxury Proposed Projects',
                'description' => null,
                'sort_order' => 9,
            ],
        ];

       $this->createCategories($categories);

    $this->command->info('✅ Categories seeded successfully!');
    $this->command->info('📊 Total categories in database: ' . Category::count());

    }

    private function createCategories(array $categories, ?int $parentId = null): void
{
    foreach ($categories as $categoryData) {
        $children = $categoryData['children'] ?? [];
        unset($categoryData['children']);

        // إذا parentId موجود، أضفه للبيانات
        if ($parentId) {
            $categoryData['parent_id'] = $parentId;
        }

        // إنشاء الفئة
        $category = Category::create($categoryData);

        // استدعاء نفس الدالة لإنشاء الأطفال إذا وجدوا
        if (!empty($children)) {
            $this->createCategories($children, $category->id);
        }
    }
}
}
